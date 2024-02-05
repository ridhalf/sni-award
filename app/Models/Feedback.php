<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Feedback extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function getFeedback($peserta_id,$evaluator_id)
    {
        $ret_val =  DB::table('feedback')
                ->where('peserta_id', $peserta_id)
                ->where('evaluator_id',$evaluator_id)
                ->orderByDesc('created_at')
                ->first(); 
        return $ret_val;
    }

    public function getFeedbackWithStatus($peserta_id)
    {
        $ret_val = DB::table('feedback')
                ->join('evaluator', 'evaluator.user_id', '=', 'feedback.evaluator_id')
                ->select('feedback.*','evaluator.nama_lengkap')
                ->where('peserta_id', $peserta_id)
                ->where('feedback.status',1)
                ->orderByDesc('created_at')
                ->get();
        return $ret_val;
    }
    public function oldFeedback($peserta_id)
    {
        $ret_val = DB::table('feedback')
                ->join('evaluator', 'evaluator.user_id', '=', 'feedback.evaluator_id')
                ->select('feedback.*','evaluator.nama_lengkap')
                ->where('peserta_id', $peserta_id)
                ->where('feedback.status',0)
                ->orderByDesc('created_at')
                ->get();
        return $ret_val;
    }

	public function updateStatusFeedback($peserta_id)
    {
        $ret_val = DB::table('feedback')
                ->where('peserta_id', $peserta_id)
                ->where('status', 1)
                ->update(['status' => 0]);
        return $ret_val;
    }

}
