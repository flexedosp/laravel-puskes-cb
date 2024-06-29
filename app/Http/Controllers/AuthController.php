<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $os;

    public function login()
    {
        $data['titlePage'] = 'Admin Login';
        return view('auth.login', $data);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'usernameAdmin' => ['required', 'email'],
            'passwordAdmin' => ['required']
        ]);

        $credentialsInfo = [
            'username' => $request->usernameAdmin,
            'password' => $request->passwordAdmin
        ];

        // Cek OS
        $agent = new Agent();
        $this->os = $agent->platform();
        // dd($this->os);
        if ($this->os == "Windows" || $this->os == "OS X" || $this->os == "Ubuntu") {
            if (Auth::attempt($credentialsInfo)) {
                if (Auth::user()->deleted_by != null && Auth::user()->deleted_by != null) {
                    $request->session()->regenerate();
                    return redirect()->intended('/admin-dashboard');
                } else {
                    return redirect()->route('admin.login')->with('errorLogin', 'Maaf, akun admin tidak ditemukan. Silahkan hubungi tim pihak puskesmas jika ini sebuah kesalahan.');
                }
            }
        } else if ($this->os != "Windows" || $this->os != "OS X" || $this->os != "Ubuntu") {
            return redirect()->route('admin.login')->with('errorLogin', 'Maaf, admin dashboard hanya bisa diakses jika anda menggunakan Windows, OS X (Macintosh atau Macbook), atau Ubuntu');
        } else {
            return redirect()->route('admin.login')->with('errorLogin', 'Maaf, ada kesalahan. Silahkan cek kembali username dan passwordnya');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
