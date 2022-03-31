<?php 

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class HomeRepository 
{
    public $totalNilaiPerResponden;

    public function totalNilaiPerResponden()
    {
        $this->totalNilaiPerResponden = DB::table('ipnbk_result')
            ->join('ipnbk_answer', 'ipnbk_result.answer_id', '=', 'ipnbk_answer.id')
            ->join('ipnbk_question', 'ipnbk_result.question_id', '=', 'ipnbk_question.id')
            ->select('ipnbk_result.responden_id', 'ipnbk_result.question_id', 'ipnbk_answer.answer', 'ipnbk_answer.nilai', 'ipnbk_question.question')
            ->groupBy('ipnbk_result.responden_id')
            ->groupBy('ipnbk_result.question_id')
            ->get();

        return $this;
    }

    public function totalNilaiPerPertanyaan()
    {
        $this->totalNilaiPerResponden();

        return $this->totalNilaiPerResponden->groupBy('question_id')->values()->map(function($jawaban){

            $avg = $jawaban->map(function($test){
                return $test->nilai;
            })->avg();

            return [
                $jawaban->first()->question,
                $avg
            ];
        });
    }

    public function jumlahPertanyaan()
    {
        return $this->totalNilaiPerResponden()->totalNilaiPerPertanyaan()->count();
    }

    public function nilaiRata()
    {
        return $this->totalNilaiPerPertanyaan()->avg([1]) * 25; 
    }

    public function nilaiKonversi()
    {
        if ($this->nilaiRata() <= 44) {
             return 'D (Tidak Baik)';
        } elseif ($this->nilaiRata() <= 63) {
             return 'C (Kurang Baik)';
        } elseif ($this->nilaiRata() <= 82) {
             return 'B (Baik)';
        } else {
            return 'A (Sangat Baik)';
        }
    }
}