<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PeristiwaKelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeristiwaKelahiranController extends Controller
{
    public function index(Request $request)
    {
        $query = PeristiwaKelahiran::with('media', 'warga');

        // 🔍 Search berdasarkan No Akta atau Nama Warga
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('no_akta', 'like', "%$search%")
                ->orWhereHas('warga', function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%");
                });
        }

        $kelahiran = $query->latest()->paginate(10)->withQueryString();

        return view('pages.peristiwakelahiran.index', compact('kelahiran'));
    }
    public function create()
    {
        return view('pages.peristiwakelahiran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id'         => 'required|numeric',
            'tgl_lahir'        => 'required|date',
            'tempat_lahir'     => 'required|string|max:255',
            'ayah_warga_id'    => 'required|numeric',
            'ibu_warga_id'     => 'required|numeric',
            'no_akta'          => 'required|string|unique:peristiwa_kelahiran,no_akta',
            'file_pendukung.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $data      = $request->only(['warga_id', 'tgl_lahir', 'tempat_lahir', 'ayah_warga_id', 'ibu_warga_id', 'no_akta']);
        $kelahiran = PeristiwaKelahiran::create($data);

        // Upload file pendukung
        if ($request->hasFile('file_pendukung')) {
            foreach ($request->file('file_pendukung') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('peristiwa_kelahiran', $fileName, 'public');

                $kelahiran->media()->create([
                    'file_name'  => $filePath,
                    'ref_table'  => 'peristiwa_kelahiran',
                    'sort_order' => $kelahiran->media()->count() + 1,
                    'mime_type'  => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('peristiwa_kelahiran.index')
            ->with('success', 'Data kelahiran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kelahiran = PeristiwaKelahiran::with('media')->findOrFail($id);
        return view('pages.peristiwakelahiran.edit', compact('kelahiran'));
    }

    public function update(Request $request, $id)
    {
        $kelahiran = PeristiwaKelahiran::with('media')->findOrFail($id);

        $request->validate([
            'warga_id'         => 'required|numeric',
            'tgl_lahir'        => 'required|date',
            'tempat_lahir'     => 'required|string|max:255',
            'ayah_warga_id'    => 'required|numeric',
            'ibu_warga_id'     => 'required|numeric',
            'no_akta'          => 'required|string|unique:peristiwa_kelahiran,no_akta,' . $id . ',kelahiran_id',
            'file_pendukung.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        // Update data utama
        $data = $request->only(['warga_id', 'tgl_lahir', 'tempat_lahir', 'ayah_warga_id', 'ibu_warga_id', 'no_akta']);
        $kelahiran->update($data);

        // Hapus media yang dicentang
        if ($request->has('delete_media')) {
            $mediaToDelete = Media::whereIn('id', $request->delete_media)->get();
            foreach ($mediaToDelete as $media) {
                if (Storage::disk('public')->exists($media->file_name)) {
                    Storage::disk('public')->delete($media->file_name);
                }
                $media->delete();
            }
        }

        // Upload file baru
        if ($request->hasFile('file_pendukung')) {
            foreach ($request->file('file_pendukung') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('peristiwa_kelahiran', $fileName, 'public');

                $kelahiran->media()->create([
                    'file_name'  => $filePath,
                    'ref_table'  => 'peristiwa_kelahiran',
                    'sort_order' => $kelahiran->media()->count() + 1,
                    'mime_type'  => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('peristiwa_kelahiran.index')
            ->with('success', 'Data kelahiran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kelahiran = PeristiwaKelahiran::with('media')->findOrFail($id);

        foreach ($kelahiran->media as $media) {
            if (Storage::disk('public')->exists($media->file_name)) {
                Storage::disk('public')->delete($media->file_name);
            }
            $media->delete();
        }

        $kelahiran->delete();

        return redirect()->route('peristiwa_kelahiran.index')
            ->with('success', 'Data kelahiran berhasil dihapus');
    }
}
