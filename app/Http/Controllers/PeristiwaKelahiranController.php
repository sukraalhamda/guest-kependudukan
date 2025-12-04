<?php
namespace App\Http\Controllers;

use App\Models\PeristiwaKelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeristiwaKelahiranController extends Controller
{
    /**
     * Display listing data kelahiran
     */
    public function index()
    {
        $kelahiran = PeristiwaKelahiran::latest()->paginate(10);

        return view('pages.peristiwakelahiran.index', compact('kelahiran'));
    }

    /**
     * Form tambah data kelahiran
     */
    public function create()
    {
        return view('pages.peristiwakelahiran.create');
    }

    /**
     * Simpan data ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'warga_id'       => 'required|numeric',
            'tgl_lahir'      => 'required|date',
            'tempat_lahir'   => 'required|string|max:255',
            'ayah_warga_id'  => 'required|numeric',
            'ibu_warga_id'   => 'required|numeric',
            'no_akta'        => 'required|string|unique:peristiwa_kelahiran,no_akta',
            'file_pendukung' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = $request->all();

        // Upload File
        if ($request->hasFile('file_pendukung')) {
            $data['file_pendukung'] = $request->file('file_pendukung')->store(
                'peristiwa_kelahiran',
                'public'
            );
        }

        PeristiwaKelahiran::create($data);

        return redirect()
            ->route('peristiwa_kelahiran.index')
            ->with('success', 'Data kelahiran berhasil ditambahkan');
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        $kelahiran = PeristiwaKelahiran::findOrFail($id);

        return view('pages.peristiwakelahiran.edit', compact('kelahiran'));
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
{
    $kelahiran = PeristiwaKelahiran::findOrFail($id);

    $request->validate([
        'warga_id' => 'required|numeric',
        'tgl_lahir' => 'required|date',
        'tempat_lahir' => 'required|string|max:255',
        'ayah_warga_id' => 'required|numeric',
        'ibu_warga_id' => 'required|numeric',
        'no_akta' => 'required|string|unique:peristiwa_kelahiran,no_akta,' . $id . ',kelahiran_id',
        'file_pendukung' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $data = $request->except('file_pendukung');

    if ($request->hasFile('file_pendukung')) {

        // Hapus file lama
        if ($kelahiran->file_pendukung && file_exists(storage_path('app/public/peristiwa_kelahiran/'.$kelahiran->file_pendukung))) {
            unlink(storage_path('app/public/peristiwa_kelahiran/'.$kelahiran->file_pendukung));
        }

        // Upload baru
        $name = time().'_'.$request->file('file_pendukung')->getClientOriginalName();
        $request->file('file_pendukung')->storeAs('public/peristiwa_kelahiran', $name);

        $data['file_pendukung'] = $name;
    }

    $kelahiran->update($data);

    return redirect()
        ->route('peristiwa_kelahiran.index')
        ->with('success', 'Data kelahiran berhasil diperbarui');
}

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        $kelahiran = PeristiwaKelahiran::findOrFail($id);

        // Hapus file jika ada
        if ($kelahiran->file_pendukung && Storage::disk('public')->exists($kelahiran->file_pendukung)) {
            Storage::disk('public')->delete($kelahiran->file_pendukung);
        }

        $kelahiran->delete();

        return redirect()
            ->route('peristiwa_kelahiran.index')
            ->with('success', 'Data kelahiran berhasil dihapus');
    }
}
