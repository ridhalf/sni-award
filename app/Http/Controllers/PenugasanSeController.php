<?php

namespace App\Http\Controllers;

use App\Models\Evaluator;
use App\Models\JadwalAcara;
use App\Models\PenugasanSe;
use App\Models\Peserta;
use App\Models\SniPeserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PenugasanSeController extends Controller
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
        $this->penugasanSe = new PenugasanSe();
        $this->jadwalAcara = new JadwalAcara();
        $this->sniPeserta = new SniPeserta();
    }
    public function index()
    {
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        $dataSe = PenugasanSe::all();
        return view('admin.penugasanse.index', $data = [
            'menu' => 'Penjadwalan Se',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataPenugasanSe' => $dataSe
        ]);
    }

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
            $penugasanDe = PenugasanSe::findOrFail($request->id);
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
            PenugasanSe::create($validatedData);
		}
        
        return redirect('/admin/se/data/' . $request->peserta_id)->with('sukses','penugasan berhasil ditambahkan');
    }


    public function seTables()
	{
		$model = Peserta::query();
		return DataTables::eloquent($model)
			->addColumn('action', function (Peserta $peserta) {
				return '<a href="/admin/se/data/' . $peserta->user_id . '"><span class="badge badge-info">Info</span></a>';
			})
			->toJson();
	}

    public function penugasanSePeserta($user_id)
    {

        $idUser = auth()->user()->id;
		$data = $this->user->getUser($idUser);
		$dataPeserta = $this->peserta->dataPeserta($user_id)->first();
        $dataEvaluator = Evaluator::where('flag_complated',1)->get();
        $dataPenugasanSe = $this->penugasanSe->getPenugasanWithEvaluator($user_id);
        $counPenugasan = count($dataPenugasanSe);
		$dataSniPeserta = $this->sniPeserta->getSniPeserta($user_id);
		return view('admin.penugasanse.show', $data = [
			'menu' => 'Penjadwalan Se',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataPeserta' => $dataPeserta,
            'dataEvaluator' => $dataEvaluator,
            'dataPenugasanSe' => $dataPenugasanSe,
            'dataSniPeserta' => $dataSniPeserta,
            'countPenugasan' => $counPenugasan
		]);
    }

    public function showPenugasanSeById()
    {
        $idUser = auth()->user()->id;
		$data = $this->user->getUser($idUser);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $penugasanSe = $this->penugasanSe->getPenugasanByIdEvaluator($idUser);
		// $dataPeserta = $this->peserta->dataPeserta($id)->first();
        // $dataEvaluator = Evaluator::where('flag_complated',1)->get();
        // $dataPenugasanSe = $this->penugsanSe->getPenugasanWithEvaluator($id);
		return view('evaluator.penugasanse.index', $data = [
			'menu' => 'Tugas Se',
			'data' => $data,
			'peran' => auth()->user()->peran,
            'jadwalAcara' => $jadwalAcara,
            'penugasanSe' => $penugasanSe
		]);
    }

    public function uploadFilePenugasanSe(Request $request)
    {
        $validatedData = $request->validate([
            'id' => ['required'],
            'file_penilaian' => 'required|file|mimes:pdf|max:10240'
        ]);
        $data['file_penilaian'] = $request->file('file_penilaian')->store('dokumen-se');
        $peserta_id = $this->penugasanSe->getPesertaId($validatedData['id']);
        $data['peserta_id'] = $peserta_id->peserta_id;
        $this->penugasanSe->uploadFileSe($data);

        return redirect()->route('penugasanSe')->with('sukses', 'file penilaian berhasil di unggah');
    }

    public function verifikasiPenugasanSe($id)
    {   
        $penugasan = $this->penugasanSe->getPesertaId($id);
        $ret_val = $this->penugasanSe->verifikasiPenugasanSe($penugasan->peserta_id);
        return redirect()->route('penugasanSe')->with('sukses','verifikasi berhasil');
    }

    public function riwayatSe(Request $request)
    {
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $evaluator_id = $request->id;
        $data = $this->user->getUser($evaluator_id);
        $riwayatSe = $this->penugasanSe->historyPenugasanSeByEvaluator($evaluator_id);
        return view('evaluator.penugasanse.tabelriwayatse', $data=[
            'menu' => 'Riwayat SE',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'jadwalAcara'=> $jadwalAcara,
            'riwayatSe' => $riwayatSe
        ]);
    }


    // UMPAN BALIK UNTUK EVALUATOR
    public function penugasanUmpanBalik()
    {
        $idUser = auth()->user()->id;
		$data = $this->user->getUser($idUser);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $penugasanSe = $this->penugasanSe->getPenugasanByIdEvaluator($idUser);
		// $dataPeserta = $this->peserta->dataPeserta($id)->first();
        // $dataEvaluator = Evaluator::where('flag_complated',1)->get();
        // $dataPenugasanSe = $this->penugsanSe->getPenugasanWithEvaluator($id);
		return view('evaluator.umpanbalik.index', $data = [
			'menu' => 'Tugas Se',
			'data' => $data,
			'peran' => auth()->user()->peran,
            'jadwalAcara' => $jadwalAcara,
            'penugasanSe' => $penugasanSe
		]);
    }

    public function uploadFileUmpanBalik(Request $request){
        $validatedData = $request->validate([
            'umpan_balik' => 'required|file|mimes:pdf|max:10240'
        ]);
        if($request->file('umpan_balik')){
            if($request->oldNama_file){
                Storage::delete($request->oldNama_file);
            }
            $validatedData['umpan_balik']=$request->file('umpan_balik')->store('umpan-balik');
        }
        $validatedData['peserta_id'] = $request->id;
        $ret_val = $this->penugasanSe->uploadUmpanBalik($validatedData);
        return redirect()->route('penugasanUmpanBalik')->with('sukses', "Umpan Balik berhasil di upload");
    }
}
