<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">

@include('partials.seo')

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'/css/bootstrap-fileinput.css')}}">

    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'master/css/vendor/bootstrap.min.css') }}">
    <!-- bootstrap toggle css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/vendor/bootstrap-toggle.min.css')}}">
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/all.min.css')}}">
    <!-- line-awesome webfont -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/line-awesome.min.css')}}">

<!-- custom select box css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/vendor/nice-select.css')}}">
    <!-- code preview css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/vendor/prism.css')}}">
    <!-- select 2 css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/vendor/select2.min.css')}}">
    <!-- jvectormap css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/vendor/jquery-jvectormap-2.0.5.css')}}">
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/vendor/datepicker.min.css')}}">
    <!-- timepicky for time picker css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/vendor/jquery-timepicky.css')}}">
    <!-- bootstrap-clockpicker css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/vendor/bootstrap-clockpicker.min.css')}}">
    <!-- bootstrap-pincode css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/vendor/bootstrap-pincode-input.css')}}">
    <!-- dashdoard main css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'master/css/app.css')}}">


    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'/css/bootstrap-fileinput.css')}}">

    @stack('style-lib')
    @stack('style')
</head>
<body>


<!-- page-wrapper start -->
<div class="page-wrapper default-version">
    @include($activeTemplate.'partials.sidenav')
    @include($activeTemplate.'partials.topnav')

    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row align-items-center mb-30 justify-content-between">
                <div class="col-lg-6 col-sm-6">
                    <h6 class="page-title">{{ __($page_title) }}</h6>
                </div>
                <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
                    @stack('breadcrumb')
                </div>
            </div>



            @yield('content')


        </div><!-- bodywrapper__inner end -->
    </div><!-- body-wrapper end -->
</div>



<!-- jQuery library -->
<script src="{{asset($activeTemplateTrue.'master/js/vendor/jquery-3.6.0.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset($activeTemplateTrue.'master/js/vendor/bootstrap.bundle.min.js')}}"></script>
<!-- bootstrap-toggle js -->
<script src="{{asset($activeTemplateTrue.'master/js/vendor/bootstrap-toggle.min.js')}}"></script>

<!-- slimscroll js for custom scrollbar -->
<script src="{{asset($activeTemplateTrue.'master/js/vendor/jquery.slimscroll.min.js')}}"></script>
<!-- custom select box js -->
<script src="{{asset($activeTemplateTrue.'master/js/vendor/jquery.nice-select.min.js')}}"></script>


<script src="{{ asset($activeTemplateTrue.'master/js/nicEdit.js') }}"></script>

<!-- code preview js -->
<script src="{{asset($activeTemplateTrue.'master/js/vendor/prism.js')}}"></script>
<!-- seldct 2 js -->
<script src="{{asset($activeTemplateTrue.'master/js/vendor/select2.min.js')}}"></script>
<!-- main js -->
<script src="{{asset($activeTemplateTrue.'master/js/app.js')}}"></script>

<script src="{{asset($activeTemplateTrue.'/js/bootstrap-fileinput.js')}}"></script>

@include('admin.partials.notify')
@include('partials.plugins')

{{-- LOAD NIC EDIT --}}
<script>
    (function($,document){
        "use strict";
        bkLib.onDomLoaded(function() {
            $( ".nicEdit" ).each(function( index ) {
                $(this).attr("id","nicEditor"+index);
                new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
            });
        });
        $( document ).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain',function(){
            $('.nicEdit-main').focus();
        });
    })(jQuery, document);
</script>

@stack('script-lib')
@stack('script')


</body>
</html>
