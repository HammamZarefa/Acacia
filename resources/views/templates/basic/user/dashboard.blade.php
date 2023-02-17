@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="row mb-none-30">
        <div class="col-xl-4 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--primary b-radius--10 box-shadow">
                <div class="icon">
                    <i class="la la-wallet"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{ $general->cur_sym . getAmount($widget['balance']) }}</span>
                    </div>
                    <div class="desciption">
                        <span class="text--small">@lang('Balance')</span>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xl-4 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--green b-radius--10 box-shadow">
                <div class="icon">
                    <i class="la la-money-bill"></i>
                </div>
            </div>
        </div>
    </div><!-- row end-->


@endsection
