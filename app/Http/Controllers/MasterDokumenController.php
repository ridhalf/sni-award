<?php

namespace App\Http\Controllers;

use App\Models\MasterDokumen;
use App\Models\User;
use Illuminate\Http\Request;

class MasterDokumenController extends Controller
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
        $dataMasterDokumen = MasterDokumen::all();
        $idUser = auth()->user()->id;
        $data = $this->user->getUser($idUser);
        return view('admin.masterdokumen.index',$data = [
            'menu' => 'Data Master',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataMasterDokumen' => $dataMasterDokumen
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
        return view('admin.masterdokumen.create',$data = [
            'menu' => 'Data Master',
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
            'tipe_dokumen' => ['required'],
            'format_file' => ['required'],
            'maks_ukuran' => ['required'],
            'wajib' => ['required'],
            'deskripsi' => ['']
        ]);
        $ret_val = MasterDokumen::create($validatedData);
        $request->session()->flash('sukses','Master Dokumen berhasil ditambahkan');
        return redirect()->route('masterdokumen.index');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataMasterDokumen = MasterDokumen::findOrFail($id);
        $idUser = auth()->user()->id;
        $data = $this->user->getUser($idUser);
        return view('admin.masterdokumen.edit',$data=[
            'menu' => 'Data Master',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataMasterDokumen' => $dataMasterDokumen
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
        $dataPertanyaan = MasterDokumen::findOrFail($id);
        $dataPertanyaan->update($data);
        return redirect()->route('masterdokumen.index')->with('sukses','Master Dokumen berhasi diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data   = MasterDokumen::findOrFail($id);
        $data->delete();
        return redirect('/admin/masterdokumen')->with('sukses','Master Dokumen berhasil dihapus');
    }
}
