@extends('admin.layouts.app')
@section('panel')
@include('admin.language_selector')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="payment-method-item">
                            <div class="payment-method-header d-flex flex-wrap">
                                <div class="thumb">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview"
                                             style="background-image: url('{{getImage(imagePath()['gateway']['path'],imagePath()['gateway']['size'])}}')"></div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type="file" name="cover" class="profilePicUpload" id="image"
                                               accept=".png, .jpg, .jpeg .webp"/>
                                        <label for="image" class="bg-primary"><i class="la la-pencil"></i></label>
                                    </div>
                                </div>
                              

                                <div class="content">
                                    <div class="row mt-4 mb-none-15">
                                        @foreach($language as $lang)
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15 input-{{$lang->code}} ">
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Post Title') <span
                                                                class="text-danger">*</span></label>
                                                    <input type="text" class="form-control "
                                                           placeholder="@lang('Title')" name="title[{{$lang->code}}]"
                                                           value="{{ old('title') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15 input-{{$lang->code}}">
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Short Description')
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" name="short_desc[{{$lang->code}}]"
                                                           placeholder="@lang('Short Description')"
                                                           class="form-control border-radius-5"
                                                           value="{{ old('short_desc') }}"/>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">
                                            <label class="w-100 font-weight-bold">@lang('Status') <span
                                                        class="text-danger">*</span></label>
                                            <select class="form-control" placeholder="Released" name="status">
                                                <option value="PUBLISHED" selected>@lang('Publish')</option>
                                                <option value="DRAFT">@lang('Draft')</option>
                                                <option value="FEATURED">@lang('Featured')</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-method-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card border--primary mt-3">
                                            <h5 class="card-header bg--primary">@lang('Details')</h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Date') </label>
                                                    <input type="date" class="form-control" name="date" placeholder="0"
                                                           value="{{ old('date') }}"/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Author') </label>
                                                    <input type="author" class="form-control" name="author"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card border--primary mt-3">
                                            <h5 class="card-header bg--primary">@lang('Category and Tags')</h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Category') </label>
                                                    <select class="form-control" name="category">
                                                        @foreach($pcategories as $category)
                                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label class="w-100 font-weight-bold">@lang('Tags') </label>
                                                <div class="card border--dark mt-3">
                                                    <select id="multi-select-demo" multiple="multiple" name="tags[]">
                                                        @foreach($tags as $tag)
                                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        @foreach($language as $lang)
                                            <div class="card border--dark mt-3  input-{{$lang->code}}">
                                                <h5 class="card-header bg--dark">@lang('Body')</h5>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <textarea rows="8" class="form-control border-radius-5 nicEdit"
                                                                  name="body[{{$lang->code}}]">{{ old('body') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn--primary btn-block">@lang('Save Post')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
                class="la la-fw la-backward"></i> @lang('Go Back') </a>
@endpush

