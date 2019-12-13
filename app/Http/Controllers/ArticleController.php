<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.post-article.createarticle');
    }

    public function saveCreate(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|unique:posts,title',
                'thumbnail' => 'required'

            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'thumbnail.required' => 'Bạn chưa chọn hình ảnh',
                'title.unique'   => 'Tiêu đề đã tồn tại',


            ]
        );
        $post = new Article();
        $post->fill($request->all());

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');

            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/article', $Hinh);
            $post->thumbnail = $Hinh;
        } else {
            $post->thumbnail = "";
        }
        $post->save();
        return redirect('admin/post-article/show')->with('thongbao', 'Thêm thành công');
    }

    public function update(Request $request, $id)
    {
        return view(
            'admin.post-article.updatearticle',
            [

                'post' => Article::findOrFail($id),
            ]
        );
    }
    public function saveUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
             
                
            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                

                

            ]
        );
        $post = Article::findOrFail($id);
        $post->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/article', $Hinh);
            $post->thumbnail = $Hinh;
        }
        $post->save();
        return redirect('admin/post-article/show')->with('thongbao', 'Sửa thành công');
    }

    public function show(Request $request)
    {
        return view(
            'admin.post-article.showarticle',
            [
                'posts' => Article::orderBy('id', 'DESC')->paginate(6)
            ]
        );
    }
    public function delete($id)
    {
        $post = Article::findOrFail($id);
        $post->delete();
        return redirect('admin/post-article/show')->with('thongbao', 'Xóa thành công');
    }
    public function searchArticle(Request $request)
    {
        return view(
            'admin.post-article.searcharticle',
            [

                'posts' => Article::where('title', 'like', '%' . $request->at . '%')->paginate(3)

            ]
        );
    }
}

