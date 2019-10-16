<?php

namespace App\Http\Controllers\Listening;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListeningController extends Controller
{
    public function index(){
        return view('listening/danh_sach_chu_de');
    }
    public function getAllPost(){
        return view('listening/danh_sach_bai_viet');
    }
    public function addTopic(){
        return view('listening/them_moi_chu_de');
    }

}
