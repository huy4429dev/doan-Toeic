<?php

namespace App\Http\Controllers\Listening;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use Illuminate\Support\Str;
class PostListeningController extends Controller
{
    public function index($id){
        $posts = Post::where('topic_id', '=', $id 
        )->orderBy('id', 'DESC')->paginate(6);
        return view('admin.listening.danh_sach_bai_viet',[
            'idTopic' => $id,
            'posts'   => $posts,

        ]);
    }
    public function create($id){
        $topic = Topic::find($id);
        return view('admin.listening.them_moi_bai_viet',[
            'topic' => $topic
        ]);
    }
    public function store(Request $request, $id){
        $request->validate(
            [
                'title'      => 'required|unique:topics,title',
                'audio_ques' => 'required',
                'answer'     => 'required',
                'level'      => 'required',
               
                
            ],
            [
                'title.required'      => 'Bạn chưa nhập tiêu đề',
                'audio_ques.required' => 'Bạn chưa chọn audio',
                'answer.required'     => 'Bạn chưa chọn đáp án',
                'title.unique'        => 'Tiêu đề đã tồn tại',
                'level.required'      => 'Bạn chưa chọn cấp độ',
            ]
        );
        $post = new Post();
        $post->fill($request->all());
        $post->description = $request->description;
        $post->topic_id = $id;
        if ($request->hasFile('audio_ques')) {
            $file  = $request->file('audio_ques');
            $name  = $file->getClientOriginalName();
            $audio = Str::random(4) . '----' . $name;
            $file->move('uploads/listening', $audio);
            $post->audio_ques = $audio;
        } else {

            $post->audio_ques = "";
        }
        $post->save();
        return redirect('admin/listening/topic/'.$id)->with('thongbao', 'Thêm thành công');
    }
    public function delete($id){
        $post =  Post::findOrFail($id);
        $idTopic = $post->topic_id;
        $post->delete();
        return redirect('admin/listening/topic/'.$idTopic)->with('thongbao', 'Xóa thành công');
    }
    public function edit($id){
        $post = Post::find($id);
        return view('admin.listening.cap_nhat_bai_viet',[
            'post' => $post
        ]);
    }
    public function update(Request $request,$id){
        $request->validate(
            [
                'title'      => 'required',
                'answer'     => 'required',
                'level'      => 'required',
            ],
            [
                'title.required'      => 'Bạn chưa nhập tiêu đề',
                'answer.required'     => 'Bạn chưa chọn đáp án',
                'level.required'      => 'Bạn chưa chọn cấp độ',
            ]
        );
        $post = Post::find($id);
        $post->fill($request->all());
        $post->description = $request->description;
        if ($request->hasFile('audio_ques')) {
            $file  = $request->file('audio_ques');
            $name  = $file->getClientOriginalName();
            $audio = Str::random(4) . '----' . $name;
            $file->move('uploads/listening', $audio);
            $post->audio_ques = $audio;
        } 
        $post->save();
        return redirect('admin/listening/topic/'.$post->topic_id)->with('thongbao', 'Cập nhật thành công');
    }
}
