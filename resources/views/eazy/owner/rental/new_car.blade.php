@extends('/eazy/main')

@section('content')

<div class="page-content-wrapper">
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<div class="page-content">
		<div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered" id="form_wizard_1">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-red"></i>
                            <span class="caption-subject font-red bold uppercase"> Regis Your Car -
                                <span class="step-title"> Step 1 of 4 </span>
                            </span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-cloud-upload"></i>
                            </a>
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-wrench"></i>
                            </a>
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-trash"></i>
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" action="#" id="submit_form" method="POST">
                            <div class="form-wizard">
                                <div class="form-body">
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li>
                                            <a href="#tab1" data-toggle="tab" class="step">
                                                <span class="number"> 1 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Basic Information 
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab2" data-toggle="tab" class="step">
                                                <span class="number"> 2 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Upload Documentation 
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab3" data-toggle="tab" class="step">
                                                <span class="number"> 3 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Price Information 
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab4" data-toggle="tab" class="step">
                                                <span class="number"> 4 </span>
                                                <span class="desc">
                                                    <i class="fa fa-check"></i> Confirmation 
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                        <div class="progress-bar progress-bar-success"> </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="alert alert-danger display-none">
                                            <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. 
                                        </div>
                                        <div class="alert alert-success display-none">
                                            <button class="close" data-dismiss="alert"></button> Your form validation is successful! 
                                        </div>

                                        <div class="tab-pane active" id="tab1">
                                            <h3 class="block">Provide car's information</h3>
                                            <input type="text" name="owner_id" id="owner_id" value="{{$id}}" style="display:none">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="car_name" id="car_name"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Year
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="car_year" id="car_year" class="form-control">
                                                        <option value=""></option>
                                                        <option value="2001">2001</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Producer
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="car_producer" id="car_producer" class="form-control">
                                                        <option value=""></option>
                                                        <option value="Alfa Romeo">Alfa Romeo</option>
                                                        <option value="Audi">Audi</option>
                                                        <option value="BMW">BMW</option>
                                                        <option value="Chevrolet">Chevrolet</option>
                                                        <option value="Daihatsu">Daihatsu</option>
                                                        <option value="Ferrari">Ferrari</option>
                                                        <option value="Ford">Ford</option>
                                                        <option value="Honda">Honda</option>
                                                        <option value="Hyundai">Hyundai</option>
                                                        <option value="Isuzu">Isuzu</option>
                                                        <option value="Jaguar">Jaguar</option>
                                                        <option value="Kia">Kia</option>
                                                        <option value="Lamborghini">Lamborghini</option>
                                                        <option value="Land Rover">Rover</option>
                                                        <option value="Mazda">Mazda</option>
                                                        <option value="McLaren">McLaren</option>
                                                        <option value="Mercedes">Mercedes</option>
                                                        <option value="Mitsubishi">Mitsubishi</option>
                                                        <option value="Nissan">Nissan</option>
                                                        <option value="Peugeot">Peugeot</option>
                                                        <option value="Porcshe">Porcshe</option>
                                                        <option value="Suzuki">Suzuki</option>
                                                        <option value="Toyota">Toyota</option>
                                                        <option value="Volkswagen">Volkswagen</option>
                                                        <option value="Volvo">Volvo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Transmission
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="radio-list">
                                                        <label>
                                                            <input type="radio" name="car_trans" value="Matic" data-title="Matic" /> Matic 
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="car_trans" value="Manual" data-title="Manual" /> Manual 
                                                        </label>
                                                    </div>
                                                    <div id="form_trans_error"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Body Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="car_type" id="car_type" class="form-control">
                                                        <option value=""></option>
                                                        <option value="Sedan">Sedan</option>
                                                        <option value="Hatchback">Hatchback</option>
                                                        <option value="SUV">SUV</option>
                                                        <option value="MPV">MPV</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Size
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="car_size" id="car_size" class="form-control">
                                                        <option value=""></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11"11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Fuel Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="car_fuel_type" id="car_fuel_type" class="form-control">
                                                        <option value=""></option>
                                                        <option value="Premium">Premium</option>
                                                        <option value="Pertamax">Pertamax</option>
                                                        <option value="Solar">Solar</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Fuel Regulation
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="car_fuel_regulation" id="car_fuel_regulation" class="form-control">
                                                        <option value=""></option>
                                                        <option value="Full to Full">Full to Full</option>
                                                        <option value="Half to Half">Half to Half</option>
                                                        <option value="Half to Full">Half to Full</option>
                                                        <option value="Empty to Empty">Empty to Empty</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Air Conditioner
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <div class="radio-list">
                                                        <label><input type="radio" name="car_ac" value="1" data-title="yes" /> Yes </label>
                                                        <label><input type="radio" name="car_ac" value="0" data-title="no" /> No </label>
                                                    </div>
                                                    <div id="form_ac_error"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Location
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="car_location" id="car_location" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <textarea class="form-control" id="car_desc" name="car_desc" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <h3 class="block">Upload car's documentation</h3>
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Upload Car Photo</label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="..." id="car_photo" name="car_photo"> </span>
                                                            <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix margin-top-10">
                                                        <span class="label label-danger"> NOTE! </span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Upload Note Grand</label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="..." id="car_note"> </span>
                                                            <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix margin-top-10">
                                                        <span class="label label-danger"> NOTE! </span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <h3 class="block">Provide car's price</h3>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Daily Price</label>
                                                <div class="col-md-9">
                                                    <input id="range_daily" type="text" /> </div>
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <label class="control-label col-md-3">Value</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" id="daily_price" name="daily_price" type="text" value="10" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Weekly Price</label>
                                                <div class="col-md-9">
                                                    <input id="range_weekly" type="text" /> </div>
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <label class="control-label col-md-3">Weekly Price</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" id="weekly_price" name="weekly_price" type="text" value="10" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Monthly Price</label>
                                                <div class="col-md-9">
                                                    <input id="range_monthly" type="text" /> </div>
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <label class="control-label col-md-3">Monthly Price</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" id="monthly_price" name="monthly_price" type="text" value="10" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                            <h3 class="block">Confirm your account</h3>
                                            <h4 class="form-section">Car Information</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Name:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_name"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Year:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_year"> </p>
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Producer:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_producer"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Transmission:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_trans"> </p>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Body Type:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_type"> </p>
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Size:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_size"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Fuel Type:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_fuel_type"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Fuel Regulation:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_fuel_regulation"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Air Conditioner:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_ac"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Location:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_location"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Description:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="car_desc"> </p>
                                                </div>
                                            </div>

                                            <h4 class="form-section">Price List</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Daily:</label>
                                                <div class="col-md-4">
                                                    <label class="control-label">RM</label>
                                                    <p class="form-control-static" data-display="daily_price"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Weekly:</label>
                                                <div class="col-md-4">
                                                    <label class="control-label">RM</label>
                                                    <p class="form-control-static" data-display="weekly_price"> </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Monthly:</label>
                                                <div class="col-md-4">
                                                    <label class="control-label">RM</label>
                                                    <p class="form-control-static" data-display="monthly_price"> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous">
                                                <i class="fa fa-angle-left"></i> Back </a>
                                            <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                            <a href="javascript:;" class="btn green button-submit"> Submit
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

