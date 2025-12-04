<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Halaman Login
     */
    public function index()
    {
        if (Auth::check()) {
            return $this->redirectByRole();
        }

        return view('pages.auth.login');
    }

    /**
     * Proses Login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['email' => 'Email atau password salah'])
                ->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();

        return $this->redirectByRole()
            ->with('success', 'Login berhasil! Selamat datang, ' . $user->name);
    }

    /**
     * Halaman Register
     */
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return $this->redirectByRole();
        }

        return view('pages.auth.signup');
    }

    /**
     * Proses Register
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'user', // default role
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return $this->redirectByRole()
            ->with('success', 'Akun berhasil dibuat!');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda telah logout.');
    }

    /**
     * Redirect berdasarkan role
     */
    private function redirectByRole()
    {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    }
}
