<?php

namespace App\Http\Controllers;

use App\Models\DokumenCapacityBuilding;
use App\Models\JadwalAcara;
use App\Models\User;
use Illuminate\Http\Request;

class CapacityBuildingController extends Controller
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
        $this->jadwalAcara = new JadwalAcara();
    }
    public function index()
    {
        $dataCapacityBuilding = DokumenCapacityBuilding::all();
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        return view('admin.capacitybuilding.index', $data = [
            'menu' => 'Materi Capacity Building',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataCapacityBuilding' => $dataCapacityBuilding,
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
        $data = $this->user->getUser($id);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        return view('admin.capacitybuilding.create', $data = [
            'menu' => 'Materi Capacity Building',
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
            'nama_file' => ['required'],
            'nama_dokumen' => ['required', 'mimes:pdf', 'file ', 'max:2048']
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['master_dokumen_id'] = 2;
        $validatedData['nama_dokumen'] = $request->file('nama_dokumen')->store('dokumen-capacitybuilding');
        $ret_val = DokumenCapacityBuilding::create($validatedData);
        // return $request->file('dokumen')->store('dokumen-persyaratan'); 
        $request->session()->flash('sukses', 'Dokumen Capacity Building berhasil ditambahkan');
        return redirect()->route('capacitybuilding.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataCapacityBuilding = DokumenCapacityBuilding::findOrFail($id);
        $idUser = auth()->user()->id;
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $data = $this->user->getUser($idUser);
        return view('admin.capacitybuilding.edit', $data = [
            'menu' => 'Materi Capacity Building',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataCapacityBuilding' => $dataCapacityBuilding,
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
        $data = $request->all();
        $dataCapacityBuilding = DokumenCapacityBuilding::findOrFail($id);
        $dataCapacityBuilding->update($data);
        return redirect()->route('capacitybuilding.index')->with('sukses', 'Data berhasi diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data   = DokumenCapacityBuilding::findOrFail($id);
        $file = public_path('storage/') . $data->nama_dokumen;
        if (file_exists($file)) {
            @unlink($file);
        }
        $data->delete();

        return redirect()->route('capacitybuilding.index')->with('sukses', 'Dokumen Persyaratan berhasil dihapus');
    }

    public function showCapacityBuildingDownload()
    {
        $dataCapacityBuilding = DokumenCapacityBuilding::all();
        $id = auth()->user()->id;
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $data = $this->user->getUser($id);
        return view('evaluator.download', $data = [
            'menu' => 'Materi Capacity Building',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataCapacityBuilding' => $dataCapacityBuilding,
            'jadwalAcara' => $jadwalAcara
        ]);
    }
}
