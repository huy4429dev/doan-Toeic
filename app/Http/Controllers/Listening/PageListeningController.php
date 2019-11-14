<?php

namespace App\Http\Controllers\Listening;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;

class PageListeningController extends Controller
{
    public function topicDetail($id)
    {
        $topics    = Topic::where('category_id','3')->get();
        $topicName = Topic::find($id)->title;
        $posts     = Topic::find($id)->posts;   
        return view('listening.chi_tiet_chu_de', [
            'topics'    => $topics,
            'topicName' => $topicName,
            'posts'     => $posts
        ]);
    }
    public function getAnswer(Request $request, $id)
    {
        $answer = Post::find($id)->answer;
        if ($request->answer === $answer) {
            return response([
                'success' => 'Đáp án chính xác !',
                'level'   => Post::find($id)->level
            ]);
        } else {
            return response(['error' => 'Đáp án chưa chính xác, hãy thử nghe lại thật kỹ và đưa ra một đáp án khác !']);
        }
    }
}
