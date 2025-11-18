<?php
namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\KeluargaKK;
use App\Models\Warga;
use Illuminate\Http\Request;

class AnggotaKeluargaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $anggota = AnggotaKeluarga::with(['KeluargaKK', 'Warga'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('warga', function ($q) use ($search) {
                    $q->where('nama', 'LIKE', "%{$search}%");
                });
            })
            ->paginate(6);

        return view('pages.anggotakeluarga.index', compact('anggota', 'search'));
    }

    public function create()
    {
        $KeluargaKK = KeluargaKK::all();
        $Warga      = Warga::all();
        return view('pages.anggotakeluarga.create', compact('KeluargaKK', 'Warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kk_id'    => 'required|exists:keluarga_kk,kk_id',
            'warga_id' => 'required|exists:warga,warga_id',
            'hubungan' => 'required|string|max:50',
        ]);

        AnggotaKeluarga::create($request->all());
        return redirect()->route('anggota_keluarga.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $anggota    = AnggotaKeluarga::findOrFail($id);
        $KeluargaKK = KeluargaKK::all();
        $Warga      = Warga::all();
        return view('pages.anggotakeluarga.edit', compact('anggota', 'KeluargaKK', 'Warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kk_id'    => 'required|exists:keluarga_kk,kk_id',
            'warga_id' => 'required|exists:warga,warga_id',
            'hubungan' => 'required|string|max:50',
        ]);

        $anggota = AnggotaKeluarga::findOrFail($id);
        $anggota->update($request->all());
        return redirect()->route('anggota_keluarga.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $anggota = AnggotaKeluarga::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota_keluarga.index')->with('success', 'Data berhasil dihapus!');
    }
}
