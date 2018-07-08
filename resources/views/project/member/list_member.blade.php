@extends('main')

@section('head')
     <!-- BEGIN PAGE LEVEL PLUGINS -->
     <link href="{{ asset('theme/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
     <!-- END PAGE LEVEL PLUGINS -->
@endsection

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
          <!-- BEGIN PAGE HEAD-->
          <div class="page-head">
               <!-- BEGIN PAGE TITLE -->
               <div class="page-title">
               <h1>Daftar Anggota
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
                    Anggota
                    <i class="fa fa-circle"></i>
               </li>
               <li>
                    <span class="active">Daftar Anggota</span>
               </li>
          </ul>
          <!-- END PAGE BREADCRUMB -->
          <!-- BEGIN PAGE BODY -->
          <div class="page-body">
               <div class="row">
                   <div class="col-md-12">
                       <!-- Begin: life time stats -->
                       <div class="portlet light portlet-fit portlet-datatable bordered">
                           <div class="portlet-title">
                               <div class="actions">
                                   <div class="btn-group">
                                       <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                           <i class="fa fa-share"></i>
                                           <span class="hidden-xs"> Opsi </span>
                                           <i class="fa fa-angle-down"></i>
                                       </a>
                                       <ul class="dropdown-menu pull-right" id="sample_3_tools">
                                           <li>
                                               <a href="javascript:;" data-action="0" class="tool-action">
                                                   <i class="icon-printer"></i> Print</a>
                                           </li>
                                           <li>
                                               <a href="javascript:;" data-action="1" class="tool-action">
                                                   <i class="icon-check"></i> Copy</a>
                                           </li>
                                           <li>
                                               <a href="javascript:;" data-action="2" class="tool-action">
                                                   <i class="icon-doc"></i> PDF</a>
                                           </li>
                                           <li>
                                               <a href="javascript:;" data-action="3" class="tool-action">
                                                   <i class="icon-paper-clip"></i> Excel</a>
                                           </li>
                                           <li>
                                               <a href="javascript:;" data-action="4" class="tool-action">
                                                   <i class="icon-cloud-upload"></i> CSV</a>
                                           </li>
                                           <li class="divider"> </li>
                                           <li>
                                               <a href="javascript:;" data-action="5" class="tool-action">
                                                   <i class="icon-refresh"></i> Reload</a>
                                           </li>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                           <div class="portlet-body">
                               <div class="table-container">
                                   <table class="table table-striped table-bordered table-hover" id="sample_3">
                                       <thead>
                                           <tr>
                                               <th> Nama </th>
                                               <th> Nomer KTP </th>
                                               <th> Pekerjaan </th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                             <tr>
                                                  <td> <a href="/project/member/detail/1"> Ahmad </a></td>
                                                  <td> 1234568789 </td>
                                                  <td> Pengusaha </td>
                                             </tr>
                                             <tr>
                                                  <td> <a href="/project/member/detail/1"> Ahmad 2 </a></td>
                                                  <td> 1234568789 </td>
                                                  <td> Pengusaha </td>
                                             </tr>
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                       <!-- End: life time stats -->
                   </div>
               </div>
          </div>
          <!-- END PAGE BODY -->               
     </div>
</div>

@endsection

@section('plugins')
     <!-- BEGIN PAGE LEVEL PLUGINS -->
     <script src="{{ asset('theme/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
     <script src="{{ asset('theme/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
     <script src="{{ asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
     <script src="{{ asset('theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
     <!-- END PAGE LEVEL PLUGINS -->
     <!-- BEGIN PAGE LEVEL SCRIPTS -->
     <script src="{{ asset('theme/assets/pages/scripts/table-datatables-buttons.min.js')}}" type="text/javascript"></script>
     <!-- END PAGE LEVEL SCRIPTS -->
@endsection