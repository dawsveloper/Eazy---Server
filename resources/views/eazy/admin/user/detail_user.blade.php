@extends('eazy/main')

@section('content')
<div class="page-content-wrapper">
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="row">
                            	<div class="col-md-3">
                            		<div class="portlet light bordered">
									   <img src="{{$profile->photo}}" class="user-pic rounded" width="150px" height="150px" alt="" style="margin-left: auto; margin-right: auto;display: block; margin-top: 10px;" />
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name"> {{$profile->name}} </div>
                                            <div class="profile-usertitle-job"> {{$profile->phone}} </div>
                                            <div class="profile-usertitle-job"> {{$profile->email}} </div>
                                        </div>
                                        <div class="profile-userbuttons">
                                            <a type="button" class="btn btn-sm btn-outline green btn-sm" href="#">Edit</a>
                                        </div>
									</div>
                            	</div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="portlet light portlet-fit portlet-datatable bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class=" icon-layers font-green"></i>
                                                <span class="caption-subject font-green sbold uppercase">Sample Datatable</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-hover dt-responsive" id="list_car">
                                                <thead>
                                                    <tr>
                                                        <th>Car Name</th>
                                                        <th>Year</th>
                                                        <th>Price/Day</th>
                                                        <th>Price/Week</th>
                                                        <th>Price/Month</th>
                                                        <th>Total Booking</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(count($cars)>0)
                                                        @foreach($cars as $c)
                                                        <tr>
                                                            <td>{{$c->name}}</td>
                                                            <td>{{$c->year}}</td>
                                                            <td>{{number_format($c->price)}}</td>
                                                            <td>{{number_format($c->price_week)}}</td>
                                                            <td>{{number_format($c->price_month)}}</td>
                                                            <td>{{$c->trips}}</td>
                                                            <td>
                                                                <a class="btn btn-sm green btn-outline filter-submit margin-bottom" href="#">
                                                                    Details
                                                                </a>
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
                                <div class="col-md-3">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title" >
                                            <div clas="col-md-12">
                                                <div class="caption font-dark" style="text-align: center; margin-top: 20px">
                                                    <span class="caption-subject bold uppercase">Summary Information</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row list-separated profile-stat">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="uppercase profile-stat-title"> {{number_format($profile->member_rating, 1)}} </div>
                                                <div class="uppercase profile-stat-text"> As Renter </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="uppercase profile-stat-title"> {{number_format($profile->provider_rating, 1)}} </div>
                                                <div class="uppercase profile-stat-text"> As Owner </div>
                                            </div>
                                        </div>
                                        <div class="row list-separated profile-stat">
                                            <div class="col-md-6 col-sm-4 col-xs-2">
                                                <div class="uppercase profile-stat-title"> {{$profile->car}} </div>
                                                <div class="uppercase profile-stat-text"> Car </div>
                                            </div>
                                            <div class="col-md-6 col-sm-4 col-xs-2">
                                                <div class="uppercase profile-stat-title"> {{$profile->trips}} </div>
                                                <div class="uppercase profile-stat-text"> Booking </div>
                                            </div>
                                        </div>
                                        <div class="row list-separated profile-stat">
                                            <div class="col-md-4 col-sm-4 col-xs-2">
                                                @if($profile->status == 0)
                                                <div class="uppercase profile-stat-title"><i class="icon-close font-red-intense"></i></div>
                                                @else
                                                <div class="uppercase profile-stat-title"><i class="icon-check font-green"></i></div>
                                                @endif
                                                <div class="uppercase profile-stat-text"> Account </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-2">
                                                @if($profile->identity_status == 0)
                                                <div class="uppercase profile-stat-title"><i class="icon-close font-red-intense"></i></div>
                                                @else
                                                <div class="uppercase profile-stat-title"><a href="/admin/user/id/{{$profile->id}}" data-toggle='ajax'><i class="icon-check font-green"></i></a></div>
                                                @endif
                                                <div class="uppercase profile-stat-text"> Personal ID </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-2">
                                                @if($profile->license_status == 0)
                                                <div class="uppercase profile-stat-title"><i class="icon-close font-red-intense"></i></div>
                                                @else
                                                <div class="uppercase profile-stat-title"><a href="/admin/user/license/{{$profile->id}}" data-toggle='ajax'><i class="icon-check font-green"></i></a></div>
                                                @endif
                                                <div class="uppercase profile-stat-text"> License </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')
<div class="modal" data-easein="flipYIn" id="posModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
@endsection

@section('plugins')
<link href="{{asset('theme/assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('theme/assets/pages/css/profile.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('theme/assets/pages/css/profile-2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('theme/assets/pages/css/profile2.css')}}" rel="stylesheet" type="text/css" />
<script src="{{ asset('theme/assets/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $('#list_car').DataTable();
</script>

@endsection