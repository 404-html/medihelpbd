@extends('layouts.frontend_master')

@section('title', 'Doctors Panel')
<style>
    li.apppointment p{
        font-size:12px !important;
        line-height:5px;
    }
    li.apppointment{
        padding-bottom:inherit;
    }
    .booling-info .uk-grid label, .material-icons{
        font-size:12px;
    }
    .resultText{
        text-align: center;
        padding-top: 30px;
        padding-right: 15px;
        font-size: 1.4em;
        color: white;
        font-weight: bold;
    }
    .selectedSidebar{
        background-color: #e4e4e4;
    }
    #sidebar_main .sidebar_main_header {
        margin-bottom: 0px !important;
    }
    .uk-text-truncate {
            overflow: visible !important;
        }
    .uk-form-row+.uk-form-row {
        margin-top: 15px !important;
    }
    .black-border{
        border: 1px solid black;
    }
    .uk-tab-bn>li>a{
        font-size: 15px !important;
    }
    
    .footer{
        position: relative ; left: 0px; bottom: 0px; right: 0px; font-size:10px;
    }
    
    @media print {
        .uk-table{
            width:100%;
            margin:0;
            padding:0;
        }
        
        .uk-table tr td{
            font-size:14px;
        }
        
        
        .footer{
            position: relative ; left: 0px; bottom: 0px; right: 0px; font-size:10px;
        }
        
    }
</style>

