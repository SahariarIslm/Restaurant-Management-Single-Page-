<?php

namespace App\Http\Controllers\Admin;

use App\Reservation;
use App\Notifications\ReservationConfirmed;
use Illuminate\Support\Facades\Notification;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index(){
    	$reservations = Reservation::orderBy('id','desc')->paginate('10');
    	return view('admin.reservation.index',compact('reservations'));
    }
    public function confirm($id){
    	$reservation = Reservation::find($id);
    	$reservation->status = true;
    	$reservation->save();
        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());
    	Toastr::success('Reservation Confirmed !!!','Success',["positionClass"=>"toast-top-right"]);
    	return redirect()->back();
    }
    public function destroy($id){
    	$reservation = Reservation::find($id);
    	$reservation->delete();
    	Toastr::success('Reservation Deleted !!!','Success',["positionClass"=>"toast-top-right"]);
    	return redirect()->back();
    }
}
