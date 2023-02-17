@extends($activeTemplate.'layouts.frontend')
@section('content')

    <!-- /.offcanvas-info -->
    <div class="wrapper image-wrapper bg-image page-title-wrapper inverse-text" data-image-src="{{asset($activeTemplateTrue.'images/art/bg4.jpg')}}">
        <div class="container inner text-center">
            <div class="space90"></div>
            <h1 class="page-title">We are Snowlake</h1>
            <p class="lead">A company turning ideas into beautiful things.</p>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <div class="wrapper white-wrapper">
        <div class="container inner">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <figure><img src="#" srcset="{{ getImage('assets/images/frontend/about/' . $about->data_values->image, '633x539') }}" alt="" /></figure>
                </div>
                <!--/column -->
                <div class="space20 d-md-none"></div>
                <div class="space50 d-none d-md-block d-lg-none"></div>
                <div class="col-lg-6 pl-60 pl-md-15">
                    <h3 class="display-2">{{ getContentTranslation($about->data_values,'title')}}</h3>
                    <div class="space20"></div>
                    <p>{!!  getContentTranslation($about->data_values,'content') !!}</p>
                    <div class="space10"></div>
                    {{--<a href="#" class="btn btn-red">More Details</a>--}}
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="space120"></div>
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <figure><img src="#" srcset="{{ getImage('assets/images/frontend/about_2/' . $about2->data_values->image, '633x539') }}" alt="" /></figure>
                </div>
                <!--/column -->
                <div class="space20 d-md-none"></div>
                <div class="space50 d-none d-md-block d-lg-none"></div>
                <div class="col-lg-6 pr-60 pr-md-15">
                    <h3 class="display-2">{{ getContentTranslation($about2->data_values,'title')}}</h3>
                    <div class="space20"></div>
                    <p>{!!  getContentTranslation($about2->data_values,'content') !!}</p>
                   <div class="space10"></div>
                    {{--<a href="#" class="btn btn-yellow">More Details</a>--}}
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="space120"></div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <figure><img src="#" srcset="{{ getImage('assets/images/frontend/about_3/' . $about3->data_values->image, '633x539') }}" alt="" /></figure>
                </div>
                <!--/column -->
                <div class="space20 d-md-none"></div>
                <div class="space50 d-none d-md-block d-lg-none"></div>
                <div class="col-lg-6 pl-60 pl-md-15">
                    <h3 class="display-2">{{ getContentTranslation($about3->data_values,'title')}}</h3>
                    <div class="space20"></div>
                    <p>{!!  getContentTranslation($about3->data_values,'content') !!}</p>
                    <div class="space10"></div>
                    {{--<a href="#" class="btn btn-green">More Details</a>--}}
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </div>
@endsection