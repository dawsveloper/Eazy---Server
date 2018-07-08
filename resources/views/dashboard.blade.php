@extends('main')

@section('content')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<!-- Main row -->
		<div class="row">
			<div class="col-md-12">
	            <!-- BEGIN MARKERS PORTLET-->
	            <div class="box box-info">
					<div class="box-header with-border">
					  <h3 class="box-title">Lokasi</h3>

					  <div class="box-tools pull-right">
					    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					    </button>
					    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					  </div>
					</div>
				    <!-- /.box-header -->
				    <div class="box-body">
	                    <div id="gmap_marker" class="gmaps"> </div>
	                </div>
	            </div>
	            <!-- END MARKERS PORTLET-->
	        </div>
		</div>
		<div class="row">
		<!-- Left col -->
		<div class="col-md-8">
		  <!-- /.box -->

		  <!-- TABLE: LATEST ORDERS -->
			<div class="box box-info">
			<div class="box-header with-border">
			  <h3 class="box-title">Status Peralatan Terkini</h3>

			  <div class="box-tools pull-right">
			    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			    </button>
			    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			  </div>
			</div>
		    <!-- /.box-header -->
		    <div class="box-body">
		      <div class="table-responsive">
		        <table class="table no-margin">
		          <thead>
		          <tr>
		            <th>ID</th>
		            <th>Item</th>
		            <th>Status</th>
		            <th>Maintenance Selanjutnya</th>
		          </tr>
		          </thead>
		          <tbody>
		          <tr>
		            <td><a href="#">AX1001</a></td>
		            <td>Transfer Pump</td>
		            <td><span class="label label-success">Sehat</span></td>
		            <td>
		              <div class="sparkbar" data-color="#00a65a" data-height="20">August 10, 2018</div>
		            </td>
		          </tr>
		          <tr>
		            <td><a href="#">BC2110</a></td>
		            <td>Sea Well Pump 1</td>
		            <td><span class="label label-warning">Pemesanan</span></td>
		            <td>
		              <div class="sparkbar" data-color="#f39c12" data-height="20">January 1, 2018</div>
		            </td>
		          </tr>
		          <tr>
		            <td><a href="#">KL5521</a></td>
		            <td>Sea Well Pump 2</td>
		            <td><span class="label label-danger">Overdue</span></td>
		            <td>
		              <div class="sparkbar" data-color="#f56954" data-height="20">July 10, 2017</div>
		            </td>
		          </tr>
		          <tr>
		            <td><a href="#">GH5321</a></td>
		            <td>Filter Pump</td>
		            <td><span class="label label-success">Sehat</span></td>
		            <td>
		              <div class="sparkbar" data-color="#00c0ef" data-height="20">September 5, 2018</div>
		            </td>
		          </tr>
		          
		          </tbody>
		        </table>
		      </div>
		      <!-- /.table-responsive -->
		    </div>
		    <!-- /.box-body -->
		    <div class="box-footer clearfix">
		      <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Pembelian Baru</a>
		      <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Lihat Pembelian</a>
		    </div>
		    <!-- /.box-footer -->
		  </div>
		  <!-- /.box -->

		  <!-- /.box -->
		</div>
		<!-- /.col -->

		<div class="col-md-4">
		   <div class="info-box bg-aqua">
		    <span class="info-box-icon"><i class="fa fa-credit-card"></i></span>

		    <div class="info-box-content">
		      <span class="info-box-text">Jumlah Alat di Gudang</span>
		      <span class="info-box-number">800</span>

		      <div class="progress">
		        <div class="progress-bar" style="width: 45%"></div>
		      </div>
		          <span class="progress-description">
		          55% sudah terpakai
		          </span>
		    </div>
		    <!-- /.info-box-content -->
		  </div>
		  <!-- /.info-box -->
		  <div class="info-box bg-purple">
		    <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

		    <div class="info-box-content">
		      <span class="info-box-text">Jumlah Alat Dipesan</span>
		      <span class="info-box-number">10</span>

		      <div class="progress">
		        <div class="progress-bar" style="width: 30%"></div>
		      </div>
		          <span class="progress-description">
		          Target pergantian alat 10/40
		          </span>
		    </div>
		    <!-- /.info-box-content -->
		  </div>
		</div>
		<!-- /.col -->
		</div>
	</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection

@section('plugins')

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyAc9xvWVBcEIpyh251v4xrT4HEpfIOo9L0" type="text/javascript"></script>
	<script src="{{ asset('theme/assets/global/plugins/gmaps/gmaps.min.js') }}" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script>
	
	var MapsGoogle = function () {

    var mapMarker = function () {
        var map = new GMaps({
            div: '#gmap_marker',
            lat: -8.4095,
            lng: 115.1889,

        });
        map.addMarker({
            lat: -8.8003,
            lng: 115.1606,
            // title: 'Marker with InfoWindow',
            infoWindow: {
                content: '<span style="color:#000">Uluwatu</span>'
            }
        });
        map.addMarker({
            lat: -8.7939,
            lng: 115.2302,
            // title: 'Marker with InfoWindow',
            infoWindow: {
                content: '<span style="color:#000">Nusa Dua</span>'
            }
        });
        map.addMarker({
            lat: -8.705,
            lng: 115.165,
            // title: 'Marker with InfoWindow',
            infoWindow: {
                content: '<span style="color:#000">Legian</span>'
            }
        });
        map.addMarker({
            lat: -8.5193,
            lng: 115.2633,
            // title: 'Marker with InfoWindow',
            infoWindow: {
                content: '<span style="color:#000">Ubud</span>'
            }
        });
        map.setZoom(9);
    }

    return {
        //main function to initiate map samples
        init: function () {
            mapMarker();
        }

    };

}();

jQuery(document).ready(function() {
    MapsGoogle.init();
});
	</script>
	<!-- END PAGE LEVEL SCRIPTS -->
@endsection