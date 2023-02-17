@extends($activeTemplate.'layouts.frontend')
@section('content')
    <!-- /.offcanvas-info -->
    <div class="wrapper image-wrapper bg-image page-title-wrapper inverse-text" data-image-src="{{asset($activeTemplateTrue.'images/art/bg5.jpg')}}">
        <div class="container inner text-center">
            <div class="space90"></div>
            <h1 class="page-title">@lang('Our Services')</h1>
            <p class="lead">@lang('Creating quality products that make your life easier')</p>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <div class="wrapper light-wrapper">
        <div class="container inner">
            <h2 class="title-color color-gray text-center">@lang('What We Do?')</h2>
            <h3 class="display-3 text-center">@lang('The full service we are offering is specifically') <br class="d-none d-lg-block" />@lang('designed to meet your business needs').</h3>
            <div class="space40"></div>
            <div class="row gutter-50">
                @foreach($service_elements as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex flex-row justify-content-center">
                        <div>
                            <div class="icon icon-blob icon-blob-rose color-rose mr-25"> <img src="{{ getImage('assets/images/frontend/service/' . @$item->data_values->image, '50x50') }}" style="width: 80px" alt="" /> </div>
                        </div>
                        <div>
                            <h5>{{getContentTranslation($item->data_values,'title') }}</h5>
                            <p>{{ getContentTranslation($item->data_values,'content') }}.</p>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <div class="wrapper white-wrapper">
        <div class="container inner">
            <div class="row align-items-center">
                <div class="col-lg-6 play-wrapper light-gallery-wrapper text-center">
                    <div class="img-blob blob7"><img src="{{asset($activeTemplateTrue.'images/art/about5.jpg')}}" style="width: 30rem" alt="" /></div>
                    <a href="https://www.youtube.com/watch?v=" class="btn-play lightbox"></a>
                </div>
                <!--/column -->
                <div class="space30 d-none d-md-block d-lg-none"></div>
                <div class="col-lg-6 pl-60 pl-md-15">
                    <h2 class="title-color color-gray">@lang('Our Process')</h2>
                    <h3 class="display-3">@lang('Find out everything you need to know about creating a business process').</h3>
                    <div class="space20"></div>
                    <p>@lang('Desc Your SErvices').</p>
                    <div class="space20"></div>
                    <div class="row counter">
                        @foreach($counter_elements as $counter)
                        <div class="col-md-4">
                            <h3 class="value">{{$counter->data_values->number}}</h3>
                            <p>{{getContentTranslation($counter->data_values,'title')}}</p>
                        </div>
                        <!--/column -->
                        @endforeach
                    </div>
                    <!--/.row -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </div>
@endsection