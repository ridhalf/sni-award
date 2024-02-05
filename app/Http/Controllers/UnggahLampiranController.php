<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsVerified;
use App\Models\DokumenPeserta;
use App\Models\Feedback;
use App\Models\JadwalAcara;
use App\Models\MasterUnggahLampiran;
use App\Models\User;
use Illuminate\Http\Request;

class UnggahLampiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    private $dokumen;
    function __construct()
    {
        $this->user = new User();
        $this->dokumen = new DokumenPeserta();
        $this->feedback = new Feedback();
        $this->jadwalAcara = new JadwalAcara();
    }
    public function index()
    {   
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
		$feedback = $this->feedback->getFeedbackWithStatus($id);
        $oldFeedback = $this->feedback->oldFeedback($id,0);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $dataDokumen = $this->dokumen->getDataDoc($id);
        $isNew = 'new';
        if ($feedback->first() != null) {
            $isNew = 'edit'; 
        }
        $isVerify =  true;
        foreach ($dataDokumen as $dokumen) {
            if ($dokumen->status == 2) {
                $isVerify = false;
                break;
            }
        }
        return view('peserta.lampiran.index', $data = [
            'menu' => 'Unggah Lampiran',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataDokumen' => $dataDokumen,
            'feedback' => $feedback,
            'isNew' => $isNew,
            'oldFeedback' => $oldFeedback,
            'isVerify' => $isVerify,
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
		$feedback = $this->feedback->getFeedbackWithStatus($id);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $oldFeedback = $this->feedback->oldFeedback($id,0);

        $dataMasterLampiran = MasterUnggahLampiran::all();
        return view('peserta.lampiran.create', $data=[
            'menu' => 'Unggah Lampiran',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataMasterLampiran' => $dataMasterLampiran,
            'feedback' => $feedback,
            'oldFeedback' => $feedback,
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
        $userId = auth()->user()->id;
        $arr = $request->file('nama_file');
        foreach($arr as $key=>$value){
            $array['user_id'] = $userId;
            $array['master_unggah_lampiran_id'] = $key;
            $array['nama_file'] = $value->store('dokumen-peserta');
            DokumenPeserta::create($array);
        }
        return redirect()->route('lampiran.index')->with('sukses','Dokumen berhasil diunggah');
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        $dataDokumen = $this->dokumen->getDataDoc($id);
        $oldFeedback = $this->feedback->oldFeedback($id,0);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
		$feedback = $this->feedback->getFeedbackWithStatus($id);
        return view('peserta.lampiran.edit', $data=[
            'menu' => 'Unggah Lampiran',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'feedback' => $feedback,
            'dataDokumen' => $dataDokumen,
            'oldFeedback' =>$oldFeedback,
            'jadwalAcara'=> $jadwalAcara
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
        $arr = $request->file('nama_file');
        foreach($arr as $key=>$value){
            $array['user_id'] = $id;
            $array['master_unggah_lampiran_id'] = $key;
            $array['nama_file'] = $value->store('dokumen-peserta');
            $array['status'] = 2;
            $ret_val = $this->dokumen->updateDokumen($array);
        }
        $updateFeedback = $this->feedback->updateStatusFeedback($id);
        return redirect()->route('lampiran.index')->with('sukses','Dokumen berhasil diunggah');
    }

   
}
