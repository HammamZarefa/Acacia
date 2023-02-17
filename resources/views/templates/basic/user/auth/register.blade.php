@extends($activeTemplate.'layouts.frontend')
@section('content')
    <!-- register-section start -->
    <section class="register-section ptb-80">
        <div class="register-element-one">
            <img src="{{asset($activeTemplateTrue.'images/round.png')}}" alt="shape">
        </div>
        <div class="container">
            <figure class="figure highlight-background highlight-background--lean-left">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1439px"
                     height="480px">
                    <defs>
                        <linearGradient id="PSgrad_1" x1="42.262%" x2="0%" y1="90.631%" y2="0%">
                            <stop offset="28%" stop-color="rgb(245,246,252)" stop-opacity="1"/>
                            <stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="1"/>
                        </linearGradient>

                    </defs>
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                          d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z"/>
                    <path fill="url(#PSgrad_1)"
                          d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z"/>
                </svg>
            </figure>
            <div class="account-wrapper">
                <div class="login-area account-area change-form">
                    <div class="row m-0">
                        <div class="col-lg-6 p-0">
                            <div class="change-catagory-area">
                                <h4 class="title">
                                    @lang('Already have an account?')
                                </h4>
                                <a href="{{ route('user.login') }}"
                                   class="cmn-btn-active account-control-button">@lang("Sign In Here")</a>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0">
                            <div class="register-form-area common-form-style bg-one create-account">
                                <h4 class="title">@lang('Create your account')</h4>

                                <form class="create-account-form register-form" action="{{ route('user.register') }}"
                                      method="POST" onsubmit="return submitUserForm();">
                                    @csrf

                                    <div class="row justify-content-center ml-b-20">
                                        @if(session()->get('reference') != null)
                                            <div class="col-lg-12 form-group">
                                                <label for="firstname"
                                                       class="col-md-4 col-form-label text-md-right">@lang('Reference By')</label>
                                                <input type="text" name="referBy" id="referenceBy" class="form-control"
                                                       value="{{session()->get('reference')}}" readonly>
                                            </div>
                                        @endif

                                        <div class="col-lg-12 form-group">
                                            <input id="firstname" type="text" name="firstname"
                                                   value="{{ old('firstname') }}" placeholder="@lang('First Name')"
                                                   required>
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <input id="lastname" type="text" name="lastname"
                                                   value="{{ old('lastname') }}" placeholder="@lang('Last Name')"
                                                   required>
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <input id="username" type="text" name="username"
                                                   value="{{ old('username') }}" placeholder="@lang('Username')"
                                                   required>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <div class="country-code">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text p-0 border-0">
                                                            <select name="country_code">
                                                                @include('partials.country_code')
                                                            </select>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="mobile" placeholder="@lang('Your Phone Number')" class="w-auto flex-fill">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 form-group">
                                            <input type="text" id="country" name="country" readonly>
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <input id="email" type="email" placeholder="@lang('Email')" name="email" value="{{ old('email') }}"
                                                   required>
                                        </div>

                                        <div class="form-group col-lg-12 hover-input-popup">
                                            <input id="password" type="password" name="password" required  placeholder="@lang('Password')">
                                            @if($general->secure_password)
                                                <div class="input-popup">
                                                    <p class="error lower">@lang('1 small letter minimum')</p>
                                                    <p class="error capital">@lang('1 capital letter minimum')</p>
                                                    <p class="error number">@lang('1 number minimum')</p>
                                                    <p class="error special">@lang('1 special character minimum')</p>
                                                    <p class="error minimum">@lang('6 character password')</p>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-lg-12 form-group">
                                            <input id="password-confirm" type="password" name="password_confirmation" placeholder="@lang('Confirm Password')" required autocomplete="new-password">
                                        </div>

                                        <div class="form-group col-lg-12">
                                            @php echo loadReCaptcha() @endphp
                                        </div>
                                        @include($activeTemplate.'partials.custom-captcha')

                                        <div class="col-lg-12 form-group text-center">
                                            <button type="submit" class="submit-btn">@lang('Signup Now')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- register-section end -->
@endsection
@push('style')
    <style type="text/css">
        .country-code .input-group-prepend .input-group-text {
            background: #fff !important;
        }

        .country-code select {
            border: none;
        }

        .country-code select:focus {
            border: none;
            outline: none;
        }

        .hover-input-popup {
            position: relative;
        }

        .hover-input-popup:hover .input-popup {
            opacity: 1;
            visibility: visible;
        }

        .input-popup {
            position: absolute;
            bottom: 119%;
            left: 50%;
            width: 280px;
            background-color: #1a1a1a;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }

        .input-popup::after {
            position: absolute;
            content: '';
            bottom: -19px;
            left: 50%;
            margin-left: -5px;
            border-width: 10px 10px 10px 10px;
            border-style: solid;
            border-color: transparent transparent #1a1a1a transparent;
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        .input-popup p {
            padding-left: 20px;
            position: relative;
        }

        .input-popup p::before {
            position: absolute;
            content: '';
            font-family: 'Line Awesome Free';
            font-weight: 900;
            left: 0;
            top: 4px;
            line-height: 1;
            font-size: 18px;
        }

        .input-popup p.error {
            text-decoration: line-through;
        }

        .input-popup p.error::before {
            content: "\f057";
            color: #ea5455;
        }

        .input-popup p.success::before {
            content: "\f058";
            color: #28c76f;
        }

        .input-group-text {
            background-color: #37f5f9;
            border: 1px solid #37f5f9;
        }
    </style>
@endpush

@push('script-lib')
    <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
@endpush

@push('script')
    <script>
        "use strict";
        @if($country_code)
        $(`option[data-code={{ $country_code }}]`).attr('selected', '');
        @endif
        $('select[name=country_code]').change(function () {
            $('input[name=country]').val($('select[name=country_code] :selected').data('country'));
        }).change();

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }

        @if($general->secure_password)
        $('input[name=password]').on('input', function () {
            secure_password($(this));
        });
        @endif
    </script>
@endpush
