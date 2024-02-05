<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GantiPasswordController extends Controller
{
    public function index(){
        return view('gantipassword',$data = [
            'id' => auth()->user()->id
        ]);
    }
    public function simpanPasswordBaru(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password' => ['required','min:8',],
            'konfirmasi_password' => ['required','min:8']
        ]);
        if ($validatedData['password'] == $validatedData['konfirmasi_password']) {
            $validatedData['password'] = bcrypt($validatedData['password']);
            $user = User::find($id);
            $user->password = $validatedData['password'];
            $user->status = true;
            $user->save();
            return redirect()->route('dashboard')->with('sukses','Password berhasil diganti');
        } else {
            return redirect()->route('gantiPassword')->with('gagal','Password gagal diganti');
        }
        
        
    }
}
