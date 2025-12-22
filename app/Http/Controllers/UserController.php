<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            // User biasa hanya boleh akses index
            if ($user && $user->role === 'user') {
                $allowed = ['index'];

                if (! in_array($request->route()->getActionMethod(), $allowed)) {
                    abort(403, 'Anda tidak memiliki akses.');
                }
            }

            return $next($request);
        });
    }

    // =====================
    // LIST USER
    // =====================
    public function index(Request $request)
    {
        $filterable = ['role'];
        $searchable = ['name', 'email'];

        $users = User::filter($request, $filterable)
            ->search($request, $searchable)
            ->paginate(9)
            ->withQueryString();

        return view('pages.user.index', compact('users'));
    }

    // =====================
    // FORM CREATE USER (ADMIN)
    // =====================
    public function create()
    {
        $roles = [
            'admin' => 'Admin',
            'user'  => 'User',
        ];

        return view('pages.user.create', compact('roles'));
    }

    // =====================
    // SIMPAN USER BARU (ADMIN)
    // =====================
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role'     => 'required|in:admin,user',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    // =====================
    // FORM EDIT USER (ADMIN)
    // =====================
    public function edit(User $user)
    {
        $roles = [
            'admin' => 'Admin',
            'user'  => 'User',
        ];

        return view('pages.user.edit', compact('user', 'roles'));
    }

    // =====================
    // UPDATE USER (ADMIN)
    // =====================
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'role'     => 'required|in:admin,user',
            'password' => 'nullable|confirmed|min:6',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'role']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        if ($request->hasFile('photo')) {
            $old = Media::where('ref_table', 'users')
                ->where('ref_id', $user->id)
                ->first();

            if ($old && Storage::disk('public')->exists($old->file_name)) {
                Storage::disk('public')->delete($old->file_name);
            }

            $old?->delete();

            $path = $request->file('photo')->store('users', 'public');

            Media::create([
                'ref_table' => 'users',
                'ref_id'    => $user->id,
                'file_name' => $path,
                'mime_type' => $request->file('photo')->getClientMimeType(),
            ]);
        }

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil diperbarui');
    }

    // =====================
    // DELETE USER (ADMIN)
    // =====================
    public function destroy(User $user)
    {
        $media = Media::where('ref_table', 'users')
            ->where('ref_id', $user->id)
            ->first();

        if ($media && Storage::disk('public')->exists($media->file_name)) {
            Storage::disk('public')->delete($media->file_name);
        }

        $media?->delete();
        $user->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}
