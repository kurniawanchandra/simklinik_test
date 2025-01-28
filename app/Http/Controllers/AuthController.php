<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{        
    /**
     * login
     *
     * @return void
     */
    public function login(){
        return view('Auth.login');
    }    
    /**
     * register
     *
     * @return void
     */
    public function register(){
        return view('Auth.register');
    }
    
    /**
     * login_action
     *
     * @param  mixed $request
     * @return void
     */
    public function login_action(Request $request)  
    {  
        $request->validate([  
            'email' => 'required|email',  
            'password' => 'required|string',  
        ]);  
    
        $credentials = $request->only(['email', 'password']);  
    
        if (Auth::attempt($credentials)) {  
            // Authentication passed...  
            return redirect()->route('dashboard');  
        }  
    
        // Authentication failed...  
        return back()->withErrors([  
            'email' => 'The provided credentials do not match our records.',  
        ]);  
    }    
    
    public function register_action(Request $request)    
    {    
        $request->validate([    
            'name' => 'required|string|max:255',    
            'email' => 'required|email|unique:users,email',    
            'password' => 'required|string|confirmed',  
            'role_type' => 'required|string|in:dokter,admin_sistem,perawat,administrasi,pasien,apoteker,manajer,umum'  
        ]);    
    
        // Buat pengguna baru  
        User::create([    
            'name' => $request->name,    
            'email' => $request->email,    
            'password' => Hash::make($request->password),   
            'role_type' => $request->role_type
        ]);    
        //flash()->success('');
        notyf()->success('Data sudah berhasil ditambahkan');

        // Redirect ke halaman login dengan pesan sukses  
        return redirect()->route('login');    
    }
    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout(Request $request)  
    {  
        Auth::logout();  
  
        $request->session()->invalidate();  
  
        $request->session()->regenerateToken();  
  
        return redirect()->route('login');  
    }   
}
