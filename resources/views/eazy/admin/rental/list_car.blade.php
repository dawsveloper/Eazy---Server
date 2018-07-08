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
                            <span class="caption-subject bold uppercase">List Cars</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                    	<div class="table-toolbar">
                        	<div class="row">
                        		<div class="col-md-6">
                        			<div class="btn-group">
                        				<a href="/provider/rental/new_car" class="btn sbold green"> Add New
                                        	<i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_1">
                            <thead>
                                <tr>
                                    <th> Car Name </th>
                                    <th> Year </th>
                                    <th> Owner </th>
                                    <th> Price/Day </th>
                                    <th> Price/Week </th>
                                    <th> Price/Month </th>
                                    <th> Trip(s) </th>
                                    <th> Total Income </th>
                                    <th style="width: 150px"> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($cars)>0)
                                    @foreach($cars as $c)
                                        <tr>
                                            <td> {{$c->name}} </td>
                                            <td> {{$c->year}} </td>
                                            <td> {{$c->owner_name}} </td>
                                            <td> {{number_format($c->price)}} </td>
                                            <td> {{number_format($c->price_week)}} </td>
                                            <td> {{number_format($c->price_month)}} </td>
                                            <td> {{$c->trips}} </td>
                                            <td> {{number_format($c->total_income)}} </td>
                                            <td>
                                            	@if($c->available == 1)
                                                <div class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-xs blue-steel" href="javascript:;" data-toggle="dropdown">
                                                            Available
                                                            <i class="fa fa-angle-down"></i>
                                                        </a> 
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a onclick="change('{{$c->id}}')" type="button">
                                                                    <i class="fa fa-close"></i> Not Available </a>
                                                                </a>
                                                            </li>                                               
                                                        </ul>
                                                    </div>
                                                </div>
                                            	@elseif($c->available == 0)
                                            		<div class="btn-group">
														<a class="btn btn-xs red-thunderbird" href="javascript:;" data-toggle="dropdown">
															Not Available
															<i class="fa fa-angle-down"></i>
														</a> 
														<ul class="dropdown-menu">
															<li>
																<a onclick="change('{{$c->id}}')" type="button">
																	<i class="fa fa-check"></i> Available </a>
																</a>
															</li>												
														</ul>
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
	
</script>
@endsection