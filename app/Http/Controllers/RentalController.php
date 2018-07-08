<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Auth;
use Redirect;
use Mail;
use App\User as User;

use App\Http\Controllers\Controller;

class RentalController extends Controller
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

    public function savedoc($id, $type, $path, $filename){
        $check_doc = DB::table('document')
                    ->where('reference_id', '=', $id)
                    ->where('type', '=',$type)
                    ->count();

        if($check_doc > 0){
            DB::table('document')
                ->where('reference_id', '=', $id)
                ->where('type', '=', $type)
                ->update(['path'=>$path, 'filename'=>$filename]);
        } 
        else if($check_doc == 0){
            $iddoc = $this->randomvar();

            DB::table('document')->insert([
                'id' => $iddoc,
                'reference_id' => $id,
                'type' => $type,
                'path' => $path,
                'filename' => $filename
                ]);
        }               
    }

    public function history(){

        if(Auth::user()->user == 'admin'){

            $books = DB::table('booking')
                    ->leftjoin(DB::raw("(SELECT * FROM customers) customer"), function($join){
                        $join->on('customer.id', '=', 'booking.guest_id');
                    })
                    ->leftjoin(DB::raw("(SELECT * FROM customers) owner"), function($join){
                        $join->on('owner.id', '=', 'booking.owner_id');
                    })
                    ->join('cars', 'booking.car_id', '=', 'cars.id')
                    ->select('booking.*', 'owner.name as owner_name', 'customer.name as customer_name', 'cars.name as car_name')
                    ->get();

            $user = 'admin';

        }
        else if(Auth::user()->user == 'owner'){

            $books = DB::table('booking')
                    ->leftjoin(DB::raw("(SELECT * FROM customers) customer"), function($join){
                        $join->on('customer.id', '=', 'booking.guest_id');
                    })
                    ->leftjoin(DB::raw("(SELECT * FROM customers) owner"), function($join){
                        $join->on('owner.id', '=', 'booking.owner_id');
                    })
                    ->join('cars', 'booking.car_id', '=', 'cars.id')
                    ->select('booking.*', 'owner.name as owner_name', 'customer.name as customer_name', 'cars.name as car_name')
                    ->where('booking.owner_id', '=', Auth::user()->reference_id)
                    ->where('booking.book_status', '<>', '0')
                    ->get();

            $user = 'owner';

        }
        else{

            $books = DB::table('booking')
                    ->leftjoin(DB::raw("(SELECT * FROM customers) customer"), function($join){
                        $join->on('customer.id', '=', 'booking.guest_id');
                    })
                    ->leftjoin(DB::raw("(SELECT * FROM customers) owner"), function($join){
                        $join->on('owner.id', '=', 'booking.owner_id');
                    })
                    ->join('cars', 'booking.car_id', '=', 'cars.id')
                    ->select('booking.*', 'owner.name as owner_name', 'customer.name as customer_name', 'cars.name as car_name')
                    ->where('booking.guest_id', '=', Auth::user()->reference_id)
                    ->where('booking.book_status', '<>', '0')
                    ->get();

            $user = 'guest';
        }

        return view('eazy.general.history', ['books'=>$books, 'user'=>$user]);
    }

    public function detail_history($id){
        
        $book = DB::table('booking')
            ->leftjoin(DB::raw("(SELECT * FROM customers) customer"), function($join){
                $join->on('customer.id', '=', 'booking.guest_id');
            })
            ->leftjoin(DB::raw("(SELECT * FROM customers) owner"), function($join){
                $join->on('owner.id', '=', 'booking.owner_id');
            })
            ->join('cars', 'booking.car_id', '=', 'cars.id')
            ->select('booking.*', 'owner.name as owner_name', 'customer.name as customer_name', 'cars.name as car_name')
            ->where('booking.id', '=', $id)
            ->first();
        
        return redirect()->back()->with(['message'=>'success']);
    }

    //--Admin--//

    public function admin_list_booking(){

        $booking = DB::table('booking')
                ->join('cars', 'booking.car_id', '=', 'cars.id')
                ->leftjoin(DB::raw("(SELECT * FROM customers) customer"), function($join){
                    $join->on('customer.id', '=', 'booking.guest_id');
                })
                ->leftjoin(DB::raw("(SELECT * FROM customers) owner"), function($join){
                    $join->on('owner.id', '=', 'booking.owner_id');
                })
                ->select('booking.id as book_id', 'booking.*', 'cars.name as car_name', 'customer.name as customer_name', 'cars.available', 'owner.name as owner_name')
                ->get();

        return view('eazy.admin.rental.list_booking', ['books'=>$booking]);
    }

    public function admin_list_car(){

        $cars = DB::table('cars')
            ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
            ->join('customers', 'cars.owner_id', '=', 'customers.id')
            ->select('cars.*', 'customers.name as owner_name', DB::raw('COUNT(booking.id) as trips, SUM(booking.total_price) as total_income'))
            ->groupby('booking.car_id')
            ->get();

        return view('eazy.admin.rental.list_car', ['cars' => $cars]);

    }

    public function approve_car(Request $r){

    	DB::table('cars')
         	->where('id', '=', $r->id)
            ->update([
                'status'=>1,
                'updated_at' => date('Y-m-d H:i:s', time())
            ]);

        return 1;
    }

    public function reject_car(Request $r){
    	DB::table('cars')
         	->where('id', '=', $r->id)
            ->update([
                'status'=>2,
                'updated_at' => date('Y-m-d H:i:s', time())
            ]);
        return 1;
    }

    public function deactive_car(Request $r){
    	DB::table('cars')
         	->where('id', '=', $r->id)
            ->update([
                'status'=>3,
                'updated_at' => date('Y-m-d H:i:s', time())
            ]);
        return 1;
    }

    public function active_car(Request $r){
    	DB::table('cars')
         	->where('id', '=', $r->id)
            ->update([
                'status'=>1,
                'updated_at' => date('Y-m-d H:i:s', time())
            ]);
        return 1;
    }

    //--End Admin--//

    //--Provider--//

    public function provider_list_booking(){
        $booking = DB::table('booking')
            ->join('cars', 'booking.car_id', '=', 'cars.id')
            ->leftjoin(DB::raw("(SELECT * FROM customers) customer"), function($join){
                $join->on('customer.id', '=', 'booking.guest_id');
            })
            ->leftjoin(DB::raw("(SELECT * FROM customers) owner"), function($join){
                $join->on('owner.id', '=', 'booking.owner_id');
            })
            ->select('booking.id as book_id', 'booking.*', 'cars.name as car_name', 'customer.name as customer_name', 'cars.available', 'customer.phone as customer_phone', 'customer.email as customer_email')
            ->where('owner.id', '=', Auth::user()->reference_id)
            ->get();
        return view('eazy.owner.rental.list_booking', ['books' => $booking]);
    }
	
	public function approve(Request $request){

        $cek = DB::table('booking')->where('id', '=', $request->id)->first();

        if($cek->book_status == 0){
            DB::table('booking')
                ->where('id','=', $request->id)
                ->update([
                    'book_status'=>1,
                    'updated_at' => date('Y-m-d H:i:s', time())
                ]);
                
            $car = DB::table('cars')
                    ->join('booking', 'cars.id', '=', 'booking.car_id')
                    ->select('cars.id')
                    ->where('booking.id', '=', $request->id)
                    ->first();
            
            DB::table('cars')
                ->where('id', '=', $car->id)
                ->update([
                    'available'=>0,
                    'updated_at' => date('Y-m-d H:i:s', time())
                ]);

            return 1;
        }
        else{
            return 0;
        }

	}
	
	public function reject(Request $request){
        $cek = DB::table('booking')->where('id', '=', $request->id)->first();

        if($cek->book_status == 0){
            DB::table('booking')
                ->where('id','=', $request->id)
                ->update(['book_status'=>2]);
            return 1;
        }
        else{
            return 0;
        }
	}

    public function mail_book($id, $status, $bookNumber){

        $cek = DB::table('booking')->where('id', '=', $id)->first();

        if($cek->book_status == 0){
            if($status == 'approve'){
                DB::table('booking')
                    ->where('id','=', $id)
                    ->update([
                        'book_status'=>1,
                        'updated_at' => date('Y-m-d H:i:s', time())
                    ]);
                    
                $car = DB::table('cars')
                        ->join('booking', 'cars.id', '=', 'booking.car_id')
                        ->select('cars.id')
                        ->where('booking.id', '=', $id)
                        ->first();
                
                DB::table('cars')
                    ->where('id', '=', $car->id)
                    ->update([
                        'available'=>0,
                        'updated_at' => date('Y-m-d H:i:s', time())
                    ]);

            }
            else if($status == 'reject'){
                DB::table('booking')
                    ->where('id','=', $id)
                    ->update(['book_status'=>2]);
            }

            $detail = DB::table('booking')->where('id', '=', $id)->first();
            $car = DB::table('cars')->where('id', '=', $detail->car_id)->first();
            $renter = DB::table('customers')->where('id', '=', $detail->guest_id)->first();
            $owner = DB::table('customers')->where('id', '=', $detail->owner_id)->first();

            $book = array('renterName' => $renter->name, 'renterMail' => $renter->email, 'ownerName' => $owner->name, 'ownerMail' => $owner->email, 'carName' => $car->name, 'carUrl' =>$car->photo, 'bookingId'=>$detail->id , 'bookingNumber' => $detail->booking_number, 'priceType' => $detail->price_type, 'duration' => $detail->duration, 'dateStart' => $detail->date_start, 'dateEnd' => $detail->date_end, 'paymentType' => $detail->payment_type, 'totalPrice' => $detail->total_price, 'status' => $status);

            Mail::send('eazy.email.bookInvoice', ['book' => $book], function($message) use ($book){
                $message->from('firdaus@entongproject.com', 'Admin EAZY');
                $message->to($book['renterMail']);
                $message->subject('Booking Invoice');
            });
            
            return view('eazy.general.book_verify', ['bookNumber' => $bookNumber, 'status' => $status]);
        }
        else{
            
            return view('eazy.general.book_verify', ['bookNumber' => $bookNumber, 'status' => 'voted']);
        }

    }

    public function provider_list_car(){
        $daily = 'Daily';

        $cars = DB::table('cars')
            ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
            ->select('cars.*', DB::raw('COUNT(booking.id) as trips, SUM(booking.total_price) as total_income'))
            ->where('cars.owner_id', '=', Auth::user()->reference_id)
            ->groupby('cars.id')
            ->get();

        return view('eazy.owner.rental.list_car', ['cars' => $cars]);
    }

    public function api_provider_list_car(Request $request){

        $cars = DB::table('cars')
            ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
            ->select('cars.*', 'cars.status as car_status', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips, SUM(booking.total_price) as total_income'))
            ->where('cars.owner_id', '=', $request->data)
            ->groupby('cars.id')
            ->get();

        if(count($cars)>0){
            return response(['result' => 'success', 'cars' => $cars], 200);
        }
        else{
            return response(['result' => 'no data', 'message' => 'there is no car listed'], 200);
        }

    }

    public function provider_new_car(){
        return view('eazy.owner.rental.new_car', ['id' => Auth::user()->reference_id]);
    }

    public function provider_add_car(Request $request){

        $dir = 'images/car/';
        $car_id = $this->randomvar();

        $photo = $request->file('photo')->getClientOriginalExtension(); 
        $photo_name = uniqid() . '_' . $car_id . '.' . $photo;
        $request->file('photo')->move($dir, public_path($photo_name));
        $this->savedoc($car_id, 'photo', 'http://new.entongproject.com/images/car/'.$photo_name, $photo_name);

        $note = $request->file('note')->getClientOriginalExtension(); 
        $note_name = uniqid() . '_' . $car_id . '.' . $note;
        $request->file('note')->move($dir, public_path($note_name));
        $this->savedoc($car_id, 'note', 'http://new.entongproject.com/images/car/'.$note_name, $note_name);

        DB::table('cars')->insert([
            'id' => $car_id,
            'owner_id' => $request->owner_id,
            'name' => $request->name,
            'photo' => 'http://new.entongproject.com/images/car/'.$photo_name,
            'note_grand' => 'http://new.entongproject.com/images/car/'.$note_name,
            'transmission' => $request->transmission,
            'year' => $request->year,
            'body_type' => $request->body,
            'size' => $request->size,
            'fuel_type' => $request->f_type,
            'fuel_regulation' => $request->f_regulation,
            'air_conditioner' => $request->ac,
            'producer' => $request->producer,
            'description' => $request->desc,
            'location_lat' => $request->lat,
            'location_long' => $request->lng,
            'price' => $request->p_daily,
            'price_week' => $request->p_weekly,
            'price_month' => $request->p_monthly
        ]);

    }

    public function api_provider_add_car(Request $request){
        $car_id = $this->randomvar();

        $c = explode('|', $request->data);
        
        DB::table('cars')->insert([
            'id' => $car_id,
            'owner_id' => $c[0],
            'name' => $c[1],
            'producer' => $c[2],
            'year' => $c[3],
            'transmission' => $c[4],
            'body_type' => $c[5],
            'size' => $c[6],
            'price' => $c[7],
            'price_week' => $c[8],
            'price_month' => $c[9],
            'status' => '0'
        ]);    

        return response(['result' => 'success', 'message' => 'Car is saved'], 200); 
    }

    public function api_provider_detail_car(Request $request){
        $car = DB::table('cars')
            ->select('cars.photo as car_photo', 'cars.name as car_name', 'cars.*')
            ->where('cars.id', '=', $request->data)
            ->first();

        $photo = DB::table('document')
                ->where('reference_id', '=', $request->data)
                ->where('type', '=', "photo")
                ->get();

        if(count($car)>0){
            return response(['result' => 'success', 'car' => $car, 'photo' => $photo], 200);
        }
        else{
            return response(['result' => 'error', 'message' => 'car not found'], 200);
        }
    }

    public function api_provider_save_cardesc(Request $request){

        $c = explode("|", $request->data);

        DB::table("cars")->where('id', '=', $c[0])
            ->update([
                'fuel_type' => $c[1],
                'fuel_regulation' => $c[2],
                'air_conditioner' => $c[3],
                'description' => $c[4]
        ]);

        return response(['result' => 'success', 'message' => 'Car Updated'], 200);
    }

    public function api_provider_save_carprice(Request $request){

        $c = explode("|", $request->data);

        DB::table("cars")->where('id', '=', $c[0])
            ->update([
                'price' => $c[1],
                'price_week' => $c[2],
                'price_month' => $c[3]
            ]);

        return response(['result' => 'success', 'message' => 'Price Updated'], 200);
    }

    public function api_provider_location_car(Request $request){
        $car = explode("|", $request->data);

        DB::table('cars')->where('id', '=', $car[0])
            ->update([
                'location_lat' => $car[1],
                'location_long' => $car[2]
            ]);

        return response(['result' => 'success', 'message' => 'Location Updated'], 200);
    }

    public function api_provider_note_car(Request $request){
        $doc = DB::table('document')
                ->select('path', 'id')
                ->where('reference_id', '=', $request->data)
                ->where('type', '=', 'note')
                ->first();

        if(is_null($doc)){
            return response(['result' => 'not found'], 200);
        }
        else{
            return response(['result' => 'success', 'url' => $doc->path, 'id' => $doc->id], 200);
        }
    }

    public function api_provider_update_note(Request $request){
        $doc = explode("|", $request->data);

        if($doc[2] == "nothing"){
            DB::table('document')->insert([
                'id' => $this->randomvar(),
                'reference_id' => $doc[3],
                'type' => "note",
                'path' => $doc[0],
                'filename' => $doc[1]
            ]); 
            DB::table("cars")->where('id', '=', $doc[3])
                ->update([
                    'note_grand' => $doc[0],
                    'updated_at' => date('Y-m-d H:i:s', time())
            ]); 
            return response(['result' => 'note grand is saved'], 200); 
        }
        else{
            DB::table("document")->where('id', '=', $doc[2])
                ->update([
                    'reference_id' => $doc[3],
                    'type' => "note",
                    'path' => $doc[0],
                    'filename' => $doc[1],
                    'updated_at' => date('Y-m-d H:i:s', time())
            ]);
            DB::table("cars")->where('id', '=', $doc[3])
                ->update([
                    'note_grand' => $doc[0],
                    'updated_at' => date('Y-m-d H:i:s', time())
            ]); 
            return response(['result' => 'note grand is updated'], 200);
        }
    }

    public function api_provider_call_car(Request $request){

        $car = DB::table('document')
            ->where('reference_id', '=', $request->data)
            ->where('type', '=', 'photo')
            ->get();

        if(count($car) > 0){
            return response(['result' => 'success', 'photos' =>$car], 200);
        }
        else{
            return response(['result' => 'not found'], 200);
        }
    }

    public function api_provider_upload_car(Request $request){
        $doc = explode("|", $request->data);

        DB::table('document')->insert([
            'id' => $this->randomvar(),
            'reference_id' => $doc[2],
            'type' => "photo",
            'path' => $doc[0],
            'filename' => $doc[1]
        ]); 

        $check = DB::table('cars')->where('id', $doc[2])->first();

        if(is_null($check->photo)){
            DB::table('cars')->where('id', $doc[2])->update(['photo' => $doc[0]]);
        }

        return response(['result' => 'success'], 200);
    }

    public function api_provider_delete_car(Request $request){

        $car = explode("|", $request->data);

        DB::table('document')->where('path', '=', $car[0])->delete();

        $check = DB::table('cars')->where('id', $car[1])->where('photo',$car[0])->first();

        if(!is_null($check)){
            DB::table('cars')->where('id', $car[1])->update(['photo' => null]);
        }

        return response(['result' => 'success'], 200);
    }

    //--End Provider--//

    //--Customer--//
    public function booking_number(){
        $var = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
        $randvar = "";
        foreach (array_rand($var, 5) as $v) {
            # code...
            $randvar .= $var[$v];
        }
        $code = $randvar;
        return $code;
    }

    public function list_car_provider(){
        return view('eazy.owner.car.list_car');
    }

    public function list_car_client(){
        $cars = DB::table('cars')
                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name')
                ->where('cars.status', '=', '1')
                ->where('customers.status', '=', '1')
                ->get();

        if(count($cars)>0){
            return response(['result' => 'success', 'cars' => $cars], 200);
        }
        else{
            return response(['result' => 'no data', 'message' => 'there is no car available'], 200);
        }
    }

    public function list_fav_car(Request $request){

        if($request->data == 'trips'){
        	$cars = DB::table('cars')
                ->join('customers', 'customers.id', '=', 'cars.owner_id')
	            ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
	            ->select('cars.*', DB::raw('COUNT(booking.id) as trips'), 'customers.name as owner_name', 'cars.name as car_name')
                ->where('cars.status', '=', '1')
                ->where('cars.available', '=', '1')
                ->where('customers.status', '=', '1')
                ->orderBy('trips', 'desc')
	            ->groupby('cars.id')
                ->take(10)
	            ->get();
        }
        else if($request->data == 'rating'){
            $cars = DB::table('cars')
                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name')
                ->where('cars.status', '=', '1')
                ->where('cars.available', '=', '1')
                ->where('customers.status', '=', '1')
                ->orderBy('cars.total_rating', 'asc')
                ->take(10)
                ->get();
        }

        if(count($cars) == 0){
            return response(['result' => 'failed'], 200);
        }
        else{
            return response(['result'=>'success', 'cars'=>$cars],200);
        }
    }

    public function custom_list_car_client(Request $request){
        $data = explode("#", $request->data);
        $transmission = "Both";
        $type = "All";
        $cars = "";
        $producer = "All";

        if($data[4] != "All"){ $producer = $data[4]; }
        if($data[5] == 1){ $type = "Hatchback"; }
        if($data[6] == 1){ $type = "Sedan"; }
        if($data[7] == 1){ $type = "MPV"; }
        if($data[8] == 1){ $type = "SUV"; }
        if($data[9] != 'Both'){ $transmission = $data[9]; }
        $minval = $data[10];
        $maxval = $data[11];

        if($type == "All"){
            if($transmission == 'Both'){
                if($producer == 'All'){
                    $cars = DB::table('cars')
                        ->join('customers', 'customers.id', '=', 'cars.owner_id')
                        ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name')
                        ->where('cars.status', '=', '1')
                        ->where('cars.available', '=', '1')
                        ->where('customers.status', '=', '1')
                        ->whereBetween('cars.price', array($minval, $maxval))
                        ->get();
                }
                else{
                    $cars = DB::table('cars')
                        ->join('customers', 'customers.id', '=', 'cars.owner_id')
                        ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name')
                        ->where('cars.status', '=', '1')
                        ->where('cars.available', '=', '1')
                        ->where('customers.status', '=', '1')
                        ->where('cars.producer', '=', $producer)
                        ->whereBetween('cars.price', array($minval, $maxval))
                        ->get();
                }
            }
            else{
                if($producer == 'All'){
                    $cars = DB::table('cars')
                        ->join('customers', 'customers.id', '=', 'cars.owner_id')
                        ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name')
                        ->where('cars.status', '=', '1')
                        ->where('cars.available', '=', '1')
                        ->where('customers.status', '=', '1')
                        ->where('transmission', '=', $transmission)
                        ->whereBetween('cars.price', array($minval, $maxval))
                        ->get();
                }
                else{
                    $cars = DB::table('cars')
                        ->join('customers', 'customers.id', '=', 'cars.owner_id')
                        ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name')
                        ->where('cars.status', '=', '1')
                        ->where('cars.available', '=', '1')
                        ->where('customers.status', '=', '1')
                        ->where('cars.producer', '=', $producer)
                        ->where('transmission', '=', $transmission)
                        ->whereBetween('cars.price', array($minval, $maxval))
                        ->get();
                }
                    
            }
        }
        else{
            if($transmission == 'Both'){
                if($producer == 'All'){
                     $cars = DB::table('cars')
                        ->join('customers', 'customers.id', '=', 'cars.owner_id')
                        ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name')
                        ->where('cars.status', '=', '1')
                        ->where('cars.available', '=', '1')
                        ->where('customers.status', '=', '1')
                        ->where('cars.body_type', '=', $type)
                        ->whereBetween('cars.price', array($minval, $maxval))
                        ->get();
                }
                else{
                     $cars = DB::table('cars')
                        ->join('customers', 'customers.id', '=', 'cars.owner_id')
                        ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name')
                        ->where('cars.status', '=', '1')
                        ->where('cars.available', '=', '1')
                        ->where('customers.status', '=', '1')
                        ->where('cars.producer', '=', $producer)
                        ->where('cars.body_type', '=', $type)
                        ->whereBetween('cars.price', array($minval, $maxval))
                        ->get();
                }
                   
            }
            else{
                if($producer == 'All'){
                    $cars = DB::table('cars')
                        ->join('customers', 'customers.id', '=', 'cars.owner_id')
                        ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name')
                        ->where('cars.status', '=', '1')
                        ->where('cars.available', '=', '1')
                        ->where('customers.status', '=', '1')
                        ->where('cars.body_type', '=', $type)
                        ->where('cars.transmission', '=', $transmission)
                        ->whereBetween('cars.price', array($minval, $maxval))
                        ->get();
                }
                else{
                    $cars = DB::table('cars')
                        ->join('customers', 'customers.id', '=', 'cars.owner_id')
                        ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name')
                        ->where('cars.status', '=', '1')
                        ->where('cars.available', '=', '1')
                        ->where('customers.status', '=', '1')
                        ->where('cars.producer', '=', $producer)
                        ->where('cars.body_type', '=', $type)
                        ->where('cars.transmission', '=', $transmission)
                        ->whereBetween('cars.price', array($minval, $maxval))
                        ->get();
                }
            }
        }

        if(count($cars)>0){
            return response(["result" => 'success', "cars" => $cars], 200);
        }
        else{
            return response(['result' => 'error', 'message' => 'Car is not found '.$transmission], 200);
        }
    }

    public function geo_list_car_client(){
    	$cars = DB::table('cars')
    		->join('customers', 'customers.id', '=', 'cars.owner_id')
    		->select('cars.id as car_id', 'cars.location_lat as lat', 'cars.location_long as lng', 'cars.name as car_name', 'customers.name as owner_name', 'cars.total_rating as rating', 'cars.price as price', 'cars.photo as photo')
    		->where('cars.status', '=', '1')
            ->where('cars.available', '=', '1')
    		->where('customers.status', '=', '1')
    		->get();

    	if(count($cars)>0){
            return response(['result' => 'success', 'cars' => $cars], 200);
        }
        else{
            return response(['result' => 'no data', 'message' => 'there is no car available'], 200);
        }	
    }

    public function filter_car_client(Request $request){

        $transmission = $request->transmission;
        $year = $request->year;
        $type = $request->type;
        $fuel = $request->fuel;
        $producer = $request->producer;
        $minval = $request->minPrice;
        $maxval = $request->maxPrice;
        $cars = "";

        if($transmission == "Both"){
            if($year == "All"){
                if($type == "All"){
                    if($fuel == "All"){
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.producer', '=', $producer)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                    else{
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                }
                else{
                    if($fuel == "All"){
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                    else{
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.body_type', '=', $type)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.body_type', '=', $type)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                }
            }
            else{
                if($type == "All"){
                    if($fuel == "All"){
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.year', '=', $year)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.year', '=', $year)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                    else{
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('cars.year', '=', $year)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{

                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('cars.year','=', $year)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                }
                else{
                    if($fuel == "All"){
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.year', '=', $year)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.year', '=', $year)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                    else{
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('cars.year', '=', $year)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{

                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('cars.year','=', $year)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                }
            }
        }
        else{
            if($year == "All"){
                if($type == "All"){
                    if($fuel == "All"){
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.producer', '=', $producer)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                    else{
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                }
                else{
                    if($fuel == "All"){
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                    else{
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.body_type', '=', $type)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.body_type', '=', $type)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                }
            }
            else{
                if($type == "All"){
                    if($fuel == "All"){
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.year', '=', $year)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.year', '=', $year)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                    else{
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('cars.year', '=', $year)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{

                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('cars.year','=', $year)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                }
                else{
                    if($fuel == "All"){
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.year', '=', $year)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.year', '=', $year)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                    else{
                        if($producer == "All"){
                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.transmission', '=', $transmission)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('cars.year', '=', $year)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                        else{

                            $cars = DB::table('cars')
                                ->leftjoin('booking', 'booking.car_id', '=', 'cars.id')
                                ->join('customers', 'customers.id', '=', 'cars.owner_id')
                                ->select('cars.*', 'customers.name as owner_name', 'cars.name as car_name', DB::raw('COUNT(booking.id) as trips'))
                                ->where('cars.status', '=', '1')
                                ->where('cars.available', '=', '1')
                                ->where('cars.producer', '=', $producer)
                                ->where('cars.fuel_type', '=', $fuel)
                                ->where('cars.year','=', $year)
                                ->where('cars.body_type', '=', $type)
                                ->where('customers.status', '=', '1')
                                ->whereBetween('cars.price', array($minval, $maxval))
                                ->groupby('cars.id')
                                ->get();
                        }
                    }
                }
            }
        }

        if(is_null($cars)){
            return response(['result' => 'no data', 'message' => 'no result'], 200);
        }
        else{
            return response(['result' => 'success', 'cars' => $cars], 200);
        }
    }

    public function detail_car(Request $request){

       $car = DB::table('cars')
            ->join('customers', 'customers.id', '=', 'cars.owner_id')
            ->select('customers.photo as owner_photo', 'customers.name as owner_name', 'cars.photo as car_photo', 'cars.name as car_name', 'cars.*')
            ->where('cars.id', '=', $request->data)
            ->first();

        $photo = DB::table('document')
            ->where('reference_id', '=', $request->data)
            ->where('type', '=', 'photo')
            ->get();
        
        // return json_encode($photo);

            if(count($car)>0){
            return response(['result' => 'success', 'car' => $car, 'photo'=>$photo], 200);
            }
            else{
                return response(['result' => 'error', 'message' => 'car not found'], 200);
            }
    }

    public function detail_owner(Request $request){

    	$owner = DB::table('customers')
    		->join('cars', 'cars.owner_id', '=', 'customers.id')
    		->select('customers.*')
    		->where('cars.id', '=', $request->data)
    		->first();

    	if(count($owner)>0){
    		return response(['result' => 'success', 'owner' => $owner], 200);
    	}
    	else{
    		return response(['result' => 'error', 'message' => 'owner is not found'], 200);
    	}

    }

    public function book_car(Request $request){

        $booking = explode("|", $request->data);
        $mybooking = $this->booking_number();
        $amount = 0;
        $id_guest = "";
        $duration = 1;
        $id_booking = $this->randomvar();

        if($booking[7] != 0){
            $duration = $booking[7];
        }

        $car = DB::table('cars')->where('id', '=', $booking[1])->first();
		
		if($booking[6] == 'Daily'){
            $amount = $car->price;
        }
        else if($booking[6] == 'Weekly'){
        	$amount = $car->price_week;
        }
        else if($booking[6] == 'Monthly'){
            $amount = $car->price_month;
        }

        if($booking[0] == 'guest'){
          	$id_guest = $this->randomvar();

			DB::table('customers')->insert([
				"id" => $id_guest,
				"name" => $booking[3],
				"phone" => $booking[4],
				"email" => $booking[5],
                "type" => 'guest'
            ]);

            DB::table('users')->insert([
                 "id" => $this->randomvar(),
                 "reference_id" => $id_guest,
                 "username" => $booking[5],
                 "name" => $booking[3],
                 "email" => $booking[5],
                 "password" => bcrypt("1234"),
                 "user" => "guest"
             ]);

            DB::table('document')->insert([
                "id" => $this->randomvar(),
                "reference_id" => $id_guest,
                "type" => "license",
                "path" => $booking[12],
                "filename" => $booking[13]
            ]);

            DB::table('document')->insert([
                "id" => $this->randomvar(),
                "reference_id" => $id_guest,
                "type" => "ic",
                "path" => $booking[14],
                "filename" => $booking[15]
            ]);
        }
        else if($booking[0] == 'member'){
        	$id_guest = $booking[2];

        	if($booking[10] == 'Wallet'){
        		$epoint = DB::table('customers')->where('id', '=', $id_guest)->first();
        		$res_point = $epoint->epoint - $booking[11];

        		DB::table('customers')->where('id', '=', $id_guest)
        		->update([
        			'epoint' => $res_point
        		]);
        	}
        }

       	DB::table('booking')->insert([
        	"id" => $id_booking,
            "car_id" => $booking[1],
            "owner_id" => $car->owner_id,
            "guest_id" => $id_guest,
            "booking_number" => $mybooking,
            "price_type" => $booking[6],
            "duration" => $duration,
            "payment_type" => $booking[10],
            "total_price" => $booking[11],
            "date_start" => $booking[8],
            "date_end" => $booking[9]
        ]);

        $user = DB::table('customers')->where('id', '=', $id_guest)->first();
        $owner = DB::table('customers')->where('id', '=', $car->owner_id)->first();


        $book = array('renterName' => $user->name, 'renterMail' => $user->email, 'ownerName' => $owner->name, 'ownerMail' => $owner->email, 'carName' => $car->name, 'carUrl' =>$car->photo, 'bookingId'=>$id_booking , 'bookingNumber' => $mybooking, 'priceType' => $booking[6], 'duration' => $duration, 'dateStart' => $booking[8], 'dateEnd' => $booking[9], 'paymentType' => $booking[10], 'totalPrice' => $booking[11]);

        Mail::send('eazy.email.bookVerify', ['book' => $book], function($message) use ($book){
            $message->from('firdaus@entongproject.com', 'Admin EAZY');
            $message->to($book['ownerMail']);
            $message->subject('Booking Validation');
        });

        return response(['result' => 'success', 'booking_number' => $mybooking], 200);
    }


    public function book_list(Request $request){

        $member = explode("#", $request->data);

        if($member[1] == 0){
        	$books = DB::table('booking')
                ->leftjoin('cars', 'cars.id', '=', 'booking.car_id')
                ->select('cars.location_lat', 'cars.location_long', 'cars.photo as photo', 'booking.book_status', 'booking.date_start', 'booking.date_end', 'cars.name as car_name', 'booking.id as book_id', 'booking.created_at as book_time')
                ->where('guest_id', '=', $member[0])
                ->whereBetween('book_status', array(0,1))
                ->orderBy('book_time', 'desc')
                ->get();
        }
        else if($member[1] == 1){
        	$books = DB::table('booking')
                ->leftjoin('cars', 'cars.id', '=', 'booking.car_id')
                ->select('cars.location_lat', 'cars.location_long', 'cars.photo as photo', 'booking.book_status', 'booking.date_start', 'booking.date_end', 'cars.name as car_name', 'booking.id as book_id', 'booking.created_at as book_time')
                ->where('guest_id', '=', $member[0])
                ->where('book_status', '=', 3)
                ->orderBy('book_time', 'desc')
                ->get();
        }
        else if($member[1] == 2){
            $books = DB::table('booking')
                ->leftjoin('cars', 'cars.id', '=', 'booking.car_id')
                ->select('cars.location_lat', 'cars.location_long', 'cars.photo as photo', 'booking.book_status', 'booking.date_start', 'booking.date_end', 'cars.name as car_name', 'booking.id as book_id', 'booking.created_at as book_time')
                ->where('guest_id', '=', $member[0])
                ->where('book_status', '=', 2)
                ->orWhere('book_status', '=', 4)
                ->orderBy('book_time', 'desc')
                ->get();
        }


        if(count($books)>0){
            return response(['result' => 'success', 'books' => $books], 200);
        }
        else{
            return response(['result' => 'error', 'message' => 'Booking is not found'], 200);
        }
    }

    public function book_detail(Request $request){

    	$book = DB::table('booking')
    		->join('cars', 'cars.id', '=', 'booking.car_id')
    		->select('cars.photo as car_photo', 'booking.booking_number as book_number', 'cars.name as car_name', 'booking.date_start', 'booking.date_end', 'booking.book_status')
    		->where('booking.id', '=', $request->data)
    		->first();

    	if($book){
    		return response(['result' => 'success', 'booking' => $book], 200);
    	}
    	else{
    		return response(['response' => 'error', 'message' => 'Detail is not found'], 200);
    	}
    }
    //--End Customer--//
}