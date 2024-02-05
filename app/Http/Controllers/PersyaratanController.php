<?php

namespace App\Http\Controllers;

use App\Models\DokumenSniAward;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
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
    }
    
    public function index()
    {
        $dataPersyaratan = DokumenSniAward::all();
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        return view('admin.persyaratan.index',$data = [
            'menu' => 'Persyaratan SNI Award',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataPersyaratan' => $dataPersyaratan
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
        $data = $this->user->getUser($id);
        return view('admin.persyaratan.create',$data = [
            'menu' => 'Persyaratan SNI Award',
            'data' => $data,
            'peran' => auth()->user()->peran
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
            'nama_file' => ['required'],
            'nama_dokumen' => ['required','mimes:pdf','file ','max:2048']
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['master_dokumen_id'] = 1;
        $validatedData['nama_dokumen'] =$request->file('nama_dokumen')->store('dokumen-persyaratan');
        $ret_val = DokumenSniAward::create($validatedData);
        // return $request->file('dokumen')->store('dokumen-persyaratan'); 
        $request->session()->flash('sukses','Dokume Persyaratan berhasil ditambahkan');
        return redirect()->route('persyaratan.index'); 
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataPersyaratan = DokumenSniAward::findOrFail($id);
        $idUser = auth()->user()->id;
        $data = $this->user->getUser($idUser);
        return view('admin.persyaratan.edit',$data=[
            'menu' => 'Persyaratan SNI Award',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataPersyaratan' => $dataPersyaratan
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
        $data = $request->all();
        $dataPertanyaan = DokumenSniAward::findOrFail($id);
        $dataPertanyaan->update($data);
        return redirect()->route('persyaratan.index')->with('sukses','Data berhasi diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data   = DokumenSniAward::findOrFail($id);
        $file = public_path('storage/').$data->nama_dokumen;
        if (file_exists($file))
        {
            @unlink($file);
        }
        $data->delete();

        return redirect()->route('persyaratan.index')->with('sukses','Dokumen Persyaratan berhasil dihapus');
        // MasterPertanyaan::destroy($masterPertanyaan->id);
    }

    public function persyaratanSniAward()
    {
        $dataPersyaratan = DokumenSniAward::all();
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        return view('peserta.persyaratan.index',$data = [
            'menu' => 'Persyaratan SNI Award',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataPersyaratan' => $dataPersyaratan
        ]);
    }
}
