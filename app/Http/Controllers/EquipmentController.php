<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class EquipmentController extends Controller
{
    //
    public function addNew(){
    	return view('project.equipment.add');
    }
}
