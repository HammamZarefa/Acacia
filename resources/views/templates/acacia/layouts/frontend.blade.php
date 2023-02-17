<!doctype html>
<html  lang="en">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('partials.seo')
<!-- STYLES -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'css/plugins.css') }}">

    <!-- fontawesome 5  -->
    <!-- line-awesome webfont -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/colors.css')}}">

    @if(session()->get('lang') =='ar')
        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/rtl.css')}}">
    @endif
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/all.min.css')}}">
    <script type="text/javascript" src="{{asset($activeTemplateTrue.'js/modernizr.custom.js')}}"></script>
    <!-- favicon  -->
    <link rel="shortcut icon" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" type="image/x-icon">

</head>
<body @if(session()->get('lang') =='ar') class="rtl" @endif>
<div class="acacia-anim ">
    <div><img src="{{asset($activeTemplateTrue.'img/logo/acacia-icon1.png')}}" alt=""></div>
    <div><img src="{{asset($activeTemplateTrue.'img/logo/acacia-icon1.png')}}" alt=""></div>
    <div><img src="{{asset($activeTemplateTrue.'img/logo/acacia-icon1.png')}}" alt=""></div>
    <div><img src="{{asset($activeTemplateTrue.'img/logo/acacia-icon1.png')}}" alt=""></div>
    <div><img src="{{asset($activeTemplateTrue.'img/logo/acacia-icon1.png')}}" alt=""></div>
    <div><img src="{{asset($activeTemplateTrue.'img/logo/acacia-icon1.png')}}" alt=""></div>
    <div><img src="{{asset($activeTemplateTrue.'img/logo/acacia-icon1.png')}}" alt=""></div>
    <div><img src="{{asset($activeTemplateTrue.'img/logo/acacia-icon1.png')}}" alt=""></div>
</div>
<div class="whatsapp">
    <img src="{{asset($activeTemplateTrue.'img/logo/acacia-icon2.png')}}" alt="">
    <a href="https://wa.me/.{{$address_content->data_values->whatsapp}}" target="_blank">
        <img class="svg" src="{{asset($activeTemplateTrue.'img/svg/social/whatsapp.svg')}}" alt=""/>
    </a>
</div>

<!-- PRELOADER -->
<div class="waxon_tm_preloader">
    <div class="spinner_wrap">
        <div class="spinner"></div>
    </div>
</div>
<!-- /PRELOADER -->
<!-- MODALBOX NEWS -->
<div class="waxon_tm_modalbox_news">
    <div class="box_inner">
        <div class="close">
            <a href="#"><img class="svg" src="{{asset($activeTemplateTrue.'img/svg/cancel.svg')}}" alt="" /></a>
        </div>
        <div class="description_wrap"></div>
    </div>
</div>
<!-- /MODALBOX NEWS -->

