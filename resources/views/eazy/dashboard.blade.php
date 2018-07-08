@extends('/eazy/main')

@section('content')

<div class="page-content-wrapper">
<!-- BEGIN CONTENT -->
<meta name="_token" content="{!! csrf_token() !!}"/>
<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class="row">
			<div class="col-md-4">

				<button class="btn btn-info btn-sm" id="geo" name="" type="button" data-toggle="tooltip">
                     Geo
                </button>
			</div>
			<div class="col-md-4">

				<button class="btn btn-info btn-sm" id="cek" name="" type="button" data-toggle="tooltip">
                     Cek
                </button>
			</div>
			<div class="col-md-4">

				<button class="btn btn-info btn-sm" id="cekcar" name="" type="button" data-toggle="tooltip">
                     Cek Car
                </button>
			</div>
			<div class="col-md-4">

				<button class="btn btn-info btn-sm" id="insert_guest" name="" type="button" data-toggle="tooltip">
                     Insert Guest
                </button>
			</div>
			<div class="col-md-4">

				<button class="btn btn-info btn-sm" id="insert_booking" name="" type="button" data-toggle="tooltip">
                     Insert Booking
                </button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<input type="hidden" name="_token" value="{{ csrf_token()}}">
							<div class="form-group">
					            <input type="file" name="boq_file" id="boq_file" style="width:350px">
					        </div>
					        <button class="btn btn-info btn-sm" id="uploadboq" name="uploadboq" type="button" data-toggle="tooltip" title="Upload BOQ">
	                           Upload
	                        </button>
			</div>
			<div class="col-md-4">

				<button class="btn btn-info btn-sm" id="cek2" name="" type="button" data-toggle="tooltip">
                     Cek
                </button>
			</div>
			<div class="col-md-4">

				<button class="btn btn-info btn-sm" id="search" name="" type="button" data-toggle="tooltip">
                     Search
                </button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<button class="btn btn-info btn-sm" id="fav1" name="" type="button" data-toggle="tooltip">
                     Fav Rate
                </button>
			</div>
		</div>
	</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection

@section('plugins')

	<script>

	$("#geo").click(function(){
		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: '/api/customer/geo_list_car',
			type: 'get',
			success: function(data){

	       		if(data != ''){
	       			
	       			alert(data);
				    
	       		}
			},
			error: function(){
				alert('error');
			}
		});
	});
	
	$("#search").click(function(){
		var form_data = new FormData();
		form_data.append('data', 'djqwok098123|avanza|Toyota|2017|Matic|100|700|3000');

		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: '/api/provider/rental/api_add_new_car',
			type: 'post',
			processData: false,
      		contentType: false,
      		cache: false,
			data: form_data,
			success: function(data){

	       		if(data != ''){
	       			
	       			alert(data);
				    
	       		}
			},
			error: function(){
				alert('error');
			}
		});
	});  
	$("#cekcar").click(function(){
		var form_data = new FormData();

		form_data.append('data', '5abd63c127a8fckABK56');
		

		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: '/api/provider/api_call_car_photos',
			type: 'post',
			processData: false,
      		contentType: false,
      		cache: false,
			data: form_data,
			success: function(data){

	       		if(data != ''){
	       			
	       			alert(data);
				    
	       		}
			},
			error: function(){
				alert('error');
			}
		});
		// alert("Clicked");
	}); 
	$("#cek").click(function(){
		var form_data = new FormData();

		form_data.append('transmission', 'Both');
		form_data.append('year', 'All');
		form_data.append('type', 'All');
		form_data.append('fuel', 'All');
		form_data.append('producer', 'All');
		form_data.append('minPrice', 0);
		form_data.append('maxPrice', 1000000);

		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: '/api/customer/filter_car',
			type: 'post',
			processData: false,
      		contentType: false,
      		cache: false,
			data: form_data,
			success: function(data){

	       		if(data != ''){
	       			
	       			alert(data);
				    
	       		}
			},
			error: function(){
				alert('error');
			}
		});
		// alert("Clicked");
	}); 
	$("#insert_guest").click(function(){
		var form_data = new FormData();
		form_data.append('data', 'wul|faridawulandari140@gmail.com|0812345679|1234|null|null|null|null');

		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: '/api/customer/signup',
			type: 'post',
			processData: false,
      		contentType: false,
      		cache: false,
			data: form_data,
			success: function(data){
				alert(data);

	       		if(data != ''){
	       			
	       			alert("Please verify your account first");
				    
	       		}
			},
			error: function(){
				alert('error');
			}
		});
	}); 
	$("#insert_booking").click(function(){
		var form_data = new FormData();
		form_data.append('data', 'member#KM1920mnbs#djqwok098123#firdaus#123#faridawulandari140@gmail.com#Daily#1#03/16/2018 05:16#03/20/2018 05:16#Wallet#150000');

		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: '/api/customer/book_car',
			type: 'post',
			processData: false,
      		contentType: false,
      		cache: false,
			data: form_data,
			success: function(data){

	       		if(data != ''){
	       			
	       			alert("saved");
				    
	       		}
			},
			error: function(){
				alert('error');
			}
		});
	}); 

	$("#uploadboq").click(function(){
		var file_data = $('#boq_file').prop('files')[0];
		var form_data = new FormData();

        form_data.append('file', file_data);
        form_data.append('id', "12345");

		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url:'/api/customer/upload/profpict',
			data:form_data,
			type:'post',
			processData: false,
      		contentType: false,
      		cache: false,
			success:function(data){
				if(data != ''){
					alert(data);
				}
			},
			error:function(xhr, status, error){
				callAlert("Gagal Mengunggah BOQ");
			}
		});
	});

	$("#cek2").click(function(){
		var form_data = new FormData();
		form_data.append('data', '0');

		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: '/api/customer/book_list',
			type: 'post',
			processData: false,
      		contentType: false,
      		cache: false,
			data: form_data,
			success: function(data){

	       		if(data != ''){
	       			
	       			$.each(data, function(key, value){
	       				alert(value);
					});
				    
	       		}
			},
			error: function(){
				alert('error');
			}
		});
	}); 


	$("#fav1").click(function(){
		var form_data = new FormData();
		form_data.append('data', 'rating');

		$.ajaxSetup({
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: '/api/customer/list_fav_car',
			type: 'post',
			processData: false,
      		contentType: false,
      		cache: false,
			data: form_data,
			success: function(data){

	       		if(data != ''){
	       			
	       			alert(data);
				    
	       		}
			},
			error: function(){
				alert('error');
			}
		});
	}); 
</script>
@endsection