<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Auth;
use Mail;

use App\User as User;

class UserController extends Controller
{
    //
	public function randomvar(){
        $var = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
        $randvar = '';           
        foreach (array_rand($var, 5) as $v) {
            $randvar .= $var[$v];
        }
        $code = uniqid() . $randvar . rand(0,9) . rand(0,9);
        return $code;
    }

    public function login(Request $request){
        // $user = explode(":", $request->data);

        $verify = DB::table('customers')->where('email', $request->email)->where('password', $request->password)->first();

        if(!is_null($verify)){
            if($verify->status == 0){
                return response(['result' => 'error', 'message' => 'email is not verified yet, please check your email'], 200);
            }
            else if($verify->status == 1){
                $cars = DB::table('cars')->where('owner_id', '=', $verify->id)->where('status', '=', 1)->count('*');
                if($cars == 0){
                    return response(['result' => 'success', 'user_id' => $verify->id, 'username' => $verify->name, 'email' => $verify->email, 'epoint' => $verify->epoint, 'photo'=>$verify->photo, 'cars' => $cars], 200);
                }
                else if($cars > 0){
                    $income = DB::table('booking')->where('owner_id', '=', $verify->id)->where('book_status', '=', '3')->sum('total_price');
                    return response(['result' => 'success', 'user_id' => $verify->id, 'username' => $verify->name, 'email' => $verify->email, 'epoint' => $verify->epoint, 'photo'=>$verify->photo, 'cars' => $cars, 'total_income' => $income], 200);
                }
            }
            // return response(['success'], 200);
        }
        else{
            return response(['result' => 'error', 'message' => 'email is not registered'], 200);
        }
    }
/*
    public function login(Request $request){
        $auth = auth();

        $credentials = $request->only('email', 'password');

        if($auth->attempt($credentials)){
            $user = $auth->user();
            return response(['result' => 'success', 'id' => $user_id], 200);
        }
        else{
            return response(['result' => 'unauthorized', 'user' => $credentials['email']], 200);
        }
    }
*/

    public function signup(Request $request){

        $member = explode("|", $request->data);

        $check_email = DB::table('customers')->where('email', '=', $member[1])->first();

        if(is_null($check_email)){

            $id = $this->randomvar();

            DB::table('customers')->insert([
                "id" => $id,
                "name" => $member[0],
                "email" => $member[1],
                "phone" => $member[2],
                "password" => $member[3],
                "type" => 'member',
                "identity_status" => '1',
                "license_status" => '1'
            ]);

            DB::table('users')->insert([
                 "id" => $this->randomvar(),
                 "reference_id" => $id,
                 "username" => $member[1],
                 "name" => $member[0],
                 "email" => $member[1],
                 "password" => bcrypt($member[3]),
                 "user" => "member"
             ]);

            DB::table('document')->insert([
                "id" => $this->randomvar(),
                "reference_id" => $id,
                "type" => "license",
                "path" => $member[4],
                "filename" => $member[5]
            ]);

            DB::table('document')->insert([
                "id" => $this->randomvar(),
                "reference_id" => $id,
                "type" => "ic",
                "path" => $member[6],
                "filename" => $member[7]
            ]);

            $data = array('name' => $member[0], 'id' => $id, 'email' => $member[1]);

            Mail::send('eazy.email.regis', ['user' => $data], function($message) use ($data){
                $message->from('firdaus@entongproject.com', 'Admin EAZY');
                $message->to($data['email']);
                $message->subject('Account Verification');
            });

            return response(['result' => 'success', "message" => "Register account success"], 200);

        }
        else{
            return response(['result' => 'error', 'message' => 'Email is registered already'], 200);

        }
    }

    public function acc_verify($id){

        DB::table('customers')
            ->where('id','=', $id)
            ->update([
                'status'=>1, 
                'updated_at' => date('Y-m-d H:i:s', time())
            ]);

        DB::table('users')
            ->where('reference_id','=', $id)
            ->update([
                'status'=>1, 
                'updated_at' => date('Y-m-d H:i:s', time())
            ]);

        $user = DB::table('customers')->where('id', '=', $id)->first();

        return view('eazy.general.account_verify', ['user' => $user]);
    }

    public function guest_regis(Request $request){

        $guest = explode(":", $request->data);

    	$guest_id = $this->randomvar();

        /*
    	$check_upload = DB::table("document")->where("reference_id", '=', $guest_id)->first();

    	if(is_null($check_upload)){
            $this->uploadfile($guest_id);
            
            DB::table("guest")->insert([
                "id" => $guest_id,
                "name" => $request->name,
                "phone" => $request->phone,
                "email" => $request->email,
                "identity_status" => 1
            ]);

    	}
    	else{
    		
            DB::table("guest")->insert([
                "id" => $guest_id,
                "name" => $request->name,
                "phone" => $request->phone,
                "email" => $request->email,
                "identity_status" => 1
            ]);
    	}
        */
        $insert = DB::table("customers")->insert([
                "id" => $guest_id,
                "name" => $guest[0],
                "email" => $guest[1],
                "phone" => $guest[2],
                "type" => 'guest'
        ]);

        return response(['result' => 'success', 'guest_id' => $guest_id], 200);
    }

    function uploadfile($guest_id){

    	$identity = $request->file("ID")->getClientOriginalExtension();
    	$identity_file = uniqid().'_'.time().'_'.$identity;

    	$dir = 'upload/';
    	$request->file("ID")->move($dir, public_path($identity_file));

    	DB::table('document')->insert([
            'id' => $this->randomvar(),
            'contract_id' => $guest_id,
            'type' => "guest identity",
            'path' => public_path('upload/'.$identity_file),
            'filename' => $identity_file
            ]);
    }

