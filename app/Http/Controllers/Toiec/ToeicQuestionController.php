<?php

namespace App\Http\Controllers\Toiec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToeicExam;
use App\Models\ToeicPart;
use App\Models\ToeicQuestion;
use App\Models\ToeicAnswer;
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
                'toeicexams' => ToeicExam::all(),
                'toeicparts' => ToeicPart::all(),
                'toeicexamtow'  => $toeicexam,
                'toeicparttow' => $toeicpart

            ]
        );
    }
    public function saveCreate(Request $request, $id, $type)
    {
        // $request->validate(
        //     [
        //         'title'     => 'required|unique:toeic_exams,title',
        //         'description' => 'required',

        //     ],
        //     [
        //         'title.required' => 'Bạn chưa nhập tiêu đề',
        //         'title.unique'   => 'Tiêu đề đã tồn tại',

        //         'description.required' => 'Bạn chưa nhập nội dung'
        //     ]
        // );
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
                'toeicexams' => ToeicExam::all(),
                'toeicparts' => ToeicPart::all()

            ]
        );
    }
    public function saveUpdate(Request $request, $id, $type, $time)
    {
        // $request->validate(
        //     [
        //         'title'     => 'required',
        //         'description' => 'required',
        //     ],
        //     [
        //         'title.required' => 'Bạn chưa nhập tiêu đề',
        //         'description.required' => 'Bạn chưa nhập nội dung'
        //     ]
        // );


        $toiecquestion = ToeicQuestion::findOrFail($time);
        $toiecquestion->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('uploads/toeic', $Hinh);
            $toiecquestion->thumbnail = $Hinh;
            $toiecquestion->save();
            return redirect('admin/toeic-question/' . $toiecquestion->toeic_part_id . '/' . $toiecquestion->toeic_exam_id)->with('thongbao', 'Sửa thành công');
        }
    }
    public function delete($id, $type, $time)
    {
        $toiecquestion = ToeicQuestion::findOrFail($time);
        $toiecquestion->delete();
        return redirect()->back()->with('thongbao', 'Xóa thành công');
    }
}
