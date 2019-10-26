<?php

namespace App\Http\Controllers\Listening;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Str;
use App\Models\Category;
class ListeningController extends Controller
{
    public function index(){ 
        
        $topics = Topic::where('category_id', '=', 3)->orderBy('id', 'DESC')->paginate(6);

        return view(
            'admin.listening.danh_sach_chu_de',
            [
                'topics' => $topics

            ]
        );
    }
    public function getAllPost(){
        return view('admin.listening.danh_sach_bai_viet');
    }
    public function addTopic(){
        return view('admin.listening.them_moi_chu_de'); 
    }
    public function createTopic(Request $request){
        $request->validate(
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

            $topic->thumbnail = "";
        }
        $topic->save();
        return redirect('admin/listening/add-topic')->with('thongbao', 'Thêm thành công');
    }
    public function showTopic(Request $request, $id)
    {
        return view(
            'admin.listening.cap_nhat_chu_de',
            [

                'topic' => Topic::where('id', '=', $id)->where('category_id','=','3')->first(),
            ]
        );
    }
    public function updateTopic(Request $request, $id){
        $request->validate(
            [
                'title'     => 'required',
            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
            ]
        );
        $topic = Topic::find($id);
        $topic->fill($request->all());
        $topic->category_id = 3;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/listening', $Hinh);
            $topic->thumbnail = $Hinh;
        }
        $topic->save();
        return redirect('admin/listening/update-topic/'.$id)->with('thongbao', 'Cập nhật thành công');
    }
    public function deleteTopic($id)
    {
        $listening =  Topic::findOrFail($id);
        $listening->delete();
        return redirect('admin/listening')->with('thongbao', 'Xóa thành công');
    }
    public function searchTopic(Request $request)
    {

        return view(
            'admin.listening.tim_kiem_chu_de',
            [
                'topics' => Topic::where('title', 'like', '%' . $request->tl . '%')
                           ->where('category_id',3)
                           ->paginate(6)

            ]
        );
    }

}
