<?php

namespace App\Http\Controllers;

use App\Mail\KirimToken;
use App\Models\TokenPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LupaPasswordController extends Controller
{
    public function index()
    {
        return view('lupapassword');
    }

    public function cekEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required','email:dns']
        ]);
        $user = User::where('email', $validatedData['email'])->get()->first();
        if ($user) {
            $token = random_int(100000,999999);
            $validatedData['token'] = $token;
            TokenPassword::create($validatedData);
            Mail::to($validatedData['email'])->send(new KirimToken($token));
            return redirect()->route('gantiPasswordToken',$user->id);
        }
    }
    public function gantiPasswordToken($id)
    {
        return view('gantipasswordtoken' ,$data=[
            'id' => $id
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password_' => ['required','min:8','max:12'],
            'konfirmasi_password' => ['required','min:8','max:12'],
            'token' => ['required']
        ]);
        $validatedData['password'] = $validatedData['password_'];
        $user = User::find($id);
        $verifikasi = TokenPassword::where('email',$user->email)->orderByDesc('created_at')->get()->first();
        if ($validatedData['password'] == $validatedData['konfirmasi_password']) {
            if ($validatedData['token'] == $verifikasi->token) {
                $validatedData['password'] = bcrypt($validatedData['password']);
                $user = User::find($id);
                $user->password = $validatedData['password'];
                $user->save();
                return redirect()->route('login')->with('sukses','Password berhasil diganti');
            }
            else {
            return redirect()->route('gantiPasswordToken',$id)->with('gagal','Kode verifikasi yang anda masukkan salah');
            }

        } else {
            return redirect()->route('gantiPasswordToken',$id)->with('gagal','Password gagal diganti');
        }
    }

    
}
