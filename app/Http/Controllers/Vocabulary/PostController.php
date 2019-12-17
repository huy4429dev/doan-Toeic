<?php

namespace App\Http\Controllers\Vocabulary;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index($id)
    {
        $topic = Topic::find($id);
        if (!is_null($topic)) {
            $getPost = $topic
                ->posts()
                ->orderBy('id', 'DESC')
                ->paginate(6);
        } else {
            $getPost = [];
        }
        return view('admin.postvoca.show', ['post' => $getPost, 'topic' => $topic]);
    }

    public function getCreate($id)
    {
        $topic = Topic::find($id);
        return view('admin.postvoca.create', ['topic' => $topic, 'id' => $id]);
    }


    public function postCreate(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|unique:posts,title',
                'word_type' => 'required',
                'use' => 'required',
                'pronounce' => 'required',
                'audio' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Bạn chưa nhập tên từ vựng',
                'title.unique' => 'Bạn nhập trùng tên từ vựng',
                'word_type.required' => 'Bạn chưa chọn loại từ vựng',
                'pronounce.required' => 'Bạn chưa nhập phát âm',
                'use.required' => 'Bạn chưa nhập cách dùng từ vựng',
                'audio.required' => 'Bạn chưa nhập link âm thanh',
                'content.required' => 'Bạn chưa nhập ngữ nghĩa của từ vựng'
            ]
        );
//
        $post = new Post();
        $post->fill($request->all());
        $post->save();
        return redirect('admin/post-vocabulary/' . $request->topic_id)->with('thongbao', 'Thêm từ vựng thành công');
    }

    public function getUpdate($id)
    {
        $post = Post::find($id);
        $topic = Topic::find($post->topic_id);
        return view('admin.postvoca.update', ['post' => $post, 'topic' => $topic]);
    }

    public function postUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'word_type' => 'required',
                'use' => 'required',
                'pronounce' => 'required',
                'audio' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Bạn chưa nhập tên từ vựng',
                'word_type.required' => 'Bạn chưa chọn loại từ vựng',
                'pronounce.required' => 'Bạn chưa nhập phát âm',
                'use.required' => 'Bạn chưa nhập cách dùng từ vựng',
                'audio.required' => 'Bạn chưa nhập link âm thanh',
                'content.required' => 'Bạn chưa nhập ngữ nghĩa của từ vựng'
            ]
        );
        $post = Post::find($id);
        $post->update($request->all());
        $post->save();
        return redirect('admin/post-vocabulary/' . $request->topic_id)->with('thongbao', 'Sửa từ vựng thành công');
    }


    public function delete($id)
    {
        $post = Post::find($id);
        $topic_id = $post->topic_id;
        $post->delete();
        return redirect('admin/post-vocabulary/' . $topic_id)->with('thongbao', 'Xóa từ vựng thành công');
    }

    public function search(Request $request, $id)
    {
        $topic = Topic::find($id);
        if (!is_null($topic)) {
            $getPost = $topic
                ->posts()
                ->where('id', 'like', '%' . $request->id . '%')
                ->orderBy('id', 'DESC')
                ->paginate(6);
        } else {
            $getPost = [];
        }
        return view('admin.postvoca.show', ['post' => $getPost, 'topic' => $topic, 'id' => $request->id]);
    }
}
