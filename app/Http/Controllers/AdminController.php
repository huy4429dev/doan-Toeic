<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
class AdminController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $skills = explode(" ", $user->skill);
        $skills = User::Skills($skills);
        return view('admin.profile', [
            'user'   => $user,
            'skills' => $skills
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'bail|required|max:191|min:3',
            'email'     => 'required',
            'phone'     => 'required|min:9|numeric',
            'skill'     => 'required',
            'position' => 'required',
            'password'  => 'nullable|min:8'
        ]);

        $user = User::find($id);
        /*
        * get new password
        */
        if ($request->password == null) {
            $password = $user->getAuthPassword();
        } else {
            $password = Hash::make($request->password);
        }
        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->password   = $password;
        $user->phone      = $request->phone;
        $user->address    = $request->address;
        $user->slogan     = $request->slogan;
        $user->skill      = $request->skill;
        $user->education  = $request->education;
        $user->position   = $request->position;
        $user->save();
        sleep(0.5);
        return redirect()->back()->with('status', 'Cập nhật thành công !');
    }
}
