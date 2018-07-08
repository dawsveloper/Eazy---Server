@extends('main')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
          <!-- BEGIN PAGE HEAD-->
          <div class="page-head">
               <!-- BEGIN PAGE TITLE -->
               <div class="page-title">
               <h1>Anggota Baru
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
                    <span class="active">Tambah Anggota Baru</span>
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
                                            <label class="control-label">Nama</label>
                                            <input type="text" placeholder="Sientong" class="form-control" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Nomor KTP</label>
                                            <input type="email" placeholder="1234157890" class="form-control" /> </div>
                                        <div class="form-group mt-repeater">
                                             <div data-repeater-list="group-b">
                                                  <div class="mt-repeater-item">
                                                       <label class="control-label">Nomor Telp.</label>
                                                       <input type="text" placeholder="(+62) 821123409" class="form-control" /> 
                                                  </div>
                                                  <div data-repeater-item class="mt-repeater-item mt-overflow">
                                                       <label class="control-label">Nomor Telp. Tambahan</label>
                                                       <div class="mt-repeater-cell">
                                                            <input type="text" placeholder="(+62) 821123409" class="form-control mt-repeater-input-inline" />
                                                            <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">
                                                            <i class="fa fa-close"></i>
                                                            </a>
                                                       </div>
                                                  </div>
                                             </div>
                                             <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
                                                  <i class="fa fa-plus"></i> Tambah Nomor Kontak</a>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Pekerjaan</label>
                                            <input type="text" placeholder="Pengusaha" class="form-control" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Alamat</label>
                                            <textarea class="form-control" rows="3" placeholder="Alamat anggota"></textarea>
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