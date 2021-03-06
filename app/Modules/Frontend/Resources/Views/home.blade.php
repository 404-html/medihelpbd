<!DOCTYPE html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->

<html lang="en">
<!--<![endif]-->


<head>
    <meta charset="UTF-8">
    <meta content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible"><!-- Remove Tap Highlight on Windows Phone IE -->
    <meta content="no" name="msapplication-tap-highlight">
    <link rel="icon" type="image/png" href="{{url('vendor/img/logo1.png')}}" sizes="16x16">
    <title>Home</title>

    <link href="{{url('bower_components/uikit/css/uikit.almost-flat.min.css')}}" media="all" rel="stylesheet"><!-- flag icons -->
    <link href="{{url('assets/icons/flags/flags.min.css')}}" media="all" rel="stylesheet"><!-- style switcher -->
    <link href="{{url('assets/css/style_switcher.min.css')}}" media="all" rel="stylesheet"><!-- altair admin -->
    <link href="{{url('assets/css/main.min.css')}}" media="all" rel="stylesheet"><!-- themes -->
    <link href="{{url('assets/css/themes/themes_combined.min.css')}}" media="all" rel="stylesheet">
    <!-- kendo UI -->
    <link rel="stylesheet" href="{{url('assets/bower_components/kendo-ui/styles/kendo.common-material.min.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/bower_components/kendo-ui/styles/kendo.material.min.css')}}" id="kendoCSS"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
    <link href="{{url('assets/assets/css/custom_result.css')}}" media="all" rel="stylesheet">
    
    <style type="text/css">
    
        @media only screen  and (max-width : 1920px) {
           .select2{
                width: 100% !important;
            }  
        }
        
        .home-link{
            color: white;
            font-weight: bold !important;
            font-size: 1.2em;
        }
    	.uk-navbar{
    		background: red;
    	}
    	
    	.footer-ul{
    	    display: block;
    	    list-style: none;
    	    text-align: center;
    	    padding-left: 0px;
    	}
    	
    	.footer-ul li{
    	    margin-top: 10px;
    	    text-align: center;
    	}
    	
    	.footer-ul li a{
    	    text-align: center;
    	    margin: 0px 10px;
    	}
    	
    	.footer-ul li a span{
    	    color: red; 
    	    border-bottom: 1px dotted #000; 
    	    text-decoration: none;
    	}
    	body{
    	    padding-bottom: 10px;
    	}
    	
    	
    	#overlay-body {
          position: fixed;
          display: none;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: rgba(0,0,0,0.2);
          z-index: 2;
          cursor: pointer;
        }
        
        #overlay-content{
          position: absolute;
          top: 35%;
          left: 50%;
          transform: translate(-50%,-50%);
          -ms-transform: translate(-50%,-50%);
        }
    	
    </style>
</head>

