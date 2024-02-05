<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerkasLampiranPesertaController;
use App\Http\Controllers\CapacityBuildingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluatorController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SekretariatController;
use App\Http\Controllers\MasterPertanyaanController;
use App\Http\Controllers\MasterDokumenController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\MasterKotaKabupatenController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PenjadwalanAcaraController;
use App\Http\Controllers\PenugasanDeController;
use App\Http\Controllers\PenugasanSeController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\UnggahLampiranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [FrontPageController::class, 'showFrontpage'])->middleware('guest')->name('showFrontpage');
Route::resource('/frontpage', FrontpageController::class)->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'simpanData']);
Route::get('/pertanyaan', [PertanyaanController::class, 'index'])->name('pertanyaan');
Route::post('/pertanyaan', [PertanyaanController::class, 'pertanyaan'])->name('showPertanyaan');
Route::get('/lupapassword', [LupaPasswordController::class, 'index'])->name('lupaPassword');
Route::post('/lupapassword', [LupaPasswordController::class, 'cekEmail'])->name('cekEmail');
Route::get('/gantipasswordtoken/{id}', [LupaPasswordController::class, 'gantiPasswordToken'])->name('gantiPasswordToken')->middleware('guest');
Route::post('/gantipasswordtoken/{id}', [LupaPasswordController::class, 'updatePassword'])->name('updatePassword')->middleware('guest');

Route::get('/berita/{slug}', [BeritaController::class, 'detailBerita'])->middleware('guest')->name('detailBerita');

Route::get('/seputarsni', function () {
    return view('seputarsni');
});

Route::get('/semuaacara', [FrontpageController::class, 'semuaAcara'])->middleware('guest');
Route::get('/seputarsni', [FrontpageController::class, 'seputarSni'])->middleware('guest');
Route::get('/detailacara', function () {
    return view('detailacara');
});
Route::get('/kumpulanberita', [BeritaController::class, 'kumpulanBerita'])->name('kumpulanBerita')->middleware('guest');
Route::get('/gantipassword', [GantiPasswordController::class, 'index'])->name('gantiPassword')->middleware('auth');
Route::post('/simpanpasswordbaru/{id}', [GantiPasswordController::class, 'simpanPasswordBaru'])->name('simpanPasswordBaru')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('is_verified')->name('dashboard');

//ambil data kabupaten
Route::post('/getkabupaten', [MasterKotaKabupatenController::class, 'getKabupaten'])->name('getKabupaten');

//bagian peserta
Route::middleware(['is_verified', 'peserta'])->group(function () {
    Route::resource('/peserta/profilpeserta', PesertaController::class,)->except(['create', 'show', 'store', 'destroy']);
    Route::resource('/peserta/kontak', KontakController::class);
    Route::resource('/peserta/lampiran', UnggahLampiranController::class)->except(['show', 'destroy']);
    Route::get('/peserta/persyaratan', [PersyaratanController::class, 'persyaratanSniAward'])->name('persyaratanSniAward');
    Route::post('/peserta/simpansnipeserta', [PesertaController::class, 'simpanSniPeserta'])->name('simpanSniPeserta');
});

