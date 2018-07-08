@extends('main')

@section('head')
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link href="{{ asset('theme/assets/pages/css/search.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL STYLES -->
@endsection

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
          <!-- BEGIN PAGE HEAD-->
          <div class="page-head">
               <!-- BEGIN PAGE TITLE -->
               <div class="page-title">
               <h1>Pencarian
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
                    <span class="active">Pencarian</span>
               </li>
          </ul>
          <!-- END PAGE BREADCRUMB -->
          <!-- BEGIN PAGE BODY -->
          <!-- <div class="page-body"> -->
               <div class="search-page search-content-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="search-filter bordered">
                                    <div class="search-label uppercase">Pencarian</div>
                                    <select class="form-control">
                                        <option>Anggota</option>
                                        <option>Trayek</option>
                                        <option>Angkot</option>
                                    </select>
                                    <div class="search-label uppercase">Pengurutan</div>
                                    <select class="form-control">
                                        <option>Tanggal</option>
                                        <option>Alphabet</option>
                                        <option>Jumlah</option>
                                    </select>
                                    <div class="search-label uppercase">Tanggal</div>
                                    <div class="input-icon right">
                                        <i class="icon-calendar"></i>
                                        <input class="form-control date-picker" type="text" placeholder="Any Date" /> </div>
                                    <button class="btn green bold uppercase btn-block">Cari</button>
                                </div>
                            </div>
                       </div>
                  </div>
          <!-- </div> -->
          <!-- END PAGE BODY -->               
     </div>
</div>

@endsection