<body ng-app="appfrontend" style="background:#fff;"  class="sidebar_main_swipe">
    
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                <div class="main_logo_top">
                    @if(Session('language')=='bn')
                        <a class = "home-link" href="{{'/'}}">হোম</a>
                    @else
                        <a class = "home-link" href="{{'/'}}">Home</a>
                    @endif
                </div>
                <div class="uk-navbar-flip">
                    @if(Session('language')=='bn')
                        <ul class="uk-navbar-nav user_actions">
                            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                <a class="user_action_image" href="#">ভাষা</a>
    
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav js-uk-prevent">
                                        <li>
                                            <a href="{{url('/english')}}">English</a>
                                        </li>
    
    
                                        <li>
                                            <a href="{{url('/bangla')}}">বাংলা</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    @else
                    
                        <ul class="uk-navbar-nav user_actions">
                            <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                                <a class="user_action_image" href="#">Language</a>
    
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav js-uk-prevent">
                                        <li>
                                            <a href="{{url('/english')}}">English</a>
                                        </li>
    
    
                                        <li>
                                            <a href="{{url('/bangla')}}">বাংলা</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        
                    @endif
                    
                </div>
            </nav>
        </div>
    </header>
    <!-- main sidebar -->

    <div style="max-width: 350px; margin-left:calc(50% - 175px);">
        <div class="login_page_wrapper">
            <div id="login_card">
                <div class="large-padding" id="login_form">
                    <div class="login_heading">
                        <a href="{{'/'}}"><img style="width: 200px; margin-left: calc(50% - 100px); margin-top: 22px;" src="{{url('vendor/img/logo.jpg')}}" alt=""></a>
                    </div>
                    
                    <?php $helper = new \App\Lib\Helpers; ?>
                    
                   {!! Form::open(['url' => 'contact-list', 'method' => 'get', 'class' => 'uk-form-stacked']) !!}
                                        
                    @php  
                        $districts = $helper->getDistricts();
                    @endphp

                    <div class="uk-grid">
                        
                        <div id="overlay-body" class="uk-width-medium-1-1" style="text-align: center;">
                            <div id="overlay-content" class="md-preloader md-preloader-danger"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="48" width="48" viewbox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="8"/></svg></div>
                        </div>
                        
                        <div class="uk-width-medium-1-1">
                            <div class="parsley-row">
                                <select id="main_district_id" name="district_name" required class="md-input selectable">
                                    <option>
                                        @if(Session('language') == 'bn')
                                        জেলা নির্বাচন করুন
                                     @else
                                        Select District 
                                     @endif
                                    </option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">
                                             @if(Session('language') == 'bn')
                                                {{ $district->b_district_name }}
                                             @else
                                                {{ $district->district_name }}
                                             @endif
                                        </option>
                                    @endforeach
                                </select>
                                <p style="color:red;">{{ $errors -> first('district_id') }}</p>
                            </div>
                        </div>
                        
                        <div class="uk-width-medium-1-1">
                            <div class="parsley-row">
                                <select id="sub_district_id" name="subdistrict_name" required class="md-input selectable">
                                    <option value="0">  @if(Session('language') == 'bn')  উপজেলা নির্বাচন করুন    @else Select Sub-District @endif</option>
                                </select>
                                <p style="color:red;">{{ $errors -> first('sub_district_id') }}</p>
                            </div>
                        </div>
                        
                        <div class="uk-width-medium-1-1">
                            <div class="parsley-row">
                                <select id="service_provider_id" name="directoryType" required class="md-input selectable">
                                    <option> 
                                        @if(Session('language') == 'bn')
                                            সেবা প্রদানকারী নির্বাচন করুন  
                                        @else
                                           Select Service Provider
                                        @endif
                                    </option>
                                    <option value="7"> @if(Session('language') == 'bn') ২৪ আউয়ারস্ ফার্মেসী @else 24 Hours Pharmacy @endif </option>
                                    <option value="12">@if(Session('language') == 'bn') অ্যাডিকশন রিহ্যাবিলিটেশন সেন্টার@else Addiction Rehabilitation Center @endif </option>
                                    <option value="2">@if(Session('language') == 'bn') এয়ার অ্যাাম্বুলেন্স  @else  Air Ambulance @endif </option>
                                    <option value="1">@if(Session('language') == 'bn') অ্যাাম্বুলেন্স @else Ambulance @endif </option>
                                    <option value="13">@if(Session('language') == 'bn') বিউটি পার্লার এবং স্পা @else Beauty Parlour & Spa @endif </option>
                                    <option value="3">@if(Session('language') == 'bn') ব্লাড ব্যাংক @else Blood Bank @endif </option>
                                    <option value="4">@if(Session('language') == 'bn') ব্লাড ডোনার @else Blood Donor @endif </option>
                                    <option value="8">@if(Session('language') == 'bn') ডক্টরস্‌ প্যানেল @else Doctors Panel @endif </option>
                                    <option value="5">@if(Session('language') == 'bn') আই ব্যাংক  @else Eye Bank @endif </option>
                                    <option value="14">@if(Session('language') == 'bn') ফরেন মেডিক্যাল ইনফরমেশন সেন্টার  @else Foreign Medical Information Center @endif </option>
                                    <option value="15">@if(Session('language') == 'bn') জিম @else Gym @endif </option>
                                    <option value="6">@if(Session('language') == 'bn') হেল্‌থ কেয়ার সেন্টার  @else Health Care Center @endif </option>
                                    <option value="9">@if(Session('language') == 'bn') হারবাল মেডিসিন সেন্টার  @else Herbal Medicine Center @endif </option>
                                    <option value="16">@if(Session('language') == 'bn') হোমিওপ্যাথিক মেডিসিন সেন্টার  @else Homeopathic Medicine Center @endif </option>
                                    <option value="17">@if(Session('language') == 'bn') অপটিক্যাল সপ @else Optical Shop @endif </option>
                                    <option value="18">@if(Session('language') == 'bn') ফার্মেসী @else Pharmacy @endif </option>
                                    <option value="19">@if(Session('language') == 'bn') ফিজিওথেরাপি অ্যান্ড রিহ্যাবিলিটেশন সেন্টার @else Physiotherapy & Rehabilitation Center @endif </option>
                                    <option value="11">@if(Session('language') == 'bn') স্কিন কেয়ার অ্যান্ড লেজার সেন্টার @else Skin Care & Laser Center @endif </option>
                                    <option value="10">@if(Session('language') == 'bn') ভ্যাকসিনেশন সেন্টার @else Vaccination Center @endif </option>
                                    <option value="20">@if(Session('language') == 'bn') ইয়োগা সেন্টার @else Yoga Center @endif </option>
                                </select>
                                <p style="color:red;">{{ $errors -> first('service_provider_id') }}</p>
                            </div>
                        </div>
                        
                        <div class="uk-width-medium-1-1" id="show_sub_service_provider" style="display:none;">
                            <div class="parsley-row">
                                <select id="sub_service_provider_id" name="sub_directoryType" class="md-input selectable">
                                    
                                </select>
                                <p style="color:red;">{{ $errors -> first('sub_service_provider_id') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="uk-margin-medium-top uk-text-center" style="margin-top: 15px !important;">
                        
                        <button type="submit" class="md-btn md-btn-large" style="background: #FD0100; width: 50%; color: #fff;">
                            @if(Session('language') == 'bn')
                               চলো যাই
                            @else
                               Let's Go
                            @endif
                        </button>
                    </div>
                    
                    {!! Form::close() !!}
                
                    <div class="uk-margin-medium-top uk-text-center" style = "margin-top: 20px!important;">
                    @if(Session('language') == 'bn')
                      <button type="submit" onclick = "showLinksBN()" class="md-btn md-btn-large" style="background: #FD0100; width: 50%; color: #fff;"> আরও   </button>
                    @else
                      <button type="submit" onclick = "showLinks()" class="md-btn md-btn-large" style="background: #FD0100; width: 50%; color: #fff;">  More </button>
                    @endif 
                </div>

                    @if(Session('language')=='bn')
                        <div class="uk-margin-top uk-text-center">
                            <ul class="more-links-bn footer-ul" style = "display: none;">
                                <li>
                                    <a href="{{url('/service-entry')}}"><span><strong>আপনার সেবা যুক্ত করুন</strong></span></a>
                                </li>
                                <li>
                                    <a href="{{url('/contact')}}"><span><strong>যোগাযোগ</strong></span></a>
                                </li>
                                <li>
                                    <a href="{{url('/vision')}}"><span><strong>সম্বন্ধে</strong></span></a>
                                </li>
                                <li>
                                    <a href="{{url('/faq')}}"><span><strong>সাধারণ জিজ্ঞাসা</strong></span></a>
                                </li>
                                <li>
                                    <a href="{{url('/make-appointment')}}"><span><strong>সাক্ষাৎ</strong></span></a>
                                </li>
                                <li>
                                    <a href="{{url('/services-list')}}"><span><strong>সেবাসমূহের তালিকা</strong></span></a>
                                </li>
                            </ul>
                            
                            <a href="https://play.google.com/store/apps/details?id=com.shehab.user.medihelpbd" target="_blank">
                            	<img style="width: 50%;" src="/uploads/google_app_icon.png" alt="Get on Google Play">
                            </a>
                            
                            <p style="margin-bottom: 2px;">&copy; মেডিহেল্পবিডি ডট কম</p>
                            <p style="font-size: 0.9em; margin-top: 0px; margin-bottom: 10px;">প্রস্তুত এবং রক্ষণাবেক্ষণের দায়িত্বে <a style="color: #444; text-decoration: none;" href="http://www.ontiktechnology.com">অন্তিক টেকনোলজি</a></p>
                        </div>
                    @else
                        <div class="uk-margin-top uk-text-center">
                            <ul class="more-links footer-ul" style = "display: none;">
                                <li>
                                    <a href="{{url('/vision')}}"><span><strong>About</strong></span></a>
                                </li>
                                <li>
                                    <a href="{{url('/make-appointment')}}"><span><strong>Appointment</strong></span></a>
                                </li>
                                <li>
                                    <a href="{{url('/contact')}}"><span><strong>Contact</strong></span></a>
                                </li>
                                <li>
                                    <a href="{{url('/service-entry')}}"><span><strong>Enlist Your Service</strong></span></a>
                                </li>
                                <li>
                                    <a  href="{{url('/faq')}}"><span><strong>FAQs</strong></span></a>
                                </li>
                                <li>
                                    <a href="{{url('/services-list')}}"><span><strong>List of Services</strong></span></a>
                                </li>
                            </ul>
                            
                            <a href="https://play.google.com/store/apps/details?id=com.shehab.user.medihelpbd" target="_blank">
                            	<img style="width: 50%;" src="/uploads/google_app_icon.png" alt="Get on Google Play">
                            </a>
                            
                            <p style="margin-bottom: 2px;">&copy; medihelpbd.com</p>
                            <p style="font-size: 0.9em; margin-top: 0px;">Developed &amp; Maintained By <a style="color: #444; text-decoration: none;" href="http://www.ontiktechnology.com">Ontik Technology</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{url('assets/js/common.min.js')}}">
    </script> <!-- uikit functions -->
     
    <script src="{{url('assets/js/uikit_custom.min.js')}}">
    </script> <!-- altair common functions/helpers -->
     
    <script src="{{url('assets/js/altair_admin_common.min.js')}}">
    </script>
    <script src="{{url('angular/angular.min.js')}}"></script>
    <script src="{{url('app/frontend/frontend/frontend.module.js')}}"></script>
    <script src="{{url('app/frontend/frontend/frontend.controller.js')}}"></script>
    <script src="{{url('app/frontend/frontend/frontend.b_controller.js')}}"></script>
    <script src="{{ url('assets/assets/js/pages/forms_advanced.min.js')}}"></script>
    <script src="{{ url('assets/assets/js/kendoui_custom.min.js')}}"></script>
    
    <!--  kendoui functions -->
    <script src="{{ url('assets/assets/js/pages/kendoui.min.js')}}"></script>
    
    <script>
        $('.multi-select').kendoMultiSelect();
        $('.single-select').kendoComboBox();
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('.selectable').select2();
    </script>
    
    <script>
        function showLinks(){
            
            if($(".more-links").is(":visible")){
                
                $(".more-links").hide();    
                
            }else{
               
               $(".more-links").show();
                
            }
            
        }
        
        function showLinksBN(){
            
            if($(".more-links-bn").is(":visible")){
                
                $(".more-links-bn").hide();    
                
            }else{
               
               $(".more-links-bn").show();
                
            }
            
        }
    </script>
    
    <script type="text/javascript">
  
        $('#main_district_id').change(function() {
         
            var main_district_id = $("#main_district_id option:selected").val();
            
            $("#overlay-body").show();
            
            if(main_district_id){
                $.get('/notice/ajax-sub-district/'+ main_district_id, function(data){
                    
                    $('#sub_district_id').empty();
                    $('#sub_district_id').append('<option value="0">  @if(Session('language') == 'bn')  উপজেলা নির্বাচন করুন    @else Select Sub-District @endif</option>');
                    
                    for(var i = 0; i< data.length; i++){
                        $('#sub_district_id').append( ' <option value="'+data[i].id+'">  ' + data[i].sub_district_name + '   </option> ' );
                    }
                    
                    $("#overlay-body").hide();
                    
                });
            }
    
        });
        
        
        
        $('#service_provider_id').change(function() {
         
            var service_provider_id = $("#service_provider_id option:selected").val();
            var sub_district_id     = $("#sub_district_id option:selected").val();
            
            if(service_provider_id == 4){ 
                
                $("#overlay-body").show();
                
                $.get('/blood-donar/api/all/?subDistrict='+sub_district_id , function(data){
                    
                    $("#show_sub_service_provider").show();
                
                    $('#sub_service_provider_id').empty();
                    $('#sub_service_provider_id').append('<option value="0">@if(Session('language') == 'bn') শ্রেনী নির্বাচন করুন @else Select Group @endif</option>');
                    
                    for(var i = 0; i< data.length; i++){                                     
                        $('#sub_service_provider_id').append( ' <option value="'+data[i].blood_group+'">  ' +  data[i].blood_group + '</option> ' );
                    }
                    
                    $("#overlay-body").hide();
                    
                });
            }else if(service_provider_id == 6){ 
                
                $("#overlay-body").show();
                
                $.get('/hospital/api/service/all/?subDistrict='+sub_district_id , function(data){
                    
                    $("#show_sub_service_provider").show();
                
                    $('#sub_service_provider_id').empty();
                    $('#sub_service_provider_id').append('<option value="0">@if(Session('language') == 'bn') ধরণ নির্বাচন করুন @else Select Category @endif</option>');
                    
                    for(var i = 0; i< data.length; i++){
                        $('#sub_service_provider_id').append( ' <option value="'+data[i].hospital_subname+'">  ' + data[i].hospital_subname + '   </option> ' );
                    }
                    
                    $("#overlay-body").hide();
                    
                });
            }else if(service_provider_id == 8){  
                
                $("#overlay-body").show();
                
                $.get('/medical-specialist/api/all/?subDistrict='+sub_district_id , function(data){
                    
                    $("#show_sub_service_provider").show();
                
                    $('#sub_service_provider_id').empty();
                    $('#sub_service_provider_id').append('<option value="0">@if(Session('language') == 'bn')  বিভাগ নির্বাচন করুন @else Select Department @endif</option>');
                    
                    for(var i = 0; i< data.length; i++){
                        $('#sub_service_provider_id').append( ' <option value="'+data[i].medical_specialist_name+'">  ' + data[i].medical_specialist_name + '   </option> ' );
                    }
                    
                    $("#overlay-body").hide();
                    
                });
            }else{
                $("#show_sub_service_provider").hide();
                
                $('#sub_service_provider_id').empty();
                
                $("#overlay-body").hide();
            }
    
        });
        
        
    </script>
    <script type="text/javascript">
        onload=function(){

            if(performance.navigation.type == 2){
                location.reload(true);
            }
        }
    </script>
    
</body>
</html>