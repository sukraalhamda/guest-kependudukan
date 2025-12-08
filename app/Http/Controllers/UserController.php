<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;

class UserController extends Controller
{
    public function __construct()
    {
        // ✅ USER boleh akses INDEX saja (lihat data)
        // ✅ ADMIN boleh semua
        $this->middleware(function ($request, $next) {

            if (Auth::user()->role === 'user') {
                $allowed = ['index'];

                if (! in_array($request->route()->getActionMethod(), $allowed)) {
                    abort(403, 'Anda tidak memiliki akses.');
                }
            }

            return $next($request);
        });
    }

    /**
     * LIST USER (ADMIN & USER)
     */
    public function index(Request $request)
    {
        $filterable = ['role'];
        $searchable = ['name', 'email'];

        $user = User::filter($request, $filterable)
            ->search($request, $searchable)
            ->paginate(9)
            ->withQueryString();

        return view('pages.user.index', compact('user'));
    }

    /**
     * CREATE (ADMIN ONLY)
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * STORE (ADMIN ONLY)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'role'     => 'required|in:admin,user',
            'password' => 'required|min:6|confirmed',
            'photo'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('users', 'public');

            Media::create([
                'ref_table' => 'users',
                'ref_id'    => $user->id,
                'file_name' => $path,
                'mime_type' => $request->file('photo')->getClientMimeType(),
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * EDIT (ADMIN ONLY)
     */
    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    /**
     * UPDATE (ADMIN ONLY)
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required',
            'email' => "required|email|unique:users,email,{$user->id}",
            'role'     => 'required|in:admin,user',
            'password' => 'nullable|min:6|confirmed',
            'photo'    => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'role']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        if ($request->hasFile('photo')) {

            $old = DB::table('media')
                ->where('ref_table', 'users')
                ->where('ref_id', $user->id)
                ->first();

            if ($old && Storage::disk('public')->exists($old->file_name)) {
                Storage::disk('public')->delete($old->file_name);
            }

            DB::table('media')
                ->where('ref_table', 'users')
                ->where('ref_id', $user->id)
                ->delete();

            $path = $request->file('photo')->store('users', 'public');

            Media::create([
                'ref_table' => 'users',
                'ref_id'    => $user->id,
                'file_name' => $path,
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    /**
     * DELETE (ADMIN ONLY)
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
