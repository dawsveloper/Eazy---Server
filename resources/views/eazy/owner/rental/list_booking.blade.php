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
                                    <th> Email </th>
                                    <th> Phone Number </th>
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
                                            <td> {{$b->customer_email}} </td>
                                            <td> {{$b->customer_phone}} </td>
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

	var delayInMilliseconds = 2000;

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
	
</script>
@endsection