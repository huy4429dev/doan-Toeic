<?php

namespace App\Http\Controllers\Gramar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use DB;
class pagesGramarController extends Controller
{
    public function showGramar(Request $request){
        
        $gramar =   DB::table('topics')->where('category_id', '=', 2)->get();
        $garamar1 = DB::table('topics')->where('category_id', '=', 2)->where('level','=',1)->get();
        $garamar2 = DB::table('topics')->where('category_id', '=', 2)->where('level','=',2)->get();
        $garamar3 = DB::table('topics')->where('category_id', '=', 2)->where('level','=',3)->get();
        $garamar4 = DB::table('topics')->where('category_id', '=', 2)->where('level','=',4)->get();
        $garamar5 = DB::table('topics')->where('category_id', '=', 2)->where('level','=',5)->get();
        return view(
            'admin.gramar.pagegramar',
            [
                'gramarsLevel1' => $garamar1,
                'gramarsLevel2' => $garamar2,
                'gramarsLevel3' => $garamar3,
                'gramarsLevel4' => $garamar4,
                'gramarsLevel5' => $garamar5,
                'all'           => $gramar    
            ]
        );
    }
    public function detailGramar($id){
        $post =  Post::where('topic_id', $id)->first();
        return view(
            'admin.postgramar.pagepostgramar',
            [
                'detailgramars' => $post
            ]
        );
    }
    
 
}
