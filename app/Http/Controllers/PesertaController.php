<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\JadwalAcara;
use App\Models\MasterKotaKabupaten;
use App\Models\MasterProvinsi;
use App\Models\MasterSektorKategori;
use App\Models\MasterSni;
use App\Models\Peserta;
use App\Models\SniPeserta;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PesertaController extends Controller
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
		$this->peserta = new Peserta();
		$this->feedback = new Feedback();
		$this->sniPeserta = new SniPeserta();
		$this->jadwalAcara = new JadwalAcara();
	}

	public function index()
	{
		
		$id = auth()->user()->id;
		$dataPeserta = Peserta::findOrFail($id);
		$data = $this->user->getUser($id);
		$feedback = $this->feedback->getFeedbackWithStatus($id);
		$oldFeedback = $this->feedback->oldFeedback($id, 0);
		$dataKabupaten = MasterKotaKabupaten::all();
		$dataProvinsi = MasterProvinsi::all();
		$dataSni = MasterSni::all();
		$dataSektorKategori = MasterSektorKategori::all();
		$dataSniPeserta = $this->sniPeserta->getSniPeserta($id);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
		return view('peserta.profil', $data = [
			'menu' => 'Peserta',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataPeserta' => $dataPeserta,
			'feedback' => $feedback,
			'oldFeedback' => $oldFeedback,
			'dataKabupaten' => $dataKabupaten,
			'dataProvinsi' => $dataProvinsi,
			'dataSni' => $dataSni,
			'dataSektorKategori' => $dataSektorKategori,
			'dataSniPeserta' => $dataSniPeserta,
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
		$idUser = auth()->user()->id;
		$data = $this->user->getUser($idUser);
		$dataProvinsi = MasterProvinsi::all();
		$dataKabupaten = MasterKotaKabupaten::all();
		$dataSektorKategori = MasterSektorKategori::all();
		$dataProfil = $this->peserta->getPesertaWithUserId($id);
		$dataSni = MasterSni::all();
		$feedback = $this->feedback->getFeedbackWithStatus($id);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
		$oldFeedback = $this->feedback->oldFeedback($id, 0);
		return view('peserta/edit', $data = [
			'menu' => 'Profil',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataProvinsi' => $dataProvinsi,
			'dataKabupaten' => $dataKabupaten,
			'dataSni' => $dataSni,
			'dataSektorKategori' => $dataSektorKategori,
			'dataProfil' => $dataProfil,
			'feedback' => $feedback,
			'oldFeeback' => $oldFeedback,
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
		if ($request->file('gambar')) {
			if ($request->oldGambar) {
				Storage::delete($request->oldGambar);
			}
			$data['gambar'] = $request->file('gambar')->store('profil-peserta');
		} else {
			$data['gambar'] = null;
		}
		// $validatedData = $request->validate([
		//     'nama_kampus' => ['required','max:8'],
		//     'jenjang' => ['required'],
		//     'tahun_lulus' => ['required'],
		//     'ijazah' =>['required']
		// ]);

		
		DB::table('peserta')
			->where('user_id', $id)
			->update([
				'nama_organisasi' => $request->nama_organisasi,
				'alamat_organisasi' => $request->alamat_organisasi,
				'alamat_pabrik' => $request->alamat_pabrik,
				'master_provinsi_id' => $request->master_provinsi_id,
				'master_kota_kabupaten_id' => $request->master_kota_kabupaten_id,
				'email_perusahaan' => $request->email_perusahaan,
				'nomor_telepon' => $request->nomor_telepon,
				'website' => $request->website,
				'tahun_berdiri' => $request->tahun_berdiri,
				'status_kepemilikan' => $request->status_kepemilikan,
				'master_sektor_kategori_id' => $request->master_sektor_kategori_id,
				'kekayaan_organisasi' => $request->kekayaan_organisasi,
				'hasil_penjualan_organisasi' => $request->hasil_penjualan_organisasi,
				'tipe_organisasi' => $request->tipe_organisasi,
				'status_kepemilikan' =>$request->status_kepemilikan,
				'ekspor' =>$request->ekspor,
				'negara_ekspor' => $request->negara_ekspor,
				'tahun_ekspor' => $request->tahun_ekspor,
				'tipe_sni' => join(',',$request->sni),
				'tipe_produk' => $request->tipe_produk,
				'gambar' => $data['gambar']
			]);
		// $dataProfil = Peserta::where('user_id',$id)->get()->first();
		// $dataProfil->update($data);
		return redirect()->route('profilpeserta.index')->with('sukses', 'Data Profil berhasi diubah');
	}



	// BAGIAN ADMIN
	
	public function dataTables()
	{
		$model = Peserta::query();
		return DataTables::eloquent($model)
			->addColumn('action', function (Peserta $peserta) {
				return '<a href="/admin/detailpeserta/' . $peserta->user_id . '"><span class="badge badge-info">Info</span></a>';
			})
			->toJson();
	}
	

	public function showDataPeserta()
	{
		$id = auth()->user()->id;
		$data = $this->user->getUser($id);
		$dataPeserta = Peserta::all();
		return view('admin.peserta.index', $data = [
			'menu' => 'Peserta',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataPeserta' => $dataPeserta
		]);
	}

	public function detailPeserta($user_id)
	{
		$idUser = auth()->user()->id;
		$data = $this->user->getUser($idUser);
		$dataPeserta = $this->peserta->dataPeserta($user_id)->first();
		$dataSniPeserta = $this->sniPeserta->getSniPeserta($user_id);
		$dataProvinsi = MasterProvinsi::all();
		$dataKabupaten = MasterKotaKabupaten::all();
		$dataSektorKategori = MasterSektorKategori::all();
		return view('admin.peserta.show', $data = [
			'menu' => 'Peserta',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataPeserta' => $dataPeserta,
			'dataSniPeserta' => $dataSniPeserta,
			'dataProvinsi' => $dataProvinsi,
			'dataKabupaten' => $dataKabupaten,
			'dataSektorKategori' => $dataSektorKategori
		]);
	}

	public function simpanSniPeserta(Request $request)
	{
		if (!empty($request->id)) {
			$validatedData = $request->validate([
				'master_sni_id' => ['required'],
				'nama_lembaga_sertifikasi' => ['required']
			]);
			$sniPeserta = SniPeserta::findOrFail($request->id);
			$sniPeserta->update($validatedData);
			return redirect()->route('profilpeserta.index')->with('sukses','SNI diubah');
		} else {
			$validatedData = $request->validate([
				'master_sni_id' => ['required'],
				'nama_lembaga_sertifikasi' => ['required']
			]);
			$validatedData['user_id'] = auth()->user()->id;
			SniPeserta::create($validatedData);
			return redirect()->route('profilpeserta.index')->with('sukses','SNI ditambahkan');
		}
	}

	public function updatePesertaPadaAdmin(Request $request)
	{
		if ($request->file('gambar')) {
			if ($request->oldGambar) {
				Storage::delete($request->oldGambar);
			}
			$data['gambar'] = $request->file('gambar')->store('profil-peserta');
		} else {
			$data['gambar'] = null;
		}
		// $validatedData = $request->validate([
		//     'nama_kampus' => ['required','max:8'],
		//     'jenjang' => ['required'],
		//     'tahun_lulus' => ['required'],
		//     'ijazah' =>['required']
		// ]);

		
		DB::table('peserta')
			->where('user_id', $request->id)
			->update([
				'nama_organisasi' => $request->nama_organisasi,
				'alamat_organisasi' => $request->alamat_organisasi,
				'alamat_pabrik' => $request->alamat_pabrik,
				'master_provinsi_id' => $request->master_provinsi_id,
				'master_kota_kabupaten_id' => $request->master_kota_kabupaten_id,
				'email_perusahaan' => $request->email_perusahaan,
				'nomor_telepon' => $request->nomor_telepon,
				'website' => $request->website,
				'tahun_berdiri' => $request->tahun_berdiri,
				'status_kepemilikan' => $request->status_kepemilikan,
				'master_sektor_kategori_id' => $request->master_sektor_kategori_id,
				'kekayaan_organisasi' => $request->kekayaan_organisasi,
				'hasil_penjualan_organisasi' => $request->hasil_penjualan_organisasi,
				'tipe_organisasi' => $request->tipe_organisasi,
				'status_kepemilikan' =>$request->status_kepemilikan,
				'ekspor' =>$request->ekspor,
				'negara_ekspor' => $request->negara_ekspor,
				'tahun_ekspor' => $request->tahun_ekspor,
				'tipe_sni' => join(',',$request->sni),
				'tipe_produk' => $request->tipe_produk,
				'gambar' => $data['gambar']
			]);
		// $dataProfil = Peserta::where('user_id',$id)->get()->first();
		// $dataProfil->update($data);
		return redirect('/admin/detailpeserta/'. $request->id)->with('sukses', 'Data Profil berhasi diubah');
	}

}
