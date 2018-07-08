<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class GraphController extends Controller
{
    //
    public function showPurchaseGraph(){
    	return view('project.graph.purchase');
    }
}
