@php
    $service_content = getContent('service.content', true);
    $service_elements = getContent('service.element', false, '', true);
@endphp
<!-- service-section start -->
<section class="service-section ptb-80" id="service">
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
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-header">
                    <span class="sub-title">{{ __(@$service_content->data_values->heading) }}</span>
                    <h2 class="section-title">{{ __(@$service_content->data_values->sub_heading) }}</h2>
                    <span class="title-border"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ml-b-40">

            @forelse($service_elements as $item)
                <div class="col-lg-4 col-md-6 col-sm-8 mrb-30">
                    <div class="service-item text-center">
                        <div class="service-shape">
                            <img src="{{asset($activeTemplateTrue.'images/shape-3.png')}}" alt="shape">
                        </div>
                        <div class="service-icon">
                            @php echo @$item->data_values->icon @endphp
                        </div>
                        <div class="service-content">
                            <h3 class="title">{{ __(@$item->data_values->title) }}</h3>
                            <p>{{ __(@$item->data_values->content) }}</p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse

        </div>
    </div>
</section>
<!-- service-section end -->
