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
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject bold uppercase">Users</span>
    					</div>
    				</div>
    				<div class="portlet-body">
    					<div class="table-toolbar">
                        	<div class="row">
                        		<div class="col-md-6">
                        			<div class="btn-group">
                        				<a href="/admin/user/add_new_user" class="btn sbold green"> Add New
                                        	<i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
    					<table class="table table-striped table-hover dt-responsive" id="list_user">
    						<thead>
    							<tr>
    								<th colspan="2" width="200px">Member</th>
    								<th style="width: 200px">Email</th>
    								<th width="100px">Phone</th>
    								<th width="125px">ID Status</th>
    								<th width="125px">License Status</th>
    								<th style="width: 50px">Status</th>
    								<th width="200px">Action</th>
    							</tr>
    						</thead>
    						<tbody>
    							@if(count($users) > 0)
    								@foreach($users as $u)
    									<tr>
    										@if($u->photo != null)
    										<td clas="fit" width="35px"><img class="user-pic rounded" src="{{$u->photo}}"width="40" height="40"></td>
    										@else
    										<td class="fit"><img  class="user-pic rounded" src="{{asset('/images/profile/user_def.png')}}" width="40" height="40"></td>
    										@endif
    										<td style="vertical-align: middle;">{{$u->name}}</td>
    										<td style="vertical-align: middle;">{{$u->email}}</td>
    										<td style="vertical-align: middle;">{{$u->phone}}</td>
    										<td style="vertical-align: middle;">
    											@if($u->identity_status == 0)
												<span class= "label label-sm bg-red-thunderbird">
													Not Uploaded
												</span>
    											@elseif($u->identity_status == 1)
												<span class= "label label-sm bg-blue-steel">
													Uploaded
												</span>
    											@endif
    										</td>
    										<td style="vertical-align: middle;">
    											@if($u->license_status == 0)
												<span class= "label label-sm bg-red-thunderbird">
													Not Uploaded
												</span>
    											@elseif($u->license_status == 1)
												<span class= "label label-sm bg-blue-steel">
													Uploaded
												</span>
    											@endif
    										</td>
    										<td style="vertical-align: middle;">
    											@if($u->status == 0)
    											<span class= "label label-sm bg-yellow-crusta">
													Pending
												</span>
    											@elseif($u->status == 1)
												<span class= "label label-sm bg-blue-steel">
													Active
												</span>
    											@elseif($u->status == 2)
												<span class= "label label-sm bg-red-thunderbird">
													Non-Active
												</span>
    											@endif
    										</td>
    										<td style="vertical-align: middle;">
												<a class="btn btn-sm green btn-outline filter-submit margin-bottom" href="/admin/user/detail_user/{{$u->id}}">
													Details
                                                </a>
    											@if($u->status == 0)
												<div class="btn-group">
													<a class="btn btn-sm yellow-crusta btn-outline filter-submit margin-bottom" href="javascript:;" data-toggle="dropdown">
														Pending
														<i class="fa fa-angle-down"></i>
													</a> 
													<ul class="dropdown-menu">
														<li>
															<a id="" name="{{$u->id}}" type="button">
																<i class="fa fa-check"></i> Confirm </a>
															</a>
														</li>
														<li>
															<a id="rejectCar" name="{{$u->id}}">
																<i class="fa fa-close"></i> Reject </a>
															</a>
														</li>													
													</ul>
												</div>
    											@elseif($u->status == 1)
												<a class="btn btn-sm red-thunderbird btn-outline filter-submit margin-bottom" onclick="deactiveCar('{{$u->id}}')">
													Deactivate
                                                </a>
    											@elseif($u->status == 2)
												<a class="btn btn-sm blue-steel btn-outline filter-submit margin-bottom" onclick="activeCar('{{$u->id}}')">
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

<script type="text/javascript">
	$('#list_user').DataTable();

	function detailUser(id){

        thisUrl = '/admin/user/detail_user/' + id;
        alert(thisUrl);

		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: thisUrl,
			type: 'get',
			data: {'id':id},
			success:function(data){

			}
		});
	}
</script>
@endsection