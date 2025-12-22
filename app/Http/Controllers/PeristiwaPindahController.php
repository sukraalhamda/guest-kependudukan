<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PeristiwaPindah;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeristiwaPindahController extends Controller
{
    public function index(Request $request)
    {
        $query = PeristiwaPindah::with('warga', 'media');

        if ($request->search) {
            $query->whereHas('warga', function ($q) use ($request) {
                $q->where('nama', 'like', "%{$request->search}%");
            });
        }

        $data = $query->latest()->paginate(10)->withQueryString();
        return view('pages.peristiwapindah.index', compact('data'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('pages.peristiwapindah.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id'         => 'required|exists:warga,warga_id',
            'tgl_pindah'       => 'required|date',
            'alamat_tujuan'    => 'required|string',
            'kecamatan_tujuan' => 'nullable|string',
            'kabupaten_tujuan' => 'nullable|string',
            'provinsi_tujuan'  => 'nullable|string',
            'negara_tujuan'    => 'nullable|string',
            'alasan'           => 'nullable|string',
            'keterangan'       => 'nullable|string',
            'status'           => 'nullable|in:pending,approved,rejected',
            'no_surat'         => 'nullable|string',
            'file.*'           => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $pindah = PeristiwaPindah::create(
            $request->only([
                'warga_id',
                'tgl_pindah',
                'alamat_tujuan',
                'kecamatan_tujuan',
                'kabupaten_tujuan',
                'provinsi_tujuan',
                'negara_tujuan',
                'alasan',
                'keterangan',
                'status',
                'no_surat',
            ])
        );

        // Upload media
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('peristiwa_pindah', $fileName, 'public');

                $pindah->media()->create([
                    'ref_table'  => 'peristiwa_pindah',
                    'file_name'  => $filePath,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $pindah->media()->count() + 1,
                ]);
            }
        }

        return redirect()->route('peristiwa_pindah.index')
            ->with('success', 'Data pindah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data  = PeristiwaPindah::with('media')->findOrFail($id);
        $warga = Warga::all();

        return view('pages.peristiwapindah.edit', compact('data', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $pindah = PeristiwaPindah::with('media')->findOrFail($id);

        $request->validate([
            'warga_id'         => 'required|exists:warga,warga_id',
            'tgl_pindah'       => 'required|date',
            'alamat_tujuan'    => 'required|string',
            'kecamatan_tujuan' => 'nullable|string',
            'kabupaten_tujuan' => 'nullable|string',
            'provinsi_tujuan'  => 'nullable|string',
            'negara_tujuan'    => 'nullable|string',
            'alasan'           => 'nullable|string',
            'keterangan'       => 'nullable|string',
            'status'           => 'nullable|in:pending,approved,rejected',
            'no_surat'         => 'nullable|string',
            'file.*'           => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $pindah->update(
            $request->only([
                'warga_id',
                'tgl_pindah',
                'alamat_tujuan',
                'kecamatan_tujuan',
                'kabupaten_tujuan',
                'provinsi_tujuan',
                'negara_tujuan',
                'alasan',
                'keterangan',
                'status',
                'no_surat',
            ])
        );

        // Hapus media jika ada
        if ($request->has('delete_media')) {
            $mediaDelete = Media::whereIn('media_id', $request->delete_media)->get();
            foreach ($mediaDelete as $media) {
                Storage::disk('public')->delete($media->file_name);
                $media->delete();
            }
        }

        // Upload media baru
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('peristiwa_pindah', $fileName, 'public');

                $pindah->media()->create([
                    'ref_table'  => 'peristiwa_pindah',
                    'file_name'  => $filePath,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $pindah->media()->count() + 1,
                ]);
            }
        }

        return redirect()->route('peristiwa_pindah.index')
            ->with('success', 'Data pindah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pindah = PeristiwaPindah::with('media')->findOrFail($id);

        foreach ($pindah->media as $media) {
            Storage::disk('public')->delete($media->file_name);
            $media->delete();
        }

        $pindah->delete();

        return redirect()->route('peristiwa_pindah.index')
            ->with('success', 'Data pindah berhasil dihapus');
    }
}