@section('aside')

    <?php
        class BanglaConverter {
            public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
            public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
            
            public static function bn2en($number) {
                return str_replace(self::$bn, self::$en, $number);
            }
            
            public static function en2bn($number) {
                return str_replace(self::$en, self::$bn, $number);
            }
        }
    ?>

    @if(Session('language')=='bn')
        <aside id="sidebar_main">
            <div class="sidebar_main_header">
                <h4 class="resultText">মোট ফলাফল <br/> {{BanglaConverter::en2bn($total_result)}}</</h4>
            </div>
    
    
            <div class="menu_section">
                <ul>
                    @foreach($aside_results as $aside_result)
                        @if($medical_specialist->id == $aside_result->id)
                            <li class="selectedSidebar">
                                <a href="{{ url('frontendmedicalspecialist/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->b_medical_specialist_name}}</span>
                                </a>
                            </li>
                        @else
                            <li title="">
                                <a href="{{ url('frontendmedicalspecialist/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->b_medical_specialist_name}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </aside>
    @else
        <aside id="sidebar_main">
            <div class="sidebar_main_header">
                <h4 class="resultText">Total Result <br/>{{$total_result}}</h4>
            </div>
    
    
            <div class="menu_section">
                <ul>
                    @foreach($aside_results as $aside_result)
                        @if($medical_specialist->id == $aside_result->id)
                            <li class="selectedSidebar">
                                <a href="{{ url('frontendmedicalspecialist/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->medical_specialist_name}}</span>
                                </a>
                            </li>
                        @else
                            <li title="">
                                <a href="{{ url('frontendmedicalspecialist/view'.'/'.$aside_result->id.'/'.$aside_result->subdistrict_id)}}">
                                    <span class="md-list-heading">{{$aside_result->medical_specialist_name}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </aside>
    @endif

@endsection


@section('content')

    @if(Session('language')=='bn')
        <div class="uk-width-large-7-10 hidden-print">
        <div class="md-card">
            <div class="user_heading">
                <div class="user_heading_avatar">
                    @if($medical_specialist->photo_path == '')
                    <div class="thumbnail"><img alt=" specialist"  src="{{asset('/medicalspecialist.jpg')}}">
                    </div>
                    @else
                    <div class="thumbnail"><img alt=" specialist" src="{{ url($medical_specialist->photo_path) }}">
                    </div>
                    @endif
                </div>
    
                <div class="user_heading_content">
                    <h2 class="heading_b uk-margin-bottom"><span style="margin: 10px;" class="uk-text-truncate">{{$medical_specialist->b_medical_specialist_name}}</span>
                    </h2>
                </div>
            </div>
    
            @include('layouts.flash_message')
            
            <div class="user_content">
                <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">

                    @if(session()->has('flag') || $flag = 1 && $flag != 0)
                        <li>
                            <a href="#">সম্বন্ধে</a>
                        </li>
                    @else
                    
                        <li class="uk-active">
                            <a href="#">সম্বন্ধে</a>
                        </li>
                    @endif
    
                    <li>
                        <a href="#">প্রবন্ধ</a>
                    </li>
                    
                    <li>
                        <a href="#">চেম্বার</a>
                    </li>
                    
                    <li>
                        <a href="#">বিশেষত্ব</a>
                    </li>

                    @if(session()->has('flag') || $flag = 1 && $flag != 0)

                        <li class="uk-active">
                            <a href="#">সাক্ষাৎ</a>
                        </li>
                    @else
                    
                        <li>
                            <a href="#">ডাক্তারের সাক্ষাৎ</a>
                        </li>
                    @endif
                    
                </ul>
    
    
                <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                    <li><?php echo $medical_specialist->b_medical_specialist_description; ?>
    
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-large-1-1">
                                <h4 class="heading_c uk-margin-small-bottom">যোগাযোগের তথ্য</h4>
    
    
                                <ul class="md-list md-list-addon">
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px" class="md-list-heading">{!! nl2br($medical_specialist->b_medical_specialist_address) !!}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px" class="md-list-heading">{!! nl2br($medical_specialist->b_medical_specialist_phone_no) !!}</span>
     
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i  style= "margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px" class="md-list-heading">{{$medical_specialist->medical_specialist_email_ad}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i style= "margin: 0" class="md-list-addon-icon material-icons">&#xE894;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px" class="md-list-heading">{{$medical_specialist->medical_specialist_web_link}}</span>
                                        </div>
                                    </li>
                                    
                                    <li style="margin-left: 45px !important;" class= "hidden">
                                        <div class="md-list-addon-element">
                                            <i  style= "margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                        </div>
                                        <div class="md-list-content">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="uk-width-large-1-1">
                            <h4 class="heading_c">সাধারণ তথ্য</h4>
                            <ul class="md-list uk-margin-small-top">
                                <li>
                                    <div class="md-list-content">
                                        <span class="hidden">সাধারণ</span><span><?php echo $medical_specialist->b_fee_new; ?></span>
                                    </div>
                                </li>
                            </ul>  
                        </div>
                        
                                                                                                    
                        <!-- START google maps -->
                        
                        @if( $medical_specialist->medical_specialist_latitude != null && $medical_specialist->medical_specialist_longitude != null )
                        
                        <div class="uk-width-large-1-1 google_maps_show">
                             <iframe 
                                src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $medical_specialist->medical_specialist_latitude }}, {{ $medical_specialist->medical_specialist_longitude }}&zoom=15" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                            </iframe>
                        </div>
                        
                        @endif
                        
                        <!-- END google maps -->
                        
                    </li>
                    <li>
                        <ul class="md-list">
                            @foreach($notices as $notice)
                            <li style="padding-top: 0px;">
                                <div class="md-list-content">
                                        <span class="uk-margin-right"><?php echo $notice->b_medical_specialist_notice_description; ?></span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <ul class="md-list">
                            @foreach($chembers as $chember)
                            <li style="padding-top: 0px;">
                                <div class="md-list-content">
                                        <span class="uk-margin-right">
                                        <?php echo $chember->b_medical_specialist_chamber_description; ?></span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <ul class="md-list">
                            <li style="padding-top: 0px;">
                                <div class="md-list-content">
                                        <span class="">
                                        <?php echo $medical_specialist->b_specialty; ?></span>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        @if($appointment_notice)
                            @foreach($appointment_notice as $notice)
                                <?php echo $notice->notice_bn; ?>
                            @endforeach
                        @else
                            <?php echo 'No notice found !'; ?>
                        @endif
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-large-1-1">
                                    
                                <div class="uk-width-medium-1-1 ">
                                    <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top" >চেম্বার</h4>
                                    <div class="uk-width-1-1">
                                        <ul class="md-list" style="margin-bottom:-22px;">
                                            @foreach($appointments as $appointment)
                                                <li style="padding: 8px 0px" class="apppointment uk-margin-small-top">
                                                    <p>{{ $appointment->chamber_name_bn }}</p>
                                                    <p><?php echo $appointment->details_bn ; ?></p>
                                                    <p>@if($appointment->start_time != null)

                                                       সিরিয়াল দেওয়ার সময়:

                                                        <?php

                                                        
                                                            echo $appointment->serial_time_bn ;

                                                        ?>
                                                        @else
                                                        সিরিয়াল দেওয়ার সময়: নির্দিষ্ট সময় নেই।
                                                        @endif
                                                    </p>
                                                        
                                                    <p>সর্বোচ্চ সিরিয়াল সীমা: {{ $appointment->max_serial_limit_bn }}  </p>
                                                    <p>@if($appointment->notice_bn != null)

                                                       লক্ষণীয়:

                                                        <?php

                                                        
                                                            echo $appointment->notice_bn ;

                                                        ?>
                                                        @else
                                                       
                                                        @endif
                                                    </p>
                                                </li>
                                            @endforeach
                                        </ul> 
                                    </div>
                                        
                                </div>
                                <hr>
                                <div class="uk-width-medium-1-1 ">

                                        <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top" >Book an Appointment</h4>
                                        <form action="{{ url('frontendmedicalspecialist/appointment_booking',['doctor_id'=>$medical_specialist->id,'subdistrict_id'=>$medical_specialist->subdistrict_id] ) }}" method="post" role="form" id="formfield" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            
                                            <div style="padding: 16px 0px" class="md-card-content">
                                                
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-4">
                                                            <label class="uk-vertical-align-middle" for="chamberId">Select Chamber<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Chamber" id="chamberId" name="chamber_id">
                                                                <option value=""></option>
                                                                @foreach($chambers as $chamber)
                                                                    <option value="{{ $chamber->id }}">{{ $chamber->chamber_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('chamber_id'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('chamber_id')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-4">
                                                            <label class="uk-vertical-align-middle" for="appointmentDate">Appointment Date<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <input class="md-input" type="text" name="appointment_date" id="appointmentDate" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                                            @if($errors->has('appointment_date'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('appointment_date')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-1">
                                                            <label class="uk-vertical-align-middle" for="appointmentTime">Appointment Time<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-1-1 uk-margin-medium-top">
                                                           <span class="icheck-inline">
                                                                
                                                                <label for="radio_demo_1" class="inline-label"><input type="radio" name="appointment_time" id="appointmentTime" value="1" data-md-icheck checked /> Morning</label>
                                                            </span>
                                                        </div>
                                                        <div class="uk-width-medium-1-1 uk-margin-small-top">
                                                            <span class="icheck-inline">
                                                                
                                                                <label for="radio_demo_1" class="inline-label"><input type="radio" name="appointment_time" id="appointmentTime" value="2" data-md-icheck /> Evening</label>
                                                            </span>
                                                            @if($errors->has('appointment_time'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('appointment_time')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-1">
                                                            <label class="uk-vertical-align-middle" for="appointmentType">Appointment Type<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-1-1 uk-margin-medium-top">
                                                            <span class="icheck-inline">
                                                               
                                                                <label for="radio_demo_1" class="inline-label"> <input type="radio" name="appointment_type" id="appointmentType" value="1" data-md-icheck checked /> New</label>
                                                            </span>
                                                        </div>
                                                        <div class="uk-width-medium-1-1 uk-margin-small-top">
                                                            <span class="icheck-inline">
                                                               
                                                                <label for="radio_demo_1" class="inline-label"> <input type="radio" name="appointment_type" id="appointmentType" value="2" data-md-icheck /> Report</label>
                                                            </span>
                                                            @if($errors->has('appointment_type'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('appointment_type')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-4">
                                                            <label class="uk-vertical-align-middle" for="patientName">Patient Name<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <input type="text" class="md-input" name="patient_name" id="patientName" required />
                                                            @if($errors->has('patient_name'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('patient_name')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-4">
                                                            <label class="uk-vertical-align-middle" for="contactNumber">Contact Number<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <input type="text" class="md-input" name="contact_number" id="contactNumber" />
                                                            @if($errors->has('contact_number'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('contact_number')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-grid uk-ma">
                                                        <div class="uk-width-1-1 uk-float-right">
                                                            <input style="float: right;" type="button" class="md-btn md-btn-primary" id="submitBtn" data-toggle="uk-modal" data-uk-modal="{target:'#confirmSubmit'}" value="submit"/>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                         
                                        
                                         </form>
                                        <hr>
                                            
                                        <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Next Appointment</h4>
                                        <form action="{{ url('frontendmedicalspecialist/chamber-search',['doctor_id'=>$medical_specialist->id,'subdistrict_id'=>$medical_specialist->subdistrict_id] ) }}" method="post" role="form" id="formfield" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <div style="padding: 16px 0px" class="md-card-content">

                                                <div class="uk-grid">
                                                    <div class="uk-width-medium-1-4 uk-margin-medium-top">
                                                        <label class="uk-vertical-align-middle" for="chamberId">Select Date<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                    </div>

                                                    <div class="uk-width-medium-3-4 uk-margin-medium-top">
                                                        <label for="search_date"></label>
                                                        <input class="md-input" type="text" name="search_date" id="search_date" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                                        @if($errors->has('search_date'))
                                                            <br/>
                                                            <span style="color:orangered;">{!!$errors->first('search_date')!!}</span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="uk-width-medium-1-4 uk-margin-medium-top">
                                                        <label class="uk-vertical-align-middle" for="chamberId">Select Chamber<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                    </div>

                                                    <div class="uk-width-medium-3-4 uk-margin-medium-top">
                                                        <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Chamber" id="search_chamber_id" name="search_chamber_id">
                                                            <option value=""></option>
                                                            @foreach($chambers as $chamber)
                                                                <option value="{{ $chamber->id }}">{{ $chamber->chamber_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('search_chamber_id'))
                                                            <br/>
                                                            <span style="color:orangered;">{!!$errors->first('search_chamber_id')!!}</span>
                                                        @endif
                                                    </div>
                                                    <div class="uk-width-1-1 uk-float-right uk-margin-medium-top">
                                                        <input style="float: right;" type="submit" class="md-btn md-btn-primary" value="submit"/>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <hr>
                                            

                                        <div class="md-card-content print_bg">
                                        <div class="uk-grid" data-uk-grid-margin="">
                                            <div class="uk-width-small-5-5 uk-text-center">
                                                
                                                <p style="line-height: 10px; "class="heading_b">{{ $medical_specialist->medical_specialist_name }}</p>
                                                @if(isset($all_appointments_morning_new[0]))
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          {{ $all_appointments_morning_new[0]->appointment->chamber_name }}
                                                    </p>
                                                @elseif(isset($all_appointments_morning_report[0]))
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          {{ $all_appointments_morning_report[0]->appointment->chamber_name }}
                                                    </p>
                                                @elseif(isset($chambers_id->chamber_name))
                                                
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                        {{ $chambers_id->chamber_name }}
                                                    </p>
                                                    
                                                @else
                                                
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          No Chamber Found
                                                    </p>
                                                
                                                @endif 
                                                <?php 
                                                 $current_date = date('d M Y'); ?>
                                                <p style="line-height: 10px;" class="uk-text-large"> @if(isset($searched_date)) {{ date('d M, Y',strtotime($searched_date)) }} @else {{ date('d M, Y',strtotime($current_date)) }} @endif</p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 12px" class="uk-grid">
                                            
                                            @if(isset($searched_date) && isset($searched_chambers_id))
                                                <div class="uk-width-medium-1-1">
                                                    <p style="text-align: center; font-size: 14px;font-weight: 600">Time: Morning
                                                        
                                                    </p>
                                                    <p >
                                                        <a style="float: right;" target="_blank" href="{{ route("morning_appointment_pdf",['id'=>$medical_specialist->id,'dist'=>$medical_specialist->subdistrict_id,'date'=>$searched_date,'chamber_id'=>$searched_chambers_id]) }}"><input style="float: right;" type="submit" class="md-btn md-btn-primary" value="Print"/></a>
                                                    </p>
                                                </div>
                                            @endif
                                            <div style="padding-left: 28px; padding-right: -1px;" class="uk-width-medium-1-1">
                                                
                                                <div class="uk-overflow-container uk-margin-medium-top">
                                                    
                                                    <p style="text-align: left; font-size: 12px;font-weight: 600">Type: New</p>
                                                    @if(isset($all_appointments_morning_new[0]))
                                                        <table class="uk-table uk-table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th width="10%" >Sl</th>
                                                                <th width="50%">Patient Name</th>
                                                                <th width="40%">Contact No.</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th>Sl</th>
                                                                <th>Patient Name</th>
                                                                <th>Contact No.</th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @foreach($all_appointments_morning_new as $key=>$booking)
                                                                    <tr>
                                                                        <td>{{ $key+1 }}</td>
                                                                        <td>{{ $booking->patient_name }}</td>
                                                                        <td>{{ $booking->contact_number }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p style="text-align: left;">No Appointment for today.</p>
                                                    @endif

                                                    <!--<p style="text-align: center; font-size: 14px;font-weight: 600">Morning</p>-->
                                                    <p style="text-align: left; font-size: 12px;font-weight: 600">Type: Report</p>
                                                    @if(isset($all_appointments_morning_report[0]))
                                                        <table class="uk-table uk-table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th width="10%" >Sl</th>
                                                                <th width="50%">Patient Name</th>
                                                                <th width="40%">Contact No.</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th>Sl</th>
                                                                <th>Patient Name</th>
                                                                <th>Contact No.</th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @foreach($all_appointments_morning_report as $key=>$booking)
                                                                    <tr>
                                                                        <td>{{ $key+1 }}</td>
                                                                        <td>{{ $booking->patient_name }}</td>
                                                                        <td>{{ $booking->contact_number }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p style="text-align: left;">No Appointment for today.</p>
                                                    @endif
                                                </div>
                                            
                                                    
                                                <div class="uk-overflow-container uk-margin-medium-top">
       
                                                </div>
                                            </div>
                                        
                                        </div>
                                        
                                        <br>
                                        <br>
                                        
                                        <div class="uk-grid" data-uk-grid-margin="">
                                            <div class="uk-width-small-5-5 uk-text-center">
                                                
                                                <p style="line-height: 10px; "class="heading_b">{{ $medical_specialist->medical_specialist_name }}</p>
                                                @if(isset($all_appointments_evening_new[0]))
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          {{ $all_appointments_evening_new[0]->appointment->chamber_name }}
                                                    </p>
                                                @elseif(isset($all_appointments_evening_report[0]))
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          {{ $all_appointments_evening_report[0]->appointment->chamber_name }}
                                                    </p>
                                                @elseif(isset($chambers_id->chamber_name))
                                                
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                        {{ $chambers_id->chamber_name }}
                                                    </p>
                                                    
                                                @else
                                                
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          No Chamber Found
                                                    </p>
                                                
                                                @endif 
                                                 
                                                <?php 
                                                 $current_date = date('d M Y'); ?>
                                                <p style="line-height: 10px;" class="uk-text-large"> @if(isset($searched_date)) {{  date('d M, Y',strtotime($searched_date)) }} @else {{ date('d M, Y',strtotime($current_date)) }} @endif</p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 12px" class="uk-grid">
                                            
                                                @if(isset($searched_date) && isset($searched_chambers_id))
                                                    <div class="uk-width-medium-1-1">
                                                        <p style="text-align: center; font-size: 14px;font-weight: 600">Time: Evening
                                                            
                                                        </p>
                                                        <p>
                                                            <a style="float: right;" target="_blank" href="{{ route("evening_appointment_pdf",['id'=>$medical_specialist->id,'dist'=>$medical_specialist->subdistrict_id,'date'=>$searched_date,'chamber_id'=>$searched_chambers_id]) }}"><input style="float: right;" type="submit" class="md-btn md-btn-primary" value="Print"/></a>
                                                        </p>
                                                    </div>
                                                @endif
                                            <div style="padding-left: 28px; padding-right: -1px;" class="uk-width-medium-1-1">
        
                                                    
                                                <div class="uk-overflow-container uk-margin-medium-top">

                                                    
                                                    <p style="text-align: left; font-size: 12px;font-weight: 600">Type: New</p>
                                                    @if(isset($all_appointments_evening_new[0]))
                                                        <table class="uk-table uk-table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th width="10%" >Sl</th>
                                                                <th width="50%">Patient Name</th>
                                                                <th width="40%">Contact No.</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th>Sl</th>
                                                                <th>Patient Name</th>
                                                                <th>Contact No.</th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @foreach($all_appointments_evening_new as $key=>$booking)
                                                                    <tr>
                                                                        <td>{{ $key+1 }}</td>
                                                                        <td>{{ $booking->patient_name }}</td>
                                                                        <td>{{ $booking->contact_number }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p style="text-align: left;">No Appointment for today.</p>
                                                    @endif

                                                    <!--<p style="text-align: center; font-size: 14px;font-weight: 600">Evening</p>-->
                                                    <p style="text-align: left; font-size: 12px;font-weight: 600">Type: Report</p>
                                                     @if(isset($all_appointments_evening_report[0]))
                                                        <table class="uk-table uk-table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th width="10%" >Sl</th>
                                                                <th width="50%">Patient Name</th>
                                                                <th width="40%">Contact No.</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th>Sl</th>
                                                                <th>Patient Name</th>
                                                                <th>Contact No.</th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @foreach($all_appointments_evening_report as $key=>$booking)
                                                                    <tr>
                                                                        <td>{{ $key+1 }}</td>
                                                                        <td>{{ $booking->patient_name }}</td>
                                                                        <td>{{ $booking->contact_number }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p style="text-align: left;">No Appointment for today.</p>
                                                    @endif

                                                    <div class="footer" >
                                                        <p style="text-align: center;">Sponsored by: medihelpbd.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @else
        <div class="uk-width-large-7-10">
        <div class="md-card">
            <div class="user_heading hidden-print">
                <div class="user_heading_avatar">
                    @if($medical_specialist->photo_path == '')
                    <div class="thumbnail"><img alt=" specialist"  src="{{asset('/medicalspecialist.jpg')}}">
                    </div>
                    @else
                    <div class="thumbnail"><img alt=" specialist" src="{{ url($medical_specialist->photo_path) }}">
                    </div>
                    @endif
                </div>
    
                <div class="user_heading_content">
                    <h2 class="heading_b uk-margin-bottom"><span style="margin: 10px;" class="uk-text-truncate">{{ $medical_specialist->medical_specialist_name }}</span>
                    </h2>
                </div>
            </div>

            @include('layouts.flash_message')
    
    
            <div class="user_content ">
                <ul class="uk-tab hidden-print" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">

                    @if(session()->has('flag') || $flag = 1 && $flag != 0)
                        <li>
                            <a href="#">About</a>
                        </li>
                    @else
                    
                        <li class="uk-active">
                            <a href="#">About</a>
                        </li>
                    @endif
    
                    <li>
                        <a href="#">Article</a>
                    </li>
                    
                    <li>
                        <a href="#">Chamber</a>
                    </li>
                    
                    <li>
                        <a href="#">Speciality</a>
                    </li>

                    @if(session()->has('flag') || $flag = 1 && $flag != 0)
                        <li class="uk-active">
                            <a href="#">Appointment</a>
                        </li>
                    @else
                    
                        <li>
                            <a href="#">Appointment</a>
                        </li>
                    @endif
                    
                </ul>
    
    
                <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                    <li><?php echo $medical_specialist->medical_specialist_description; ?>
    
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-large-1-1">
                                <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Contact Info</h4>
    
    
                                <ul class="md-list md-list-addon">
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE88A;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px" class="md-list-heading">{!! nl2br($medical_specialist->medical_specialist_address) !!}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px" class="md-list-heading">{!! nl2br($medical_specialist->medical_specialist_phone_no) !!}</span>
     
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i  style= "margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px" class="md-list-heading">{{$medical_specialist->medical_specialist_email_ad}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i style= "margin: 0" class="md-list-addon-icon material-icons">&#xE894;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span style="margin-top:5px" class="md-list-heading">{{$medical_specialist->medical_specialist_web_link}}</span>
                                        </div>
                                    </li>
                                    
                                    <li style="margin-left: 45px !important;" class= "hidden">
                                        <div class="md-list-addon-element">
                                            <i  style= "margin: 0" class="md-list-addon-icon material-icons">&#xE158;</i>
                                        </div>
                                        <div class="md-list-content">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       
                        <div class="uk-width-large-1-1">
                            <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">General Info</h4>
                            <ul class="md-list uk-margin-small-top">
                                <li>
                                    <div class="md-list-content">
                                    <span><?php echo $medical_specialist->fee_new; ?></span>
                                    </div>
                                </li>
                            </ul>  
                        </div>
                        
                                                                            
                        <!-- START google maps -->
                        
                        @if( $medical_specialist->medical_specialist_latitude != null && $medical_specialist->medical_specialist_longitude != null )
                        
                        <div class="uk-width-large-1-1 google_maps_show">
                             <iframe 
                                src="https://www.google.com/maps/embed/v1/search?key=AIzaSyD3_tCn50Ef5Z2zUJxkXi26T486gIzIHp8&q={{ $medical_specialist->medical_specialist_latitude }}, {{ $medical_specialist->medical_specialist_longitude }}&zoom=15" frameborder="0" height="600" style="border:0; width:100%;" allowfullscreen>
                            </iframe>
                        </div>
                        
                        @endif
                        
                        <!-- END google maps -->
                        
                    </li>
                    <li>
                        <ul class="md-list">
                            @foreach($notices as $notice)
                            <li style="padding-top: 0px;">
                                <div class="md-list-content">
                                        <span class="uk-margin-right"><?php echo $notice->medical_specialist_notice_description; ?></span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <ul class="md-list">
                            @foreach($chembers as $chember)
                            <li style="padding-top: 0px;">
                                <div class="md-list-content">
                                        <span class="uk-margin-right">
                                        <?php echo $chember->medical_specialist_chamber_description; ?></span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <ul class="md-list">
                            <li style="padding-top: 0px;">
                                <div class="md-list-content">
                                        <span class="">
                                        <?php echo $medical_specialist->specialty; ?></span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>

                        @if($appointment_notice)
                            @foreach($appointment_notice as $notice)
                                <?php echo $notice->notice; ?>
                            @endforeach
                        @else
                            <?php echo 'No notice found !'; ?>
                        @endif
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-large-1-1">
                                    
                                <div class="uk-width-medium-1-1 ">
                                    <h4 class="heading_c uk-margin-small-top" >Chamber</h4>
                                    <div class="uk-width-1-1">
                                        <ul class="md-list" style="margin-bottom:-22px;">
                                            @foreach($appointments as $appointment)
                                                <li  style="padding: 8px 0px;" class="apppointment uk-margin-small-top">
                                                    <p>{{ $appointment->chamber_name }}</p>
                                                    <p><?php echo $appointment->details ; ?>
                                                    </p>
                                                    <p>@if($appointment->start_time != null)

                                                        Time of Serial:
                                                        <?php

                                                        
                                                            echo $appointment->serial_time_en ;

                                                        ?>
                                                        @else
                                                        Time of Serial: No serial time limit.
                                                        @endif
                                                    </p>
                                                    <p>Maxium Serial Limit: {{ $appointment->max_serial_limit_en }}</p>
                                                    @if($appointment->notice != null)
                                                    
                                                        <?php

                                                        
                                                            echo "Noteworthy: $appointment->notice " ;

                                                        ?>
                                                        @else
                                                       
                                                        @endif
                                                   
                                                </li>
                                            @endforeach
                                        </ul> 
                                    </div>
                                        
                                </div>
                                <hr>
                                <div class="uk-width-medium-1-1 ">

                                        <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top" >Book an Appointment</h4>
                                        <form action="{{ url('frontendmedicalspecialist/appointment_booking',['doctor_id'=>$medical_specialist->id,'subdistrict_id'=>$medical_specialist->subdistrict_id] ) }}" method="post" role="form" id="formfield" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            
                                            <div style="padding: 16px 0px" class="md-card-content">
                                                
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-4">
                                                            <label class="uk-vertical-align-middle" for="chamberId">Select Chamber<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Chamber" id="chamberId" name="chamber_id">
                                                                <option value=""></option>
                                                                @foreach($chambers as $chamber)
                                                                    <option value="{{ $chamber->id }}">{{ $chamber->chamber_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('chamber_id'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('chamber_id')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-4">
                                                            <label class="uk-vertical-align-middle" for="appointmentDate">Appointment Date<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <input class="md-input" type="text" name="appointment_date" id="appointmentDate" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                                            @if($errors->has('appointment_date'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('appointment_date')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-1">
                                                            <label class="uk-vertical-align-middle" for="appointmentTime">Appointment Time<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-1-1 uk-margin-medium-top">
                                                           <span class="icheck-inline">
                                                                
                                                                <label for="radio_demo_1" class="inline-label"><input type="radio" name="appointment_time" id="appointmentTime" value="1" data-md-icheck checked /> Morning</label>
                                                            </span>
                                                        </div>
                                                        <div class="uk-width-medium-1-1 uk-margin-small-top">
                                                            <span class="icheck-inline">
                                                                
                                                                <label for="radio_demo_1" class="inline-label"><input type="radio" name="appointment_time" id="appointmentTime" value="2" data-md-icheck /> Evening</label>
                                                            </span>
                                                            @if($errors->has('appointment_time'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('appointment_time')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-1">
                                                            <label class="uk-vertical-align-middle" for="appointmentType">Appointment Type<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-1-1 uk-margin-medium-top">
                                                            <span class="icheck-inline">
                                                               
                                                                <label for="radio_demo_1" class="inline-label"> <input type="radio" name="appointment_type" id="appointmentType" value="1" data-md-icheck checked /> New</label>
                                                            </span>
                                                        </div>
                                                        <div class="uk-width-medium-1-1 uk-margin-small-top">
                                                            <span class="icheck-inline">
                                                               
                                                                <label for="radio_demo_1" class="inline-label"> <input type="radio" name="appointment_type" id="appointmentType" value="2" data-md-icheck /> Report</label>
                                                            </span>
                                                            @if($errors->has('appointment_type'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('appointment_type')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-4">
                                                            <label class="uk-vertical-align-middle" for="patientName">Patient Name<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <input type="text" class="md-input" name="patient_name" id="patientName" required />
                                                            @if($errors->has('patient_name'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('patient_name')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-grid">
                                                        <div class="uk-width-medium-1-4">
                                                            <label class="uk-vertical-align-middle" for="contactNumber">Contact Number<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <input type="text" class="md-input" name="contact_number" id="contactNumber" />
                                                            @if($errors->has('contact_number'))
                                                                <br/>
                                                                <span style="color:orangered;">{!!$errors->first('contact_number')!!}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-grid uk-ma">
                                                        <div class="uk-width-1-1 uk-float-right">
                                                            <input style="float: right;" type="button" class="md-btn md-btn-primary" id="submitBtn" data-toggle="uk-modal" data-uk-modal="{target:'#confirmSubmit'}" value="submit"/>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                         
                                        
                                         </form>
                                        <hr>
                                            
                                        <h4 class="heading_c uk-margin-small-bottom uk-margin-small-top">Next Appointment</h4>
                                        <form action="{{ url('frontendmedicalspecialist/chamber-search',['doctor_id'=>$medical_specialist->id,'subdistrict_id'=>$medical_specialist->subdistrict_id] ) }}" method="post" role="form" id="formfield" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <div style="padding: 16px 0px" class="md-card-content">

                                                <div class="uk-grid">
                                                    <div class="uk-width-medium-1-4 uk-margin-medium-top">
                                                        <label class="uk-vertical-align-middle" for="chamberId">Select Date<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                    </div>

                                                    <div class="uk-width-medium-3-4 uk-margin-medium-top">
                                                        <label for="search_date"></label>
                                                        <input class="md-input" type="text" name="search_date" id="search_date" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                                        @if($errors->has('search_date'))
                                                            <br/>
                                                            <span style="color:orangered;">{!!$errors->first('search_date')!!}</span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="uk-width-medium-1-4 uk-margin-medium-top">
                                                        <label class="uk-vertical-align-middle" for="chamberId">Select Chamber<sup><i style="color:red;font-size:9px;" class="material-icons">star_rate</i></sup></label>
                                                    </div>

                                                    <div class="uk-width-medium-3-4 uk-margin-medium-top">
                                                        <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Chamber" id="search_chamber_id" name="search_chamber_id">
                                                            <option value=""></option>
                                                            @foreach($chambers as $chamber)
                                                                <option value="{{ $chamber->id }}">{{ $chamber->chamber_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('search_chamber_id'))
                                                            <br/>
                                                            <span style="color:orangered;">{!!$errors->first('search_chamber_id')!!}</span>
                                                        @endif
                                                    </div>
                                                    <div class="uk-width-1-1 uk-float-right uk-margin-medium-top">
                                                        <input style="float: right;" type="submit" class="md-btn md-btn-primary" value="submit"/>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <hr>
                                            

                                        <div class="md-card-content print_bg">
                                        <div class="uk-grid" data-uk-grid-margin="">
                                            <div class="uk-width-small-5-5 uk-text-center">
                                                
                                                <p style="line-height: 10px; "class="heading_b">{{ $medical_specialist->medical_specialist_name }}</p>
                                                @if(isset($all_appointments_morning_new[0]))
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          {{ $all_appointments_morning_new[0]->appointment->chamber_name }}
                                                    </p>
                                                @elseif(isset($all_appointments_morning_report[0]))
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          {{ $all_appointments_morning_report[0]->appointment->chamber_name }}
                                                    </p>
                                                @elseif(isset($chambers_id->chamber_name))
                                                
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                        {{ $chambers_id->chamber_name }}
                                                    </p>
                                                    
                                                @else
                                                
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          No Chamber Found
                                                    </p>
                                                
                                                @endif 
                                                <?php 
                                                 $current_date = date('d M Y'); ?>
                                                <p style="line-height: 10px;" class="uk-text-large"> @if(isset($searched_date)) {{ date('d M, Y',strtotime($searched_date)) }} @else {{ date('d M, Y',strtotime($current_date)) }} @endif</p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 12px" class="uk-grid">
                                            
                                            @if(isset($searched_date) && isset($searched_chambers_id))
                                                <div class="uk-width-medium-1-1">
                                                    <p style="text-align: center; font-size: 14px;font-weight: 600">Time: Morning
                                                        
                                                    </p>
                                                    <p >
                                                        <a style="float: right;" target="_blank" href="{{ route("morning_appointment_pdf",['id'=>$medical_specialist->id,'dist'=>$medical_specialist->subdistrict_id,'date'=>$searched_date,'chamber_id'=>$searched_chambers_id]) }}"><input style="float: right;" type="submit" class="md-btn md-btn-primary" value="Print"/></a>
                                                    </p>
                                                </div>
                                            @endif
                                            <div style="padding-left: 28px; padding-right: -1px;" class="uk-width-medium-1-1">
                                                
                                                <div class="uk-overflow-container uk-margin-medium-top">
                                                    
                                                    <p style="text-align: left; font-size: 12px;font-weight: 600">Type: New</p>
                                                    @if(isset($all_appointments_morning_new[0]))
                                                        <table class="uk-table uk-table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th width="10%" >Sl</th>
                                                                <th width="50%">Patient Name</th>
                                                                <th width="40%">Contact No.</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th style="text-align: left;">Sl</th>
                                                                <th style="text-align: left;">Patient Name</th>
                                                                <th style="text-align: left;">Contact No.</th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @foreach($all_appointments_morning_new as $key=>$booking)
                                                                    <tr>
                                                                        <td style="text-align: left;">{{ $key+1 }}</td>
                                                                        <td style="text-align: left;">{{ $booking->patient_name }}</td>
                                                                        <td style="text-align: left;">{{ $booking->contact_number }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p style="text-align: left;">No Appointment for today.</p>
                                                    @endif

                                                    <!--<p style="text-align: center; font-size: 14px;font-weight: 600">Morning</p>-->
                                                    <p style="text-align: left; font-size: 12px;font-weight: 600">Type: Report</p>
                                                    @if(isset($all_appointments_morning_report[0]))
                                                        <table class="uk-table uk-table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th width="10%" >Sl</th>
                                                                <th width="50%">Patient Name</th>
                                                                <th width="40%">Contact No.</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th>Sl</th>
                                                                <th style="text-align: left;">Patient Name</th>
                                                                <th style="text-align: left;">Contact No.</th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @foreach($all_appointments_morning_report as $key=>$booking)
                                                                    <tr>
                                                                        <td style="text-align: left;">{{ $key+1 }}</td>
                                                                        <td style="text-align: left;">{{ $booking->patient_name }}</td>
                                                                        <td style="text-align: left;">{{ $booking->contact_number }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p style="text-align: left;">No Appointment for today.</p>
                                                    @endif
                                                </div>
                                            
                                                    
                                                <div class="uk-overflow-container uk-margin-medium-top">
       
                                                </div>
                                            </div>
                                        
                                        </div>
                                        
                                        <br>
                                        <br>
                                        
                                        <div class="uk-grid" data-uk-grid-margin="">
                                            <div class="uk-width-small-5-5 uk-text-center">
                                                
                                                <p style="line-height: 10px; "class="heading_b">{{ $medical_specialist->medical_specialist_name }}</p>
                                                @if(isset($all_appointments_evening_new[0]))
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          {{ $all_appointments_evening_new[0]->appointment->chamber_name }}
                                                    </p>
                                                @elseif(isset($all_appointments_evening_report[0]))
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          {{ $all_appointments_evening_report[0]->appointment->chamber_name }}
                                                    </p>
                                                @elseif(isset($chambers_id->chamber_name))
                                                
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                        {{ $chambers_id->chamber_name }}
                                                    </p>
                                                    
                                                @else
                                                
                                                    <p style="line-height: 10px; font-weight: 600;"class="uk-text-large"> 
                                                          No Chamber Found
                                                    </p>
                                                
                                                @endif 
                                                 
                                                <?php 
                                                 $current_date = date('d M Y'); ?>
                                                <p style="line-height: 10px;" class="uk-text-large"> @if(isset($searched_date)) {{  date('d M, Y',strtotime($searched_date)) }} @else {{ date('d M, Y',strtotime($current_date)) }} @endif</p>
                                            </div>
                                        </div>
                                        <div class="uk-grid" style="margin-top: 12px">
                                            
                                                @if(isset($searched_date) && isset($searched_chambers_id))
                                                    <div class="uk-width-medium-1-1">
                                                        <p style="text-align: center; font-size: 14px;font-weight: 600">Time: Evening
                                                            
                                                        </p>
                                                        <p>
                                                            <a style="float: right;" target="_blank" href="{{ route("evening_appointment_pdf",['id'=>$medical_specialist->id,'dist'=>$medical_specialist->subdistrict_id,'date'=>$searched_date,'chamber_id'=>$searched_chambers_id]) }}"><input style="float: right;" type="submit" class="md-btn md-btn-primary" value="Print"/></a>
                                                        </p>
                                                    </div>
                                                @endif
                                            <div style="padding-left: 28px; padding-right: -1px;" class="uk-width-medium-1-1">
        
                                                    
                                                <div class="uk-overflow-container uk-margin-medium-top">

                                                    
                                                    <p style="text-align: left; font-size: 12px;font-weight: 600">Type: New</p>
                                                    @if(isset($all_appointments_evening_new[0]))
                                                        <table class="uk-table uk-table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th width="10%" >Sl</th>
                                                                <th width="50%">Patient Name</th>
                                                                <th width="40%">Contact No.</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th style="text-align: left;">Sl</th>
                                                                <th style="text-align: left;">Patient Name</th>
                                                                <th style="text-align: left;">Contact No.</th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @foreach($all_appointments_evening_new as $key=>$booking)
                                                                    <tr>
                                                                        <td style="text-align: left;">{{ $key+1 }}</td>
                                                                        <td style="text-align: left;">{{ $booking->patient_name }}</td>
                                                                        <td style="text-align: left;">{{ $booking->contact_number }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p style="text-align: left;">No Appointment for today.</p>
                                                    @endif

                                                    <!--<p style="text-align: center; font-size: 14px;font-weight: 600">Evening</p>-->
                                                    <p style="text-align: left; font-size: 12px;font-weight: 600">Type: Report</p>
                                                     @if(isset($all_appointments_evening_report[0]))
                                                        <table class="uk-table uk-table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th width="10%" >Sl</th>
                                                                <th width="50%">Patient Name</th>
                                                                <th width="40%">Contact No.</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th style="text-align: left;">Sl</th>
                                                                <th style="text-align: left;">Patient Name</th>
                                                                <th style="text-align: left;">Contact No.</th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @foreach($all_appointments_evening_report as $key=>$booking)
                                                                    <tr>
                                                                        <td style="text-align: left;">{{ $key+1 }}</td>
                                                                        <td style="text-align: left;">{{ $booking->patient_name }}</td>
                                                                        <td style="text-align: left;">{{ $booking->contact_number }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p style="text-align: left;">No Appointment for today.</p>
                                                    @endif
                                                    
                                                    <div class="footer">
                                                        <p style="text-align: center;">Sponsored by: medihelpbd.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    
    <!--Modal -->
        <div class="uk-modal" id="confirmSubmit" role="dialog">
        <div class="uk-modal-dialog">
            <div class="uk-modal-header">
                <h3 class="uk-modal-title">Appointment Information</h3>
            </div>
            
            <div class="uk-modal-body">
                <div class="md-card-content">
                    <div class="uk-overflow-container">
                        <table class="uk-table">
                            <tr>
                                <td>Chamber Name</td>
                                <td id="chamber_id"></td>
                            </tr>
                            <tr>
                                <td>Appointment Date</td>
                                <td id="appointment_date"></td>
                            </tr>
                            <tr>
                                <td>Appointment Time</td>
                                <td id="appointment_time"></td>
                            </tr>
                            <tr>
                                <td>Appointment Type</td>
                                <td id="appointment_type"></td>
                            </tr>
                            <tr>
                                <td>Patient Name</td>
                                <td id="patient_name"></td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td id="contact_number"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="md-btn md-btn-flat uk-modal-close">Cancel</button>
                <button id="submit" type="submit" class="md-btn md-btn-flat md-btn-flat-primary submitbtn">Confirm</button>
            </div>
        </div>
    </div>
    <!--Modal End-->
    
@endsection

@section('script')
    <script>
    $('#submitBtn').click(function() {
         var appointtime = '';
         var appointtype = '';
         
         if($('#appointmentTime').val() == 1){
             
            appointtime = 'Morning';
        
         } else {
        
            appointtime = 'Evening';
         }
         
         if($('#appointmentType').val() == 1){
             
            appointtype = 'New';
        
         } else {
        
            appointtype = 'Report';
         }
        
        
         $('#chamber_id').text( $("#chamberId option:selected").html() );
         $('#appointment_date').text($('#appointmentDate').val());
         $('#appointment_time').text( appointtime );
         $('#appointment_type').text( appointtype );
         $('#patient_name').text($('#patientName').val());
         $('#contact_number').text($('#contactNumber').val());
    });
    
    $('#submit').click(function(){
        $('#formfield').submit();
    });
</script>

<script>
    $("#print").click(function(){
        window.print();
    });
    
    
</script>
@endsection
