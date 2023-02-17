@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.projects.update',$project->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="payment-method-item">
                            <div class="payment-method-header d-flex flex-wrap">
                                <div class="thumb">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview" style="background-image: url('{{getImage(imagePath()['project']['path'],imagePath()['project']['size'])}}')"></div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type="file" name="images[]" class="profilePicUpload" id="image" accept=".png, .jpg, .jpeg .webp" multiple/>
                                        <label for="image" class="bg-primary"><i class="la la-pencil"></i></label>
                                    </div>
                                </div>

                                @include('admin.language_selector')
                                <div class="content">
                                    <div class="row mt-4 mb-none-15">
                                        @foreach($language as $lang)
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15 input-{{$lang->code}}">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Project Title') <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control " placeholder="@lang('Tilte')" name="title[{{$lang->code}}]" value="{{ $project->getTranslation('title',$lang->code) }}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15 input-{{$lang->code}}">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Summary') <span class="text-danger">*</span></label>
                                                <input type="text" name="summry[{{$lang->code}}]" placeholder="@lang('Summary')" class="form-control border-radius-5" value="{{ $project->getTranslation('summry',$lang->code) }}"/>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">
                                            <label class="w-100 font-weight-bold">@lang('Status') <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Released" name="status" value="{{ $project->status }}"/>
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
                                                    <label class="w-100 font-weight-bold">@lang('Order Date') </label>
                                                    <input type="date" class="form-control" name="order_date" placeholder="0" value="{{ $project->order_date }}"/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Released Date') </label>
                                                    <input type="date" class="form-control" placeholder="0" name="released_date" value="{{ $project->released_date }}"/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Client') </label>
                                                    <input type="text" class="form-control" placeholder="client" name="client" value="{{ $project->client }}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card border--primary mt-3">
                                            <h5 class="card-header bg--primary">@lang('Contact')</h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Location')</label>
                                                    <input type="text" class="form-control" placeholder="UK" name="location" value="{{$project->location }}"/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Link')</label>
                                                    <input type="text" class="form-control" placeholder="google.com" name="link" value="{{ $project->link }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card border--dark mt-3">

                                            <h5 class="card-header bg--dark">@lang('Description')</h5>
                                            @foreach($language as $lang)
                                            <div class="card-body input-{{$lang->code}}">
                                                <div class="form-group">
                                                    <textarea rows="8" class="form-control border-radius-5 nicEdit" name="desc[{{$lang->code}}]">{{ $project->getTranslation('desc',$lang->code) }}</textarea>
                                                </div>
                                            </div>
                                                @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card border--dark mt-3">
                                            <label class="card-header bg--dark  text-white">@lang('Categories')</label>
                                            <select id="multi-select-demo" multiple="multiple" name="categories[]">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" @if(in_array($category->id,$project->projectCategories->pluck('id')->toArray()) ) selected @endif>{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn--primary btn-block">@lang('Save Method')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="la la-fw la-backward"></i> @lang('Go Back') </a>
@endpush

