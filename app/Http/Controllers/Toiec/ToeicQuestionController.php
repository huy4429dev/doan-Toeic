<?php

namespace App\Http\Controllers\Toiec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToeicExam;
use App\Models\ToeicPart;
use App\Models\ToeicQuestion;
use App\Models\ToeicAnswer;
use App\Models\ToeicPara;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ToeicQuestionController extends Controller
{
    public function create(Request $request, $id, $type)
    {
        $toeicpart = ToeicPart::find($id);
        $toeicexam = ToeicExam::find($type);

        return view(
            'admin.toeic-question.createtoeicquestion',
            [
                'toeicexam'   => ToeicExam::find($type),
                'toeicpart'   => ToeicPart::find($id),
                'toeicexamtow' => $toeicexam,
                'toeicparttow' => $toeicpart

            ]
        );
    }
    public function saveCreate(Request $request, $id, $type)
    {
        $request->validate(
            [
                'answer'  => 'required',
                'content' => 'required',
                'A'       => 'required',
                'B'       => 'required',
                'C'       => 'required',
                'D'       => 'required',

            ],
            [
                'answer.required'  => 'Bạn chưa chọn đáp án',
                'content.required' => 'Bạn chưa nhập nội dung',
                'A.required'       => 'Bạn chưa chọn đáp án A',
                'B.required'       => 'Bạn chưa chọn đáp án B',
                'C.required'       => 'Bạn chưa chọn đáp án C',
                'D.required'       => 'Bạn chưa chọn đáp án D',
            ]
        );
        $toiecquestion = new ToeicQuestion();
        $toiecquestion->fill($request->all());
        $toiecquestion->toeic_part_id = $id;
        $toiecquestion->toeic_exam_id = $type;
        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('uploads/toeic', $Hinh);
            $toiecquestion->thumbnail = $Hinh;
        } else {

            $toiecquestion->thumbnail = "";
        }
        $toiecquestion->save();
        $toeicanswer = new ToeicAnswer();

        $toeicanswer->fill($request->all());
        $toeicanswer->id_question = $toiecquestion->id;
        $toeicanswer->save();
        return redirect('admin/toeic-question/' . $id . '/' . $type)->with('thongbao', 'Thêm thành công');
    }
    public function show(Request $request, $id, $type)
    {

        $toiecquestion = DB::table('toeic_questions')
            ->select('*')
            ->where('toeic_part_id', $id)
            ->where('toeic_exam_id', $type)
            ->paginate(6);


        return view(

            'admin.toeic-question.showtoeicquestion',
            [
                'id'  => $id,
                'type' => $type,
                'toeicquestions' => $toiecquestion

            ]
        );
    }


    public function update(Request $request, $id, $type, $time)
    {
        
        return view(
            'admin.toeic-question.updatetoeicquestion',
            [

                'toeicquestion'  => ToeicQuestion::findOrFail($time),
                'ok'       => $id,
                'ok2'         => $type,
                'toeicexam'   => ToeicExam::find($type),
                'toeicpart'   => ToeicPart::find($id),

            ]
        );
    }
    public function saveUpdate(Request $request, $id, $type, $time)
    {
    

        $request->validate(
            [
                'answer'  => 'required',
                'content' => 'required',

            ],
            [
                'answer.required'  => 'Bạn chưa chọn đáp án',
                'content.required' => 'Bạn chưa nhập nội dung',
            ]
        );
        $toiecquestion = ToeicQuestion::findOrFail($time);
        $toiecquestion->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('uploads/toeic', $Hinh);
            $toiecquestion->thumbnail = $Hinh;
            $toiecquestion->save();
        }
        return redirect('admin/toeic-question/' . $toiecquestion->toeic_part_id . '/' . $toiecquestion->toeic_exam_id)->with('thongbao', 'Sửa thành công');

    }
    public function delete($id, $type, $time)
    {
        $toiecquestion = ToeicQuestion::findOrFail($time);
        $toiecquestion->delete();
        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }



    /**
     * Has Para
     */
    public function showHasPara(Request $request, $id, $type)
    {
        $toiecquestion = DB::table('toeic_questions')
            ->select('*')
            ->where('toeic_part_id', $id)
            ->where('toeic_exam_id', $type)
            ->paginate(6);

        return view(

            'admin.toeic-question.showtoeicquestionhaspara',
            [
                'id'  => $id,
                'type' => $type,
                'toeicquestions' => $toiecquestion

            ]
        );
    }
    public function createHasPara(Request $request, $id, $type)
    {
        $toeicpart = ToeicPart::find($id);
        $toeicexam = ToeicExam::find($type);

        $toeicpara = DB::table('toeic_para')
            ->select('*')
            ->where('toeic_part_id', $id)
            ->where('toeic_exam_id', $type)
            ->get();
        return view(
            'admin.toeic-question.createtoeicquestionhaspara',
            [
                'toeicexam'    => ToeicExam::find($type),
                'toeicpara'    => $toeicpara,
                'toeicexamtow' => $toeicexam,
                'toeicparttow' => $toeicpart

            ]
        );
    }
    public function saveCreateHasPara(Request $request, $id, $type)
    {
        $request->validate(
            [
                'answer'  => 'required',
                'content' => 'required',
                'A'       => 'required',
                'B'       => 'required',
                'C'       => 'required',
                'D'       => 'required',

            ],
            [
                'answer.required'  => 'Bạn chưa chọn đáp án',
                'content.required' => 'Bạn chưa nhập nội dung',
                'A.required'       => 'Bạn chưa chọn đáp án A',
                'B.required'       => 'Bạn chưa chọn đáp án B',
                'C.required'       => 'Bạn chưa chọn đáp án C',
                'D.required'       => 'Bạn chưa chọn đáp án D',
            ]
        );
        $toiecquestion = new ToeicQuestion();
        $toiecquestion->fill($request->all());
        $toiecquestion->toeic_part_id = $id;
        $toiecquestion->toeic_exam_id = $type;

        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('uploads/toeic', $Hinh);
            $toiecquestion->thumbnail = $Hinh;
        } else {

            $toiecquestion->thumbnail = "";
        }
        $toiecquestion->save();
        $toeicanswer = new ToeicAnswer();

        $toeicanswer->fill($request->all());
        $toeicanswer->id_question = $toiecquestion->id;
        $toeicanswer->save();
        return redirect('admin/toeic-question-has-para/' . $id . '/' . $type)->with('thongbao', 'Thêm thành công');
    }


    public function updateHasPara(Request $request, $id, $type, $time)
    {
        $toeicpara = DB::table('toeic_para')
            ->select('*')
            ->where('toeic_part_id', $id)
            ->where('toeic_exam_id', $type)
            ->get();

        return view(
            'admin.toeic-question.updatetoeicquestionhaspara',
            [

                'toeicquestion' => ToeicQuestion::findOrFail($time),
                'ok'            => $id,
                'ok2'           => $type,
                'toeicexam'     => ToeicExam::find($type),
                'toeicpara'     => $toeicpara,


            ]
        );
    }

    public function saveUpdateHasPara(Request $request, $id, $type, $time)
    {
    

        $request->validate(
            [
                'answer'  => 'required',
                'content' => 'required',

            ],
            [
                'answer.required'  => 'Bạn chưa chọn đáp án',
                'content.required' => 'Bạn chưa nhập nội dung',
            ]
        );
        $toiecquestion = ToeicQuestion::findOrFail($time);
        $toiecquestion->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('uploads/toeic', $Hinh);
            $toiecquestion->thumbnail = $Hinh;
            $toiecquestion->save();
        }
        return redirect('admin/toeic-question-has-para/' . $toiecquestion->toeic_part_id . '/' . $toiecquestion->toeic_exam_id)->with('thongbao', 'Sửa thành công');

    }

    /**
     * Crud Para
     */

    public function showPara(Request $request, $id, $type)
    {

        $toiecpara = DB::table('toeic_para')
            ->select('*')
            ->where('toeic_part_id', $id)
            ->where('toeic_exam_id', $type)
            ->paginate(6);


        return view(

            'admin.toeic-question.showtoeicpara',
            [
                'id'  => $id,
                'type' => $type,
                'exam' => ToeicExam::find($type),
                'toeicparagraphs' => $toiecpara

            ]
        );
    }
    public function createPara(Request $request, $id, $type)
    {
        $toeicpart = ToeicPart::find($id);
        $toeicexam = ToeicExam::find($type);

        return view(
            'admin.toeic-question.createtoeicpara',
            [
                'id'  => $id,
                'type' => $type,
                'toeicexam'    => ToeicExam::find($type),
                'toeicexamtow' => $toeicexam,
                'toeicparttow' => $toeicpart
            ]
        );
    }
    public function savePara(Request $request, $id, $type)
    {
        $request->validate(
            [
                'title'   => 'required',
                'content' => 'required',
         

            ],
            [
                'title.required'   => 'Bạn chưa nhập tiêu đề',
                'content.required' => 'Bạn chưa nhập nội dung',

            ]
        );
        $toeicpara = new ToeicPara();
        $toeicpara->fill($request->all());
        $toeicpara->toeic_part_id = $id;
        $toeicpara->toeic_exam_id = $type;
        $toeicpara->save();
      
        return redirect('admin/toeic-question-has-para/para/' . $id . '/' . $type)->with('thongbao', 'Thêm thành công');
    }

    public function updatePara(Request $request, $id, $type, $time)
    {
            
        $toeicpart = ToeicPart::find($id);
        $toeicexam = ToeicExam::find($type);

        return view(
            'admin.toeic-question.updatetoeicpara',
            [

                'paragraph'    => ToeicPara::findOrFail($time),
                'ok'           => $id,
                'id'           => $id,
                'ok2'          => $type,
                'type'         => $type,
                'toeicexam'    => ToeicExam::find($type),
                'toeicexamtow' => $toeicexam,
                'toeicparttow' => $toeicpart
                

            ]
        );
    }
    public function saveUpdatePara(Request $request, $id, $type, $time)
    {
        $request->validate(
            [
                'title'   => 'required',
                'content' => 'required',
         

            ],
            [
                'title.required'   => 'Bạn chưa nhập tiêu đề',
                'content.required' => 'Bạn chưa nhập nội dung',

            ]
        );
        $toeicpara = ToeicPara::findOrFail($time);
        $toeicpara->fill($request->all());
        $toeicpara->toeic_part_id = $id;
        $toeicpara->toeic_exam_id = $type;
        $toeicpara->save();
      
        return redirect('admin/toeic-question-has-para/para/' . $id . '/' . $type)->with('thongbao', 'Thêm thành công');
    }
    public function deletePara($id, $type, $time)
    {
        $toeicpara = ToeicPara::findOrFail($time);
        $toeicpara->delete();
        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }
}

