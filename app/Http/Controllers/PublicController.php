<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use redirect;

class PublicController extends Controller
{
    //
    public function showLogin(){
    	return view('eazy.login');
    }

    public function dashboard(){
        $booking = null;

        if(Auth::user()->user == 'admin'){
            $booking = DB::table('booking')
                ->join('cars', 'booking.car_id', '=', 'cars.id')
                ->join('owners', 'cars.owner_id', '=', 'owners.id')
                ->leftjoin('customers', 'booking.guest_id', '=', 'customers.id')
                ->select('booking.id as book_id', 'booking.*', 'cars.name as car_name', 'customers.name as customer_name', 'cars.available')
                ->get();

            $car = DB::table('cars')
                ->join('customers', 'cars.owner_id', '=', 'customers.id')
                ->select('cars.*', 'customers.name as owner_name')
                ->get();

        return view('eazy.admin.dashboard', ['books' => $booking, 'cars' => $car]);
        }
        else if(Auth::user()->user == 'owner'){
            $booking = DB::table('booking')
                ->join('cars', 'booking.car_id', '=', 'cars.id')
                ->join('owners', 'cars.owner_id', '=', 'owners.id')
                ->leftjoin('customers', 'booking.guest_id', '=', 'customers.id')
                ->select('booking.id as book_id', 'booking.*', 'cars.name as car_name', 'customers.name as customer_name', 'cars.available')
                ->where('owners.id', '=', Auth::user()->reference_id)
                ->get();
        return view('eazy.owner.dashboard', ['books' => $booking]);
        }
    }
}
