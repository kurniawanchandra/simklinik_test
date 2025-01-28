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
            $userName = Auth::user()->name;
            notyf()->success('Selamat Datang, ' . $userName);
            //sweetalert()->success('Your account has been unlocked.');
            return redirect()->route('dashboard');  
            
        }  
        //notyf()->success('Selamat Datang');
        
    
        // Authentication failed...  
        return back()->withErrors([  
            'email' => 'The provided credentials do not match our records.',  
        ]);  
    }    
        
    /**
     * register_action
     *
     * @param  mixed $request
     * @return void
     */
    public function register_action(Request $request)    
    {    
        $request->validate([    
            'name' => 'required|string|max:255',    
            'email' => 'required|email|unique:users,email',    
            'password' => 'required|string',  
            'role_type' => 'required|string|in:dokter,admin,perawat,administrasi,pasien,apoteker,manajer'  
        ]);    
    
        // Buat pengguna baru  
        User::create([    
            'name' => $request->name,    
            'email' => $request->email,   
            'role_type' => $request->role_type, 
            'password' => Hash::make($request->password)
            
        ]);    
        //flash()->success('');
        //notyf()->success('Data berhasil ditambahkan');
        sweetalert()->success('Your account has been unlocked.');
        // sweetalert()->showConfirmButton(
        //     bool $showConfirmButton = true, 
        //     string $confirmButtonText = null, 
        //     string $confirmButtonColor = null, 
        //     string $confirmButtonAriaLabel = null
        // );

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
