<?php

namespace App\Http\Controllers\Toiec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToeicAnswer;
use App\Models\ToeicExam;
use App\Models\ToeicPart;
use App\Models\ToeicQuestion;
use Illuminate\Support\Facades\DB;

class ToeicAnswerController extends Controller
{
    public function create(Request $request, $id)
    {
        $toeicquestion = ToeicQuestion::find($id);


        return view(
            'admin.toeic-answer.createtoeicanswer',
            [
                'toeicquestions' => ToeicQuestion::all(),
                'toeicquetiontow'  => $toeicquestion

            ]
        );
    }
    public function saveCreate(Request $request, $id)
    {
        $request->validate(
            [
                'A'     => 'required',
                'B' => 'required',
                'C' => 'required',
                'D' => 'required',

            ],
            [
                'A.required' => 'Bạn chưa nhập đáp án A',

                'B.required' => 'Bạn chưa nhập đáp án B',
                'D.required' => 'Bạn chưa nhập đáp án C',

                'D.required' => 'Bạn chưa nhập đáp án D'

            ]
        );
        $toeicanswer = new ToeicAnswer();
        $toeicanswer->fill($request->all());
        $toeicanswer->id_question = $id;
        $toeicanswer->save();
        return redirect('admin/toeic-answer/' . $id )->with('thongbao', 'Thêm thành công');
    }

    public function update(Request $request, $id)
    {
        return view(
            'admin.toeic-answer.updatetoeicanswer',
            [
                'toeicquestions'  => ToeicQuestion::all(),
                'toeicanswer' => ToeicAnswer::findOrFail($id)

            ]
        );
    }
    public function saveUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'A'     => 'required',
                'B' => 'required',
                'C' => 'required',
                'D' => 'required',

            ],
            [
                'A.required' => 'Bạn chưa nhập đáp án A',

                'B.required' => 'Bạn chưa nhập đáp án B',
                'D.required' => 'Bạn chưa nhập đáp án C',

                'D.required' => 'Bạn chưa nhập đáp án D'

            ]
        );
        $toeicanswer = ToeicAnswer::findOrFail($id);
        $toeicanswer->update($request->all());
        $toeicanswer->save();

        return redirect('admin/toeic-answer/' . $toeicanswer->id)->with('thongbao', 'Sửa thành công');
    }

    public function show(Request $request, $id)
    {

        $toiecanswer = DB::table('toeic_answer')
            ->join('toeic_questions', 'toeic_questions.id', '=', 'toeic_answer.id_question')
                    
            ->where('id_question', $id)
            ->select('toeic_answer.*', 'toeic_questions.content')
            ->first();
        return view(

            'admin.toeic-answer.showtoeicanswer',
            [
                'id'  => $id,
                'toiecanswer' => $toiecanswer

            ]
        );
    }
    public function delete($id)
    {
        $toeicanswer =  ToeicAnswer::findOrFail($id);
        $toeicanswer->delete();
        return redirect('admin/toeic-answer/' . $toeicanswer->id)->with('thongbao', 'Xóa thành công');
    }
}
