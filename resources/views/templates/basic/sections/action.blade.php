@php
    $action_content = getContent('action.content', true);
@endphp
<!-- action-section start -->
<section class="action-section ptb-80 bg_img" data-background="{{asset($activeTemplateTrue.'images/action-bg.png')}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="action-content">
                    <span class="sub-title">{{ __(@$action_content->data_values->heading) }}</span>
                    <h2 class="title">{{ __(@$action_content->data_values->sub_heading) }}</h2>
                    <div class="action-btn">
                        <a href="{{ @$action_content->data_values->button_url }}" class="cmn-btn-active">{{ __(@$action_content->data_values->button) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- action-section end -->
