<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class RouteController extends Controller
{
    //
    public function addNew(){
    	return view('project.route.add_route');
    }

    public function listRoute(){
    	return view('project.route.list_route');
    }

    public function detailRoute($id){
    	return view('project.route.detail_route');
    }
}
