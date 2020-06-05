<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function SendMessage(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required',
    		'subject' => 'required'
    	]);
    	$contact          = new Contact;
    	$contact->name    = $request->name;
    	$contact->email   = $request->email;
    	$contact->subject = $request->subject;
    	$contact->message = $request->message;
    	$contact->save();

    	Toastr::success('Message Successfully Sent! We will contact you soon','Success',["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }
}
