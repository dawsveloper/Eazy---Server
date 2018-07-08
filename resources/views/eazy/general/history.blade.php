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
                            <span class="caption-subject bold uppercase">History</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_1">
                            <thead>
                                <tr>
                                	@if($user == 'admin')
	                                	<th> Booking Number </th>
	                                	<th> Car Name </th>
	                                	<th> Renter Name </th>
	                                	<th> Owner Name </th>
	                                	<th> Rent Date </th>
	                                	<th> Total Cost (RM) </th>
	                                    <th style="width: 200px"> Status </th>
                                	@elseif($user == 'owner')
	                                	<th> Booking Number </th>
	                                	<th> Car Name </th>
	                                	<th> Renter Name </th>
	                                	<th> Rent Date </th>
	                                	<th> Total Cost (RM) </th>
	                                    <th style="width: 200px"> Status </th>
                                	@else
	                                	<th> Booking Number </th>
	                                	<th> Car Name </th>
	                                	<th> Owner Name </th>
	                                	<th> Rent Date </th>
	                                	<th> Total Cost (RM) </th>
	                                    <th style="width: 200px"> Status </th>
                                	@endif
                                	<th style="width: 100px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($books)>0)
                                    @foreach($books as $b)
                                    	@if($user == 'admin')
                                        <tr>
                                            <td> {{$b->booking_number}} </td>
                                            <td> {{$b->car_name}} </td>
                                            <td> {{$b->customer_name}} </td>
                                            <td> {{$b->owner_name}} </td>
                                            <td> 
                                            	<i class="font-blue-steel" style="font-style: normal">{{date('M, d Y H:i', strtotime($b->date_start))}}</i> 
                                            	<br> <i class="font-red-thunderbird" style="font-style: normal">{{date('M, d Y H:i', strtotime($b->date_end))}}</i>
                                            </td>
											<td> {{number_format($b->total_price)}}</td>
                                            <td> 
												@if ($b->book_status == 1)
													<a class="blue-madison" href="javascript:;">
														On Going
													</a> 
												@elseif ($b->book_status == 2)
													<a class="red-thunderbird" href="javascript:;">
														Rejected
													</a> 
												@else
													<a class="green-turquoise" href="javascript:;">
														Finished
													</a> 
												@endif
											</td>
	                                    	<td>
												<a class="btn btn-xs green" onclick="detail('{{$b->id}}')" id="" name="{{$b->id}}" type="button">Detail
												</a>
											</td>
                                        </tr>
                                    	@elseif($user == 'owner')
                                        <tr>
                                            <td> {{$b->booking_number}} </td>
                                            <td> {{$b->car_name}} </td>
                                            <td> {{$b->customer_name}} </td>
                                            <td> 
                                            	<i class="font-blue-steel" style="font-style: normal">{{date('M, d Y H:i', strtotime($b->date_start))}}</i> 
                                            	<br> <i class="font-red-thunderbird" style="font-style: normal">{{date('M, d Y H:i', strtotime($b->date_end))}}</i>
                                            </td>
											<td> {{number_format($b->total_price)}}</td>
                                            <td> 
												@if ($b->book_status == 1)
													<a class="blue-madison" href="javascript:;">
														On Going
													</a> 
												@elseif ($b->book_status == 2)
													<a class="red-thunderbird" href="javascript:;">
														Rejected
													</a> 
												@else
													<a class="green-turquoise" href="javascript:;">
														Finished
													</a> 
												@endif
											</td>
	                                    	<td>
												<a class="btn btn-xs green" onclick="detail('{{$b->id}}')" id="" name="{{$b->id}}" type="button">Detail
												</a>
											</td>
                                        </tr>
                                    	@else
                                        <tr>
                                            <td> {{$b->booking_number}} </td>
                                            <td> {{$b->car_name}} </td>
                                            <td> {{$b->owner_name}} </td>
                                            <td> 
                                            	<i class="font-blue-steel" style="font-style: normal">{{date('M, d Y H:i', strtotime($b->date_start))}}</i> 
                                            	<br> <i class="font-red-thunderbird" style="font-style: normal">{{date('M, d Y H:i', strtotime($b->date_end))}}</i>
                                            </td>
											<td> {{number_format($b->total_price)}}</td>
											<td> 
												@if ($b->book_status == 1)
													<a class="blue-madison" href="javascript:;">
														On Going
													</a> 
												@elseif ($b->book_status == 2)
													<a class="red-thunderbird" href="javascript:;">
														Rejected
													</a> 
												@else
													<a class="green-turquoise" href="javascript:;">
														Finished
													</a> 
												@endif
											</td>
	                                    	<td>
												<a class="btn btn-xs green" onclick="detail('{{$b->id}}')" id="" name="{{$b->id}}" type="button">Detail
												</a>
											</td>
                                        </tr>
                                    	@endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
</div>
<div class="modal fade modal-primary" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">History Detail</h4>
            </div>
            <div class="modal-body"> Modal body goes here </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
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

	function detail($id){
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
		$.ajax({
				url: '/detail_history/' + $id,
				type: 'get',
				data: {'id':$id},
				success: function(data){
				},
		});	 
	}
	
</script>
@endsection