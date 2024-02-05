<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\DokumenSniAward;
use App\Models\Faq;
use App\Models\Frontpage;
use App\Models\Gambar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FrontpageController extends Controller
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
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$data = auth()->user()->id;
		return view('frontpage.create', $data = [
			'menu' => 'Front Page',
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
			'ket_judul' => ['required'],
			'gambar_judul' => ['required'],
			'tentang_sniaward' => ['required'],
			'ket_sniaward' => ['required'],
			'berita' => ['required'],
			'ket_berita' => ['required'],
			'unduh_berkas' => ['required'],
			'ket_unduhberkas' => ['required'],
			'gambar_unduhberkas' => ['required'],
			'linimasa' => ['required'],
			'gambar_linimasa' => ['required'],
			'kumpulanacara' => ['required'],
			'gambar_kumpulanacara' => ['required'],
			'ket_kumpulanacara' => ['required'],
			'dokumentasi' => ['required'],
			'pertanyaan' => ['required'],
			'ket_pertanyaan' => ['required'],
			'kontakkami' => ['required'],
			'ket_kontakkami' => ['required'],
			'linkfacebook' => ['required'],
			'linktwitter' => ['required'],
			'linkinstagram' => ['required'],
			'webbsn' => ['required']
		]);
		Frontpage::create($validateData);
		$request->session()->flash('sukses', 'Frontpage berhasil diubah');
		return redirect()->route('frontpage.index')->with('sukses', 'Frontpage berhasil diubah');
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
		$dataFrontpage = FrontPage::findOrFail($id);
		return view('admin.frontpage.edit', $data = [
			'menu' => 'Edit Halaman Depan',
			'data' => $data,
			'peran' => auth()->user()->peran,
			'dataFrontpage' => $dataFrontpage
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
		if ($request->file('gambar_judul')) {
			if ($request->oldGambar_judul) {
				Storage::delete($request->oldGambar_judul);
			}
			$data['gambar_judul'] = $request->file('gambar_judul')->store('frontpage');
		}
		if ($request->file('gambar_unduhberkas')) {
			if ($request->oldGambar_unduhberkas) {
				Storage::delete($request->oldGambar_unduhberkas);
			}
			$data['gambar_unduhberkas'] = $request->file('gambar_unduhberkas')->store('frontpage');
		}
		if ($request->file('gambar_linimasa')) {
			if ($request->oldGambar_linimasa) {
				Storage::delete($request->oldGambar_linimasa);
			}
			$data['gambar_linimasa'] = $request->file('gambar_linimasa')->store('frontpage');
		}
		if ($request->file('gambar_kumpulanacara')) {
			if ($request->oldGambar_kumpulanacara) {
				Storage::delete($request->oldGambar_kumpulanacara);
			}
			$data['gambar_kumpulanacara'] = $request->file('gambar_kumpulanacara')->store('frontpage');
		}
		if ($request->file('gambar_pertanyaan')) {
			if ($request->old_Gambar_pertanyaan) {
				Storage::delete($request->old_Gambar_pertanyaan);
			}
			$data['gambar_pertanyaan'] = $request->file('gambar_pertanyaan')->store('frontpage');
		}

		$dataFrontpage = FrontPage::findOrFail($id);
		$dataFrontpage->update($data);
		return redirect()->route('frontpage.edit', $id)->with('sukses', 'Frontpage berhasil diubah');
	}


	public function showFrontpage()
	{
		$dataFrontpage = FrontPage::all();
		$dataGambar = Gambar::all();
		foreach ($dataGambar as $gambar) {
			$gambar['tanggal'] = Carbon::parse($gambar->create_at)->format('d M Y');
			$gambar['url'] = \asset('storage/' . $gambar->nama_file);
		}
		$dataFaq = Faq::all();
		$berita = DB::table('berita')
			->orderByDesc('created_at')->take(3)->get();
		$dataFrontpage = $dataFrontpage->last();
		$dataSniAward = DokumenSniAward::all();
		return view('home', $dataFrontpage = [
			'data' => $dataFrontpage,
			'dataFaq' => $dataFaq,
			'dataGambar' => $dataGambar,
			'dataBerita' => $berita,
			'dataSniAward' => $dataSniAward
		]);
	}

	public function semuaAcara()
	{
		$dataFrontpage = Frontpage::all();
		$dataFrontpage = $dataFrontpage->last();
		
		return view('semuaacara', $data = [
			'data' => $dataFrontpage
		]);
	}

	public function seputarSni()
	{
		$dataFrontpage = Frontpage::all();
		$dataFrontpage = $dataFrontpage->last();

		return view('seputarsni',$data = [
			'data' => $dataFrontpage,
		]);
	}
	
}