<!-- MODALBOX ABOUT -->
<div class="waxon_tm_modalbox_about">
    <div class="box_inner">
        <div class="close">
            <a href="#"><img class="svg" src="{{asset($activeTemplateTrue.'img/svg/cancel.svg')}}" alt="" /></a>
        </div>
        <div class="description_wrap">
            <div class="my_box">
                <div class="left">
                    <div class="about_title">
                        <h3>Programming Skills</h3>
                    </div>
                    <div class="waxon_progress">
                        <div class="progress_inner" data-value="95">
                            <span><span class="label">Wordpress &amp; PHP</span><span class="number">95%</span></span>
                            <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                        </div>
                        <div class="progress_inner" data-value="80" >
                            <span><span class="label">Javascript &amp; React</span><span class="number">80%</span></span>
                            <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                        </div>
                        <div class="progress_inner" data-value="90">
                            <span><span class="label">HTML &amp; CSS</span><span class="number">90%</span></span>
                            <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="about_title">
                        <h3>Language Skills</h3>
                    </div>
                    <div class="waxon_progress">
                        <div class="progress_inner" data-value="95">
                            <span><span class="label">English</span><span class="number">95%</span></span>
                            <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                        </div>
                        <div class="progress_inner" data-value="90" >
                            <span><span class="label">Japanese</span><span class="number">90%</span></span>
                            <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                        </div>
                        <div class="progress_inner" data-value="85">
                            <span><span class="label">Arabian</span><span class="number">85%</span></span>
                            <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="counter">
                <div class="about_title">
                    <h3>Fun Facts</h3>
                </div>
                <ul>
                    <li>
                        <div class="list_inner">
                            <h3>777+</h3>
                            <span>Projects Completed</span>
                        </div>
                    </li>
                    <li>
                        <div class="list_inner">
                            <h3>3K+</h3>
                            <span>Happy Clients</span>
                        </div>
                    </li>
                    <li>
                        <div class="list_inner">
                            <h3>9K+</h3>
                            <span>Lines of Code</span>
                        </div>
                    </li>
                </ul>
            </div>
            {{--<div class="partners">--}}
                {{--<div class="about_title">--}}
                    {{--<h3>Our Partners</h3>--}}
                {{--</div>--}}
                {{--<ul class="owl-carousel">--}}
                    {{--<li class="item"><a href="#"><img src="{{asset($activeTemplateTrue.'img/partners/1.png')}}" alt="" /></a></li>--}}
                    {{--<li class="item"><a href="#"><img src="{{asset($activeTemplateTrue.'img/partners/2.png')}}" alt="" /></a></li>--}}
                    {{--<li class="item"><a href="#"><img src="{{asset($activeTemplateTrue.'img/partners/3.png')}}" alt="" /></a></li>--}}
                    {{--<li class="item"><a href="#"><img src="{{asset($activeTemplateTrue.'img/partners/4.png')}}" alt="" /></a></li>--}}
                    {{--<li class="item"><a href="#"><img src="{{asset($activeTemplateTrue.'img/partners/5.png')}}" alt="" /></a></li>--}}
                    {{--<li class="item"><a href="#"><img src="{{asset($activeTemplateTrue.'img/partners/6.png')}}" alt="" /></a></li>--}}
                    {{--<li class="item"><a href="#"><img src="{{asset($activeTemplateTrue.'img/partners/7.png')}}" alt="" /></a></li>--}}
                    {{--<li class="item"><a href="#"><img src="{{asset($activeTemplateTrue.'img/partners/8.png')}}" alt="" /></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
<!-- /MODALBOX ABOUT -->
<div class="waxon_tm_all_wrap" data-magic-cursor="show" data-color="black">
    <!-- TOPBAR -->
    <div class="waxon_tm_topbar">
        <div class="container">
            <div class="topbar_inner">
                <div class="logo">
                    <img src="{{ getImage(imagePath()['logoIcon']['path'].'/logo.png') }}" alt=""/>
                </div>
                <div class="menu">
                    <div class="links">
                        <ul class="anchor_nav">
                            <li class="current">
                                <a href="#home">
                                    <span class="first">@lang('Home')</span>
                                    <span class="second">@lang('Home')</span>
                                </a>
                            </li>
                            <li>
                                <a href="#about">
                                    <span class="first">@lang('About')</span>
                                    <span class="second">@lang('About')</span>
                                </a>
                            </li>
                            <li>
                                <a href="#portfolio">
                                    <span class="first">@lang('Portfolio')</span>
                                    <span class="second">@lang('Portfolio')</span>
                                </a>
                            </li>
                            <li>
                                <a href="#news">
                                    <span class="first">@lang('News')</span>
                                    <span class="second">@lang('News')</span>
                                </a>
                            </li>
                            <li>
                                <a href="#contact">
                                    <span class="first">@lang('Contact')</span>
                                    <span class="second">@lang('Contact')</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('lang',Config::get('app.locale')=='en'?'ar' :'en')}}">
                                    <span class="first"><img src="{{asset($activeTemplateTrue.'img/svg/social/globe-solid.svg')}}"
                                                             alt=""></span>
                                    <span class="second"><img src="{{asset($activeTemplateTrue.'img/svg/social/globe-solid.svg')}}"
                                                              alt=""></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /TOPBAR -->

    <!-- MOBILE MENU -->
    <div class="waxon_tm_mobile_menu">
        <div class="topbar_inner">
            <div class="container bigger">
                <div class="topbar_in">
                    <div class="logo">
                        <a href="#"><img src="{{ getImage(imagePath()['logoIcon']['path'].'/logo.png') }}" alt=""/></a>
                    </div>
                    <div class="my_trigger">
                        <div class="hamburger hamburger--collapse-r">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown">
            <div class="container">
                <div class="dropdown_inner">
                    <ul class="anchor_nav">
                        <li><a href="#home">@lang('Home')</a></li>
                        <li><a href="#about">@lang('About')</a></li>
                        <li><a href="#portfolio">@lang('Portfolio')</a></li>
                        <li><a href="#news">@lang('News')</a></li>
                        <li><a href="#contact">@lang('Contact')</a></li>
                        <li><a href="{{route('lang',Config::get('app.locale')=='en'?'ar' :'en')}}">@lang('Language')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


@yield('content')
<!-- COPYRIGHT -->
    <div class="waxon_tm_copyright">
        <div class="container">
            <div class="copyright_inner">
                <ul>
                    <li class="wow fadeInDown" data-wow-duration="0.8s">
                        <span>@lang('ACACIA')</span>
                        <span>@lang('General Trading')</span>
                    </li>
                    <li class="wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <span>{!! getContentTranslation($address_content->data_values,'address') !!}</span>
                    </li>
                    <li class="wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="0.4s">
                        <span><a href="#">{{$address_content->data_values->email}}</a></span>
                        <span>{{$address_content->data_values->phone}}</span>
                    </li>
                    <li class="wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="0.6s">
                        <div class="social">
                            <ul>
                                @foreach($socials as $social)
                                    <li>
                                        <a href="{{$social->data_values->social_url}}">
                                            <span class="first">{!! $social->data_values->social_icon !!}</span>
                                            <span class="second">{!! $social->data_values->social_icon !!}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /COPYRIGHT -->

    <!-- MAGIC CURSOR -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- /MAGIC CURSOR -->


</div>
<!-- / WRAPPER ALL -->

<!-- SCRIPTS -->
<script src="{{asset($activeTemplateTrue.'js/jquery.js')}}"></script>
<!--[if lt IE 10]>
<script type="text/javascript" src="{{asset($activeTemplateTrue.'js/ie8.js')}}"></script> <![endif]-->
<script src="{{asset($activeTemplateTrue.'js/plugins.js')}}"></script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5bpEs3xlB8vhxNFErwoo3MXR64uavf6Y&callback=initMap"></script> -->
<script src="{{asset($activeTemplateTrue.'js/init.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>
<!-- /SCRIPTS -->

</body>
</html>