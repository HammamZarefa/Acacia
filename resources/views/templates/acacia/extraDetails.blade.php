@extends($activeTemplate.'layouts.frontend')
@section('content')

    <!-- news-section start -->
    <section class="news-section news-details-section ptb-80">
        <div class="container">
            <figure class="figure highlight-background highlight-background--lean-left">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1439px"
                     height="480px">
                    <defs>
                        <linearGradient id="PSgrad_4" x1="42.262%" x2="0%" y1="90.631%" y2="0%">
                            <stop offset="28%" stop-color="rgb(245,246,252)" stop-opacity="1" />
                            <stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="1" />
                        </linearGradient>

                    </defs>
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                          d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                    <path fill="url(#PSgrad_4)"
                          d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                </svg>
            </figure>
            <div class="news-area">
                <div class="row justify-content-center ml-b-30">
                    <div class="col-lg-12 mrb-30">
                        <div class="news-item">
                            <div class="news-content news-details-content">

                                @php echo @$extra->data_values->content @endphp

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news-section end -->

@endsection
