<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
    	$contacts = Contact::orderBy('id','desc')->paginate(5);
    	return view('admin.contact.index',compact('contacts'));
    }
    public function show($id){
    	$contact = Contact::Find($id);
    	return view('admin.contact.show',compact('contact'));
    }
    public function destroy($id){
    	$contact = Contact::find($id);
    	$contact->delete();
    	Toastr::success('Message Deleted Successfully','Success',["positionClass"=>"toast-top-right"]);
    	return redirect()->back();
    }
}
