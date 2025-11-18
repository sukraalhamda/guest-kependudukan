<?php
namespace App\Http\Controllers;

use App\Models\warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = Warga::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })
            ->orderBy('nama', 'asc')
            ->paginate(6);

        return view('pages.warga.index', compact('data', 'search'));
    }

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'                   => 'required|unique:warga,nik',
            'nama'                  => 'required|string|max:255',
            'jenis_kelamin'         => 'required|in:L,P',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'agama'                 => 'required|string',
            'pendidikan'            => 'required|string',
            'pekerjaan'             => 'required|string',
            'status_perkawinan'     => 'required',
            'status_dalam_keluarga' => 'required|string',
        ]);

        Warga::create($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $warga = warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'nik'                   => 'required|unique:warga,nik,' . $id . ',warga_id',
            'nama'                  => 'required|string|max:255',
            'jenis_kelamin'         => 'required|in:L,P',
            'tempat_lahir'          => 'required|string',
            'tanggal_lahir'         => 'required|date',
            'agama'                 => 'required|string',
            'pendidikan'            => 'required|string',
            'pekerjaan'             => 'required|string',
            'status_perkawinan'     => 'required',
            'status_dalam_keluarga' => 'required|string',
        ]);

        $warga->update($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $warga = warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus!');
    }
}
