<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ToeicHistory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class StudentController extends Controller
{
    public function login(Request $request)
    {
        $user = Student::whereEmail($request->email)->first();
        if (!$user) {
            return response()->json(['success'=>'0']);
        }
        if (Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            return response()->json(['success'=> 1, 'username' => $user->name]);
        } else {
            return response()->json(['success'=>'0']);
        }
    }
    public function logout(Request $request){
        Session::forget('user');
        return redirect()->route('home');
    }
    public function notLogged(){
        return ' vui long dang nhap ';
    } 
    
    public function profile(){
        $histories = ToeicHistory::where('student_id', Session::get('user')->id)->get();
        return view('student-profile',['histories' => $histories]);
    }
}
