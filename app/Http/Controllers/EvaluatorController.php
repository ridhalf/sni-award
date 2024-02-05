<?php

namespace App\Http\Controllers;

use App\Mail\KirimPassword;
use App\Models\Evaluator;
use App\Models\JadwalAcara;
use App\Models\MasterKotaKabupaten;
use App\Models\MasterProvinsi;
use App\Models\Pekerjaan;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use App\Models\PenugasanDe;
use App\Models\PenugasanSe;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class EvaluatorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	private $user;
	function __construct()
	{	
		$this->penugasanDe = new PenugasanDe();
		$this->penugasanSe = new PenugasanSe();
		$this->user = new User();
		$this->evaluator = new Evaluator();
		$this->jadwalAcara = new JadwalAcara();
	}
	public function index()
	{
		$dataProvinsi = MasterProvinsi::all();
		$dataKabupaten = MasterKotaKabupaten::all();
		$id = auth()->user()->id;
		$data = $this->user->getUser($id);
		$evaluator = Evaluator::where('user_id',$id)->first();
		$jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        $dataPekerjaan = Pekerjaan::where('user_id',$id)->get();
        $dataPendidikan = Pendidikan::where('user_id',$id)->get();
        $dataPelatihan = Pelatihan::where('user_id',$id)->get();
		$dataPenugasanDe = $this->penugasanDe->historyPenugasanDe($id);
		$dataPenugasanSe = $this->penugasanSe->historyPenugasanSe($id);
		
		return view('evaluator.profil', $data = [
			'menu' => 'Profil',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'evaluator' => $evaluator,
			'dataProvinsi' => $dataProvinsi,
			'dataKabupaten' => $dataKabupaten,
			'dataPendidikan' => $dataPendidikan,
			'dataPekerjaan' => $dataPekerjaan,
			'dataPelatihan' => $dataPelatihan,
			'dataPenugasanDe' => $dataPenugasanDe,
			'dataPenugasanSe' => $dataPenugasanSe,
			'jadwalAcara' => $jadwalAcara
		]);
	}

	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$dataProvinsi = MasterProvinsi::all();
		$dataKabupaten = MasterKotaKabupaten::all();
		$idUser = auth()->user()->id;
		$dataEvaluator = Evaluator::where('user_id', $id)->get()->first();
		$data = $this->user->getUser($idUser);
		return view('evaluator.edit', $data = [
			'menu' => 'Profil',
			'dataKabupaten' => $dataKabupaten,
			'dataProvinsi' => $dataProvinsi,
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataEvaluator' => $dataEvaluator
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
		if ($request->file('gambar')) {
			if ($request->oldGambar) {
				Storage::delete($request->oldGambar);
			}
			$data['gambar'] = $request->file('gambar')->store('profil-evaluator');
		} else $data['gambar'] = null;

		if ($request->file('npwp')) {
			if ($request->oldNpwp) {
				Storage::delete($request->oldNpwp);
			}
			$data['npwp'] = $request->file('npwp')->store('profil-evaluator');
		} else $data['npwp'] = null;

		if ($request->file('ktp')) {
			if ($request->oldKtp) {
				Storage::delete($request->oldKtp);
			}
			$data['ktp'] = $request->file('ktp')->store('profil-evaluator');
		} else $data['ktp'] = null;

		// if ($request->file('cv')) {
		// 	if ($request->oldCv) {
		// 		Storage::delete($request->oldCv);
		// 	}
		// 	$data['cv'] = $request->file('cv')->store('profil-evaluator');
		// } else $data['cv'] = null;
		$dataEvaluator =  ([

			'nama_lengkap' => $request->nama_lengkap,
			'gelar_sebelum_nama' => $request->gelar_sebelum_nama,
			'gelar_setelah_nama' => $request->gelar_setelah_nama,
			'tgl_lahir' => $request->tgl_lahir,
			'pekerjaan' => $request->pekerjaan,
			'nama_instansi' => $request->nama_instansi,
			'jenis_kelamin' => $request->jenis_kelamin,
			'alamat' => $request->alamat,
			'master_provinsi_id' => $request->master_provinsi_id,
			'master_kota_kabupaten_id' => $request->master_kota_kabupaten_id,
			'nomor_telepon' => $request->nomor_telepon,
			'gambar' => $data['gambar'],
			'npwp' => $data['npwp'],
			'ktp' => $data['ktp']

		]);
		$this->evaluator->updateEvaluator($dataEvaluator, $id);
		return redirect()->route('profilevaluator.index')->with('sukses', 'Data profil berhasi diubah');
	}

	public function pendidikan(Request $request)
	{
		if (!empty($request->id) && $request->id != null) {
			$validatedData = $request->validate([
			'nama_kampus' => ['required'],
			'tahun_masuk' => ['required'],
			'tahun_lulus' => ['required'],
			'jenjang' =>['required'],
			'program_studi' =>['required']
			]);
			if($request->file('ijazah')){
				if($request->oldijazah){
					Storage::delete($request->oldijazah);
				}
            $validatedData['ijazah']=$request->file('ijazah')->store('pendidikan-evaluator');
        	}
			
			$dataPendidikan = Pendidikan::findOrFail($request->id);
			$dataPendidikan->update($validatedData);
			return redirect()->route('profilevaluator.index')->with('sukses','Data pendidikan berhasil ditambahkan');
		} else {
				$validatedData = $request->validate([
			'nama_kampus' => ['required'],
			'tahun_masuk' => ['required'],
			'tahun_lulus' => ['required'],
			'jenjang' =>['required'],
			'program_studi' =>['required']
		]);
			$validatedData['ijazah'] = $request->file('ijazah')->store('pendidikan-evaluator');
			$validatedData['user_id'] = auth()->user()->id;
			$validatedData['status'] = false;
			Pendidikan::create($validatedData);
			return redirect()->route('profilevaluator.index')->with('sukses','Data pendidikan berhasil ditambahkan');
		}
	}

	public function pekerjaan(Request $request)
	{
		if (!empty($request->id) && $request->id != null) {
			$validatedData = $request->validate([
            'instansi' => ['required'],
            'jabatan' => ['required'],
            'tahun_mulai' => ['required'],
            'tahun_selesai' => ['required']
        ]);
			$validatedData['user_id'] = auth()->user()->id;
			$dataPekerjaan = Pekerjaan::findOrFail($request->id);
			$dataPekerjaan->update($validatedData);
			return redirect()->route('profilevaluator.index')->with('sukses','Data pekerjaan berhasil diubah');
		} else {
			$validatedData = $request->validate([
            'instansi' => ['required'],
            'jabatan' => ['required'],
            'tahun_mulai' => ['required'],
            'tahun_selesai' => ['required']
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        Pekerjaan::create($validatedData);
        return redirect()->route('profilevaluator.index')->with('sukses','Data pekerjaan berhasil ditambahkan');
		}
	}

	public function pelatihan(Request $request)
	{
		if (!empty($request->id) && $request->id != null) {
			$validatedData = $request->validate([
			'nama_pelatihan' => ['required'],
			'tahun_pelatihan' => ['required']
			]);
			if($request->file('sertifikat_pelatihan')){
				if($request->oldSertifikat){
					Storage::delete($request->oldSertifikat);
				}
            $validatedData['sertifikat_pelatihan']=$request->file('sertifikat_pelatihan')->store('pendidikan-evaluator');
        	}
			
			$pelatihan = Pelatihan::findOrFail($request->id);
			$pelatihan->update($validatedData);
			return redirect()->route('profilevaluator.index')->with('sukses','Data pendidikan berhasil ditambahkan');
		} else {
			$validatedData = $request->validate([
            'nama_pelatihan' => ['required'],
            'tahun_pelatihan' => ['required'],
        ]);
			$validatedData['sertifikat_pelatihan'] = $request->file('sertifikat_pelatihan')->store('pelatihan-evaluator');
			$validatedData['user_id'] = auth()->user()->id;
			Pelatihan::create($validatedData);
			return redirect()->route('profilevaluator.index')->with('sukses','Data pendidikan berhasil ditambahkan');
		}
	}

	public function simpanRiwayatDE(Request $request)
	{
		// TODO: menyimpan ke database
		if (!empty($request->id) && $request->id != null) {
			// TODO: fungsi edit data yang sudah ada
			$id = $request->id;
		} else {
			// TODO: fungsi tambah data baru
		}
	}

	public function simpanRiwayatSE(Request $request)
	{
		// TODO: menyimpan ke database
		if (!empty($request->id) && $request->id != null) {
			// TODO: fungsi edit data yang sudah ada
			$id = $request->id;
		} else {
			// TODO: fungsi tambah data baru
		}
	}

	public function dataTables()
	{
		$model = Evaluator::query();
		return DataTables::eloquent($model)
			->addColumn('action', function (Evaluator $evaluator) {
				return '<a href="evaluator/detailevaluator/' . $evaluator->user_id . '"><span class="badge badge-info">Info</span></a>';
			})
			->toJson();
	}


	// FUNCTION UNTUK ADMIN

	public function storeEvaluator(Request $request)
	{
		$validatedData = $request->validate([
			'nama_lengkap' => ['required'],
			'email' => ['required', 'email:dns'],
			'status' => ['required']
		]);
		$status = $validatedData['status'];
		$password = Str::random(12);
		$validatedData['password'] = bcrypt($password);
		$validatedData['peran'] = 'Evaluator';
		$validatedData['status'] = false;
		$ret_val = User::create($validatedData);
		$id = $ret_val->id;
		Mail::to($validatedData['email'])->send(new KirimPassword($id, $password));
		$dataEvaluator = ([
			'user_id' => $id,
			'status' => $status,
			'nama_lengkap' => $validatedData['nama_lengkap']

		]);
		Evaluator::create($dataEvaluator);
		$request->session()->flash('sukses', 'Evaluator berhasil ditambahkan');
		return redirect()->route('showDataEvaluator');
	}
	public function createEvaluator()
	{
		$id = auth()->user()->id;
		$data = $this->user->getUser($id);
		return view('admin.evaluator.create', $data = [
			'menu' => 'Evaluator',
			'data' => $data,
			'peran' => auth()->user()->peran,
		]);
	}
	public function showDataEvaluator()
	{
		$id = auth()->user()->id;
		$data = $this->user->getUser($id);
		$dataEvaluator = Evaluator::all();
		return view('admin.evaluator.index', $data = [
			'menu' => 'Evaluator',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataEvaluator' => $dataEvaluator
		]);
	}

	public function detailEvaluator($user_id)
	{
		$id = auth()->user()->id;
		$data = $this->user->getUser($id);
		$dataEvaluator = Evaluator::where('user_id', $user_id)->get()->first();
		$dataPendidikan = Pendidikan::where('user_id', $user_id)->get();
		$dataPekerjaan = Pekerjaan::where('user_id', $user_id)->get();
		$dataSertifikat = Sertifikat::where('user_id', $user_id)->get();
		return view('admin.evaluator.show', $data = [
			'peran' => auth()->user()->peran,
			'menu' => 'Evaluator',
			'data' => $data,
			'dataEvaluator' => $dataEvaluator,
			'dataPendidikan' => $dataPendidikan,
			'dataPekerjaan' => $dataPekerjaan,
			'dataSertifikat' => $dataSertifikat
		]);
	}

	public function verifikasiEvaluator($user_id)
	{
		Evaluator::where('user_id', $user_id)
			->update(['flag_complated' => 1]);
		return redirect()->route('showDataEvaluator')->with('sukses', 'Verifikasi berhasil');
	}
}
