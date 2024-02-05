<?php

namespace App\Http\Controllers;

use App\Models\DokumenPeserta;
use App\Models\Evaluator;
use App\Models\Feedback;
use App\Models\JadwalAcara;
use App\Models\PenugasanDe;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class UmpanBalikController extends Controller
{
	private $user;
	function __construct()
	{
		$this->user = new User();
		$this->evaluator = new Evaluator();
		$this->feedback = new Feedback();
		$this->berkasPeserta = new DokumenPeserta();
		$this->penugasanDe = new PenugasanDe();
		$this->peserta = new Peserta();
		$this->jadwalAcara = new JadwalAcara();
	}

	public function index()
	{
		$id = auth()->user()->id;
		$data = $this->user->getUser($id);
		$penugasan = $this->berkasPeserta->getPenugasan($id);
		$dataPeserta = [];
		foreach ($penugasan as $id) {
			$dataPeserta[] = $this->peserta->getNamaPeserta($id->user_id);
		}
		
		foreach ($dataPeserta as $peserta ) {
			$status = $this->berkasPeserta->statusDokumenPeserta($peserta->user_id);
			$peserta->status = $status;
			
		}
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
		return view('evaluator.berkas_peserta.index', $data = [
			'menu' => 'Data Master',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataPeserta' => $dataPeserta,
			'jadwalAcara' => $jadwalAcara
		]);
	}

	public function detail($id)
	{
		$dataPeserta = Peserta::findOrFail($id);
		$idEvaluator = auth()->user()->id;
		$dataFeedback = $this->feedback->getFeedback($id,$idEvaluator);
		$oldFeedback = $this->feedback->oldFeedback($id,0);
		$dataDokumen = $this->berkasPeserta->getDataDoc($id);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();

		$tampilkanFormFeedback = false;
		foreach ($dataDokumen as $dokumen) {
			if ($dokumen->status == 2 || $dokumen->status == 0) {
				$tampilkanFormFeedback = true;
				break;
			}
		}
		$data = $this->user->getUser($idEvaluator);
		return view('evaluator.berkas_peserta.detail', $data = [
			'menu' => 'Data Master',
			'dataEvaluator' => $data,
			'peran' => auth()->user()->peran,
			'dataPeserta' => $dataPeserta,
			'dataDokumen' => $dataDokumen,
			'dataFeedback' => $dataFeedback,
			'oldFeedback' =>$oldFeedback,
			'tampilkanFormFeedback' => $tampilkanFormFeedback,
			'jadwalAcara' => $jadwalAcara
		]);
	}

	

}
