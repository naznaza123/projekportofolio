<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
        public function index()
        {
            if ($user=Auth::user()){
                if ($user->level=='1'){
                    return redirect()->intended('beranda');
                }elseif($user->level=='2'){
                    return redirect()->intended('profil');
                }
            }
            return view('login.view_login');
        }
        public function proses(Request $request ){
            $request ->validate([
                'username'=> 'required',
                'password'=> 'required'
            ],
            [
                'username.required'=> 'username tidak boleh kosong'
            ]
        );
        $kredensial = $request->only('username','password');
        if (Auth::attempt($kredensial)){
            $request->session()->regenerate();
            $user = Auth::user();

        }
            return back()->withErrors([
                'username'=> 'maaf username atau password anda salah',
            ])->onlyInput('username');
            if ($user->level=='1'){
                return redirect()->intended('beranda');
            }elseif($user->level=='2'){
                return redirect()->intended('profil');
            }
            return redirect()->intended('/');
        }
        public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }


}
?>