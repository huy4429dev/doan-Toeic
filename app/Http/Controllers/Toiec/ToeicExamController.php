<?php

namespace App\Http\Controllers\Toiec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToeicExam;
use App\Models\Topic;
use Illuminate\Support\Str;

class ToeicExamController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.toeic-exam.createtoeicexam');
    }
    public function saveCreate(Request $request)
    {
        $request->validate(
            [
                'title'     => 'required|unique:toeic_exams,title',
                'description' => 'required',

            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'title.unique'   => 'Tiêu đề đã tồn tại',

                'description.required' => 'Bạn chưa nhập nội dung'
            ]
        );
        $toeicexam = new ToeicExam();
        $toeicexam->fill($request->all());
        if ($request->hasFile('audio')) {
            $file  = $request->file('audio');
            $name  = $file->getClientOriginalName();
            $audio = Str::random(4) . '----' . $name;
            $file->move('uploads/toeic', $audio);
            $toeicexam->audio = $audio;
        } else {

            $toeicexam->audio = "";
        }
       
        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('uploads/toeic', $Hinh);
            $toeicexam->thumbnail = $Hinh;
        } else {

            $toeicexam->thumbnail = "";
        }
        $toeicexam->save();
        return redirect('admin/toeic-exam/show')->with('thongbao', 'Thêm thành công');
    }

    public function update(Request $request, $id)
    {
        return view(
            'admin.toeic-exam.updatetoeicexam',
            [

                'toeicexam' => ToeicExam::findOrFail($id)

            ]
        );
    }
    public function saveUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title'     => 'required',
                'description' => 'required',
            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'description.required' => 'Bạn chưa nhập nội dung'
            ]
        );
        $toeicexam = ToeicExam::findOrFail($id);
        $toeicexam->update($request->all());
        if ($request->hasFile('audio')) {
            $file  = $request->file('audio');
            $name  = $file->getClientOriginalName();
            $audio = Str::random(4) . '----' . $name;
            $file->move('uploads/toeic', $audio);
            $toeicexam->audio = $audio;
        }
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '--' . $name;
            $file->move('uploads/toeic', $Hinh);
            $toeicexam->thumbnail = $Hinh;
        }
        $toeicexam->save();
        return redirect('admin/toeic-exam/show')->with('thongbao', 'Sửa thành công');
    }

    public function show(Request $request)
    {
        return view(
            'admin.toeic-exam.showtoeicexama',
            [
                'toeicexams' => ToeicExam::orderBy('id', 'DESC')->paginate(6)
            ]
        );
    }
    public function delete($id)
    {
        $toeicexam =  ToeicExam::findOrFail($id);
        $toeicexam->delete();
        return redirect('admin/toeic-exam/show')->with('thongbao', 'Xóa thành công');
    }
    public function searchExam(Request $request)
    {
        return view(
            'admin.toeic-exam.searchtoeicexam',
            [

                'toeicexams' => ToeicExam::where('title', 'like', '%' . $request->ex . '%')->paginate(6)

            ]
        );
    }
}
