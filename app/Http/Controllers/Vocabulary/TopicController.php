<?php

namespace App\Http\Controllers\Vocabulary;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Hiển thị danh sách chử đề
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $getTopic = DB::table('Topics')
            ->where('category_id', 1)
            ->orderBy('id', 'DESC')
            ->paginate(6);
        return view('admin.vocabulary.show', ['data' => $getTopic]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Hiển thị trang nhập chủ đề
     */
    public function getCreate()
    {
        $getCate = DB::table('categories')
            ->get();
        return view('admin.vocabulary.create', ['data' => $getCate]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Lưu danh sách chủ đề
     */
    public function postCreate(Request $request)
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
        $topic = new Topic();
        $topic->fill($request->all());

        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');

            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/gramar', $Hinh);
            $topic->thumbnail = $Hinh;
        } else {

            $topic->thumbnail = "";
        }
        $topic->save();
        return redirect('admin/vocabulary')->with('thongbao', 'Thêm thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Hiển thị form sửa chủ đề
     */
    public function getUpdate($id){

        $getTopic = Topic::find($id);
        $getCate = Category::all();
        return view('admin.vocabulary.update',['topic'=>$getTopic,'cate'=>$getCate]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Thực hiện sửa chủ đề
     */
    public function  postUpdate(Request $request, $id){
        $request->validate(
            [
                'title'     => 'required|unique:topics,title',
            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'title.unique'   => 'Tiêu đề đã tồn tại',
            ]
        );

        $topic = Topic::findOrFail($id);
        $topic->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '----' . $name;
            $file->move('uploads/gramar', $Hinh);
            $topic->thumbnail = $Hinh;
        }
        $topic->save();
        return redirect('admin/vocabulary')->with('thongbao', 'Sửa thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Xóa chủ đề
     */
    public function delete($id){
        $topic = Topic::find($id);
        $topic->delete();
        return redirect('admin/vocabulary')->with('thongbao', 'Xóa thành công');
    }

    public function search(Request $request){
        $getTopic = DB::table('Topics')
            ->where('category_id', 1)
            ->where('id','like','%'.$request->id.'%')
            ->orderBy('id', 'DESC')
            ->paginate(6);
        return view('admin.vocabulary.show', ['data' => $getTopic]);
    }
}
