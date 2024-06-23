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
            'emailAdmin' => ['required', 'email'],
            'passwordAdmin' =>['required']
        ]);
        
        $credentialsInfo = [
            'email' => $request->emailAdmin,
            'password' => $request->passwordAdmin
        ];

        // Cek OS
        $agent = new Agent();
        $this->os = $agent->platform();
// dd($this->os);
        if($this->os == "Windows" || $this->os == "OS X" || $this->os == "Ubuntu"){
            if (Auth::attempt($credentialsInfo)) {
                $request->session()->regenerate();
                
                return redirect()->intended('/admin-dashboard');
            }
        }else if($this->os != "Windows" || $this->os != "OS X" || $this->os != "Ubuntu"){
            return redirect()->route('admin.login')->with('errorLogin', 'Maaf, admin dashboard hanya bisa diakses jika anda menggunakan Windows, OS X (Macintosh atau Macbook), atau Ubuntu');
        }else{
            return redirect()->route('admin.login')->with('errorLogin', 'Gagal Login!');
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
