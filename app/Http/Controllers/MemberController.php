<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class MemberController extends Controller
{
    //
    public function addNew(){
    	return view('project.member.add_member');
    }

    public function listMember(){
    	return view('project.member.list_member');
    }

    public function detailMember($id){
    	return view('project.member.detail_member');
    }
}
