<?php

namespace App\Http\Controllers;

use App\Models\Evaluator;
use App\Models\JadwalAcara;
use App\Models\PenugasanDe;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PenugasanDeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->user = new User();
        $this->peserta = new Peserta();
        $this->jadwalAcara = new JadwalAcara();
        $this->penugasanDe = new PenugasanDe();
    }
    public function index()
    {
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        // $dataDe = PenugasanDe::all();
        return view('admin.penugasande.index', $data = [
            'menu' => 'Penjadwalan De',
            'data' => $data,
            'peran' => auth()->user()->peran,
            // 'dataPenugasanDe' => $dataDe
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
        if (!empty($request->id) && $request->id != null) {
			$validatedData = $request->validate([
            'evaluator_id' => ['required'],
            'mulai' => ['required'],
            'hingga' => ['required'],
            'peserta_id' => ['required']
            ]);
            $validatedData['admin_id'] = auth()->user()->id;
            $penugasanDe = PenugasanDe::findOrFail($request->id);
            $penugasanDe->update($validatedData);
		} else {

            $validatedData = $request->validate([
            'evaluator_id' => ['required'],
            'mulai' => ['required'],
            'hingga' => ['required'],
            'peserta_id' => ['required']
            ]);
            $validatedData['kategori'] = 'de';
            $validatedData['status'] = false;
            $validatedData['admin_id'] = auth()->user()->id;
            PenugasanDe::create($validatedData);
		}
        
        return redirect('/admin/de/data/' . $request->peserta_id)->with('sukses','penugasan berhasil ditambahkan');
    }

    
    public function deTables()
	{
		$model = Peserta::query();
		return DataTables::eloquent($model)
			->addColumn('action', function (Peserta $peserta) {
				return '<a href="/admin/de/data/' . $peserta->user_id . '"><span class="badge badge-info">Info</span></a>';
			})
			->toJson();
	}
    public function penugasanDePeserta($user_id)
    {

        $idUser = auth()->user()->id;
		$data = $this->user->getUser($idUser);
		$dataPeserta = $this->peserta->dataPeserta($user_id)->first();
        $dataEvaluator = Evaluator::where('flag_complated',1)->get();
        $dataPenugasanDe = $this->penugasanDe->getPenugasanWithEvaluator($user_id);
        $countPenugasan = count($dataPenugasanDe);
		return view('admin.penugasande.show', $data = [
			'menu' => 'Penjadwalan De',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataPeserta' => $dataPeserta,
            'dataEvaluator' => $dataEvaluator,
            'dataPenugasanDe' => $dataPenugasanDe,
            'countPenugasan' => $countPenugasan
		]);
    }

    public function verifikasiPenugasanDe($id,$user_id)
    {
        $evaluator_id = auth()->user()->id;
        $ret_val = $this->penugasanDe->verifikasiPenugasanDe($id,$evaluator_id,$user_id);

        return redirect()->route('berkasDokumen')->with('sukses','verifikasi berhasil');
    }

    

    //EVALUATOR
    public function getPenugasanDe()
    {
        $id = auth()->user()->id;
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $penugasanDe = $this->penugasanDe->getPenugasan($id);
        $data = $this->user->getUser($id);
        // $dataDe = PenugasanDe::all();
        return view('evaluator.penugasande.index', $data = [
            'menu' => 'Tugas De',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'jadwalAcara' => $jadwalAcara,
            'penugasanDe' => $penugasanDe
        ]);
    }
    public function formUploadPenugasanDe($id)
    {
        $idUser = auth()->user()->id;
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $tugasDe = PenugasanDe::findOrFail($id);
        $data = $this->user->getUser($id);
        // $dataDe = PenugasanDe::all();
        return view('evaluator.penugasande.show', $data = [
            'menu' => 'UPLOAD DE',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'jadwalAcara' => $jadwalAcara,
            'tugasDe' => $tugasDe
        ]);
    }
    public function uploadFilePenugasan(Request $request)
    {   
        $validatedData = $request->validate([
            'nama_file' => 'required|file|mimes:pdf|max:10240'
        ]);
        if($request->file('nama_file')){
            if($request->oldNama_file){
                Storage::delete($request->oldNama_file);
            }
            $validatedData['nama_file']=$request->file('nama_file')->store('penugasan-de');
        }
        $validatedData['peserta_id'] = $request->id;
        $ret_val = $this->penugasanDe->uploadFileDe($validatedData);
        return redirect()->route('getPenugasanDe')->with('sukses', "penugasan DE berhasil di upload");
    }

    public function riwayatDe(Request $request)
    {
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $evaluator_id = $request->id;
        $data = $this->user->getUser($evaluator_id);
        $riwayatDe = $this->penugasanDe->historyPenugasanDeByEvaluator($evaluator_id);
        return view('evaluator.penugasande.tabelriwayatde', $data=[
            'menu' => 'Riwat DE',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'jadwalAcara'=> $jadwalAcara,
            'riwayatDe' => $riwayatDe
        ]);
    }
}
