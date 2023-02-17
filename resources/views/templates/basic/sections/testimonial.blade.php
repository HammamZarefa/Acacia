@php
    $testimonial_content = getContent('testimonial.content', true);
    $testimonial_elements = getContent('testimonial.element');
@endphp
<!-- client-section-two start -->
<div class="client-section ptb-80 bg_img" data-background="{{asset($activeTemplateTrue.'images/client-bg.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-header">
                    <h2 class="section-title">{{ __(@$testimonial_content->data_values->heading) }}</h2>
                    <span class="title-border"></span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ml-b-20">
            <div class="col-lg-12">
                <div class="client-slider">
                    <div class="swiper-wrapper">

                        @forelse($testimonial_elements as $item)
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <div class="client-content">
                                        <div class="client-details">
                                            <div class="client-ratings">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $item->data_values->rating_out_of_5)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <p>{{ __(@$item->data_values->review) }}</p>
                                        </div>
                                        <div class="client-bottom">
                                            <div class="client-thumb">
                                                <img src="{{ getImage('assets/images/frontend/testimonial/' . @$item->data_values->image, '107x107') }}" alt="client">
                                            </div>
                                            <div class="client-title">
                                                <h3 class="title">{{ __(@$item->data_values->name) }}</h3>
                                                <span class="sub-title">{{ __(@$item->data_values->designation) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- client-section-two end -->
