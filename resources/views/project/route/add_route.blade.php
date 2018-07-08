@extends('main')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
          <!-- BEGIN PAGE HEAD-->
          <div class="page-head">
               <!-- BEGIN PAGE TITLE -->
               <div class="page-title">
               <h1>Trayek Baru
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
                    Trayek
                    <i class="fa fa-circle"></i>
               </li>
               <li>
                    <span class="active">Tambah Trayek Baru</span>
               </li>
          </ul>
          <!-- END PAGE BREADCRUMB -->
          <!-- BEGIN PAGE BODY -->
      		<div class="page-body">
      			<div class="row">
      				<div class="col-md-12">
      					<div class="portlet light bordered">
                        <div class="portlet-body">
                              <form role="form" action="#">
                                  <div class="form-group">
                                      <label class="control-label">Nama Trayek</label>
                                      <input type="text" placeholder="Trayek M" class="form-control" /> </div>
                                  <div class="form-group">
                                      <label class="control-label">Rute Awal</label>
                                      <input type="email" placeholder="Pondok Bambu" class="form-control" /> </div>
                                  <div class="form-group">
                                      <label class="control-label">Rute Akhir</label>
                                      <input type="text" placeholder="Blok M" class="form-control" /> </div>
                                  <div class="form-group">
                                      <label class="control-label">Penanggung Jawab</label>
                                      <input type="text" placeholder="Sientong" class="form-control" /> </div>
                                  </div>
                                  <div class="margin-top-10">
                                      <a href="javascript:;" class="btn green">Save Changes </a>
                                      <a href="javascript:;" class="btn default">Cancel </a>
                                  </div>
                              </form>
                        </div>
                   </div>
      				</div>
      			</div>
            <!-- END PAGE BODY -->               
		</div>
	</div>
</div>

@endsection

@section('plugins')


<link href="{{ asset('theme/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

<script src="{{ asset('theme/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/pages/scripts/form-wizard.min.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('theme/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />

<script src="{{ asset('theme/assets/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('theme/assets/pages/scripts/form-repeater.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@endsection