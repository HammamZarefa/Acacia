@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="card text-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="title"><span>@lang('Payment Preview')</span></h2>
                        <img src="{{$deposit->gateway_currency()->methodImage()}}" class="card-img-top" alt="@lang('Image')" class="w-100">
                    </div>
                    <div class="col-md-8 align-self-center">
                        <form action="{{ route('ipn.'.$deposit->gateway->alias) }}" method="POST" class="text-center">
                            @csrf
                            <h3>@lang('Please Pay') {{getAmount($deposit->final_amo)}} {{__($deposit->method_currency)}}</h3>
                            <h3 class="my-3">@lang('To Get') {{getAmount($deposit->amount)}}  {{__($general->cur_text)}}</h3>
                            <button type="button" class=" mt-4 btn--primary btn-round custom-success text-center btn-lg" id="btn-confirm">@lang('Pay Now')</button>
                            <script
                                src="//js.paystack.co/v1/inline.js"
                                data-key="{{ $data->key }}"
                                data-email="{{ $data->email }}"
                                data-amount="{{$data->amount}}"
                                data-currency="{{$data->currency}}"
                                data-ref="{{ $data->ref }}"
                                data-custom-button="btn-confirm"
                            >
                            </script>
                        </form>

                    </div>
                </div>
            </div>
        </div>
@endsection


@push('script')

@endpush
