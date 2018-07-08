@extends('core/main')

@section('content')
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-body">
				<div class="row">
					<div class="col-md-12">	
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Table of Cars</span>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="row">
										<div class="col-md-6">
											<div class="btn-group">
												<a href="#" class="btn sbold green" data-target="#new_car" data-toggle="modal">New Car
				                                    <i class="fa fa-plus"></i>
				                                </a>
											</div>
										</div>
				                        <div class="col-md-6">
				                            <div class="btn-group pull-right">
				                                <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
				                                    <i class="fa fa-angle-down"></i>
				                                </button>
				                                <ul class="dropdown-menu pull-right">
				                                    <li>
				                                        <a href="javascript:;">
				                                            <i class="fa fa-print"></i> Print </a>
				                                    </li>
				                                    <li>
				                                        <a href="javascript:;">
				                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
				                                    </li>
				                                    <li>
				                                        <a href="javascript:;">
				                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
				                                    </li>
				                                </ul>
				                            </div>
				                        </div>
									</div>
								</div>
								<table class="table table-striped table-bordered table-hover table-checkable order-column" id="list_car">
									<thead>
										<tr>
											<th>Car ID</th>
											<th>Name</th>
											<th>Rent Price</th>
											<th>Total Rent</th>
											<th>Total Income</th>
											<th>Status</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>C001</td>
											<td>Toyota Alpha</td>
											<td>{{number_format(100000)}}</td>
											<td>10</td>
											<td>{{number_format(1000000)}}</td>
											<td>
						              			<span class="label label-outline label-info">Available</span>
											</td>
											<td>
						              			<div class="btn-group">
                                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    	<i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-left" role="menu">
                                                        <li>
                                                        	<a href="javascript:;">
                                                            <i class="icon-info"></i> Detail </a>
                                                        </li>
                                                        <li>
                                                        	<a href="javascript:;">
                                                            <i class="icon-trash"></i> Delete </a>
                                                        </li>
                                                    </ul>
                                                </div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- BEGIN MODAL -->
    <div id="new_car" class="modal fade" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Tambah Data Baru</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn default" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button class="btn green" type="submit" aria-hidden="true" onclick="$('#new_data').modal('hide')">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END NEW MODAL -->
@endsection


@section('plugins')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<link href="{{ asset('theme/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('theme/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('theme/assets/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

	<script>
		$(document).ready(function(){
			$('#list_car').DataTable();
		});
	</script>
@endsection