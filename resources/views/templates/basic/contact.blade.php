@extends($activeTemplate.'layouts.frontend')

@section('content')

    @php
        $contact_content = getContent('contact.content', true);
        $address_content = getContent('address.content', true);
    @endphp
    <!-- contact-section start -->
    <section class="contact-section register-section ptb-80">
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
            <div class="row justify-content-center align-items-center ml-b-30">
                <div class="col-lg-6 mrb-30">
                    <div class="contact-thumb">
                        <img src="{{ getImage('assets/images/frontend/contact/' . @$contact_content->data_values->image, '715x471') }}" alt="contact">
                    </div>
                </div>
                <div class="col-lg-6 mrb-30">
                    <div class="register-form-area">
                        <h3 class="title">@lang('Get In Touch')</h3>
                        <form class="register-form" method="post" action="">
                            @csrf

                            <div class="row justify-content-center ml-b-20">
                                <div class="col-lg-6 form-group">
                                    <input name="name" type="text" placeholder="@lang('Your Name')" value="{{ auth()->check() ? auth()->user()->fullname : old('name') }}" {{ auth()->check() ? 'readonly' : '' }} required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input name="email" type="text" placeholder="@lang('Enter E-Mail Address')" value="{{ auth()->check() ? auth()->user()->email : old('email') }}" {{ auth()->check() ? 'readonly' : '' }} required>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <input name="subject" type="text" placeholder="@lang('Write your subject')" value="{{old('subject')}}" required>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <textarea name="message" wrap="off" placeholder="@lang('Write your message')">{{old('message')}}</textarea>
                                </div>
                                <div class="col-lg-12 form-group text-center">
                                    <button type="submit" class="submit-btn">@lang('Submit Now')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->

    <!-- contact-info start -->
    <div class="contact-info-area ptb-80">
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
            <div class="contact-info-item-area">
                <div class="row justify-content-center align-items-center ml-b-30">
                    <div class="col-lg-4 col-md-6 col-sm-8 text-center mrb-30">
                        <div class="contact-info-item">
                            <i class="fas fa fa-map-marker-alt"></i>
                            <h3 class="title">@lang('Office Address')</h3>
                            <p>{{ __(@$address_content->data_values->address) }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 text-center mrb-30">
                        <div class="contact-info-item active">
                            <i class="fas fa-envelope"></i>
                            <h3 class="title">@lang('Email Address')</h3>
                            <p>{{ __(@$address_content->data_values->email) }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 text-center mrb-30">
                        <div class="contact-info-item">
                            <i class="fas fa-phone-alt"></i>
                            <h3 class="title">@lang('Phone Number')</h3>
                            <p>{{ __(@$address_content->data_values->phone) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-info end -->
@endsection