    public function callProfile(Request $request){

        $member = DB::table("customers")->where('id', '=', $request->data)->first();

        if(!is_null($member)){
            return response(['result' => 'success', 'member' => $member], 200);
        }
        else{
            return response(['result' => 'error', 'message' => 'Member is not found'], 200);
        }
    }

    public function editPhoto(Request $request){

        $m = explode("|", $request->data);

        DB::table('customers')->where('id', '=', $m[2])
            ->update([
                'photo' => $m[0],
                'updated_at' => date('Y-m-d H:i:s', time())
            ]);

        $url = DB::table('customers')->where('id', '=', $m[2])->first();

        return response(['result' => 'photo updated', 'url' => $url->photo], 200);
    }

    public function editProfile(Request $request){

        $member = explode(":", $request->data);

        DB::table('customers')->where('id', '=', $member[0])
            ->update([
                'name' => $member[1],
                'phone' => $member[2],
                'email' => $member[3],
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return response(['result' => 'success', 'message' => 'Profile Updated'], 200);
    }

    public function editPassword(Request $request){

        $member = explode(":", $request->data);

        $check_password = DB::table("customers")->where('id', '=', $member[0])->where('password', '=', $member[1])->first();

        if(!is_null($check_password)){
            DB::table('customers')->where('id', '=', $member[0])
                ->update([
                    'password' => $member[2],
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            return response(['result' => 'success', 'message' => 'Password Updated'], 200);   
        }
        else{
            return response(['result' => 'error', 'message' => 'Wrong Password'], 200);
        }

    }

    public function checkWallet(Request $request){
        $epoint = DB::table('customers')->where('id', '=', $request->data)->first();

        return response(['result' => 'success', 'epoint' => $epoint->epoint, 'name' => $epoint->name, 'email' => $epoint->email], 200);
    }

    public function uploadProfpict(Request $request){
        
        // $profile = explode(":", $request->data);

        // if ($request->file($request->data))
        // {

        //     // $identity = $request->file($profile[1])->getClientOriginalExtension(); // getting image extension
        //     // $identity_file = uniqid() . '_' . time() . '.' . $identity;

        //     // $dir = 'images/profile/';
        //     // $request->file($profile[1])->move($dir, public_path($identity_file));

        //     // DB::table('document')->insert([
        //     //     'id' => $this->randomvar(),
        //     //     'reference_id' => $profile[0],
        //     //     'type' => "guest identity",
        //     //     'path' => public_path('http://new.entongproject.com/images/profile/'.$file_verifikasi),
        //     //     'filename' => $file_verifikasi
        //     //     ]);
        //     return response(['result'=>'success'], 200);
        // }
        // else return response(['result'=>'file not found'], 200);
        
        return response(['result'=> "response", "message" => $request->data], 200);

        /*
        if ($request->file('file'))
        {
            $id = $request->id;

            $verifikasi = $request->file('file')->getClientOriginalExtension(); // getting image extension
            $file_verifikasi = uniqid() . '_' . time() . '.' . $verifikasi;

            $dir = 'images/profile/';
            $request->file('file')->move($dir, public_path($file_verifikasi));

            DB::table('document')->insert([
                'id' => $this->randomvar(),
                'reference_id' => $request->id,
                'type' => "guest identity",
                'path' => public_path('http://new.entongproject.com/images/profile/'.$file_verifikasi),
                'filename' => $file_verifikasi
                ]);

            return 1;
        }
        else return 0;
        */

    }

    public function admin_list_user(){
        $users = DB::table('customers')->get();
        return view('eazy.admin.user.list_user', ['users' => $users]);
    }

    public function admin_new_user(){
        return view('eazy.admin.user.new_user');
    }

    public function admin_detail_user($id){
        $profile = DB::table('customers')
                ->leftjoin('cars', 'cars.owner_id', '=', 'customers.id')
                ->leftjoin('booking', 'booking.owner_id', '=', 'customers.id')
                ->select('customers.*', DB::raw('COUNT(booking.id) as trips'), DB::raw('COUNT(cars.id) as car'))
                ->groupby('booking.owner_id')
                ->groupby('cars.owner_id')
                ->where('customers.id', '=', $id)
                ->first();

        $cars = DB::table('cars')
            ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
            ->select('cars.*', DB::raw('COUNT(booking.id) as trips'))
            ->groupby('booking.car_id')
            ->where('cars.owner_id', '=', $id)
            ->get();

        $book_success = DB::table('booking')->where('booking.owner_id', '=', $id)->where('booking.book_status', '=', '4')->count('*');


        return view('eazy.admin.user.detail_user', ['profile' => $profile, 'cars'=>$cars, 'book_success'=>$book_success]);
    }

    public function admin_id_user($id){
        $photo = DB::table('document')->where('reference_id', '=', $id)->where('type', '=', 'ic')->first();
        $user = DB::table('customers')->where('id', '=', $id)->first();

        $modal = '
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i>
                    <h4 class="modal-title" id="myModalLabel">'.$user->name.' Identity</h4>
                </div>
                <div class="modal-body text-center">
                    <img id="ic-img" src="'. $photo->path .'" alt="'. $photo->type .'"/>
                </div>
            </div>
        </div>
        ';

        return $modal;
    }

    public function admin_license_user($id){

    }
}
