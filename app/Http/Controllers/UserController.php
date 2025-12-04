<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user.
     */
    public function index(Request $request)
    {
        // Kolom yang bisa difilter
        $filterableColumns = ['role', 'jenis_kelamin'];

        // Kolom yang bisa dicari
        $searchableColumns = ['name', 'email'];

        // Query + Filter + Search + Pagination
        $user = User::filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->paginate(9)
            ->withQueryString();

        return view('pages.user.index', compact('user'));
    }

    /**
     * Menampilkan form tambah user.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Menyimpan user baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'photo'    => 'required|image|mimes:jpeg,png,jpg|max:2048', // wajib
        ]);

        // 1. buat user dulu
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 2. upload foto
        if ($request->hasFile('photo')) {

            $file     = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->storeAs('media/user', $fileName, 'public');

            // simpan ke tabel media
            Media::create([
                'ref_table' => 'users',
                'ref_id'    => $user->id,
                'file_name' => 'media/user/' . $fileName,
                'mime_type' => $file->getClientMimeType(),
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Menampilkan detail user.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Menampilkan form edit user.
     */
    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Memperbarui data user.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required',
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|min:8|regex:/[A-Z]/',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // DATA USER
        $data = $request->only(['name', 'email']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // ========== UPLOAD FOTO PROFIL ========== //
        if ($request->hasFile('photo')) {

            // Simpan File
            $file = $request->file('photo');
            $path = $file->store('users', 'public');

            // Hapus foto lama (manual dari media)
            $old = \DB::table('media')
                ->where('ref_table', 'users')
                ->where('ref_id', $user->id)
                ->first();

            if ($old && \Storage::disk('public')->exists($old->file_name)) {
                \Storage::disk('public')->delete($old->file_name);
            }

            // Hapus record lama
            \DB::table('media')
                ->where('ref_table', 'users')
                ->where('ref_id', $user->id)
                ->delete();

            // Simpan foto baru ke tabel media
            \DB::table('media')->insert([
                'ref_table'  => 'users',
                'ref_id'     => $user->id,
                'file_name'  => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // ======================================== //

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Menghapus user.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