@endsection

@section('plugins')

<link href="{{ asset('theme/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('theme/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('theme/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<link href="{{ asset('theme/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />

<script src="{{ asset('theme/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/public.js') }}" type="text/javascript"></script>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDEzu7MHA93ekBnYLk0Ex1wJU4ygdKdv5Y"></script>

<link href="{{ asset('theme/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('theme/assets/global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js') }}" type="text/javascript"></script>

<link href="{{ asset('theme/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('theme/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/assets/pages/scripts/ui-toastr.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">

    var owner_id, name, year, producer, transmission, body, size, f_type, f_regulation, ac, lat, lng, desc, photo, note, p_daily, p_weekly, p_monthly;

    p_daily = p_weekly = p_monthly = 10;

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showDuration": "250",
        "hideDuration": "250",
        "timeOut": "1500",
        "extendedTimeOut": "500",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    var delayInMilliseconds = 2000;

	var FormWizard=function(){
        return{
            init:function(){
                function e(e){
                    return e.id?"<img class='flag' src='../../assets/global/img/flags/"+e.id.toLowerCase()+".png'/>&nbsp;&nbsp;"+e.text:e.text
                }
                if(jQuery().bootstrapWizard){
                    $("#car_year").select2({
                        placeholder:"Select",allowClear:!0,formatResult:e,width:"auto",formatSelection:e,escapeMarkup:function(e){return e}
                    });
                    $("#car_producer").select2({
                        placeholder:"Select",allowClear:!0,formatResult:e,width:"auto",formatSelection:e,escapeMarkup:function(e){return e}
                    });
                    $("#car_type").select2({
                        placeholder:"Select",allowClear:!0,formatResult:e,width:"auto",formatSelection:e,escapeMarkup:function(e){return e}
                    });
                    $("#car_size").select2({
                        placeholder:"Select",allowClear:!0,formatResult:e,width:"auto",formatSelection:e,escapeMarkup:function(e){return e}
                    });
                    $("#car_fuel_regulation").select2({
                        placeholder:"Select",allowClear:!0,formatResult:e,width:"auto",formatSelection:e,escapeMarkup:function(e){return e}
                    });
                    $("#car_fuel_type").select2({
                        placeholder:"Select",allowClear:!0,formatResult:e,width:"auto",formatSelection:e,escapeMarkup:function(e){return e}
                    });

                    var r=$("#submit_form"),
                    t=$(".alert-danger",r),
                    i=$(".alert-success",r);
                    r.validate({
                        doNotHideMessage:!0,
                        errorElement:"span",
                        errorClass:"help-block help-block-error",
                        focusInvalid:!1,
                        rules:{
                            car_name:{required:!0},
                            car_year:{required:!0},
                            car_producer:{required:!0},
                            car_trans:{required:!0},
                            car_type:{required:!0},
                            car_size:{required:!0},
                            car_fuel_type:{required:!0},
                            car_fuel_regulation:{required:!0},
                            car_ac:{required:!0},
                            car_location:{required:!0},
                            car_desc:{required:!0}
                        },
                        errorPlacement:function(e,r){
                            "car_trans"==r.attr("name")?e.insertAfter("#form_trans_error"):"car_ac"==r.attr("name")?e.insertAfter("#form_ac_error"):"payment[]"==r.attr("name")?e.insertAfter("#form_payment_error"):e.insertAfter(r)
                        },
                        invalidHandler:function(e,r){
                            i.hide(),t.show(),App.scrollTo(t,-200)
                        },
                        highlight:function(e){
                            $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
                        },
                        unhighlight:function(e){
                            $(e).closest(".form-group").removeClass("has-error")
                        },
                        success:function(e){
                            "gender"==e.attr("for")||"payment[]"==e.attr("for")?(e.closest(".form-group").removeClass("has-error").addClass("has-success"),e.remove()):e.addClass("valid").closest(".form-group").removeClass("has-error").addClass("has-success")
                        },
                        submitHandler:function(e){
                            i.show(),t.hide(),e[0].submit()}
                        });
                    var a=function(){
                        $("#tab4 .form-control-static",r).each(function(){
                            var e=$('[name="'+$(this).attr("data-display")+'"]',r);
                            if(e.is(":radio")&&(e=$('[name="'+$(this).attr("data-display")+'"]:checked',r)),e.is(":text")||e.is("textarea"))$(this).html(e.val());
                            else if(e.is("select"))$(this).html(e.find("option:selected").text());
                            else if(e.is(":radio")&&e.is(":checked"))$(this).html(e.attr("data-title"));
                            else if("payment[]"==$(this).attr("data-display")){
                                var t=[];$('[name="payment[]"]:checked',r).each(function(){t.push($(this).attr("data-title"))}),$(this).html(t.join("<br>"))
                            }
                        })
                    },
                    o=function(e,r,t){
                        var i=r.find("li").length,o=t+1;
                        $(".step-title",$("#form_wizard_1")).text("Step "+(t+1)+" of "+i),
                        jQuery("li",$("#form_wizard_1")).removeClass("done");
                        for(var n=r.find("li"),s=0;t>s;s++)
                            jQuery(n[s]).addClass("done");
                        1==o?$("#form_wizard_1").find(".button-previous").hide():$("#form_wizard_1").find(".button-previous").show(),
                        o>=i?($("#form_wizard_1").find(".button-next").hide(),$("#form_wizard_1").find(".button-submit").show(),
                            a()):($("#form_wizard_1").find(".button-next").show(),
                            $("#form_wizard_1").find(".button-submit").hide()),
                            App.scrollTo($(".page-title"))
                        };
                        $("#form_wizard_1").bootstrapWizard({
                            nextSelector:".button-next",previousSelector:".button-previous",
                            onTabClick:function(e,r,t,i){return!1},
                            onNext:function(e,a,n){return i.hide(),t.hide(),0==r.valid()?!1:void o(e,a,n)},
                            onPrevious:function(e,r,a){i.hide(),t.hide(),o(e,r,a)},
                            onTabShow:function(e,r,t){
                                var i=r.find("li").length,a=t+1,o=a/i*100;$("#form_wizard_1").find(".progress-bar").css({width:o+"%"})
                            }
                        }),
                        $("#form_wizard_1").find(".button-previous").hide(),
                        $("#form_wizard_1 .button-submit").click(function(){
                            // alert("Finished! Hope you like it :)")
                            save()
                        }).hide(),
                        $("#car_type",r).change(function(){
                            r.validate().element($(this))
                        }),
                        $("#car_producer",r).change(function(){
                            r.validate().element($(this))
                        }),
                        $("#car_year",r).change(function(){r.validate().element($(this))}),
                        $("#car_size",r).change(function(){r.validate().element($(this))}),
                        $("#car_fuel_type",r).change(function(){r.validate().element($(this))}),
                        $("#car_fuel_regulation",r).change(function(){r.validate().element($(this))})
                    }
                }
            }
    }();
    jQuery(document).ready(function(){FormWizard.init()});

    function getLatLng(){
        var geocoder = new google.maps.Geocoder();
        var address = $.trim($("#car_location").val());
        geocoder.geocode( { 'address': address}, function(results, status) {

          if (status == google.maps.GeocoderStatus.OK) {
            lat = results[0].geometry.location.lat();
            lng = results[0].geometry.location.lng();
          } 
        });
    }

    $("#range_daily").ionRangeSlider({
        min:10,
        max:1e4,
        from:0,
        step:1,
        prefix:"RM "
    });

    $('#range_daily').change(function(){
        var range = $(this).data("ionRangeSlider");
        p_daily = range.result.from;

        $('#daily_price').val(currencyDelimiterValue(p_daily));
    });

    $("#range_weekly").ionRangeSlider({
        min:10,
        max:1e4,
        from:0,
        step:1,
        prefix:"RM "
    });

    $('#range_weekly').change(function(){
        var range = $(this).data("ionRangeSlider");
        p_weekly = range.result.from;

        $('#weekly_price').val(currencyDelimiterValue(p_weekly));
    });

    $("#range_monthly").ionRangeSlider({
        min:10,
        max:1e4,
        from:0,
        step:1,
        prefix:"RM "
    });

    $('#range_monthly').change(function(){
        var range = $(this).data("ionRangeSlider");
        p_monthly = range.result.from;

        $('#monthly_price').val(currencyDelimiterValue(p_monthly));
    });

    function save(){
        if(document.getElementById("car_photo").files.length==0 || document.getElementById("car_note").files.length==0){
            toastr.error("Error", "Choose images to upload first");
        }
        else{
            owner_id = $('#owner_id').val();
            name = $('#car_name').val();
            year = $('#car_year').val();
            producer = $('#car_producer').val();
            transmission = $('input[name=car_trans]:checked').val();
            body = $('#car_type').val();
            size = $('#car_size').val();
            f_type = $('#car_fuel_type').val();
            f_regulation = $('#car_fuel_regulation').val();
            ac = $('input[name=car_ac]:checked').val();
            desc = $('#car_desc').val(); 
            photo = $('#car_photo').prop('files')[0];
            note = $('#car_note').prop('files')[0];
            getLatLng();   

            var form_data = new FormData();

            form_data.append('owner_id', owner_id);
            form_data.append('name', name);
            form_data.append('year', year);
            form_data.append('producer', producer);
            form_data.append('transmission', transmission);
            form_data.append('body', body);
            form_data.append('size', size);
            form_data.append('f_type', f_type);
            form_data.append('f_regulation', f_regulation);
            form_data.append('ac', ac);
            form_data.append('desc', desc);
            form_data.append('photo', photo);
            form_data.append('note', note);
            form_data.append('lat', lat);
            form_data.append('lng', lng);
            form_data.append('p_daily', p_daily);
            form_data.append('p_weekly', p_weekly);
            form_data.append('p_monthly', p_monthly);

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            $.ajax({
                url:'/provider/rental/add_new_car',
                data:form_data,
                type:'post',
                processData: false,
                contentType: false,
                cache: false,
                success:function(data){
                    toastr.success("Car is added", "Status Message");

                    setTimeout(function() {
                        window.location.href = '/';
                    }, delayInMilliseconds);
                },
                error:function(xhr, status, error){
                    toastr.error("Error", "Submit Error");
                }
            });

        }
    }
</script>
@endsection