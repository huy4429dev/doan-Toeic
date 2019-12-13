<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $contacts = Contact::orderBy('id','desc')->paginate(15);
        /**
         * Số thứ tự 
         */
        $id = $request->page ?? 1;
        $id = ($id - 1) * 15 + 1;
        return view(
            'dashboard',
            [
                'contacts' => $contacts,
                'id'       => $id

            ]
        );
    }
}
