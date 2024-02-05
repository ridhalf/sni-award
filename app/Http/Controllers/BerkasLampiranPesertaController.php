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

class BerkasLampiranPesertaController extends Controller
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
			'menu' => 'Tugas Verifikasi',
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
			'menu' => 'Tugas Verifikasi',
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

	public function verifikasiBerkasDokumen($id,$user_id,$master_lampiran_id)
	{
		$ret_val = $this->berkasPeserta->varifikasi($id, $user_id, $master_lampiran_id);
		if ($ret_val) {
            return redirect()->route('detailBerkasDokumen',$user_id)->with('sukses','Dokumen berhasil di verifikasi');
        }
        else {
            return redirect()->route('detailBerkasDokumen',$user_id)->with('gagal','Dokumen gagal di verifikasi');
        }

	}
	public function lengkapiBerkasDokumen($id,$user_id,$master_lampiran_id)
	{
		$ret_val = $this->berkasPeserta->lengkapiDokumen($id, $user_id, $master_lampiran_id);
		if ($ret_val) {
            return redirect()->route('detailBerkasDokumen',$user_id)->with('lengkapi','Dokumen belum lengkap');
        }
        else {
            return redirect()->route('detailBerkasDokumen',$user_id)->with('gagal','Dokumen gagal di verifikasi');
        }
	}

	public function feedback(Request $request)
	{
		$validatedData = $request->validate([
			'peserta_id' => ['required'],
			'evaluator_id' => ['required'],
			'deskripsi' => ['required']
		]);
		$validatedData['potongan_deskripsi'] = Str::limit(strip_tags($validatedData['deskripsi']), 50);
		$validatedData['status'] = true;
		Feedback::create($validatedData);
		
		return redirect()->route('berkasDokumen');
	}

	//ADMIN


	public function verifTables()
	{
		$model = Peserta::query();
		return DataTables::eloquent($model)
			->addColumn('action', function (Peserta $peserta) {
				return '<a href="/admin/verif/data/' . $peserta->user_id . '"><span class="badge badge-info">Info</span></a>';
			})
			->toJson();
	}

	public function getPeserta()
	{
		$id = auth()->user()->id;
        $data = $this->user->getUser($id);
        return view('admin.penugasanverifikasi.index', $data = [
            'menu' => 'Penugasan Verifikasi',
            'data' => $data,
            'peran' => auth()->user()->peran,
        ]);
	}

	public function setEvaluatorToBerkasPeserta(Request $request)
	{	
		$peserta_id = $request->peserta_id;
		$evaluator_id = $request->evaluator_id;
		$ret_val = $this->berkasPeserta->updateEvaluatorDokumenPeserta($evaluator_id,$peserta_id);
		return redirect()->route('getPesertaPenugasanVerifikasi')->with('sukses','evaluator berhasil dipilih');
	}

	public function penugasanVerifikasiDokPeserta($user_id)
	{
		$idUser = auth()->user()->id;
		$data = $this->user->getUser($idUser);
		$dataPeserta = $this->peserta->dataPeserta($user_id)->first();
        $dataEvaluator = Evaluator::where('flag_complated',1)->get();


		$cekEvaluator = $this->berkasPeserta->cekEvaluatorDokumenPeserta($user_id);
		$dokumenPeserta = $this->berkasPeserta->cekDokumen($user_id);// cek dokumen ada atau tidak
		if($dokumenPeserta == null){
			$evaluatorTerpilih = '';
		} elseif($dokumenPeserta != null and $cekEvaluator->evaluator_id != null){ 
			
			$evaluatorTerpilih = $this->evaluator->getNamaEvaluator($cekEvaluator->evaluator_id);
			$evaluatorTerpilih = $evaluatorTerpilih->nama_lengkap;
			
		} else{
			$evaluatorTerpilih = 'EVALUATOR BELUM DIPILIH';
		}
		

		$status = $this->berkasPeserta->statusDokumenPeserta($user_id);
		return view('admin.penugasanverifikasi.show', $data = [
			'menu' => 'Penugasan Verifikasi',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataPeserta' => $dataPeserta,
            'dataEvaluator' => $dataEvaluator,
            // 'evaluatorDokumen' => $evaluatorDokumen,
			'evaluatorTerpilih' => $evaluatorTerpilih,
			'status' => $status
		]);
	}

}
