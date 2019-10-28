<?php

namespace App\Http\Controllers\Vocabulary;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

class VocabularyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * HIển thị danh sách chủ đề
     */
    public function index()
    {
//        Lấy số dòng chủ dề từ vũng
        $topic = DB::table('topics')
            ->selectRaw('Count(id) as id')
            ->where('category_id', 1)
            ->get();
        foreach ($topic as $item) {
            $tg = $item->id;
        }
//        lấy số ngẫu nhiên từ 0->($tg-3)
        $num = rand(0, $tg - 3);
//        Hiển thị 3 chủ đề
        $limit = DB::table('topics')
            ->where('category_id', 1)
            ->skip($num)
            ->take(3)
            ->get();
//        hiển thị tất cả chủ đề
        $topic = Topic::all()->where('category_id', 1);
        return view('vocabulary.home', ['topic' => $topic, 'limit' => $limit]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Hiện danh sách từ vững của chủ đề
     */
    public function detail($id)
    {
        $topic = Topic::find($id);
        $post = DB::table('posts')
            ->where('topic_id', $id)
            ->get();
        return view('vocabulary.detail', ['post' => $post, 'topic' => $topic]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Hiện chi tiết từ vũng được chọn
     */
    public function item($id)
    {
        $post = Post::find($id);
        return view('vocabulary.itemDetail', ['post' => $post]);
    }
}
