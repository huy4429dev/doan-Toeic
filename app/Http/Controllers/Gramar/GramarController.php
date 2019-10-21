<?php

namespace App\Http\Controllers\Gramar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use DB;
use Str;

class GramarController extends Controller
{

    public function create(Request $request)
    {
        return view(
            'admin.gramar.create',
            [
                'categorys' => Category::all()
            ]
        );
    }
    public function saveCreate(Request $request)
    {
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
        $gramar = new Topic();
        $gramar->fill($request->all());

        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');

            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/gramar', $Hinh);
            $gramar->thumbnail = $Hinh;
        } else {

            $gramar->thumbnail = "";
        }
        $gramar->save();
        return redirect('admin/gramar/show')->with('thongbao', 'Thêm thành công');
    }
    public function update(Request $request, $id)
    {
        return view(
            'admin.gramar.update',
            [

                'gramar' => Topic::findOrFail($id),
                'categorys' => Category::all()
            ]
        );
    }

    public function saveUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'thumbnail' => 'required',
              
                
            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'thumbnail.required' => 'Bạn chưa chọn hình ảnh',
              
                

            ]
        );

        $gramar = Topic::findOrFail($id);
        $gramar->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/gramar', $Hinh);
            $gramar->thumbnail = $Hinh;
        }
        $gramar->save();
        return redirect('admin/gramar/show')->with('thongbao', 'Sửa thành công');
    }

    public function show(Request $request)
    {
        $garamar = DB::table('topics')->where('category_id', '=', 2)->orderBy('id', 'DESC')->paginate(6);

        return view(
            'admin.gramar.show',
            [
                'gramars' => $garamar

            ]
        );
    }

    public function delete($id)
    {
        $gramar =  Topic::findOrFail($id);
        $gramar->delete();
        return redirect('admin/gramar/show')->with('thongbao', 'Xóa thành công');
    }
    public function searchGramar(Request $request)
    {
        return view(
            'admin.gramar.search',
            [

                'gramar' => Topic::where('title', 'like', '%' . $request->tl . '%')->paginate(3)

            ]
        );
    }
}
