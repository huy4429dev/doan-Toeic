<?php

namespace App\Http\Controllers\Vocabulary;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index($id)
    {
        $getPost = DB::table('posts')
            ->where('topic_id', $id)
            ->orderBy('id', 'DESC')
            ->paginate(6);
        return view('admin.postvoca.show', ['post' => $getPost]);
    }
}