// bagian admin
// Route::get('/admin/peserta',[PesertaController::class,'index'])->middleware('admin');e
Route::middleware(['is_verified', 'admin'])->group(function () {
    Route::get('/admin/evaluator/data', [EvaluatorController::class, 'dataTables'])->name('dataevaluator');
    Route::get('/admin/peserta/data', [PesertaController::class, 'dataTables'])->name('datapeserta');
    Route::get('/admin/penugasanse/data', [PenugasanSeController::class, 'seTables'])->name('datase');
    Route::get('/admin/penugasande/data', [PenugasanDeController::class, 'deTables'])->name('datade');
    Route::get('/admin/penugasanverifikasi/data', [BerkasLampiranPesertaController::class, 'verifTables'])->name('dataverif');
    Route::get('/admin/berita/data', [BeritaController::class, 'dataTables'])->name('databerita');

    Route::get('/admin/se/data/{user_id}', [PenugasanSeController::class, 'penugasanSePeserta'])->name('penugasanSePeserta');
    Route::get('/admin/de/data/{user_id}', [PenugasanDeController::class, 'penugasanDePeserta'])->name('penugasanDePeserta');
    Route::post('/admin/verif/evaluator/', [BerkasLampiranPesertaController::class, 'setEvaluatorToBerkasPeserta'])->name('setEvaluatorToBerkasPeserta');
    Route::get('/admin/verif/data/{user_id}', [BerkasLampiranPesertaController::class, 'penugasanVerifikasiDokPeserta'])->name('penugasanVerifikasiDokPeserta');

    Route::get('/admin/peserta', [PesertaController::class, 'showDataPeserta'])->name('showDataPeserta');
    Route::get('/admin/detailpeserta/{user_id}', [PesertaController::class, 'detailPeserta'])->name('detailPeserta');
    Route::post('/admin/editpeserta/', [PesertaController::class, 'updatePesertaPadaAdmin'])->name('updatePesertaPadaAdmin');


    Route::get('/admin/evaluator/create', [EvaluatorController::class, 'createEvaluator'])->name('createEvaluator');
    Route::post('/admin/evaluator/store', [EvaluatorController::class, 'storeEvaluator'])->name('storeEvaluator');
    Route::get('/admin/evaluator/', [EvaluatorController::class, 'showDataEvaluator'])->name('showDataEvaluator');
    Route::get('/admin/evaluator/detailevaluator/{user_id}', [EvaluatorController::class, 'detailEvaluator'])->name('detailEvaluator');
    Route::post('/admin/evaluator/verifikasiEvaluator/{user_id}', [EvaluatorController::class, 'verifikasiEvaluator'])->name('verifikasiEvaluator');
    Route::get('/admin/evaluator/verifikasipekerjaan/{id}/{user_id}', [PekerjaanController::class, 'verifikasiPekerjaan'])->name('verifikasiPekerjaan');
    Route::get('/admin/evaluator/verifikasisertifikat/{id}/{user_id}', [SertifikatController::class, 'verifikasiSertifikat'])->name('verifikasiSertifikat');
    Route::get('/admin/evaluator/verifikasipendidikan/{id}/{user_id}', [PendidikanController::class, 'verifikasiPendidikan'])->name('verifikasiPendidikan');
    Route::get('/admin/detailberita/{slug}', [BeritaController::class, 'detailBeritaAdmin']);


    Route::get('/admin/penugasanverifikasi', [BerkasLampiranPesertaController::class, 'getPeserta'])->name('getPesertaPenugasanVerifikasi');

    Route::get('/admin/profil', [SekretariatController::class, 'profil'])->name('adminProfil');
    Route::post('/admin/profil/update/{id}', [SekretariatController::class, 'perbaruiProfil'])->name('adminProfilUpdate');
    Route::resource('/admin/masterpertanyaan', MasterPertanyaanController::class)->except(['show']);
    Route::resource('/admin/masterdokumen', MasterDokumenController::class)->except(['show']);
    Route::resource('/admin/capacitybuilding', CapacityBuildingController::class)->except(['show']);
    Route::resource('/admin/persyaratan', PersyaratanController::class)->except(['show']);
    Route::resource('/admin/dokumentasi', DokumentasiController::class)->except(['show']);
    Route::resource('/admin/berita', BeritaController::class)->except(['show']);
    Route::resource('/admin/faq', FaqController::class)->except(['show']);
    Route::resource('/admin/penjadwalanacara', PenjadwalanAcaraController::class)->except(['show']);
    Route::resource('/admin/penugasanse', PenugasanSeController::class)->except(['show']);
    Route::resource('/admin/penugasande', PenugasanDeController::class)->except(['show']);
});

