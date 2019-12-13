<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Student;
use App\Models\Post;
use App\Models\Topic;

class HomeController extends Controller
{
    public function index()
    {
        $users = Student::orderBy('score', 'desc')
            ->get();
        /**
         * Get rank user 
         */
        $userRank = 0;
        if (Session::has('user')) {

            $userRank = $users->search(function ($user) {
                return $user->id === Session::get('user')->id;
            });

            if ($userRank > 100) {
                $userRank = '> 100';
            }
            $userRank = $userRank + 1;
        }

        /**
         * Get rank top 8 people 
         */
        $users = Student::orderBy('score', 'desc')
            ->take(7)
            ->get();

        /**
         *  Get topics radom gramar
         */

        $topics = Topic::where('category_id', 2)
            ->orderBy('id', 'asc')
            ->select('id')
            ->get();
        $idTopicRandom = rand($topics->first()->id, $topics->last()->id);
        $topicGramarRandom = Topic::find($idTopicRandom);

        /**
         * Get 5 article blog new
         * 
         */
        
         $blogs = Article::orderBy('id','desc')
             ->take(5)
             ->get();

        return view('home', [
            'users'             => $users,
            'userRank'          => $userRank,
            'topicGramarRandom' => $topicGramarRandom,
            'blogs'             => $blogs,
        ]);
    }
}
