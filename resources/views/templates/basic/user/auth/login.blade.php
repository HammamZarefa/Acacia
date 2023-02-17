@extends($activeTemplate.'layouts.frontend')

@section('content')
    <!-- register-section start -->
    <section class="register-section ptb-80">
        <div class="register-element-one">
            <img src="{{asset($activeTemplateTrue.'images/round.png')}}" alt="shape">
        </div>
        <div class="container">
            <figure class="figure highlight-background highlight-background--lean-left">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1439px" height="480px">
                    <defs>
                        <linearGradient id="PSgrad_1" x1="42.262%" x2="0%" y1="90.631%" y2="0%">
                            <stop offset="28%" stop-color="rgb(245,246,252)" stop-opacity="1" />
                            <stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="1" />
                        </linearGradient>

                    </defs>
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                    <path fill="url(#PSgrad_1)" d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                </svg>
            </figure>
            <div class="account-wrapper">
                <div class="signup-area account-area change-form">
                    <div class="row m-0 flex-wrap-reverse">
                        <div class="col-lg-6 p-0">
                            <div class="register-form-area common-form-style bg-one create-account">
                                <h4 class="title">@lang('Login your account')</h4>
                                <form class="create-account-form register-form" method="POST" action="{{ route('user.login')}}"
                                      onsubmit="return submitUserForm();">
                                    @csrf

                                    <div class="row justify-content-center ml-b-20">
                                        <div class="col-lg-12 form-group">
                                            <input type="text" name="username" value="{{ old('username') }}" placeholder="@lang('Username or Email')" required>
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="@lang('Password')">
                                        </div>

                                        <div class="form-group col-lg-12">
                                            @php echo loadReCaptcha() @endphp
                                        </div>
                                        @include($activeTemplate.'partials.custom-captcha')

                                        <div class="col-lg-12 form-group text-center">
                                            <div class="checkbox-wrapper d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="checkbox-item">
                                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label for="remember">@lang('Remember Me')</label>
                                                </div>

                                                <a href="{{route('user.password.request')}}">@lang('Forgot Password?')</a>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 form-group text-center">
                                            <button type="submit" class="submit-btn">@lang('Signin Now')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0">
                            <div class="change-catagory-area">
                                <h4 class="title">
                                    @lang('New here?')
                                </h4>
                                <a href="{{ route('user.register') }}" class="cmn-btn-active account-control-button">@lang('Create Account')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- register-section end -->
@endsection

@push('script')
    <script>
        "use strict";
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
    </script>
@endpush
