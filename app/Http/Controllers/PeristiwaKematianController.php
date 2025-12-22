<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PeristiwaKematian;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeristiwaKematianController extends Controller
{
    public function index(Request $request)
    {
        $query = PeristiwaKematian::with('media', 'warga');

        // 🔍 Search berdasarkan Nama Warga atau No Surat
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('no_surat', 'like', "%$search%")
                ->orWhereHas('warga', function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%");
                });
        }

        $data = $query->latest()->paginate(10)->withQueryString();

        return view('pages.peristiwakematian.index', compact('data'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('pages.peristiwakematian.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id'         => 'required|exists:warga,warga_id',
            'tgl_meninggal'    => 'required|date',
            'sebab'            => 'required|string',
            'lokasi'           => 'required|string',
            'no_surat'         => 'nullable|string',
            'file_pendukung.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $data = $request->only([
            'warga_id',
            'tgl_meninggal',
            'sebab',
            'lokasi',
            'no_surat',
        ]);

        $kematian = PeristiwaKematian::create($data);

        // Upload media
        if ($request->hasFile('file_pendukung')) {
            foreach ($request->file('file_pendukung') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('peristiwa_kematian', $fileName, 'public');

                $kematian->media()->create([
                    'file_name'  => $filePath,
                    'ref_table'  => 'peristiwa_kematian',
                    'sort_order' => $kematian->media()->count() + 1,
                    'mime_type'  => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()
            ->route('peristiwa_kematian.index')
            ->with('success', 'Data kematian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kematian = PeristiwaKematian::with('media')->findOrFail($id);
        $warga    = Warga::all();

        return view('pages.peristiwakematian.edit', compact('kematian', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $kematian = PeristiwaKematian::with('media')->findOrFail($id);

        $request->validate([
            'warga_id'         => 'required|exists:warga,warga_id',
            'tgl_meninggal'    => 'required|date',
            'sebab'            => 'required|string',
            'lokasi'           => 'required|string',
            'no_surat'         => 'nullable|string',
            'file_pendukung.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        // Update data utama
        $kematian->update($request->only([
            'warga_id',
            'tgl_meninggal',
            'sebab',
            'lokasi',
            'no_surat',
        ]));

        // 🗑 Hapus media yang dicentang
        if ($request->has('delete_media')) {
            $mediaToDelete = Media::whereIn('media_id', $request->delete_media)->get();

            foreach ($mediaToDelete as $media) {
                if (Storage::disk('public')->exists($media->file_name)) {
                    Storage::disk('public')->delete($media->file_name);
                }
                $media->delete();
            }
        }

        // ➕ Upload media baru
        if ($request->hasFile('file_pendukung')) {
            foreach ($request->file('file_pendukung') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('peristiwa_kematian', $fileName, 'public');

                $kematian->media()->create([
                    'file_name'  => $filePath,
                    'ref_table'  => 'peristiwa_kematian',
                    'sort_order' => $kematian->media()->count() + 1,
                    'mime_type'  => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()
            ->route('peristiwa_kematian.index')
            ->with('success', 'Data kematian berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kematian = PeristiwaKematian::with('media')->findOrFail($id);

        // 🧹 Hapus file media
        foreach ($kematian->media as $media) {
            if (Storage::disk('public')->exists($media->file_name)) {
                Storage::disk('public')->delete($media->file_name);
            }
            $media->delete();
        }

        $kematian->delete();

        return redirect()
            ->route('peristiwa_kematian.index')
            ->with('success', 'Data kematian berhasil dihapus');
    }
}