// bagian evaluator
Route::middleware(['is_verified', 'evaluator'])->group(function () {
    Route::resource('/evaluator/profilevaluator', EvaluatorController::class)->except(['create', 'show', 'destroy', 'store']);
    Route::post('/evaluator/profil/pendidikan', [EvaluatorController::class, 'pendidikan'])->name('evaluatorPendidikan');
    Route::post('/evaluator/profil/pekerjaan', [EvaluatorController::class, 'pekerjaan'])->name('evaluatorPekerjaan');
    Route::post('/evaluator/profil/pelatihan', [EvaluatorController::class, 'pelatihan'])->name('evaluatorPelatihan');
    Route::post('/evaluator/profil/provilevaluator/riwayatde/', [PenugasanDeController::class, 'riwayatDe'])->name('riwayatDe');
    Route::post('/evaluator/profil/provilevaluator/riwayatse/', [PenugasanSeController::class, 'riwayatSe'])->name('riwayatSe');

    Route::post('/evaluator/penugasanse/uploadfile', [PenugasanSeController::class, 'uploadFilePenugasanSe'])->name('uploadFilePenugasanSe');
    // Route::post('/evaluator/penugasanse/uploadfile', [PenugasanDeController::class, 'uploadFilePenugasanDe'])->name('uploadFilePenugasanDe');



    Route::get('/evaluator/download', [CapacityBuildingController::class, 'showCapacityBuildingDownload'])->name('showCapacityBuildingDownload');
    Route::resource('/evaluator/pekerjaan', PekerjaanController::class);
    Route::resource('/evaluator/sertifikat', SertifikatController::class);
    Route::resource('/evaluator/pendidikan', PendidikanController::class);
    Route::get('/evaluator/berkas', [BerkasLampiranPesertaController::class, 'index'])->name('berkasDokumen');
    Route::get('/evaluator/berkas/{id}', [BerkasLampiranPesertaController::class, 'detail'])->name('detailBerkasDokumen');
    Route::get('/evaluator/berkas/verifikasi/{id}/{user_id}/{master_lampiran_id}', [BerkasLampiranPesertaController::class, 'verifikasiBerkasDokumen'])->name('verifikasiBerkasDokumen');
    Route::get('/evaluator/berkas/tolak/{id}/{user_id}/{master_lampiran_id}', [BerkasLampiranPesertaController::class, 'lengkapiBerkasDokumen'])->name('lengkapiBerkasDokumen');
    Route::post('/evaluator/berkas/kirimfeedback', [BerkasLampiranPesertaController::class, 'feedback'])->name('feedback');
    Route::get('/evaluator/penugasanse/', [PenugasanSeController::class, 'showPenugasanSeById'])->name('penugasanSe');
    Route::get('/evaluator/umpanbalik/', [PenugasanSeController::class, 'penugasanUmpanBalik'])->name('penugasanUmpanBalik');
    Route::get('/evaluator/verifikasipenugasande/{id}/{user_id}', [PenugasanDeController::class, 'verifikasiPenugasanDe'])->name('verifikasiPenugasanDe');
    Route::get('/evaluator/verifikasipenugasanse/{id}', [PenugasanSeController::class, 'verifikasiPenugasanSe'])->name('verifikasiPenugasanSe');
    Route::get('/evaluator/penugasande/', [PenugasanDeController::class, 'getPenugasanDe'])->name('getPenugasanDe');
    Route::get('/evaluator/penugasande/{id}', [PenugasanDeController::class, 'formUploadPenugasanDe'])->name('formUploadPenugasanDe');
    Route::post('/evaluator/penugasande/upload/', [PenugasanDeController::class, 'uploadFilePenugasan'])->name('uploadFilePenugasan');
    Route::post('/evaluator/penugasanse/upload/', [PenugasanSeController::class, 'uploadFileUmpanBalik'])->name('uploadFileUmpanBalik');
    
});
