@extends('/eazy/main')

@section('content')
<div class="page-content-wrapper">
	<meta name="_token" content="{!! csrf_token() !!}"/>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Outstanding List Booking</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_1">
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Booking Number </th>
                                    <th> Car Name </th>
                                    <th> Rent Type </th>
                                    <th> Duration </th>
                                    <th> Rent Date </th>
                                    <th> Total Cost (RM) </th>
                                    <th style="width: 200px"> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($books)>0)
                                    @foreach($books as $b)
                                        <tr>
                                            <td> {{$b->customer_name}} </td>
                                            <td> {{$b->booking_number}} </td>
                                            <td> {{$b->car_name}} </td>
                                            <td> {{$b->price_type}} </td>
                                            <td> {{$b->duration}} </td>
                                            <td> 
                                            	<i class="font-blue-steel" style="font-style: normal">{{date('M, d Y H:i', strtotime($b->date_start))}}</i> 
                                            	<br> <i class="font-red-thunderbird" style="font-style: normal">{{date('M, d Y H:i', strtotime($b->date_end))}}</i>
                                            </td>
											<td> {{number_format($b->total_price)}}</td>
                                            <td> @if($b->book_status == 0) 
												<div class="btn-group">
													<a class="btn btn-xs blue" href="javascript:;" data-toggle="dropdown">
														Pending Confirmation
														<i class="fa fa-angle-down"></i>
													</a> 
													<ul class="dropdown-menu">
														<li>
															<a onclick="approve('{{$b->id}}')" id="" name="{{$b->id}}" type="button">
																<i class="fa fa-check"></i> Approve </a>
															</a>
														</li>
														<li>
															<a id="reject" name="{{$b->id}}">
																<i class="fa fa-close"></i> Reject </a>
															</a>
														</li>													
													</ul>
												</div>
												@elseif ($b->book_status == 1)
												<div class="btn-group">
													<a class="btn btn-xs green" href="javascript:;">
														Booking Approved
													</a> 
												</div>
												@else
												<div class="btn-group">
													<a class="btn btn-xs red" href="javascript:;">
														Booking Rejected
													</a> 
												</div>												
												@endif
											</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">List Car</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" id="list_car">
                            <thead>
                                <tr>
                                    <th> Car Name </th>
                                    <th> Year </th>
                                    <th> Owner Name </th>
                                    <th> Photo Status </th>
                                    <th> Note Grand Status </th>
                                    <th> Location </th>
                                    <th> Status </th>
                                    <th style="width: 200px"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($cars)>0)
                                    @foreach($cars as $c)
                                        <tr>
                                        	<td> {{$c->name}} </td>
                                        	<td> {{$c->year}} </td>
                                        	<td> {{$c->owner_name}} </td>
                                        	@if($c->photo == null)
                                        	<td> Not Uploaded </td>
                                        	@else
                                        	<td> Uploaded</td>
                                        	@endif
                                        	@if($c->note_grand == null)
                                        	<td> Not Uploaded </td>
                                        	@else
                                        	<td> Uploaded</td>
                                        	@endif

                                        	@if($c->location_lat == 0 || $c->location_long == 0)
                                        	<td> Not Set </td>
                                        	@else
                                        	<td>
                                        		<?php 
                                        			$latlng = $c->location_lat.','.$c->location_long;
                                        			$geocode = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDEzu7MHA93ekBnYLk0Ex1wJU4ygdKdv5Y&latlng='.$latlng.'&sensor=false',true));
                                        			echo ($geocode->results[0]->formatted_address);
                                        		?>
                                        	</td>

                                        	@endif
                                        	<td> 
                                        		@if($c->status == 0) 
													<span class= "label label-sm bg-yellow-crusta">
														Not Confirmed
													</span> 
												@elseif($c->status == 1)
													<span class= "label label-sm bg-blue-steel">
														Activated
													</span>
												@elseif($c->status == 2) 
													<span class= "label label-sm bg-red-thunderbird">
														Rejected
													</span>
												@elseif($c->status == 3) 
													<span class= "label label-sm bg-red-thunderbird">
														Non-Activated
													</span>
												@endif
											</td>
											<td>
												@if($c->status == 0)
												<div class="btn-group">
													<a class="btn btn-sm yellow-crusta btn-outline filter-submit margin-bottom" href="javascript:;" data-toggle="dropdown">
														Pending Confirmation
														<i class="fa fa-angle-down"></i>
													</a> 
													<ul class="dropdown-menu">
														<li>
															<a onclick="approveCar('{{$c->id}}')" id="" name="{{$c->id}}" type="button">
																<i class="fa fa-check"></i> Approve </a>
															</a>
														</li>
														<li>
															<a id="rejectCar" name="{{$c->id}}">
																<i class="fa fa-close"></i> Reject </a>
															</a>
														</li>													
													</ul>
												</div>
												@elseif($c->status == 1)
												<a class="btn btn-sm red-thunderbird btn-outline filter-submit margin-bottom" onclick="deactiveCar('{{$c->id}}')">
													Deactivate
                                                </a>
												@elseif($c->status == 3)
												<a class="btn btn-sm blue-steel btn-outline filter-submit margin-bottom" onclick="activeCar('{{$c->id}}')">
													Activate
                                                </a>
												@endif
											</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
