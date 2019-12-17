<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function detail($id)
    {
        $blogDetail = Article::find($id);
        return view('blog.blog-detail',
            [
                'blogDetail' => $blogDetail
            ]);
    }

    public function all()
    {
        return view('blog.blog', ['blog' => Article::all()]);
    }
}
