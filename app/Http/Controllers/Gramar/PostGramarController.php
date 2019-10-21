<?php

namespace App\Http\Controllers\Gramar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use DB;
use Str;
class PostGramarController extends Controller
{
    public function create(Request $request)
    {
        return view(
            'admin.postgramar.createpostgramar',
            [
                'topics' => Topic::all()
            ]
        );
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
        $postgramar = new Post();
        $postgramar->fill($request->all());

        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');

            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/gramar', $Hinh);
            $postgramar->thumbnail = $Hinh;
        } else {

            $postgramar->thumbnail = "";
        }
        $postgramar->save();
        return redirect('admin/postgramar/show')->with('thongbao', 'Thêm thành công');
    }
    public function update(Request $request, $id)
    {
        return view(
            'admin.postgramar.updatepostgramar',
            [

                'postgramar' => Post::findOrFail($id),
                'topics' => Topic::all()
            ]
        );
    }

    public function saveUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'thumbnail' => 'required'
                
            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'thumbnail.required' => 'Bạn chưa chọn hình ảnh',

                

            ]
        );
        $postgramar = Post::findOrFail($id);
        $postgramar->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/gramar', $Hinh);
            $postgramar->thumbnail = $Hinh;
        }
        $postgramar->save();
        return redirect('admin/postgramar/show')->with('thongbao', 'Sửa thành công');
    }

    public function show(Request $request)
    {
        $postgramar = DB::table('topics')
        ->join('posts', 'topics.id', '=', 'posts.topic_id')
        ->select('*')
        ->where('topics.category_id', 2)
        ->orderBy('posts.id','DESC')
        ->paginate(6);
        return view(
            'admin.postgramar.showpostgramar',
            [
                'postgramars' => $postgramar

            ]
        );
    }

    public function delete($id)
    {
        $gramar =  Post::findOrFail($id);
        $gramar->delete();
        return redirect('admin/postgramar/show')->with('thongbao', 'Xóa thành công');
    }
    public function searchPostGramar(Request $request)
    {
        return view(
            'admin.postgramar.searchpostgramar',
            [

                'postgramar' => Post::where('title', 'like', '%' . $request->pt . '%')->paginate(3)

            ]
        );
    }
}
