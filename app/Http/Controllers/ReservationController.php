<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'phone' => 'required',
    		'email' => 'required|email',
    		'date_and_time' => 'required'
    	]);

    	$reservation = new Reservation;
    	
    	$reservation->name = $request->name;
    	$reservation->phone = $request->phone;
    	$reservation->email = $request->email;
    	$reservation->message = $request->message;
    	$reservation->date_and_time = $request->date_and_time;
    	$reservation->status = false;
    	
    	$reservation->save();
    	Toastr::success('Reservation request sent successfully.we will confirm you shortly','Success',["positionClass" => "toast-top-right"]);
    	return redirect()->back();

    }
}
