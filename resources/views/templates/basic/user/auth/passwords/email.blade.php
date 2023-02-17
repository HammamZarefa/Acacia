@extends('templates.basic.layouts.frontend')

@section('content')
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
                    <div class="row m-0 justify-content-center">
                        <div class="col-lg-8 p-0">
                            <div class="register-form-area common-form-style bg-one create-account">
                                <h4 class="title">@lang('Reset password')</h4>

                                <form class="create-account-form register-form" method="POST" action="{{ route('user.password.email') }}">
                                    @csrf

                                    <div class="row justify-content-center ml-b-20">

                                        <div class="col-lg-12 form-group">
                                            <label class="col-form-label">@lang('Choose Email or Username')</label>
                                            <select name="type">
                                                <option value="email">@lang('E-Mail Address')</option>
                                                <option value="username">@lang('Username')</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <label class="col-form-label my_value" for="my_value"></label>
                                            <input type="text" name="value" value="{{ old('value') }}" id="my_value" required autofocus="off">
                                        </div>


                                        <div class="col-lg-12 form-group text-center">
                                            <button type="submit" class="submit-btn">@lang('Send Password Code')</button>
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
@endsection
@push('script')
    <script type="text/javascript">
        $('select[name=type]').change(function () {
            $('.my_value').text($('select[name=type] :selected').text());
        }).change();
    </script>
@endpush
