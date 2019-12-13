<?php

namespace App\Http\Controllers\Toiec;

use App\Http\Controllers\Controller;
use App\Models\ToeicExam;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ToeicPart;
use Illuminate\Support\Facades\DB;
class ToeicPartController extends Controller
{
	public function update(Request $request, $id)
	{
		return view(
			'admin.toeic-exam.updatetoeicpart',
			[

				'toeicpart' => ToeicPart::findOrFail($id)

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
		$gramar = ToeicPart::findOrFail($id);
		$gramar->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/image', $Hinh);
            $gramar->thumbnail = $Hinh;
        }
		$gramar->save();
		return redirect('toeic-part')->with('thongbao', 'Sửa thành công');
	}

	public function show( $id_exam, Request $request)
	{
		// $exam = DB::table('toeic_questions')
		// ->join('toeic_parts', 'toeic_parts.id', '=', 'toeic_questions.toeic_part_id')
		// ->join('toeic_exams', 'toeic_exams.id', '=', 'toeic_questions.toeic_exam_id')
		// ->select('toeic_parts.*','toeic_exams.id as idexam') 
		// ->paginate(8);
		

		return view(

			'admin.toeic-exam.showtoeicpart',
			[

				'toeicparts' => ToeicPart::paginate(8),
				
				'id_exam'    => $id_exam

			]
		);
	}
}
