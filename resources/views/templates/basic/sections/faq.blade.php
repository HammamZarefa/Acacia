@php
    $faq_content = getContent('faq.content', true);
    $faq_elements = getContent('faq.element');
@endphp

<!-- faq-section start -->
<section class="faq-section ptb-80">
    <div class="container">
        <figure class="figure highlight-background highlight-background--lean-left">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1439px" height="480px">
                <defs>
                    <linearGradient id="PSgrad_4" x1="42.262%" x2="0%" y1="90.631%" y2="0%">
                        <stop offset="28%" stop-color="rgb(245,246,252)" stop-opacity="1" />
                        <stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="1" />
                    </linearGradient>

                </defs>
                <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                <path fill="url(#PSgrad_4)" d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
            </svg>
        </figure>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-header">
                    <span class="sub-title">{{ __(@$faq_content->data_values->heading) }}</span>
                    <h2 class="section-title">{{ __(@$faq_content->data_values->sub_heading) }}</h2>
                    <span class="title-border"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 mrb-30">
                <div class="faq-wrapper">

                    @forelse($faq_elements as $item)
                        <div class="faq-item {{ $loop->first ? 'active open' : null }}">
                            <h3 class="faq-title"><span class="title">{{ __(@$item->data_values->question) }} </span><span class="right-icon"></span></h3>
                            <div class="faq-content">
                                <p>{{ __(@$item->data_values->answer) }}</p>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
            <div class="col-lg-6 mrb-30">
                <div class="faq-thumb">
                    <img src="{{ getImage('assets/images/frontend/faq/' . @$faq_content->data_values->image, '569x402') }}" alt="about">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq-section end -->
