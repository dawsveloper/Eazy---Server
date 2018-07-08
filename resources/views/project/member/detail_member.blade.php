@extends('main')

@section('head')
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="{{ asset('theme/assets/pages/css/profile-2.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL STYLES -->
@endsection

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEAD-->
		<div class="page-head">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
			<h1>Data Anggota
			</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
		<!-- END PAGE Head -->
		<!-- BEGIN PAGE BREADCRUMB -->
		<ul class="page-breadcrumb breadcrumb">
			<li>
			    <a href="/">Home</a>
			    <i class="fa fa-circle"></i>
			</li>
			<li>
			    <a href="/project/member/list_member">Daftar Anggota</a>
			    <i class="fa fa-circle"></i>
			</li>
			<li>
			    <span class="active">Detail Informasi</span>
			</li>
		</ul>
		<!-- END PAGE BREADCRUMB -->
		<!-- BEGIN PAGE BASE CONTENT -->
        <div class="profile">
            <div class="tabbable-line tabbable-full-width">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab"> Ringkasan </a>
                    </li>
                    <li>
                        <a href="#tab_1_3" data-toggle="tab"> Informasi Akun </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1_1">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="list-unstyled profile-nav">
                                    <li>
                                        <img src="{{ asset('theme/assets/pages/media/profile/people19.png')}}" class="img-responsive pic-bordered" alt="" />
                                        <a href="javascript:;" class="profile-edit"> edit </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Projects </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Messages
                                            <span> 3 </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Friends </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Settings </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-8 profile-info">
                                        <h1 class="font-green sbold uppercase">Ahmad Entong</h1>
                                        <p> Ini adalah penjelasan deskripsi tentang seorang anggota angkot. </p>
                                        <p>
                                            <a href="javascript:;"> www.mywebsite.com </a>
                                        </p>
                                        <ul class="list-inline">
                                            <li>
                                                <i class="fa fa-map-marker"></i> Jakarta </li>
                                            <li>
                                                <i class="fa fa-calendar"></i> 18 Jan 1982 </li>
                                            <li>
                                                <i class="fa fa-briefcase"></i> Design </li>
                                            <li>
                                                <i class="fa fa-star"></i> Top Seller </li>
                                            <li>
                                                <i class="fa fa-heart"></i> BASE Jumping </li>
                                        </ul>
                                    </div>
                                    <!--end col-md-8-->
                                    <div class="col-md-4">
                                        <div class="portlet sale-summary">
                                            <div class="portlet-title">
                                                <div class="caption font-red sbold"> Kepemilikan Angkot </div>
                                                <div class="tools">
                                                    <a class="reload" href="javascript:;"> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <span class="sale-info"> BEROPERASI
                                                            <i class="fa fa-img-up"></i>
                                                        </span>
                                                        <span class="sale-num"> 11 </span>
                                                    </li>
                                                    <li>
                                                        <span class="sale-info"> BERMASALAH
                                                            <i class="fa fa-img-down"></i>
                                                        </span>
                                                        <span class="sale-num"> 5 </span>
                                                    </li>
                                                    <li>
                                                        <span class="sale-info"> TIDAK AKTIF
                                                            <i class="fa fa-img-down"></i>
                                                        </span>
                                                        <span class="sale-num"> 5 </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-md-4-->
                                </div>
                                <!--end row-->
                                <div class="tabbable-line tabbable-custom-profile">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_11" data-toggle="tab"> Latest Customers </a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_22" data-toggle="tab"> Feeds </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_11">
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <i class="fa fa-briefcase"></i> Company </th>
                                                            <th class="hidden-xs">
                                                                <i class="fa fa-question"></i> Descrition </th>
                                                            <th>
                                                                <i class="fa fa-bookmark"></i> Amount </th>
                                                            <th> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:;"> Pixel Ltd </a>
                                                            </td>
                                                            <td class="hidden-xs"> Server hardware purchase </td>
                                                            <td> 52560.10$
                                                                <span class="label label-success label-sm"> Paid </span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:;"> Smart House </a>
                                                            </td>
                                                            <td class="hidden-xs"> Office furniture purchase </td>
                                                            <td> 5760.00$
                                                                <span class="label label-warning label-sm"> Pending </span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:;"> FoodMaster Ltd </a>
                                                            </td>
                                                            <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                                            <td> 12400.00$
                                                                <span class="label label-success label-sm"> Paid </span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:;"> WaterPure Ltd </a>
                                                            </td>
                                                            <td class="hidden-xs"> Payment for Jan 2013 </td>
                                                            <td> 610.50$
                                                                <span class="label label-danger label-sm"> Overdue </span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:;"> Pixel Ltd </a>
                                                            </td>
                                                            <td class="hidden-xs"> Server hardware purchase </td>
                                                            <td> 52560.10$
                                                                <span class="label label-success label-sm"> Paid </span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:;"> Smart House </a>
                                                            </td>
                                                            <td class="hidden-xs"> Office furniture purchase </td>
                                                            <td> 5760.00$
                                                                <span class="label label-warning label-sm"> Pending </span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:;"> FoodMaster Ltd </a>
                                                            </td>
                                                            <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                                            <td> 12400.00$
                                                                <span class="label label-success label-sm"> Paid </span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--tab-pane-->
                                        <div class="tab-pane" id="tab_1_22">
                                            <div class="tab-pane active" id="tab_1_1_1">
                                                <div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
                                                    <ul class="feeds">
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> You have 4 pending tasks.
                                                                            <span class="label label-danger label-sm"> Take action
                                                                                <i class="fa fa-share"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New version v1.4 just lunched! </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> 20 mins </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-danger">
                                                                            <i class="fa fa-bolt"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Database server #12 overloaded. Please fix the issue. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 24 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 30 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-success">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 40 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-warning">
                                                                            <i class="fa fa-plus"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 1.5 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Web server hardware needs to be upgraded.
                                                                            <span class="label label-inverse label-sm"> Overdue </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 2 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 3 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-warning">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 5 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 18 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Tes </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--tab-pane-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tab_1_2-->
                    <div class="tab-pane" id="tab_1_3">
                        <div class="row profile-account">
                            <div class="col-md-3">
                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab_1-1">
                                            <i class="fa fa-cog"></i> Data Diri </a>
                                        <span class="after"> </span>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_2-2">
                                            <i class="fa fa-picture-o"></i> Ganti Gambar Profile </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_3-3">
                                            <i class="fa fa-lock"></i> Ganti Password </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <div id="tab_1-1" class="tab-pane active">
                                        <form role="form" action="#">
                                            <div class="form-group">
                                                <label class="control-label">Nama</label>
                                                <input type="text" placeholder="Ahmad Entong" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Kontak</label>
                                                <input type="text" placeholder="08210098124" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Kegemaran</label>
                                                <input type="text" placeholder="Hobi" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Pekerjaan</label>
                                                <input type="text" placeholder="Pengusaha" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Tentang</label>
                                                <textarea class="form-control" rows="3" placeholder="Deskripsi"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Website Url</label>
                                                <input type="text" placeholder="http://new.entongproject.com" class="form-control" /> </div>
                                            <div class="margiv-top-10">
                                                <a href="javascript:;" class="btn green"> Simpan </a>
                                                <a href="javascript:;" class="btn default"> Batal </a>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="tab_2-2" class="tab-pane">
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                            </p>
                                        <form action="#" role="form">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="..."> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger"> NOTE! </span>
                                                    <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green"> Submit </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="tab_3-3" class="tab-pane">
                                        <form action="#">
                                            <div class="form-group">
                                                <label class="control-label">Current Password</label>
                                                <input type="password" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">New Password</label>
                                                <input type="password" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Re-type New Password</label>
                                                <input type="password" class="form-control" /> </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green"> Change Password </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end col-md-9-->
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
	</div>
@endsection

@section('plugins')
@endsection