<?php

namespace App\Http\Controllers;

use App\Models\MasterPertanyaan;
use App\Models\User;
use Illuminate\Http\Request;

class MasterPertanyaanController extends Controller
{

    private $user;
    function __construct()
    {
        $this->user = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // untuk ke halaman awal
    {
        $id = auth()->user()->id;
        $dataPertanyaan = MasterPertanyaan::all(); 
        $data = $this->user->getUser($id);
        return view('admin.masterpertanyaan.index',$data = [
            'dataPertanyaan' => $dataPertanyaan,
            'menu' => 'Master Pertanyaan',
            'data' => $data,
            'peran' => auth()->user()->peran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //untuk ke halaman tambah data
    {
        $id = auth()->user()->id;
            $data = $this->user->getUser($id);
            return view('admin.masterpertanyaan.create',$data = [
                'menu' => 'Master Pertanyaan',
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
    public function store(Request $request) //untuk akisi simpan data
    {
        $validatedData = $request->validate([
            'tipe_pertanyaan' => ['required'],
            'pertanyaan' => ['required']
        ]);
        // $ret_val = MasterPertanyaan::create($validatedData);
        $data = $request->all();
        $request->session()->flash('sukses','Pertanyaan berhasil ditambahkan');
        MasterPertanyaan::create($data);
        return redirect()->route('masterpertanyaan.index');
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterPertanyaan  $masterPertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //untuk manggil view
    {
        $dataPertanyaan = MasterPertanyaan::findOrFail($id);
        $idUser = auth()->user()->id;
        $data = $this->user->getUser($idUser);
        return view('admin.masterpertanyaan.edit',$data=[
            'menu' => 'Master Pertanyaan',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataPertanyaan' => $dataPertanyaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterPertanyaan  $masterPertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //untuk aksi simpan edit
    {
        $data = $request->all();
        $dataPertanyaan = MasterPertanyaan::findOrFail($id);
        $dataPertanyaan->update($data);
        return redirect()->route('masterpertanyaan.index')->with('sukses','Data berhasi diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterPertanyaan  $masterPertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data   = MasterPertanyaan::findOrFail($id);
        $data->delete();
        return redirect('/admin/masterpertanyaan')->with('sukses','Pertanyaan berhasil dihapus');
        // MasterPertanyaan::destroy($masterPertanyaan->id);
    }


}
