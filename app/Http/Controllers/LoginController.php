<?php

namespace App\Http\Controllers;

use App\Models\HistoryLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peserta;
use Illuminate\Contracts\Support\ValidatedData;

class LoginController extends Controller
{
    public $idHistory;
    public function index()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        
        $validatedData = $request -> validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            //mengisi tabel history
            $history = [
                'user_id' => auth()->user()->id,
                'login_terakhir'=> now(),
                'login_ip' => request()->getClientIp()
            ];
            HistoryLogin::create($history); //mengisi kolom user_id dan login_terakhir
            
            $user = User::where('email',$validatedData['email'])->get()->first();
            if ($user['status']) {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('gantipassword'); 
            }
            
        }

        return back()->with('loginError','Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); 
    }
}
