@extends('/eazy/main')

@section('content')

<div class="page-content-wrapper">
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<div class="page-content">
		<div class="row">
            <div class="col-md-12">
                <div class="m-heading-1 border-green m-bordered">
                    <h3>Twitter Bootstrap Wizard Plugin</h3>
                    <p> This twitter bootstrap plugin builds a wizard out of a formatter tabbable structure. It allows to build a wizard functionality using buttons to go through the different wizard steps and using events allows to hook into each step individually. 
                    </p>
                    <p> For more info please check out
                        <a class="btn red btn-outline" href="http://vadimg.com/twitter-bootstrap-wizard-example" target="_blank">the official documentation</a>
                    </p>
                </div>
                <div class="portlet light bordered" id="form_wizard_1">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-red"></i>
                            <span class="caption-subject font-red bold uppercase"> Form Wizard -
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
                                                    <i class="fa fa-check"></i> Extend Information 
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
                                            <h3 class="block">Provide your car information</h3>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="name" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Year
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="year_list" id="year_list" class="form-control">
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
                                                    <select name="producer" id="producer" class="form-control">
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
                                                            <input type="radio" name="trans" value="Matic" data-title="Matic" /> Matic 
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="trans" value="Manual" data-title="Manual" /> Manual 
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
                                                    <select name="body_type" id="type" class="form-control">
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
                                                    <input type="text" class="form-control" name="name" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Fuel Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="fuel_type" id="fuel_type" class="form-control">
                                                        <option value=""></option>
                                                        <option value="Premium">Premium</option>
                                                        <option value="Pertamax">Pertamax</option>
                                                        <option value="Solar">Solar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab2">
                                            <h3 class="block">Provide your car advanced information</h3>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Fuel Regulation
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select name="fuel_regulation" id="fuel_regulation" class="form-control">
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
                                                        <label><input type="radio" name="ac" value="yes" data-title="yes" /> Yes </label>
                                                        <label><input type="radio" name="ac" value="no" data-title="no" /> No </label>
                                                    </div>
                                                    <div id="form_ac_error"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Location
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="location" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                                      
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                                        
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

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDEzu7MHA93ekBnYLk0Ex1wJU4ygdKdv5Y"></script>

<script type="text/javascript">


</script>

<script type="text/javascript">

	var FormWizard=function(){
        return{
            init:function(){
                function e(e){
                    return e.id?"<img class='flag' src='../../assets/global/img/flags/"+e.id.toLowerCase()+".png'/>&nbsp;&nbsp;"+e.text:e.text
                }
                if(jQuery().bootstrapWizard){
                    $("#year_list").select2({
                        placeholder:"Select",allowClear:!0,formatResult:e,width:"auto",formatSelection:e,escapeMarkup:function(e){return e}
                    });
                    $("#producer").select2({
                        placeholder:"Select",allowClear:!0,formatResult:e,width:"auto",formatSelection:e,escapeMarkup:function(e){return e}
                    });
                    $("#type").select2({
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
                            name:{required:!0},
                            trans:{required:!0},
                            address:{required:!0},
                            city:{required:!0},
                            year_list:{required:!0},
                            producer:{required:!0},
                            type:{required:!0}
                        },
                        errorPlacement:function(e,r){
                            "trans"==r.attr("name")?e.insertAfter("#form_trans_error"):"payment[]"==r.attr("name")?e.insertAfter("#form_payment_error"):e.insertAfter(r)
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
                        $("#form_wizard_1").find(".button-previous").hide(),$("#form_wizard_1 .button-submit").click(function(){
                            alert("Finished! Hope you like it :)")
                        }).hide(),$("#type",r).change(function(){
                            r.validate().element($(this))
                        }),
                        $("#producer",r).change(function(){
                            r.validate().element($(this))
                        }),
                        $("#year_list",r).change(function(){r.validate().element($(this))})
                    }
                }
            }
    }();
    jQuery(document).ready(function(){FormWizard.init()});


    $('#gmap_geocoding_btn').click(function(){
        var geocoder = new google.maps.Geocoder();
        var address = $.trim($("#gmap_geocoding_address").val());
        geocoder.geocode( { 'address': address}, function(results, status) {

          if (status == google.maps.GeocoderStatus.OK) {
            var latitude = results[0].geometry.location.lat();
            var longitude = results[0].geometry.location.lng();
            alert(latitude + ":" + longitude);
          } 
        }); 
    });
    function latlng(location){

        
    }

    // var MapsGoogle = function(){
    //     a = function(){
    //         var o = new GMaps({
    //             div:"#gmap_geocoding", lat:-12.043333,lng:-77.028333
    //         }),
    //         t = function(){
    //             var t=$.trim($("#gmap_geocoding_address").val());
    //             GMaps.geocode({
    //                 address:t,callback:function(t,n){
    //                     if("OK"==n){
    //                         var e=t[0].geometry.location;
    //                         o.setCenter(e.lat(),e.lng()),o.addMarker({lat:e.lat(),lng:e.lng()}),App.scrollTo($("#gmap_geocoding"))
    //                     }
    //                 }
    //             })
    //         };
    //         $('#gmap_geocoding_btn').click(function(o){
    //             o.preventDefault(),t()
    //         }),
    //         $("#gmap_geocoding_address").keypress(function(o){
    //             var n=o.keyCode?o.keyCode:o.which;"13"==n&&(o.preventDefault(),t())
    //         })
    //     };
    //     return{
    //         init:function(){a()}
    //     }
    // }();jQuery(document).ready(function(){MapsGoogle.init()});
</script>
@endsection