<?php

namespace App\Http\Controllers;

use App\Models\Evaluator;
use App\Models\Feedback;
use App\Models\JadwalAcara;
use App\Models\PenugasanSe;
use App\Models\Peserta;
use App\Models\User;

class DashboardController extends Controller
{
    private $user;

    function __construct()
    {
        $this->user = new User();
        $this->feedback =  new Feedback();
        $this->jadwalAcara = new JadwalAcara();
        $this->penugasanSe = new PenugasanSe();
        $this->peserta = new Peserta();
        $this->evaluator = new Evaluator();
    }
    public function index()
    {
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        $jadwalAcara = $this->jadwalAcara->getJadwalAcara();
        if(auth()->user()->peran ==='Peserta')
        {
            $feedback = $this->feedback->getFeedbackWithStatus($id);
            $oldFeedback = $this->feedback->oldFeedback($id);
            return view('peserta.dashboard',
            [   
            'menu' => 'Beranda',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'feedback' => $feedback,
            'oldFeedback' => $oldFeedback,
            'jadwalAcara' => $jadwalAcara
            ]);
        }
        elseif (auth()->user()->peran ==='Evaluator') {
            $dataSe = $this->penugasanSe->getPenugasanByIdEvaluator($id);
            return view('evaluator.dashboard',
            [  
            'menu' => 'Beranda',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'jadwalAcara' => $jadwalAcara
            ]);
        }
        else {
            $jumlahPeserta = $this->peserta->jumlahPeserta();
            $jumlahEvaluator = $this->evaluator->jumlahEvaluator();
            return view('admin.dashboard',
            [
            'menu' => 'Beranda',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'jumlahPeserta' => $jumlahPeserta,
            'jadwalAcara' => $jadwalAcara,
            'jumlahEvaluator' => $jumlahEvaluator,
            ]);
        }
    }
}
