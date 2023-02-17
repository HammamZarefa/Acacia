@php
    $blog_content = getContent('blog.content', true);
    if (request()->route()->getName() == 'home'){
        $blog_elements = getContent('blog.element', false, 3);
    } else {
        $blog_elements = \App\Models\Frontend::where('data_keys', 'blog.element')->latest()->paginate(getPaginate());
    }
@endphp
<!-- news-section start -->
<section class="news-section ptb-80" id="blog">
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
                    <span class="sub-title">{{ __(@$blog_content->data_values->heading) }}</span>
                    <h2 class="section-title">{{ __(@$blog_content->data_values->sub_heading) }}</h2>
                    <span class="title-border"></span>
                </div>
            </div>
        </div>
        <div class="news-area">
            <div class="row justify-content-center ml-b-30">

                @forelse($blog_elements as $item)
                    <div class="col-lg-4 col-md-6 col-sm-8 mrb-30">
                        <div class="news-item">
                            <div class="news-thumb">
                                <img src="{{ getImage('assets/images/frontend/blog/thumb_' . @$item->data_values->image, '600x400') }}" alt="news">
                            </div>
                            <div class="news-content">
                                <h3 class="title"><a href="{{ route('blog.details',[$item->id,str_slug($item->data_values->title)]) }}">{{ __(@$item->data_values->title) }}</a></h3>
                                <p>{{ __(@$item->data_values->short_description) }}</p>
                                <div class="news-btn">
                                    <a href="{{ route('blog.details',[$item->id,str_slug($item->data_values->title)]) }}" class="custom-btn">@lang('Read More') <i class="ti-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
            @if(request()->route()->getName() != 'home')
                {{ $blog_elements->links() }}
            @endif
        </div>
    </div>
</section>
<!-- news-section end -->
