<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class CarController extends Controller
{
    //
    public function addNew(){
    	return view('project.car.add_car');
    }

    public function listCar(){
    	return view('project.car.list_car');
    }

    public function detailCar($id){
    	return view('project.car.detail_car');
    }
}
