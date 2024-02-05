<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class DokumentasiController extends Controller
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
        $dataGambar = Gambar::all();
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        return view('admin.dokumentasi.index',$data = [
            'menu' => 'Dokumentasi',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataGambar' => $dataGambar
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
        return view('admin.dokumentasi.create',$data = [
            'menu' => 'Dokumentasi',
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
        $validateData = $request->validate([
            'judul' => ['required'],
            'deskripsi' => ['required'],
            'nama_file' => 'required|file|mimes:jpg,png,jpeg|max:2048'
        ]);
        $validateData['bagian_deskripsi'] = Str::limit(strip_tags($validateData['deskripsi']), 20);
        $validateData['user_id'] = auth()->user()->id;
        $validateData['nama_file'] = $request->file('nama_file')->store('dokumentasi');
        $ret_val = Gambar::create($validateData);
        $request->session()->flash('sukses','Dokumentasi berhasil ditambahkan');
        return redirect()->route('dokumentasi.index');

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataGambar = Gambar::findOrFail($id);
        $idUser = auth()->user()->id;
        $data = $this->user->getUser($idUser);
        return view('admin.dokumentasi.edit',$data=[
            'menu' => 'Dokumentasi',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataGambar' => $dataGambar
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
        if($request->file('nama_file')){
            if($request->oldNama_file){
                Storage::delete($request->oldNama_file);
            }
            $data['nama_file']=$request->file('nama_file')->store('dokumentasi');
        }
        $dataGambar = Gambar::findOrFail($id);
        $dataGambar->update($data);
        return redirect()->route('dokumentasi.index')->with('sukses', 'Data Gambar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataGambar = Gambar::findOrFail($id);
        $file = public_path('storage/').$dataGambar->nama_file;
        if(file_exists($file)){
            @unlink($file);
        }
        $dataGambar->delete();
        return redirect()->route('dokumentasi.index')->with('sukses','Dokumentasi berhasil dihapus');

    }
}
