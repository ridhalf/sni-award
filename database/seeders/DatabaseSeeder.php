<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\DokumenBerita;
use App\Models\DokumenCapacityBuilding;
use App\Models\DokumenEvaluator;
use App\Models\DokumenPeserta;
use App\Models\DokumenSniAward;
use App\Models\Evaluator;
use App\Models\Frontpage;
use App\Models\Gambar;
use App\Models\HistoryLogin;
use App\Models\Kontak;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MasterProvinsi;
use App\Models\MasterPertanyaan;
use App\Models\MasterDokumen;
use App\Models\MasterSektorKategori;
use App\Models\MasterKotaKabupaten;
use App\Models\MasterSni;
use App\Models\MasterUnggahLampiran;
use App\Models\Pekerjaan;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use App\Models\PertanyaanPeserta;
use App\Models\Peserta;
use App\Models\Sekretariat;
use App\Models\Sertifikat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(400)->create();
        // MasterProvinsi::factory(5)->create();
        // MasterPertanyaan::factory(5)->create();
        // MasterDokumen::factory(5)->create();
        // MasterSektorKategori::factory(5)->create();
        // MasterKotaKabupaten::factory(5)->create();
        // MasterSni::factory(5)->create();
        // HistoryLogin::factory(20)->create();
        // Peserta::factory(100)->create();
        // Kontak::factory(20)->create();
        // PertanyaanPeserta::factory(20)->create();
        // DokumenPeserta::factory(20)->create();
        // DokumenEvaluator::factory(20)->create();
        // DokumenBerita::factory(20)->create();
        // DokumenCapacityBuilding::factory(20)->create();
        // DokumenSniAward::factory(20)->create();
        // Evaluator::factory(300)->create();
        // Pendidikan::factory(20)->create();
        // Pekerjaan::factory(20)->create();
        // Pelatihan::factory(20)->create();
        // Sertifikat::factory(20)->create();
        // Berita::factory(20)->create();
        // Gambar::factory(20)->create();
        // Sekretariat::factory(20)->create();

        User::create([
            'email' => 'admin@gmail.com',
            'password'=>bcrypt('1111'),
            'peran' => 'Admin' ,
            'status'=> true
        ]);
        User::create([
            'email' => 'admin1@gmail.com',
            'password'=>bcrypt('1111'),
            'peran' => 'Admin' ,
            'status'=> true
        ]);
        MasterDokumen::create([
            'tipe_dokumen' =>'persyaratan',
            'format_file' => 'pdf',
            'maks_ukuran' => 2048
        ]);
        MasterDokumen::create([
            'tipe_dokumen' =>'capacity building',
            'format_file' => 'pdf',
            'maks_ukuran' => 2048
        ]);
        

        Frontpage::create([
            'judul' => 'Selamat Datang Di Website SNI Award 2022',
            'gambar_judul' => '/assets/img/satu.png',
            'ket_judul' => 'SNI Award dicanangkan sebagai The National Quality Award of Indonesia sejak tahun 2005',
            'tentang_sniaward' =>'Tentang SNI Awards',
            'ket_sniaward'=> 'SNI Award merupakan sebuah pemberian penghargaan tertinggi dari Pemerintah Repubik Indonesia bagi organisasi yang menerapkan Standar Nasional Indonesia (SNI) secara konsisten, berkinerja tinggi, memiliki kemampuan mengelola dinamisasi perubahan dan melakukan transformasi yang diperlukan secara tepat.',
            'berita' => 'Berita',
            'ket_berita' => 'Berita terbaru seputar SNI Award',
            'unduhberkas' => 'Unduh Berkas',
            'ket_unduhberkas' => 'Beberapa acara yang telah dilaksanakan sebelumnya',
            'gambar_unduhberkas' => '/assets/img/vector_download.png',
            'linimasa' => 'Linimasa',
            'gambar_linimasa' => '/assets/img/vector_download.png',
            'kumpulanacara' => 'Kumpulan Acara',
            'gambar_kumpulanacara' => '/assets/img/vector_kumpulanacara.png',
            'ket_kumpulanacara' => 'Beberapa acara yang telah dilaksanakan sebelumnya',
            'dokumentasi' => 'Dokumentasi',
            'pertanyaan' => 'Frequently Asked Questions',
            'ket_pertanyaan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
            'kontakkami' => 'Kontak Kami',
            'ket_kontakkami' => 'Tujuan dari Kontak BSN adalah untuk menampung permintaan layanan, pertanyaan maupun masukan yang berhubungan dengan kegiatan SNI Award. Semua masukan dari Kontak BSN akan diteruskan kepada pihak/narasumber yang mempunyai kompetensi sesuai dengan cakupan pertanyaan',
            'linkfacebook' => 'https://www.facebook.com/BadanStandardisasiNasional',
            'linktwitter' => 'https://www.twitter.com/',
            'linkinstagram' => 'https://www.instagram.com/',
            'webbsn' => 'https://www.bsn.go.id'
        ]);
        MasterUnggahLampiran::create([
            'nama_dokumen' =>'Scan legalitas hukum organisasi (SIUP/Akte Perusahaan)',
        ]);
        MasterUnggahLampiran::create([
            'nama_dokumen' =>'Lembar Pernyataan Tidak Terlibat Hukum Selama 3 Tahun Terakhir',
        ]);
        MasterUnggahLampiran::create([
            'nama_dokumen' =>'Sertifikat SNI yang dimiliki',
        ]);
        MasterUnggahLampiran::create([
            'nama_dokumen' =>'SK Kemenkumham (untuk organisasi Pendidikan)',
        ]);
        MasterUnggahLampiran::create([
            'nama_dokumen' =>'Sertifikat Akreditasi BAN/BAN-PT (untuk organisasi Pendidikan)',
        ]);
        MasterUnggahLampiran::create([
            'nama_dokumen' =>'Dokumen Jawaban Kriteria Penilaian SNI Award 2020',
        ]);


    }
}
