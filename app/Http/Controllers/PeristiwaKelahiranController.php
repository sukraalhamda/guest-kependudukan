<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PeristiwaKelahiran;
use App\Models\warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeristiwaKelahiranController extends Controller
{
    public function index(Request $request)
    {
        $query = PeristiwaKelahiran::with(['media', 'warga', 'ayah', 'ibu']);

        if ($request->filled('search')) {
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
        return view('pages.peristiwakelahiran.create', [
            'warga' => warga::all(),
            'ayah'  => warga::where('jenis_kelamin', 'L')->get(),
            'ibu'   => warga::where('jenis_kelamin', 'P')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id'         => 'required|exists:warga,warga_id',
            'ayah_warga_id'    => 'required|exists:warga,warga_id|different:ibu_warga_id',
            'ibu_warga_id'     => 'required|exists:warga,warga_id',
            'tgl_lahir'        => 'required|date',
            'tempat_lahir'     => 'required|string|max:255',
            'no_akta'          => 'required|string|unique:peristiwa_kelahiran,no_akta',
            'file_pendukung.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $kelahiran = PeristiwaKelahiran::create($request->only([
            'warga_id',
            'ayah_warga_id',
            'ibu_warga_id',
            'tgl_lahir',
            'tempat_lahir',
            'no_akta',
        ]));

        if ($request->hasFile('file_pendukung')) {
            foreach ($request->file('file_pendukung') as $file) {
                $path = $file->store('peristiwa_kelahiran', 'public');
                $kelahiran->media()->create([
                    'file_name'  => $path,
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
        return view('pages.peristiwakelahiran.edit', [
            'kelahiran' => PeristiwaKelahiran::with('media')->findOrFail($id),
            'warga'     => warga::all(),
            'ayah'      => warga::where('jenis_kelamin', 'L')->get(),
            'ibu'       => warga::where('jenis_kelamin', 'P')->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $kelahiran = PeristiwaKelahiran::findOrFail($id);

        $request->validate([
            'warga_id'      => 'required|exists:warga,warga_id',
            'ayah_warga_id' => 'required|exists:warga,warga_id|different:ibu_warga_id',
            'ibu_warga_id'  => 'required|exists:warga,warga_id',
            'tgl_lahir'     => 'required|date',
            'tempat_lahir'  => 'required|string|max:255',
            'no_akta'       => 'required|string|unique:peristiwa_kelahiran,no_akta,' . $id . ',kelahiran_id',
        ]);

        $kelahiran->update($request->only([
            'warga_id',
            'ayah_warga_id',
            'ibu_warga_id',
            'tgl_lahir',
            'tempat_lahir',
            'no_akta',
        ]));

        return redirect()->route('peristiwa_kelahiran.index')
            ->with('success', 'Data kelahiran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kelahiran = PeristiwaKelahiran::with('media')->findOrFail($id);

        foreach ($kelahiran->media as $media) {
            Storage::disk('public')->delete($media->file_name);
            $media->delete();
        }

        $kelahiran->delete();
        return back()->with('success', 'Data kelahiran berhasil dihapus');
    }
}
