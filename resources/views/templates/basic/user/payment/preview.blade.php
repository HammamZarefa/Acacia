@extends($activeTemplate.'layouts.master')


@section('content')
    <div class="row  justify-content-center">
            <div class="col-md-8">
                <div class="card card-deposit text-center">
                    <div class="card-body card-body-deposit">
                        <div class="row justify-content-around">
                            <div class="col-md-6">
                                <img src="{{ $data->gateway_currency()->methodImage() }}" alt="@lang('Image')" class="align-self-center w-auto">
                            </div>
                            <div class="col-md-6 align-self-center">
                                <ul class="list-group text-center my-3">
                                    <p class="list-group-item">
                                        @lang('Amount'):
                                        <strong>{{getAmount($data->amount)}} </strong> {{__($general->cur_text)}}
                                    </p>
                                    <p class="list-group-item">
                                        @lang('Charge'):
                                        <strong>{{getAmount($data->charge)}}</strong> {{__($general->cur_text)}}
                                    </p>
                                    <p class="list-group-item">
                                        @lang('Payable'): <strong> {{getAmount($data->amount + $data->charge)}}</strong> {{__($general->cur_text)}}
                                    </p>
                                    <p class="list-group-item">
                                        @lang('Conversion Rate'): <strong>1 {{__($general->cur_text)}} = {{getAmount($data->rate)}}  {{__($data->baseCurrency())}}</strong>
                                    </p>
                                    <p class="list-group-item">
                                        @lang('In') {{$data->baseCurrency()}}:
                                        <strong>{{getAmount($data->final_amo)}}</strong>
                                    </p>


                                    @if($data->gateway->crypto==1)
                                        <p class="list-group-item">
                                            @lang('Conversion with')
                                            <b> {{ __($data->method_currency) }}</b> @lang('and final value will Show on next step')
                                        </p>
                                    @endif
                                </ul>

                                @if( 1000 >$data->method_code)
                                    <a href="{{route('user.deposit.confirm')}}" class="btn btn--primary btn-block py-3 font-weight-bold">@lang('Pay Now')</a>
                                @else
                                    <a href="{{route('user.deposit.manual.confirm')}}" class="btn btn--primary btn-block py-3 font-weight-bold">@lang('Pay Now')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@stop


