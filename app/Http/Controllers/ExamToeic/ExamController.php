<?php

namespace App\Http\Controllers\ExamToeic;

use App\Http\Controllers\Controller;
use App\Models\ToeicExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ToeicHistory;
use App\Models\ToeicPara;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    public function  examList()
    {
        /**
         * Get all exam
         */
        $exams = DB::table('toeic_exams')->get();
        return view('toeic.de-thi-toeic', ['exams' => $exams]);
    }
    public function  examDetail($id)
    {
        /**
         * Get one exam by $id
         */
        $exam = DB::table('toeic_exams')->find($id);
        /**
         * Get question per Part 
         */
        $partOne =  DB::table('toeic_questions')
            ->join('toeic_answer', 'toeic_questions.id', '=', 'toeic_answer.id_question')
            ->where('toeic_exam_id', $id)
            ->where('toeic_part_id', 1)
            ->get();
        $partTwo =  DB::table('toeic_questions')
            ->join('toeic_answer', 'toeic_questions.id', '=', 'toeic_answer.id_question')
            ->where('toeic_exam_id', $id)
            ->where('toeic_part_id', 2)
            ->get();
        $partThree =  DB::table('toeic_questions')
            ->join('toeic_answer', 'toeic_questions.id', '=', 'toeic_answer.id_question')
            ->where('toeic_exam_id', $id)
            ->where('toeic_part_id', 3)
            ->get();
        $partFour =  DB::table('toeic_questions')
            ->join('toeic_answer', 'toeic_questions.id', '=', 'toeic_answer.id_question')
            ->where('toeic_exam_id', $id)
            ->where('toeic_part_id', 4)
            ->get();
        $partFive =  DB::table('toeic_questions')
            ->join('toeic_answer', 'toeic_questions.id', '=', 'toeic_answer.id_question')
            ->where('toeic_exam_id', $id)
            ->where('toeic_part_id', 5)
            ->get();
        $partSix   = ToeicPara::where('toeic_exam_id', 1)
            ->where('toeic_part_id', 6)
            ->get();
        $partSeven = ToeicPara::where('toeic_exam_id', 1)
            ->where('toeic_part_id', 7)
            ->get();


        return view('toeic.chi-tiet-de-thi-toeic', [
            'exam'      => $exam,
            'partOne'   => $partOne,
            'partTwo'   => $partTwo,
            'partThree' => $partThree,
            'partFour'  => $partFour,
            'partFive'  => $partFive,
            'partSix'   => $partSix,
            'partSeven' => $partSeven,
        ]);
    }

    public function getResult(Request $request, $idExam)
    {
        /**
         * Get exam
         */

        $exam = ToeicExam::find($idExam);

        /**
         * Get all question and answer 
         */

        $allQuestion = DB::table('toeic_questions')
            ->where('toeic_exam_id', $idExam)
            ->select('id', 'answer', 'toeic_part_id')
            ->get();

        /**
         * Get students' answer
         */

        $yourAnswer = $request->all();

        /**
         * Total question 
         */

        $totalQuestion = DB::table('toeic_questions')
            ->where('toeic_exam_id', $idExam)
            ->count();

        /**
         * Total right answer
         */

        $totalRightAnswer       = 0;
        $totalRightListenAnswer = 0;
        $totalRightReadAnswer   = 0;

        /** 
         * check right answer
         */

        foreach ($allQuestion as  $question) {
            if ($yourAnswer[$question->id] == $question->answer) {
                $totalRightAnswer++;
                switch ($question->toeic_part_id) {
                    case 1:
                        $totalRightListenAnswer++;
                        break;
                    case 2:
                        $totalRightListenAnswer++;
                        break;
                    case 3:
                        $totalRightListenAnswer++;
                        break;
                    case 4:
                        $totalRightListenAnswer++;
                        break;
                    case 5:
                        $totalRightReadAnswer++;
                        break;
                    case 6:
                        $totalRightReadAnswer++;
                        break;
                    case 7:
                        $totalRightReadAnswer++;
                        break;
                }
            }
        }

        /**
         *  Get score listening
         */

        if ($totalRightListenAnswer <= 5) {
            $score = 5;
        } else if ($totalRightListenAnswer <=  30) {
            $score = ($totalRightListenAnswer - 5) * 5;
        } else if ($totalRightListenAnswer <=  39) {
            $score = ($totalRightListenAnswer - 5) * 5 + 5;
        } else if ($totalRightListenAnswer <=  43) {
            $score = ($totalRightListenAnswer - 5) * 5 + 10;
        } else if ($totalRightListenAnswer <= 44) {
            $score = ($totalRightListenAnswer - 5) * 5 + 15;
        } else if ($totalRightListenAnswer <= 45) {
            $score = ($totalRightListenAnswer - 5) * 5 + 20;
        } else if ($totalRightListenAnswer <=  57) {
            $score = ($totalRightListenAnswer - 5) * 5 + 25;
        } else if ($totalRightListenAnswer <=  57) {
            $score = ($totalRightListenAnswer - 5) * 5 + 25;
        } else if ($totalRightListenAnswer <=  69) {
            $score = ($totalRightListenAnswer - 5) * 5 + 30;
        } else if ($totalRightListenAnswer <=  74) {
            $score = ($totalRightListenAnswer - 5) * 5 + 35;
        } else if ($totalRightListenAnswer <=  79) {
            $score = ($totalRightListenAnswer - 5) * 5 + 40;
        } else if ($totalRightListenAnswer   <= 84) {
            $score = ($totalRightListenAnswer - 5) * 5 + 45;
        } else if ($totalRightListenAnswer <=  87) {
            $score = ($totalRightListenAnswer - 5) * 5 + 50;
        } else if ($totalRightListenAnswer <=  92) {
            $score = ($totalRightListenAnswer - 5) * 5 + 55;
        } else {
            $score = 495;
        }

        /** 
         *  Get score reading
         */

        $configReadScore = [
            'level_1'  => '0->8'     /* score = 5                   */,
            'level_2'  => '9->24'    /* score =  Total - 8 * 5      */,
            'level_3'  => '25->27'   /* score =  Total - 8 * 5 + 5  */,
            'level_4'  => '28->38'   /* score =  Total - 8 * 5 + 10 */,
            'level_5'  => '39->42'   /* score =  Total - 8 * 5 + 15 */,
            'level_6'  => '43->46'   /* score =  Total - 8 * 5 + 20 */,
            'level_7'  => '47->51'   /* score =  Total - 8 * 5 + 25 */,
            'level_8'  => '52->54'   /* score =  Total - 8 * 5 + 30 */,
            'level_9'  => '55->63'   /* score =  Total - 8 * 5 + 35 */,
            'level_10' => '64->81'   /* score =  Total - 8 * 5 + 40 */,
            'level_11' => '82->88'   /* score =  Total - 8 * 5 + 35 */,
            'level_12' => '89->91'   /* score =  Total - 8 * 5 + 40 */,
            'level_13' => '92->93'   /* score =  Total - 8 * 5 + 45 */,
            'level_14' => '94->97'   /* score =  Total - 8 * 5 + 50 */,
            'level_15' => '98->100'  /* score = 495                 */,
        ];

        if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_1'], strpos($configReadScore['level_1'], '>') + 1))) {
            $scoreRead = 5;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_2'], strpos($configReadScore['level_2'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_3'], strpos($configReadScore['level_3'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 5;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_4'], strpos($configReadScore['level_4'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 10;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_5'], strpos($configReadScore['level_5'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 15;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_6'], strpos($configReadScore['level_6'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 20;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_7'], strpos($configReadScore['level_7'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 25;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_8'], strpos($configReadScore['level_8'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 30;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_9'], strpos($configReadScore['level_9'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 35;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_10'], strpos($configReadScore['level_10'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 40;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_11'], strpos($configReadScore['level_11'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 35;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_12'], strpos($configReadScore['level_12'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 40;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_13'], strpos($configReadScore['level_13'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 45;
        } else if ($totalRightReadAnswer  <= intval(substr($configReadScore['level_14'], strpos($configReadScore['level_14'], '>') + 1))) {
            $scoreRead = ($totalRightReadAnswer - 8) * 5 + 50;
        } else {
            $scoreRead = 495;
        }


        $result = $totalRightAnswer . '/' . $totalQuestion;

        $history = [
            'result'        => $result,
            'toeic_exam_id' => $idExam,
            'student_id'    => Session::get('user')->id
        ];
        $history = ToeicHistory::create($history);

        return view('toeic.ket-qua-test-toeic', [
            'exam'                => $exam,
            'history'             => $history,
            'totalScore'          => $result,
            'listening'           => $score,
            'reading'             => $scoreRead,
            'totalRightListening' => $totalRightListenAnswer,
            'totalRightReading'   => $totalRightReadAnswer,
        ]);
    }
}
