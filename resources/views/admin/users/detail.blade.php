@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-5 col-md-5 mb-30">

            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body p-0">
                    <div class="p-3 bg--white">
                        <div class="">
                            <img src="{{ getImage(imagePath()['profile']['user']['path'].'/'.$user->image,imagePath()['profile']['user']['size'])}}" alt="@lang('Profile Image')" class="b-radius--10 w-100">
                        </div>
                        <div class="mt-15">
                            <h4 class="">{{$user->fullname}}</h4>
                            <span class="text--small">@lang('Joined At') <strong>{{showDateTime($user->created_at,'d M, Y h:i A')}}</strong></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted">@lang('User information')</h5>
                    <ul class="list-group">

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span class="font-weight-bold">{{$user->username}}</span>
                        </li>


                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Status')
                            @switch($user->status)
                                @case(1)
                                <span class="badge badge-pill bg--success">@lang('Active')</span>
                                @break
                                @case(2)
                                <span class="badge badge-pill bg--danger">@lang('Banned')</span>
                                @break
                            @endswitch
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Balance')
                            <span class="font-weight-bold">{{getAmount($user->balance)}}  {{__($general->cur_text)}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card b-radius--10 overflow-hidden mt-30 box--shadow1">
                <div class="card-body">
                    <h5 class="mb-20 text-muted">@lang('User action')</h5>
                    <a data-toggle="modal" href="#addSubModal" class="btn btn--success btn--shadow btn-block btn-lg">
                        @lang('Add/Subtract Balance')
                    </a>
                    <a href="{{ route('admin.users.login.history.single', $user->id) }}"
                       class="btn btn--primary btn--shadow btn-block btn-lg">
                        @lang('Login Logs')
                    </a>
                    <a href="{{route('admin.users.email.single',$user->id)}}"
                       class="btn btn--danger btn--shadow btn-block btn-lg">
                        @lang('Send Email')
                    </a>
                </div>
            </div>
        </div>

        {{--<div class="col-xl-9 col-lg-7 col-md-7 mb-30">--}}
            {{--<div class="row mb-none-30">--}}
                {{--<div class="col-xl-4 col-lg-6 col-sm-6 mb-30">--}}
                    {{--<div class="dashboard-w1 bg--deep-purple b-radius--10 box-shadow has--link">--}}
                        {{--<a href="{{route('admin.users.deposits',$user->id)}}" class="item--link"></a>--}}
                        {{--<div class="icon">--}}
                            {{--<i class="fa fa-credit-card"></i>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<div class="numbers">--}}
                                {{--<span class="amount">{{number_format($totalDeposit,2)}}</span>--}}
                                {{--<span class="currency-sign"> {{__($general->cur_sym)}}</span>--}}
                            {{--</div>--}}
                            {{--<div class="desciption">--}}
                                {{--<span>@lang('Total Deposit')</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div><!-- dashboard-w1 end -->--}}

                {{--<div class="col-xl-4 col-lg-6 col-sm-6 mb-30">--}}
                    {{--<div class="dashboard-w1 bg--indigo b-radius--10 box-shadow has--link">--}}
                        {{--<a href="{{route('admin.users.transactions',$user->id)}}" class="item--link"></a>--}}
                        {{--<div class="icon">--}}
                            {{--<i class="la la-exchange-alt"></i>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<div class="numbers">--}}
                                {{--<span class="amount">{{$totalTransaction}}</span>--}}
                            {{--</div>--}}
                            {{--<div class="desciption">--}}
                                {{--<span>@lang('Total Transaction')</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div><!-- dashboard-w1 end -->--}}

                {{--<div class="col-xl-4 col-lg-6 col-sm-6 mb-30">--}}
                    {{--<div class="dashboard-w1 bg--pink b-radius--10 box-shadow has--link">--}}
                        {{--<div class="icon">--}}
                            {{--<i class="la la-exchange-alt"></i>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<div class="numbers">--}}
                                {{--<span class="amount">{{ $general->cur_sym . getAmount($total_spent) }}</span>--}}
                            {{--</div>--}}
                            {{--<div class="desciption">--}}
                                {{--<span>@lang('Total Spent')</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div><!-- dashboard-w1 end -->--}}
            {{--</div>--}}

            {{--<div class="row mt-50 mb-none-30">--}}
                {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
                    {{--<a href="{{ route('admin.orders.all', ['user' => $user->id]) }}">--}}
                        {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                            {{--<i class="las la-shopping-cart overlay-icon text--primary"></i>--}}
                            {{--<div class="widget-two__icon b-radius--5 bg--primary">--}}
                                {{--<i class="las la-shopping-cart"></i>--}}
                            {{--</div>--}}
                            {{--<div class="widget-two__content">--}}
                                {{--<h2 class="">{{$widget['total_order']}}</h2>--}}
                                {{--<p>@lang('Total Order')</p>--}}
                            {{--</div>--}}
                        {{--</div><!-- widget-two end -->--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
                    {{--<a href="{{ route('admin.orders.pending', ['user' => $user->id]) }}">--}}
                        {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                            {{--<i class="las la-spinner overlay-icon text--warning"></i>--}}
                            {{--<div class="widget-two__icon b-radius--5 bg--warning">--}}
                                {{--<i class="las la-spinner"></i>--}}
                            {{--</div>--}}
                            {{--<div class="widget-two__content">--}}
                                {{--<h2 class="">{{$widget['pending_order']}}</h2>--}}
                                {{--<p>@lang('Pending Order')</p>--}}
                            {{--</div>--}}
                        {{--</div><!-- widget-two end -->--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
                    {{--<a href="{{ route('admin.orders.processing', ['user' => $user->id]) }}">--}}
                        {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                            {{--<i class="la la-refresh overlay-icon text--teal"></i>--}}
                            {{--<div class="widget-two__icon b-radius--5 bg--teal">--}}
                                {{--<i class="la la-refresh"></i>--}}
                            {{--</div>--}}
                            {{--<div class="widget-two__content">--}}
                                {{--<h2 class="">{{$widget['processing_order']}}</h2>--}}
                                {{--<p>@lang('Processing Order')</p>--}}
                            {{--</div>--}}
                        {{--</div><!-- widget-two end -->--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row mt-50 mb-none-30">--}}
                {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
                    {{--<a href="{{ route('admin.orders.completed', ['user' => $user->id]) }}">--}}
                        {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                            {{--<i class="las la-check-circle overlay-icon text--green"></i>--}}
                            {{--<div class="widget-two__icon b-radius--5 bg--green">--}}
                                {{--<i class="las la-check-circle"></i>--}}
                            {{--</div>--}}
                            {{--<div class="widget-two__content">--}}
                                {{--<h2 class="">{{$widget['completed_order']}}</h2>--}}
                                {{--<p>@lang('Completed Order')</p>--}}
                            {{--</div>--}}
                        {{--</div><!-- widget-two end -->--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
                    {{--<a href="{{ route('admin.orders.cancelled', ['user' => $user->id]) }}">--}}
                        {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                            {{--<i class="las la-times-circle overlay-icon text--pink"></i>--}}
                            {{--<div class="widget-two__icon b-radius--5 bg--pink">--}}
                                {{--<i class="la la-times-circle"></i>--}}
                            {{--</div>--}}
                            {{--<div class="widget-two__content">--}}
                                {{--<h2 class="">{{$widget['cancelled_order']}}</h2>--}}
                                {{--<p>@lang('Cancelled Order')</p>--}}
                            {{--</div>--}}
                        {{--</div><!-- widget-two end -->--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
                    {{--<a href="{{ route('admin.orders.refunded', ['user' => $user->id]) }}">--}}
                        {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                            {{--<i class="las la-fast-backward overlay-icon text--secondary"></i>--}}
                            {{--<div class="widget-two__icon b-radius--5 bg--secondary">--}}
                                {{--<i class="la la-fast-backward"></i>--}}
                            {{--</div>--}}
                            {{--<div class="widget-two__content">--}}
                                {{--<h2 class="">{{$widget['refunded_order']}}</h2>--}}
                                {{--<p>@lang('Refunded Order')</p>--}}
                            {{--</div>--}}
                        {{--</div><!-- widget-two end -->--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}

{{--            User details--}}
            {{--<div class="card mt-50">--}}
                {{--<div class="card-body">--}}
                    {{--<h5 class="card-title mb-50 border-bottom pb-2">{{$user->fullname}} @lang('Information')</h5>--}}

                    {{--<form action="{{route('admin.users.update',[$user->id])}}" method="POST"--}}
                          {{--enctype="multipart/form-data">--}}
                        {{--@csrf--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group ">--}}
                                    {{--<label class="form-control-label font-weight-bold">@lang('First Name')<span class="text-danger">*</span></label>--}}
                                    {{--<input class="form-control" type="text" name="firstname" value="{{$user->firstname}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="form-control-label  font-weight-bold">@lang('Last Name') <span class="text-danger">*</span></label>--}}
                                    {{--<input class="form-control" type="text" name="lastname" value="{{$user->lastname}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group ">--}}
                                    {{--<label class="form-control-label font-weight-bold">@lang('Email') <span class="text-danger">*</span></label>--}}
                                    {{--<input class="form-control" type="email" name="email" value="{{$user->email}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="form-control-label  font-weight-bold">@lang('Mobile Number') <span class="text-danger">*</span></label>--}}
                                    {{--<input class="form-control" type="text" name="mobile" value="{{$user->mobile}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{--<div class="row mt-4">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group ">--}}
                                    {{--<label class="form-control-label font-weight-bold">@lang('Address') </label>--}}
                                    {{--<input class="form-control" type="text" name="address" value="{{@$user->address->address}}">--}}
                                    {{--<small class="form-text text-muted"><i class="las la-info-circle"></i> @lang('House number, street address')--}}
                                    {{--</small>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-xl-3 col-md-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="form-control-label font-weight-bold">@lang('City') </label>--}}
                                    {{--<input class="form-control" type="text" name="city" value="{{@$user->address->city}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-xl-3 col-md-6">--}}
                                {{--<div class="form-group ">--}}
                                    {{--<label class="form-control-label font-weight-bold">@lang('State') </label>--}}
                                    {{--<input class="form-control" type="text" name="state" value="{{@$user->address->state}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-xl-3 col-md-6">--}}
                                {{--<div class="form-group ">--}}
                                    {{--<label class="form-control-label font-weight-bold">@lang('Zip/Postal') </label>--}}
                                    {{--<input class="form-control" type="text" name="zip" value="{{@$user->address->zip}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-xl-3 col-md-6">--}}
                                {{--<div class="form-group ">--}}
                                    {{--<label class="form-control-label font-weight-bold">@lang('Country') </label>--}}
                                    {{--<select name="country" class="form-control"> @include('partials.country') </select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{--<div class="row">--}}
                            {{--<div class="form-group col-xl-4 col-md-6  col-sm-3 col-12">--}}
                                {{--<label class="form-control-label font-weight-bold">@lang('Status') </label>--}}
                                {{--<input type="checkbox" data-onstyle="-success" data-offstyle="-danger"--}}
                                       {{--data-toggle="toggle" data-on="@lang('Active')" data-off="@lang('Banned')" data-width="100%"--}}
                                       {{--name="status"--}}
                                       {{--@if($user->status) checked @endif>--}}
                            {{--</div>--}}

                            {{--<div class="form-group  col-xl-4 col-md-6  col-sm-3 col-12">--}}
                                {{--<label class="form-control-label font-weight-bold">@lang('Email Verification') </label>--}}
                                {{--<input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"--}}
                                       {{--data-toggle="toggle" data-on="@lang('Verified')" data-off="@lang('Unverified')" name="ev"--}}
                                       {{--@if($user->ev) checked @endif>--}}

                            {{--</div>--}}

                            {{--<div class="form-group  col-xl-4 col-md-6  col-sm-3 col-12">--}}
                                {{--<label class="form-control-label font-weight-bold">@lang('SMS Verification') </label>--}}
                                {{--<input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"--}}
                                       {{--data-toggle="toggle" data-on="@lang('Verified')" data-off="@lang('Unverified')" name="sv"--}}
                                       {{--@if($user->sv) checked @endif>--}}

                            {{--</div>--}}
                            {{--<div class="form-group  col-md-6  col-sm-3 col-12">--}}
                                {{--<label class="form-control-label font-weight-bold">@lang('2FA Status') </label>--}}
                                {{--<input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"--}}
                                       {{--data-toggle="toggle" data-on="@lang('Active')" data-off="@lang('Deactive')" name="ts"--}}
                                       {{--@if($user->ts) checked @endif>--}}
                            {{--</div>--}}

                            {{--<div class="form-group  col-md-6  col-sm-3 col-12">--}}
                                {{--<label class="form-control-label font-weight-bold">@lang('2FA Verification') </label>--}}
                                {{--<input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"--}}
                                       {{--data-toggle="toggle" data-on="@lang('Verified')" data-off="@lang('Unverified')" name="tv"--}}
                                       {{--@if($user->tv) checked @endif>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{--<div class="row mt-4">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Save Changes')--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>



    {{-- Add Sub Balance MODAL --}}
    <div id="addSubModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Add / Subtract Balance')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.users.addSubBalance', $user->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="checkbox" data-width="100%" data-height="44px" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="@lang('Add Balance')" data-off="@lang('Subtract Balance')" name="act" checked>
                            </div>


                            <div class="form-group col-md-12">
                                <label>@lang('Amount')<span class="text-danger">*</span></label>
                                <div class="input-group has_append">
                                    <input type="text" name="amount" class="form-control" placeholder="@lang('Please provide positive amount')">
                                    <div class="input-group-append">
                                        <div class="input-group-text">{{ __($general->cur_sym) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--success">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        "use strict";
        $("select[name=country]").val("{{ @$user->address->country }}");
    </script>
@endpush
