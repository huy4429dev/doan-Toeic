<?php

namespace App\Http\Controllers\Vocabulary;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Hiển thị trang nhập từ vững
     */
    public function getCreate($id)
    {
        $topic = Topic::find($id);
        return view('admin.postvoca.create', ['topic' => $topic, 'id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Nhập từ vững mới
     */
    public function postCreate(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|unique:posts,title',
                'word_type' => 'required',
                'use' => 'required',
                'pronounce' => 'required',
                'audio' => 'required'
            ],
            [
                'title.required' => 'Bạn chưa nhập tên từ vững',
                'title.unique' => 'Bạn nhập trùng tên từ vững',
                'word_type.required' => 'Bạn chưa chọn loại từ vững',
                'pronounce.required' => 'Bạn chưa nhập phát âm',
                'use.required' => 'Bạn chưa nhập cách dùng từ vững',
                'audio.required' => 'Bạn chưa nhập link âm thanh'
            ]
        );

        $post = new Post();
        $post->fill($request->all());
        $post->save();

        return redirect('admin/post-vocabulary/' . $request->topic_id)->with('thongbao', 'Thêm từ vững thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Hiển thị trang sửa từ vững
     */
    public function getUpdate($id)
    {
        $post = Post::find($id);
        $topic = Topic::find($post->topic_id);
        return view('admin.postvoca.update', ['post' => $post, 'topic' => $topic]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Thực hiện sửa dữ liệu từ vững
     */
    public function postUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|unique:posts,title',
                'word_type' => 'required',
                'use' => 'required',
                'pronounce' => 'required',
                'audio' => 'required'
            ],
            [
                'title.required' => 'Bạn chưa nhập tên từ vững',
                'title.unique' => 'Bạn nhập trùng tên từ vững',
                'word_type.required' => 'Bạn chưa chọn loại từ vững',
                'pronounce.required' => 'Bạn chưa nhập phát âm',
                'use.required' => 'Bạn chưa nhập cách dùng từ vững',
                'audio.required' => 'Bạn chưa nhập link âm thanh'
            ]
        );
        $post = Post::find($id);
        $post->update($request->all());
        $post->save();
        return redirect('admin/post-vocabulary/' . $request->topic_id)->with('thongbao', 'Sửa từ vững thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * xóa từ vững
     */
    public function delete($id)
    {
        $post = Post::find($id);
        $topic_id = $post->topic_id;
        $post->delete();
        return redirect('admin/post-vocabulary/' . $topic_id)->with('thongbao', 'Xóa từ vững thành công');
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
