@extends('layouts.frontend_master_02')

@section('title', 'Contact')

@section('angular')
    <script src="{{url('app/frontend/frontend/pharmacy.view.js')}}"></script>
    <script src="{{url('app/frontend/frontend/pharmacy.b_view.js')}}"></script>
@endsection

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

    <style type="text/css">
        .resultText{
            text-align: center;
            padding-top: 25px;
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
    </style>

@endsection

@section('content')

    @if(Session('language')=='bn')
        <div class="uk-width-large-7-10">
            <div class="md-card">
                <div class="user_content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <p><?php echo $data->b_contact; ?></p>
                        </div>
                        <div class="uk-width-medium-1-2">
                            {!! Form::open(['url' => 'contact/post', 'method' => 'POST', 'class' => 'ul-form-stacked']) !!}
                                <div class="uk-grid" data-uk-grid-margin style="margin-top: 15px;">
                                    <div class="uk-width-medium-1-1">
                                        <h4></h4>
                                        @if($message != "") <h5 style="color: @if($status == 1) green @else red @endif;"><strong>{{ $message }}</strong></h5> @endif
                                        <div class="uk-width-1-1 uk-margin-top">
                                            <div class="parsley-row">
                                                <label for="name">আপনার নাম <span class="req">*</span></label>
                                                <input type="text" id="name" name="name" value="" required class="md-input" />
                                            </div>
                                            <div class="parsley-row uk-margin-top">
                                                <label for="email">ই-মেইল/ ফোন <span class="req">*</span></label>
                                                <input type="text" id="email" name="email" value="" required class="md-input" />
                                            </div>
                                            <div class="parsley-row uk-margin-top">
                                                <label for="subject">বিষয় <span class="req">*</span></label>
                                                <input type="text" id="subject" name="subject" value="" required class="md-input" />
                                            </div>
                                            <div class="parsley-row uk-margin-top">
                                                <label for="details">আপনার মেসেজ <span class="req">*</span></label>
                                                <textarea id="details" name="details" value="" required class="md-input"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-float-right uk-margin-top">
                                    <button type="submit" class="md-btn md-btn-danger md-btn-large" >পাঠিয়ে দিন</button>
                                </div>
                            {!! Form::close() !!}
                        </div>    
                         
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="uk-width-large-7-10">
            <div class="md-card">
                <div class="user_content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <p><?php echo $data->contact; ?></p>
                        </div> 
                        <div class="uk-width-medium-1-2">
                            {!! Form::open(['url' => 'contact/post', 'method' => 'POST', 'class' => 'ul-form-stacked']) !!}
                                <div class="uk-grid" data-uk-grid-margin style="margin-top: 15px;">
                                    <div class="uk-width-medium-1-1">
                                        <h4></h4>
                                        @if($message != "") <h5 style="color: @if($status == 1) green @else red @endif;"><strong>{{ $message }}</strong></h5> @endif
                                        <div class="uk-width-1-1 uk-margin-top">
                                            <div class="parsley-row">
                                                <label for="name">Your Name <span class="req">*</span></label>
                                                <input type="text" id="name" name="name" value="" required class="md-input" />
                                            </div>
                                            <div class="parsley-row uk-margin-top">
                                                <label for="email">Your E-Mail Address/ Phone Number <span class="req">*</span></label>
                                                <input type="text" id="email" name="email" value="" required class="md-input" />
                                            </div>
                                            <div class="parsley-row uk-margin-top">
                                                <label for="subject">Subject <span class="req">*</span></label>
                                                <input type="text" id="subject" name="subject" value="" required class="md-input" />
                                            </div>
                                            <div class="parsley-row uk-margin-top">
                                                <label for="details">Details <span class="req">*</span></label>
                                                <textarea id="details" name="details" value="" required class="md-input"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-float-right uk-margin-top">
                                    <button type="submit" class="md-btn md-btn-danger md-btn-large" >Send</button>
                                </div>
                            {!! Form::close() !!}
                        </div>    
                        
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection