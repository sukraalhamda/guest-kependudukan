<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PeristiwaKelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeristiwaKelahiranController extends Controller
{
    public function index()
    {
        $kelahiran = PeristiwaKelahiran::with('media')->latest()->paginate(10);
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
            'file_pendukung.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data      = $request->only(['warga_id', 'tgl_lahir', 'tempat_lahir', 'ayah_warga_id', 'ibu_warga_id', 'no_akta']);
        $kelahiran = PeristiwaKelahiran::create($data);

        if ($request->hasFile('file_pendukung')) {
            foreach ($request->file('file_pendukung') as $index => $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('peristiwa_kelahiran', $fileName, 'public');

                $kelahiran->media()->create([
                    'file_name'  => $filePath,
                    'ref_table'  => 'peristiwa_kelahiran',
                    'sort_order' => $index + 1,
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
            'file_pendukung.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->only(['warga_id', 'tgl_lahir', 'tempat_lahir', 'ayah_warga_id', 'ibu_warga_id', 'no_akta']);
        $kelahiran->update($data);

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
