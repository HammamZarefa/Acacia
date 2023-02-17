@php
    $feature_elements = getContent('feature.element', false, null, true);
@endphp
<!-- feature-section start -->
<section class="feature-section ptb-80">
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
        <div class="row justify-content-center ml-b-30">

            @forelse($feature_elements as $item)
                <div class="col-lg-4 col-md-6 col-sm-8 mrb-30">
                    <div class="feature-item text-center">
                        <div class="feature-icon">
                            @php echo @$item->data_values->icon @endphp
                        </div>
                        <div class="feature-content">
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
<!-- feature-section end -->
