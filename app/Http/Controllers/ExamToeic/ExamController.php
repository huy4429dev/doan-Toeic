<?php

namespace App\Http\Controllers\ExamToeic;

use App\Http\Controllers\Controller;
use App\Models\ToeicExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ToeicHistory;
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
        $partSix = DB::table('toeic_questions')
            ->join('toeic_answer', 'toeic_questions.id', '=', 'toeic_answer.id_question')
            ->where('toeic_exam_id', $id)
            ->where('toeic_part_id', 6)
            ->get();
        $partSeven = DB::table('toeic_questions')
            ->join('toeic_answer', 'toeic_questions.id', '=', 'toeic_answer.id_question')
            ->where('toeic_exam_id', $id)
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
            ->select('id', 'answer')
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

        $totalRightAnswer = 0;

        /** 
         * check right answer
         */
        foreach ($allQuestion as  $question) {
            if ($yourAnswer[$question->id] == $question->answer) {
                $totalRightAnswer++;
            }
        }
        $result = $totalRightAnswer . '/' . $totalQuestion;

        $history = [ 
            'result'        => $result,
            'toeic_exam_id' => $idExam,
            'student_id'    => Session::get('user')->id
        ];
        $history = ToeicHistory::create($history);

        return view('toeic.ket-qua-test-toeic',[
            'exam'       => $exam,
            'history'    => $history,
            'totalScore' => $result
        ]);
    }
}
