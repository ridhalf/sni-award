<?php

namespace App\Http\Controllers;

use App\Models\JadwalAcara;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    function __construct()
    {
        $this->user = new User();
        $this->sertifikat = new Sertifikat();
        $this->jadwalAcara = new JadwalAcara();
    }
    public function index()
    {
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        $dataSertifikat = Sertifikat::where('user_id',$id)->get();
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();

        return view('evaluator.sertifikat.index', $data = [
            'menu' => 'Profil',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataSertifikat' => $dataSertifikat,
            'jadwalAcara' => $jadwalAcara
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $data = $this->user->getUser($id);
        return view('evaluator.sertifikat.create', $data = [
            'menu' => 'Profil',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'jadwalAcara' => $jadwalAcara
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sertifikat' => ['required'],
            'nama_file' =>['required']
        ]);
        $validatedData['nama_file'] = $request->file('nama_file')->store('sertifikat-evaluator');
        $validatedData['user_id'] = auth()->user()->id;
        Sertifikat::create($validatedData);
        return redirect()->route('sertifikat.index')->with('sukses','Sertifikat berhasil ditambahkan');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idUser = auth()->user()->id;
        $data = $this->user->getUser($idUser);
        $dataSertifikat = Sertifikat::findOrFail($id);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        return view('evaluator.sertifikat.edit', $data = [
            'menu' => 'Profil',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataSertifikat' => $dataSertifikat,
            'jadwalAcara' => $jadwalAcara
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_sertifikat' => ['required'],
            'nama_file' =>['required']
        ]);
        if($request->file('nama_file')){
            if($request->oldSertifikat){
                Storage::delete($request->oldSertifikat); 
            }
            $validatedData['nama_file'] = $request->file('nama_file')->store('sertifikat-evaluator');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $dataSertifikat = Sertifikat::findOrFail($id);
        $dataSertifikat->update($validatedData);
        return redirect()->route('sertifikat.index')->with('sukses','Sertifikat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data   = Sertifikat::findOrFail($id);
        $file = public_path('storage/').$data->nama_file;
        if(file_exists($file)){
            @unlink($file);
        }
        $data->delete();
        return redirect()->route('sertifikat.index')->with('sukses','Sertifikat berhasil dihapus');
    }
    public function verifikasiSertifikat($id,$user_id)
    {
        $ret_val = $this->sertifikat->verifikasi($id,$user_id);
        if ($ret_val) {
            return redirect()->route('detailEvaluator',$user_id)->with('sukses','Sertifikat berhasil di verifikasi');
        }
        else {
            return redirect()->route('detailEvaluator',$user_id)->with('gagal','Sertifikat gagal di verifikasi');
        }
    }
}
