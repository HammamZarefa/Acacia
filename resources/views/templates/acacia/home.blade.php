@extends('templates.acacia.layouts.frontend')
@section('content')

    <!-- HERO -->
    <div class="waxon_tm_hero" id="home">
        <div class="background">
            <div class="leftpart"></div>
            <div class="rightpart">
                <div class="inner">
                    <div class="image" data-img-url="{{ getImage('assets/images/frontend/hero/' . @$hero->data_values->image, '633x539') }}"></div>
                    <div class="overlay_image"></div>
                    <div class="myOverlay"></div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="content_inner">
                    <div class="name"> <!-- If you can't see clearly your texts with hero image, please open style.css and search this word " .waxon_tm_hero .background .overlay_image " with CTRL+F and enable comment -->
                        <h3 class="stroke">Acacia</h3>
                        <h3>General</h3>
                        <span style="color:#000;font-size: 25px;">Trading</span>
                    </div>
                </div>
                <div class="waxon_tm_down" data-skin="dark" data-position="">  <!-- Skin: "", dark -->  <!-- Position: left, center, right -->
                    <div class="line_wrapper">
                        <div class="line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /HERO -->
    <!-- /.offcanvas-info -->

    <!-- ABOUT -->
    <div class="waxon_tm_about" id="about">
        <div class="container">
            <div class="about_inner">
                <div class="left">
                    <h1 class="title-heading">@lang('About')</h1>
                            <img class="thumbnail" src="{{ getImage('assets/images/frontend/about/' . @$about->data_values->image, '633x539') }}" alt="" />
                            <!-- Animation Image classes: thumbnail, thumbnail-2, thumbnail-3, thumbnail-4,-->

                </div>
                <div class="right">
                    <div class="name">
                        <h3>{{getContentTranslation($about->data_values,'title') }}<span class="bg">@lang('About')</span></h3>
                        {{--<span class="job">{{$about->subject}}</span>--}}
                    </div>
                    <div class="text">
                        <p>{{getContentTranslation($about->data_values,'content') }}</p>
                    </div>
                    <div class="waxon_tm_button" data-position="left">  <!-- Position: left, center, right -->
                        <a href="#contact">
                            <span>@lang('Contact')</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /ABOUT -->

    <!-- SERVICES -->
    <div class="waxon_tm_service">
        <div class="container">
            <div class="service_inner">
                <ul class="owl-carousel">
                    @foreach($service_elements as $item)
                        <li class="item">
                            <div class="list_inner">
                                <img class="svg" src="{{ getImage('assets/images/frontend/service/' . @$item->data_values->image, '633x539') }}" alt="" />
                                <div class="details">
                                    <h3>{{getContentTranslation($item->data_values,'title') }}</h3>
                                    <p>{{ getContentTranslation($item->data_values,'content') }} </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- /SERVICES -->

    <!-- PORTFOLIO -->
    <div class="waxon_tm_portoflio" id="portfolio">
        <div class="container">
            <div class="waxon_tm_main_title">
                <h1 class="title-heading">@lang('Portfolio')</h1>
                <div class="title">
                    <h3>@lang('Featured Works')<span class="bg">>@lang('Portfolio')</span></h3>
                </div>
                <div class="portfolio_filter">
                    <ul>
                        <li>
                            <a href="#" class="current" data-filter="*">
                                <span class="first">All</span>
                                <span class="second">All</span>
                            </a>
                        </li>
                        @foreach($projectCategories as $pcategory)
                            <li >
                                <a href="#" data-filter=".{{$pcategory->id}}">
                                    <span class="first">{{$pcategory->title}}</span>
                                    <span class="second">{{$pcategory->title}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="wrapper">
                        <a href="#"><span class="trigger"></span></a>
                    </div>
                </div>
            </div>
            <div class="portfolio_inner">
                <ul class="gallery_zoom" id="portfo" data-number="6">
                    @foreach($projects as $key => $project)
                        <li class="{{$project->projectCategories[0]->id}}">
                            <div class="list_inner">
                                <div class="image">
                                    <img src="{{ getImage('assets/images/project/' . @$project->images[0]->filename) }}" alt="" />
                                    <div class="main" data-img-url="{{ getImage('assets/images/project/' . @$project->images[0]->filename) }}"></div>
                                    <a class="full_link popup-vimeo" href="{{ getImage('assets/images/project/' . @$project->images[0]->filename) }}"></a>
                                </div>
                                <div class="title">
                                    <h3><a href="#">{{$project->title}}</a></h3>
                                    <span><a href="#">{{$project->client}}</a></span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="waxon_tm_button" data-position="center" id="show-portfolio" style="margin-bottom: 10px;">
                    <a>
                        <span>@lang('Show More')</span>
                    </a>
                </div>
                <div class="waxon_tm_button" data-position="center" id="hide-portfolio">
                    <a>
                        <span>@lang('Show Less')</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- TESTIMONIALS -->
    <div class="waxon_tm_testimonials">
        <div class="container">
            <div class="waxon_tm_main_title">
                <div class="title">
                    <h3>@lang('What Clients Say')<span class="bg">@lang('Testimonial')</span></h3>
                </div>
            </div>
            <div class="testi_inner">
                <div class="left">
                    <div class="quote_list">
                        <ul>
                            {{--<li class="active">--}}
                                {{--<img class="svg" src="{{asset('front/img/svg/quote-1.svg')}}" alt="" />--}}
                                {{--<p class="text">Good overall template. I am getting back into coding and had a simple question for the author. They responded within 30 minutes and answered my question. Highly recommend.</p>--}}
                                {{--<div class="details">--}}
                                    {{--<div class="image">--}}
                                        {{--<div class="main" data-img-url="img/about/testi1.png"></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="short">--}}
                                        {{--<h3 class="author"><span>Nelly Furtado</span></h3>--}}
                                        {{--<h3 class="job"><span>App Developer</span></h3>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            @foreach($testimonial_elements as $key => $item)
                                <li @if($key==0) class="active" @endif>
                                    <img class="svg" src="{{ getImage('assets/images/frontend/testimonial/' . @$item->data_values->image, '633x539') }}" alt="" />
                                    <p class="text">{{@$item->data_values->review}}.</p>
                                    <div class="details">
                                        <div class="image">
                                            <div class="main" data-img-url="{{ getImage('assets/images/frontend/testimonial/' . @$item->data_values->image, '633x539') }}"></div>
                                        </div>
                                        <div class="short">
                                            <h3 class="author"><span>{{@$item->data_values->name}}</span></h3>
                                            <h3 class="job"><span>{{@$item->data_values->designation}}</span></h3>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="right">
                    <div class="image_list">
                        <ul class="masonry">
                            @foreach($testimonial_elements as $key => $item)
                            <li class="active masonry_item">
                                <div class="image">
                                    <img src="{{ getImage('assets/images/frontend/testimonial/' . @$item->data_values->image, '633x539') }}" alt="" />
                                    <div class="main" data-img-url="{{ getImage('assets/images/frontend/testimonial/' . @$item->data_values->image, '633x539') }}"></div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /TESTIMONIALS -->

    <!-- NEWS -->
    <div class="waxon_tm_news" id="news">
        <div class="container">
            <div class="waxon_tm_main_title">
                <div class="title">
                    <h3>@lang('Latest News')<span class="bg">@lang('News')</span></h3>
                </div>
            </div>
            <div class="news_inner">
                <ul id="blogs" data-number="9">
                    @foreach($featuredPosts as $post)
                        <li class="wow fadeInDown" data-wow-duration="0.8s">
                            <div class="list_inner">
                                <div class="image">
                                    <img src="{{ getImage('assets/images/post/' . $post->cover) }}" alt="" />
                                    <div class="main" data-img-url="{{ getImage('assets/images/post/' . $post->cover) }}"></div>
                                    <a class="full_link" href="#"></a>
                                </div>
                                <div class="details">
                                    <div class="extra">
                                        <p class="date">By <a href="#">{{$post->author}}</a> <span>{{ Carbon\Carbon::parse($post->date)->format("d F, Y") }}</span></p>
                                    </div>
                                    <h3 class="title"><a href="#">{{$post->title}}</a></h3>
                                </div>
                                <div class="main_content">
                                    <div class="descriptions">
                                        <p class="bigger"> {!! $post->body !!}</p>
                                        <div class="quotebox">
                                            <div class="icon">
                                                <img class="svg" src="{{asset($activeTemplateTrue.'img/svg/quote.svg')}}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="news_share">--}}
                                        {{--<span>Share:</span>--}}
                                        {{--<ul>--}}
                                            {{--<li><a href="#"><img class="svg" src="{{asset('front/img/svg/social/facebook.svg')}}" alt="" /></a></li>--}}
                                            {{--<li><a href="#"><img class="svg" src="{{asset('front/img/svg/social/twitter.svg')}}" alt="" /></a></li>--}}
                                            {{--<li><a href="#"><img class="svg" src="{{asset('front/img/svg/social/instagram.svg')}}" alt="" /></a></li>--}}
                                            {{--<li><a href="#"><img class="svg" src="{{asset('front/img/svg/social/dribbble.svg')}}" alt="" /></a></li>--}}
                                            {{--<li><a href="#"><img class="svg" src="{{asset('front/img/svg/social/tik-tok.svg')}}"  alt="" /></a></li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </li>
                @endforeach
                </ul>
                <div class="waxon_tm_button" data-position="center" id="show-blog" style="margin-bottom: 10px;">
                    <a>
                        <span>@lang('Show More')</span>
                    </a>
                </div>
                <div class="waxon_tm_button" data-position="center" id="hide-blog">
                    <a>
                        <span>@lang('Show Less')</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /NEWS -->
    <!-- CONTACT -->
    <div class="waxon_tm_contact" id="contact">
        <div class="bg_image"></div>
        <div class="container">
            <div class="contact_inner">
                <div class="waxon_tm_main_title">
                    <div class="title">
                        <h3>@lang('Get in Touch')<span class="bg">@lang('Contact')</span></h3>
                    </div>
                </div>
                <div class="desc">
                    <p>@lang('Please fill out the form on this section to contact with me. Or call between 9:00 a.m. and 8:00 p.m. ET, Monday through Friday')</p>
                </div>
                <div class="wrapper">
                    <div class="left wow fadeInLeft" data-wow-duration="0.8s">
                        <div class="fields">
                            <form action="{{route('contact.send')}}" method="post" class="contact_form" id="contact_form" autocomplete="off">
                                @csrf
                                <div class="returnmessage" data-success="Your message has been received, We will contact you soon."></div>
                                <div class="empty_notice"><span>@lang('Please Fill Required Fields')</span></div>
                                <div class="first">
                                    <ul>
                                        <li>
                                            <input id="name" name="name" type="text" placeholder="Name">
                                        </li>
                                        <li>
                                            <input id="email" name="email" type="text" placeholder="Email">
                                        </li>
                                    </ul>
                                </div>
                                <div class="last">
                                    <textarea id="message" name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="waxon_tm_button" data-position="left">
                                    <button class="waxon_tm_button" type="submit" >
                                        <span>@lang('Send Message')</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right wow fadeInRight" data-wow-duration="0.8s">
                        <div class="map_wrap">
                            <div class="map" id="ieatmaps"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /CONTACT -->


    {{--<div class="wrapper white-wrapper">--}}
        {{--<div class="container inner">--}}
            {{--<h2 class="title-color color-gray text-center">@lang('Our Blog')</h2>--}}
            {{--<h3 class="display-3 text-center">@lang('Here are the latest company news') <br class="d-none d-lg-block" />@lang('from our blog that got the most attention').</h3>--}}
            {{--<div class="space40"></div>--}}
            {{--<div class="grid-view dir">--}}
                {{--<div class="carousel owl-carousel" data-margin="30" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "3"}}'>--}}
                    {{--@foreach($featuredPosts as $post)--}}
                    {{--<div class="item">--}}
                        {{--<figure class="overlay overlay1 rounded mb-30"><a href="{{route('blog.show',$post->id)}}"> <img src="{{ getImage('assets/images/post/' . $post->cover) }}" alt="" /></a>--}}
                            {{--<figcaption>--}}
                                {{--<h5 class=" from-top mb-0">@lang('Read More')</h5>--}}
                            {{--</figcaption>--}}
                        {{--</figure>--}}
                        {{--<div class="end category"><a href="#" class="badge badge-pill bg-red">{{$post->category->title}}</a></div>--}}
                        {{--<h2 class="end post-title"><a href="{{route('blog.show',$post->id)}}">{{$post->title}}</a></h2>--}}
                        {{--<div class="end meta mb-0"><span class="date"><i class="jam jam-clock"></i>{{$post->date}}</span>--}}
                            {{--<span class="comments"><i class="jam jam-message-alt"></i><a href="#">{{$post->views}} @lang('Views')</a></span></div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                {{--<!-- /.owl-carousel -->--}}
            {{--</div>--}}
            {{--<!-- /.grid-view -->--}}
            {{--<div class="space80"></div>--}}
            {{--<div class="space70 d-md-none"></div>--}}
        {{--</div>--}}

        {{--<!-- /.wrapper -->--}}
        {{--<div class="wrapper white-wrapper">--}}
            {{--<div class="container inner">--}}
                {{--<div class="row align-items-center">--}}
                    {{--<div class="col-lg-6 order-lg-2 play-wrapper light-gallery-wrapper text-center">--}}
                        {{--<div class="img-blob blob8"><img src="{{asset($activeTemplateTrue.'images/art/about2.jpg')}}" style="width: 30rem" alt="" /></div>--}}
                        {{--<a href="https://www.youtube.com/watch?v=26TbMXXOe0I" class="btn-play lightbox"></a>--}}
                    {{--</div>--}}
                    {{--<!--/column -->--}}
                    {{--<div class="space20 d-md-none"></div>--}}
                    {{--<div class="space50 d-none d-md-block d-lg-none"></div>--}}
                    {{--<div class="col-lg-6 pr-50 pr-md-15">--}}
                        {{--<h2 class="title-color color-gray text-center">@lang('What Makes Us Different')</h2>--}}
                        {{--<h3 class="display-3 text-center">@lang('We are a creative company that focuses on establishing long-term relationships with customers').</h3>--}}
                        {{--<div class="space30"></div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="diffrent d-flex flex-row">--}}
                                    {{--<div>--}}
                                        {{--<span class="icon icon-bg icon-bg-default color-default mr-25"><span class="number">1</span></span>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}
                                        {{--<h5>@lang('Rapid Solutions')</h5>--}}
                                        {{--<p>@lang('Rapid Solutions Description').</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!--/column -->--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="diffrent d-flex flex-row">--}}
                                    {{--<div>--}}
                                        {{--<span class="icon icon-bg icon-bg-default color-default mr-25"><span class="number">2</span></span>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}
                                        {{--<h5>@lang('Personal Support')</h5>--}}
                                        {{--<p>@lang('Personal Support Description').</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!--/column -->--}}
                            {{--<div class="space10 d-none d-md-block"></div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="diffrent d-flex flex-row">--}}
                                    {{--<div>--}}
                                        {{--<span class="icon icon-bg icon-bg-default color-default mr-25"><span class="number">3</span></span>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}
                                        {{--<h5>@lang('Passionate Team')</h5>--}}
                                        {{--<p>@lang('Passionate Team Description').</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!--/column -->--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="diffrent d-flex flex-row">--}}
                                    {{--<div>--}}
                                        {{--<span class="icon icon-bg icon-bg-default color-default mr-25"><span class="number">4</span></span>--}}
                                    {{--</div>--}}
                                    {{--<div>--}}
                                        {{--<h5>@lang('100% Satisfaction')</h5>--}}
                                        {{--<p>@lang('100% Satisfaction Description').</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!--/column -->--}}
                        {{--</div>--}}
                        {{--<!--/.row -->--}}
                    {{--</div>--}}
                    {{--<!--/column -->--}}
                {{--</div>--}}
                {{--<!--/.row -->--}}
                {{--<div class="space120"></div>--}}
                {{--<div class="wrapper image-wrapper bg-auto no-overlay bg-image text-center" data-image-src="{{asset($activeTemplateTrue.'images/art/map.png')}}">--}}
                    {{--<div class="container inner">--}}
                        {{--<h2 class="text-center title-color color-gray">@lang('Join Our Community')</h2>--}}
                        {{--<h3 class="display-3 mb-0">@lang('We are trusted by over 5000+ clients. Join them') <br class="d-none d-lg-block" />@lang('by using our services and grow your business').</h3>--}}
                        {{--<div class="space50"></div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-8 offset-md-2">--}}
                                {{--<div class="row counter">--}}
                                    {{--<div class="col-md-4 color-default">--}}
                                        {{--<h3 class="color-default"><span class="value">@lang('200')</span>K</h3>--}}
                                        {{--<p class="community">@lang('Transactions')</p>--}}
                                    {{--</div>--}}
                                    {{--<!--/column -->--}}
                                    {{--<div class="col-md-4 color-default">--}}
                                        {{--<h3 class="color-default"><span class="value">@lang('150')</span>K</h3>--}}
                                        {{--<p class="community">@lang('Accounts')</p>--}}
                                    {{--</div>--}}
                                    {{--<!--/column -->--}}
                                    {{--<div class="col-md-4 color-default">--}}
                                        {{--<h3 class="color-default"><span class="value">@lang('100')</span>K</h3>--}}
                                        {{--<p class="community">@lang('Reviews')</p>--}}
                                    {{--</div>--}}
                                    {{--<!--/column -->--}}
                                {{--</div>--}}
                                {{--<!--/.row -->--}}
                            {{--</div><!-- /.wrapper -->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection