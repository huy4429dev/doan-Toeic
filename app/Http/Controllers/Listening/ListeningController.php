<?php

namespace App\Http\Controllers\Listening;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class ListeningController extends Controller
{
    public function index(Request $request)
    {

        $topics = Topic::where('category_id', '=', 3)
            ->orderBy('id', 'DESC')
            ->paginate(6);
        return view(
            'admin.listening.danh_sach_chu_de',
            [
                'topics' => $topics

            ]
        );
    }
    public function getAllPost()
    {
        return view('admin.listening.danh_sach_bai_viet');
    }
    public function addTopic()
    {
        return view('admin.listening.them_moi_chu_de');
    }
    public function createTopic(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'     => 'required|unique:topics,title',
                'thumbnail' => 'required',


            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'thumbnail.required' => 'Bạn chưa chọn hình ảnh',
                'title.unique'   => 'Tiêu đề đã tồn tại',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $topic = new Topic();
        $topic->fill($request->all());
        $topic->category_id = 3;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/listening', $Hinh);
            $topic->thumbnail = $Hinh;
        } else {

            return response()->json(['errors' => ['Bạn chưa thêm hình ảnh']]);
        }
        $topic->save();
        sleep(0.5);
        return response()->json(['success' => 'Thêm mới thành công ']);
    }
    public function showTopic(Request $request, $id)
    {
        return view(
            'admin.listening.cap_nhat_chu_de',
            [

                'topic' => Topic::where('id', '=', $id)->where('category_id', '=', '3')->first(),
            ]
        );
    }
    public function updateTopic(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'     => 'required',
            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $topic = Topic::find($id);
        $topic->category_id = 3;
        $topic->fill($request->all());
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/listening', $Hinh);
            $topic->thumbnail = $Hinh;
        } else {
            $topic->thumbnail = Topic::find($id)->thumbnail;
        }
        $topic->save();
        sleep(0.5);
        return response()->json(['success' => 'Cập nhật thành công ', 'thumbnail' => $topic->thumbnail]);
    }
    public function deleteTopic($id, Request $request)
    {

        if ($request->ajax()) {
            $listening =  Topic::findOrFail($id);
            $listening->delete();
            $topics = Topic::where('category_id', '=', 3)
                ->orderBy('id', 'DESC')
                ->paginate(6);
            $returnHTML = view('admin.listening.table_chu_de')->with( 'topics' , $topics)->render();
            return response()->json(['success' => 'Xóa thành công', 'html'=>$returnHTML]);
        }
        $listening =  Topic::findOrFail($id);
        $listening->delete();
        return redirect('admin/listening');
    }
    public function searchTopic(Request $request)
    {

        return view(
            'admin.listening.tim_kiem_chu_de',
            [
                'topics' => Topic::where('title', 'like', '%' . $request->tl . '%')
                    ->where('category_id', 3)
                    ->paginate(6)

            ]
        );
    }
}
