<?php

namespace App\Http\Controllers;

use App\Models\MasterPertanyaan;
use App\Models\PertanyaanPeserta;
use App\Models\User;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->pertanyaan = new MasterPertanyaan();
        $this->jawaban = new PertanyaanPeserta();
    }
    public function index()
    {
        $tipe_pertanyaan = 'Register';
        $data = $this->pertanyaan->getPertanyaan($tipe_pertanyaan);
        return view('pertanyaan',[
            'menu' => 'Pertanyaan',
            'title' => 'Pertanyaan',
            'data' => $data
        ]);
    }
    
    public function pertanyaan(Request $request)
    {
        //  dd($request->collect('p'));
        // $input = $request->all();
        $userId = $request->user_id;
        // $quantities = Request::get('qty');
        $arr = $request->collect('pertanyaan');

        foreach($arr as $key=>$value){
            $array['user_id'] = $userId;
            $array['master_pertanyaan_id'] = $key;
            $array['jawaban'] = $value;
            PertanyaanPeserta::create($array);
        }
        return redirect('/login')->with('sukses','Registrasi berhasil,');


        
    }
    
}
