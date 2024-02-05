<?php

namespace App\Http\Controllers;

use App\Models\JadwalAcara;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendidikanController extends Controller
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
        $this->pendidikan = new Pendidikan();
        $this->jadwalAcara = new JadwalAcara();
    }
    public function index()
    {
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        $dataPendidikan = Pendidikan::where('user_id',$id)->get();
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        return view('evaluator.pendidikan.index', $data = [
            'menu' => 'Profil',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataPendidikan' => $dataPendidikan,
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
        return view('evaluator.pendidikan.create', $data = [
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
            'nama_kampus' => ['required'],
            'jenjang' => ['required'],
            'tahun_lulus' => ['required'],
            'ijazah' =>['required']
        ]);
        $validatedData['ijazah'] = $request->file('ijazah')->store('pendidikan-evaluator');
        $validatedData['user_id'] = auth()->user()->id;
        Pendidikan::create($validatedData);
        return redirect()->route('pendidikan.index')->with('sukses','Data pendidikan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $dataPendidikan = Pendidikan::findOrFail($id);
        
        return view('evaluator.pendidikan.edit', $data = [
            'menu' => 'Profil',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataPendidikan' => $dataPendidikan,
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
            'nama_kampus' => ['required'],
            'jenjang' => ['required'],
            'tahun_lulus' => ['required'],
            'ijazah' =>['required']
        ]);
        if($request->file('ijazah')){
            if($request->oldGambar){
                Storage::delete($request->oldIjazah); 
            }
            $validatedData['ijazah'] = $request->file('ijazah')->store('pendidikan-evaluator');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $dataPendidikan = Pendidikan::findOrFail($id);
        $dataPendidikan->update($validatedData);
        return redirect()->route('pendidikan.index')->with('sukses','Data pendidikan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data   = Pendidikan::findOrFail($id);
        $file = public_path('storage/').$data->ijazah;
        if(file_exists($file)){
            @unlink($file);
        }
        $data->delete();
        return redirect()->route('pendidikan.index')->with('sukses','Pendidikan berhasil dihapus');
    }

    public function verifikasiPendidikan($id,$user_id)
    {
        $ret_val = $this->pendidikan->verifikasi($id,$user_id);
        if ($ret_val) {
            return redirect()->route('detailEvaluator',$user_id)->with('sukses','Pendidikan berhasil di verifikasi');
        }
        else {
            return redirect()->route('detailEvaluator',$user_id)->with('gagal','Pendidikan gagal di verifikasi');
        }
    }
}
