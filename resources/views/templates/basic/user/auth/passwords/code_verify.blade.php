@extends($activeTemplate.'layouts.frontend')
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

                                <form class="create-account-form register-form" method="POST" action="{{ route('user.password.verify-code') }}">
                                    @csrf

                                    <input type="hidden" name="email" value="{{ $email }}">

                                    <div class="row justify-content-center ml-b-20">
                                        <div class="col-lg-12 form-group">
                                            <label class="col-form-label text-center">@lang('Verification Code')</label>

                                            <div id="phoneInput">
                                                <div class="field-wrapper">
                                                    <div class=" phone">
                                                        <input type="text" name="code[]" class="letter"
                                                               pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                        <input type="text" name="code[]" class="letter"
                                                               pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                        <input type="text" name="code[]" class="letter"
                                                               pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                        <input type="text" name="code[]" class="letter"
                                                               pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                        <input type="text" name="code[]" class="letter"
                                                               pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                        <input type="text" name="code[]" class="letter"
                                                               pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 form-group text-center">
                                            <button type="submit" class="submit-btn">@lang('Verify Code')</button>
                                        </div>
                                        <div class="col-lg-12 form-group text-center">
                                            @lang('Please check including your Junk/Spam Folder. if not found, you can')
                                            <a href="{{ route('user.password.request') }}" class="btn-link text-decoration-none">@lang('Try to send again')</a>
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

@push('script-lib')
    <script src="{{ asset($activeTemplateTrue.'js/jquery.inputLettering.js') }}"></script>
@endpush
@push('style')
    <style>

        #phoneInput .field-wrapper {
            position: relative;
            text-align: center;
        }

        #phoneInput .form-group {
            min-width: 300px;
            width: 50%;
            margin: 4em auto;
            display: flex;
            border: 1px solid rgba(96, 100, 104, 0.3);
        }

        #phoneInput .letter {
            height: 50px;
            border-radius: 0;
            text-align: center;
            max-width: calc((100% / 10) - 1px);
            flex-grow: 1;
            flex-shrink: 1;
            flex-basis: calc(100% / 10);
            outline-style: none;
            padding: 5px 0;
            font-size: 18px;
            font-weight: bold;
            color: red;
            border: 1px solid #0e0d35;
        }

        #phoneInput .letter + .letter {
        }

        @media (max-width: 480px) {
            #phoneInput .field-wrapper {
                width: 100%;
            }

            #phoneInput .letter {
                font-size: 16px;
                padding: 2px 0;
                height: 35px;
            }
        }

    </style>
@endpush

@push('script')
    <script>
        $(function () {
            "use strict";
            $('#phoneInput').letteringInput({
                inputClass: 'letter',
                onLetterKeyup: function ($item, event) {
                    console.log('$item:', $item);
                    console.log('event:', event);
                },
                onSet: function ($el, event, value) {
                    console.log('element:', $el);
                    console.log('event:', event);
                    console.log('value:', value);
                }
            });
        });
    </script>
@endpush
