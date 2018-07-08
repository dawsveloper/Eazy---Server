<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*

Route::group(['middleware' => ['auth']], function() {
	Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');

		});
	
	// Project
	Route::get('/', 'PublicController@dashboard');
	Route::get('/project/graph/purchase', 'GraphController@showPurchaseGraph');
	Route::get('/project/equipment/add_new', 'EquipmentController@addNew');

});
*/

Route::get('auth/login', 'PublicController@showLogin');
Route::post('auth/login', 'Auth\AuthController@authenticate');

Route::get('/account/verify/{id}', 'UserController@acc_verify');

Route::get('/mail/validation/{id}/{status}/{bookNumber}', 'RentalController@mail_book');

Route::group(['middleware' => ['auth']], function(){
        Route::get('/logout', function(){
                Auth::logout();
                return redirect('/');
        });

        Route::group(['prefix' => '/admin'], function(){
                Route::get('/rental/list_booking', 'RentalController@admin_list_booking');
                Route::get('/rental/list_car', 'RentalController@admin_list_car');
                Route::get('/user/list_user', 'UserController@admin_list_user');
                Route::get('/user/add_new_user', 'UserController@admin_new_user');
                Route::get('/user/detail_user/{id}', 'UserController@admin_detail_user');
                Route::get('/user/id/{id}', 'UserController@admin_id_user');
                Route::get('/user/license/{id}', 'UserController@admin_license_user');
        });

        Route::group(['prefix' => '/provider'], function(){
                Route::get('/rental/list_booking', 'RentalController@provider_list_booking');
                Route::get('/rental/list_car', 'RentalController@provider_list_car');
                Route::get('/rental/new_car', 'RentalController@provider_new_car');
                Route::post('/rental/add_new_car', 'RentalController@provider_add_car');
        });
        Route::get('/', 'PublicController@dashboard');
        Route::get('/home', 'PublicController@dashboard');
        Route::post('/approve', 'RentalController@approve');
	Route::post('/reject', 'RentalController@reject');
        Route::post('/approve/car', 'RentalController@approve_car');
        Route::post('/reject/car', 'RentalController@reject_car');
        Route::post('/deactive/car', 'RentalController@deactive_car');
        Route::post('/active/car', 'RentalController@active_car');
        Route::get('/rental/history', 'RentalController@history');
        Route::get('/detail_history/{id}', 'RentalController@detail_history');
});


Route::group(['prefix' => 'api'], function () {
       
        Route::post('/customer/login', 'UserController@login');
        Route::post('/customer/signup', 'UserController@signup');
        Route::post('/guest/register', 'UserController@guest_regis');

        Route::post('/provider/rental/api_list_car', 'RentalController@api_provider_list_car');
        Route::post('/provider/rental/api_add_new_car', 'RentalController@api_provider_add_car');
        Route::post('/provider/rental/api_detail_car', 'RentalController@api_provider_detail_car');
        Route::post('/provider/rental/api_save_location', 'RentalController@api_provider_location_car');
        Route::post('/provider/rental/api_save_cardesc', 'RentalController@api_provider_save_cardesc');
        Route::post('/provider/rental/api_save_carprice', 'RentalController@api_provider_save_carprice');
        Route::post('/provider/rental/api_note_car', 'RentalController@api_provider_note_car');
        Route::post('/provider/rental/update_note_car', 'RentalController@api_provider_update_note');
        Route::post('/provider/api_call_car_photos', 'RentalController@api_provider_call_car');
        Route::post('/provider/rental/api_upload_car', 'RentalController@api_provider_upload_car');
        Route::post('/provider/rental/api_delete_car_photo', 'RentalController@api_provider_delete_car');

        Route::post('/customer/call/profile', 'UserController@callProfile');
        Route::post('/customer/edit/photo', 'UserController@editPhoto');
        Route::post('/customer/edit/profile', 'UserController@editProfile');
        Route::post('/customer/edit/password', 'UserController@editPassword');
        Route::post('/customer/upload/profpict', 'UserController@uploadProfpict');
        Route::post('/customer/check_wallet', 'UserController@checkWallet');
        
        Route::get('/customer/geo_list_car', 'RentalController@geo_list_car_client');
        Route::get('/customer/list_car', 'RentalController@list_car_client');
        Route::post('/customer/list_fav_car', 'RentalController@list_fav_car');
        Route::post('/customer/custom_list_car', 'RentalController@custom_list_car_client');
        Route::post('/customer/detail_car', 'RentalController@detail_car');
        Route::post('/customer/filter_car', 'RentalController@filter_car_client');
        Route::post('/customer/book_car', 'RentalController@book_car');
        Route::post('/customer/book_list', 'RentalController@book_list');
        Route::post('/customer/book_detail', 'RentalController@book_detail');
        Route::post('/customer/detail_owner', 'RentalController@detail_owner');

        // Route::group(['middleware' => 'auth:api'], function(){
        // 	Route::get('/profile/{token}', 'UserController@read');
        // 	Route::get('/profile/{token}', 'UserController@update');
        // 	Route::post('/logout/{token}', 'UserController@logout');
        // });
                
});
