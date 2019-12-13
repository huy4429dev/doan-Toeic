<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function create(){
        $myContacts = null;
        if(Session::has('user')){
            $myContacts = Contact::where('student_id', Session::get('user')->id)->get();
        }
        $allContact = Contact::orderBy('id','desc')->take(10)->get();
        return view('contact',[
            'myContacts' => $myContacts,
            'allContact' => $allContact
        ]);
    }
    public function addContact(Request $request){
        $data = [ 
            'title'      => $request->title,
            'content'    => $request->content,
            'student_id' => $request->student_id,
            'view'       => false
        ];
        $contact = Contact::create($data);
        if($contact){
            return back()->with('status', 'Gửi câu hỏi thành công !');
        }
        return back()->with('status', 'Vui lòng thử lại !');
    }
    public function detail($id){
        $contact = Contact::find($id); 
        $contact->view = 1;
        $contact->save();
        // print_r($contact);
        return view('admin.contact.chi-tiet-lien-he', [
            'contact' => $contact
        ]);

    }
    public function delete($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('/admin/dashboard');
    }
    public function reply(Request $request, $id){
        $contact = Contact::find($id);
        $contact->answer = $request->reply;  
        $contact->save();
        return redirect('/admin/contact/'.$id);
    }
}
