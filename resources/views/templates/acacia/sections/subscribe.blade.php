@php
    $subscribe_content = getContent('subscribe.content', true);
@endphp

<section class="call-to-action-section ptb-80">
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
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 text-center">
                <div class="call-to-action-content">
                    <h2 class="title">{{ __(@$subscribe_content->data_values->heading) }}</h2>
                    <form class="call-to-action-form" method="post" action="{{ route('subscribe') }}" id="subscribeForm">
                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <input type="email" id="subscribe" name="email" value="{{ old('email') }}" placeholder="@lang('Your Email Address')" required>
                                <button type="submit" class="submit-btn subscribe_btn"><i class="icon-location-arrow"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('script')
    <script>
        (function ($) {
            "use strict";

            $(document).on("submit", "#subscribeForm", function(e) {
                e.preventDefault();

                var data = $('#subscribeForm').serialize();

                $.ajax({
                    url:'{{ route('subscribe') }}',
                    method:'post',
                    data:data,
                    success:function(response){
                        if(response.success){
                            $('#subscribe').val('');
                            notify('success', response.message);
                        }else{
                            $.each(response.error, function( key, value ) {
                                notify('error', value);
                            });
                        }
                    },
                    error:function(error){
                        console.log(error)
                    }
                });
            });

        })(jQuery);
    </script>
@endpush