</div>
@endsection

@section('plugins')
<link href="{{ asset('theme/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('theme/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/pages/scripts/ui-toastr.min.js') }}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('theme/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('theme/assets/pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDEzu7MHA93ekBnYLk0Ex1wJU4ygdKdv5Y"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"positionClass": "toast-bottom-right",
		"onclick": null,
		"showDuration": "250",
		"hideDuration": "250",
		"timeOut": "1500",
		"extendedTimeOut": "500",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

	$(document).ready( function () {
	    $('#list_car').DataTable();
	} );

	var delayInMilliseconds = 2000;

	function getLocation(lat, lng){
		var geocoder = new google.maps.Geocoder();
        var location = new google.maps.Latlng(lat, lng);
        geocoder.geocode( { 'latLng': location}, function(results, status) {

          if (status == google.maps.GeocoderStatus.OK) {
            var address = results[0].formatted_address;
            return address;
            alert(address);
          } 
        });
	}

	function approve(booking_id){
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
		$.ajax({
				url: '/approve',
				type: 'post',
				data: {'id':booking_id},
				success: function(data){
					if(data == 1){
						toastr.success("Booking is approved", "Status Message");
					}
					else if(data == 0){
						toastr.error("Booking is voted, please rebooking", "Status Message");
					}

					setTimeout(function() {
						window.location.href = '/';
					}, delayInMilliseconds);
				},
		});
		
		return false;
	};

	$('#reject').click(function(){
		var booking_id = $(this).attr('name');
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
		$.ajax({
				url: '/reject',
				type: 'post',
				data: {'id':booking_id},
				success: function(data){
					if(data == 1){
						toastr.error("Booking is rejected", "Status Message");
					}
					else if(data == 0){
						toastr.error("Booking is voted, please rebooking", "Status Message");
					}
					setTimeout(function() {
						window.location.href = '/';
					}, delayInMilliseconds);
				},
				error: function(){
	       		alert("error");
			}
		});
	});

	function approveCar(car_id){
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
		$.ajax({
				url: '/approve/car',
				type: 'post',
				data: {'id':car_id},
				success: function(data){
					if(data == 1){
						toastr.success("Car is approved", "Status Message");
					}
					else if(data == 0){
						toastr.error("Confirmation error, please try again", "Status Message");
					}

					setTimeout(function() {
						window.location.href = '/';
					}, delayInMilliseconds);
				},
		});
		
		return false;

	}

	$('#rejectCar').click(function(){
		var car_id = $(this).attr('name');
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
		$.ajax({
				url: '/reject/car',
				type: 'post',
				data: {'id':car_id},
				success: function(data){
					if(data == 1){
						toastr.error("Car is rejected", "Status Message");
					}
					else if(data == 0){
						toastr.error("Confirmation error, please try again", "Status Message");
					}
					setTimeout(function() {
						window.location.href = '/';
					}, delayInMilliseconds);
				},
				error: function(){
	       		alert("error");
			}
		});
	});

	function deactiveCar(car_id){
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
		$.ajax({
				url: '/deactive/car',
				type: 'post',
				data: {'id':car_id},
				success: function(data){
					if(data == 1){
						toastr.success("Car is deactivated", "Status Message");
					}
					else if(data == 0){
						toastr.error("Deactivation is error, please try again", "Status Message");
					}

					setTimeout(function() {
						window.location.href = '/';
					}, delayInMilliseconds);
				},
		});
	}

	function activeCar(car_id){
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
		$.ajax({
				url: '/active/car',
				type: 'post',
				data: {'id':car_id},
				success: function(data){
					if(data == 1){
						toastr.success("Car is activated", "Status Message");
					}
					else if(data == 0){
						toastr.error("Activation is error, please try again", "Status Message");
					}

					setTimeout(function() {
						window.location.href = '/';
					}, delayInMilliseconds);
				},
		});
	}
	
</script>
@endsection