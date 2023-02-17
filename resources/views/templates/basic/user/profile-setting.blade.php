@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="register" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="image-upload">
                                            <div class="thumb">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview" style="background-image: url({{ getImage(imagePath()['profile']['user']['path'].'/'. $user->image,imagePath()['profile']['user']['size']) }})">
                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="avatar-edit">
                                                    <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg .webp">
                                                    <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                                    <small class="mt-2 text-facebook">@lang('Supported files'): <b>jpeg, jpg.</b> @lang('Image will be resized into') {{imagePath()['profile']['user']['size']}}px </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="InputFirstname" class="col-form-label">@lang('First Name'):</label>
                                            <input type="text" class="form-control" id="InputFirstname" name="firstname" placeholder="@lang('First Name')" value="{{$user->firstname}}" >
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="lastname" class="col-form-label">@lang('Last Name'):</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="@lang('Last Name')" value="{{$user->lastname}}">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="email" class="col-form-label">@lang('E-mail Address'):</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="@lang('E-mail Address')" value="{{$user->email}}" readonly>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <input type="hidden" id="track" name="country_code">
                                            <label for="phone" class="col-form-label">@lang('Mobile Number')</label>
                                            <input type="tel" class="form-control pranto-control" id="phone" name="mobile" value="{{$user->mobile}}" placeholder="@lang('Your Contact Number')" readonly>
                                        </div>
                                        <input type="hidden" name="country" id="country" class="form-control d-none" value="{{@$user->address->country}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="address" class="col-form-label">@lang('Address'):</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="@lang('Address')" value="{{@$user->address->address}}" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="state" class="col-form-label">@lang('State'):</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="@lang('state')" value="{{@$user->address->state}}" required="">
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="zip" class="col-form-label">@lang('Zip Code'):</label>
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="@lang('Zip Code')" value="{{@$user->address->zip}}" required="">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="city" class="col-form-label">@lang('City'):</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="@lang('City')" value="{{@$user->address->city}}" required="">
                                </div>

                            </div>


                            <div class="form-group row pt-3">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-block btn--primary">@lang('Update Profile')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style-lib')
    <link href="{{ asset($activeTemplateTrue.'css/bootstrap-fileinput.css') }}" rel="stylesheet">
@endpush
@push('style')
    <link rel="stylesheet" href="{{asset('assets/admin/build/css/intlTelInput.css')}}">
    <style>
        .intl-tel-input {
            position: relative;
            display: inline-block;
            width: 100%;!important;
        }
    </style>
@endpush

