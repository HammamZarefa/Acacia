@extends($activeTemplate.'layouts.frontend')

@section('content')

    <!-- contact-section start -->
    <section class="contact-section register-section ptb-80">
    <!-- /.offcanvas-info -->
    <div class="wrapper image-wrapper bg-image page-title-wrapper inverse-text" data-image-src="{{ asset($activeTemplateTrue.'images/art/bg3.jpg') }}">
        <div class="container inner text-center">
            <div class="space90"></div>
            <h1 class="page-title">@lang('Contact Us')</h1>
            <p class="lead">@lang('We Are Waiting')</p>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <div class="wrapper light-wrapper">
        <div class="container inner">
            <h2 class="section-title">@lang('Get in Touch')</h2>
            <p class="lead larger">@lang('Have any questions? Reach out to us from our contact form and we will get back to you shortly').</p>
            <div class="col-md-12">
                <a  class="btn btn-send" style="background:#00ac2c;" href="https://wa.me/{{$address->data_values->whatsapp}}"><i class="jam jam-whatsapp" style="font-size:20px;color: #fff"><span style="color: #fff"> @lang('Start Now')</span></i> </a>
                <a  class="btn btn-send" style="background:#ef4021;" href="tel:{{$address->data_values->whatsapp}}"><i class="jam jam-phone" style="font-size:20px;color: #fff"><span style="color: #fff">@lang('Call Us')</span></i> </a>

            </div>

            <div class="space40"></div>
            <div class="row">
                <div class="col-lg-7">
                    <form id="contact-form" class="fields-white" method="post" action="{{route('contact.send')}}">
                        <div class="messages"></div>
                        <div class="controls">
                            <div class="form-row">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="@lang('First Name') *" required="required" data-error="@lang('First Name is required').">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-group">
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="@lang('Last Name') *" required="required" data-error="@lang('Last Name is required').">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-group">
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="@lang('Email') *" required="required" data-error="@lang('Valid email is required').">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-group">
                                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="@lang('Phone')">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control" placeholder="@lang('Message') *" rows="4" required="required" data-error="@lang('Message is required')."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-send" value="@lang('Send message')">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <p class="text-muted"><strong>*</strong> @lang('These fields are required').</p>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /form -->
                </div>
                <!--/column -->
                <div class="space30 d-none d-md-block d-lg-none"></div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="d-flex flex-row">
                        <div>
                            <div class="icon color-default fs-34 mr-25"> <i class="icofont-location-pin"></i> </div>
                        </div>
                        <div>
                            <h6 class="mb-5">@lang('Address')</h6>
                            <address>{!! $address->data_values->address !!}</address>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div>
                            <div class="icon color-default fs-34 mr-25"> <i class="icofont-telephone"></i> </div>
                        </div>
                        <div>
                            <h6 class="mb-5">@lang('Phone')'</h6>
                            <p>{!! $address->data_values->phone !!}</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div>
                            <div class="icon color-default fs-34 mr-25"> <i class="icofont-mail-box"></i> </div>
                        </div>
                        <div>
                            <h6 class="mb-5">@lang('E-mail')</h6>
                            <p><a href="mailto:{!! $address->data_values->email !!}" class="nocolor">{!! $address->data_values->email !!}</a> </p>
                        </div>
                    </div>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.wrapper -->
@endsection
