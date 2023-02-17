@extends('admin.layouts.app')
@section('panel')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="payment-method-item">
                            <div class="payment-method-header d-flex flex-wrap">
                                <div class="thumb">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview" style="background-image: url('{{ getImage('assets/images/post/' . $post->cover) }}')"></div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type="file" name="cover" class="profilePicUpload" id="image" accept=".png, .jpg, .jpeg .webp" />
                                        <label for="image" class="bg-primary"><i class="la la-pencil"></i></label>
                                    </div>
                                </div>
                                @include('admin.language_selector')

                                <div class="content">
                                    <div class="row mt-4 mb-none-15">
                                        @foreach($language as $lang)
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15  input-{{$lang->code}} ">
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Post Title') <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control " placeholder="@lang('Title')" name="title[{{$lang->code}}]" value="{{ $post->getTranslation('title',$lang->code) }}"/>
                                                </div>
                                            </div>
                                        @endforeach

                                        @foreach($language as $lang)
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15 input-{{$lang->code}}">
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Short Description') <span class="text-danger">*</span></label>
                                                    <input type="text" name="short_desc[{{$lang->code}}]" placeholder="@lang('Short Description')" class="form-control border-radius-5" value="{{ $post->getTranslation('short_desc',$lang->code) }}"/>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">
                                            <label class="w-100 font-weight-bold">@lang('Status') <span class="text-danger">*</span></label>
                                            <select class="form-control" placeholder="Released" name="status" >
                                                <option value="PUBLISHED" @if($post->status=='PUBLISHED') selected @endif>@lang('Publish')</option>
                                                <option value="DRAFT" @if($post->status=='DRAFT') selected @endif>@lang('Draft')</option>
                                                <option value="FEATURED" @if($post->status=='FEATURED') selected @endif>@lang('Featured')</option>
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
                                                    <input type="date" class="form-control" name="date" placeholder="0" value="{{ $post->date }}"/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Author') </label>
                                                    <input type="author" class="form-control"  name="author" value="{{$post->author}}"/>
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
                                                    <select class="form-control"  name="category">
                                                        @foreach($pcategories as $category)
                                                            <option value="{{$category->id}}" @if($post->category_id==$category->id) selected @endif>{{$category->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label class="w-100 font-weight-bold">@lang('Tags') </label>
                                                <div class="card border--dark mt-3">
                                                    <select id="multi-select-demo" multiple="multiple" name="tags[]">
                                                        @foreach($tags as $tag)
                                                            <option value="{{$tag->id}}" {{ $post->tags->pluck('id')->contains($tag->id) ? 'selected':''}}>{{$tag->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        @foreach($language as $lang)

                                            <div class="card border--dark mt-3 input-{{$lang->code}}">
                                                <h5 class="card-header bg--dark">@lang('Body')</h5>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <textarea rows="8" class="form-control border-radius-5 nicEdit" name="body[{{$lang->code}}]">{{ $post->getTranslation('body',$lang->code) }}</textarea>
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

    {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
            {{--<div class="card">--}}
                {{--<form action="{{ route('admin.posts.update',$project->id) }}" method="POST" enctype="multipart/form-data">--}}
                    {{--@method('PUT')--}}
                    {{--@csrf--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="payment-method-item">--}}
                            {{--<div class="payment-method-header d-flex flex-wrap">--}}
                                {{--<div class="thumb">--}}
                                    {{--<div class="avatar-preview">--}}
                                        {{--<div class="profilePicPreview" style="background-image: url('{{getImage(imagePath()['project']['path'],imagePath()['project']['size'])}}')"></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="avatar-edit">--}}
                                        {{--<input type="file" name="images[]" class="profilePicUpload" id="image" accept=".png, .jpg, .jpeg .webp" multiple/>--}}
                                        {{--<label for="image" class="bg-primary"><i class="la la-pencil"></i></label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                                {{--<div class="content">--}}
                                    {{--<div class="row mt-4 mb-none-15">--}}
                                        {{--<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">--}}
                                            {{--<div class="input-group">--}}
                                                {{--<label class="w-100 font-weight-bold">@lang('Project Title') <span class="text-danger">*</span></label>--}}
                                                {{--<input type="text" class="form-control " placeholder="@lang('Tilte')" name="title" value="{{ $project->title }}"/>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">--}}

                                            {{--<div class="input-group">--}}
                                                {{--<label class="w-100 font-weight-bold">@lang('Summary') <span class="text-danger">*</span></label>--}}
                                                {{--<input type="text" name="summry" placeholder="@lang('Summary')" class="form-control border-radius-5" value="{{ $project->summary }}"/>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">--}}
                                            {{--<label class="w-100 font-weight-bold">@lang('Status') <span class="text-danger">*</span></label>--}}
                                            {{--<input type="text" class="form-control" placeholder="Released" name="status" value="{{ $project->status }}"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="payment-method-body">--}}
                                {{--<div class="row">--}}

                                    {{--<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
                                        {{--<div class="card border--primary mt-3">--}}
                                            {{--<h5 class="card-header bg--primary">@lang('Details')</h5>--}}
                                            {{--<div class="card-body">--}}
                                                {{--<div class="input-group mb-3">--}}
                                                    {{--<label class="w-100 font-weight-bold">@lang('Order Date') </label>--}}
                                                    {{--<input type="date" class="form-control" name="order_date" placeholder="0" value="{{ $project->order_date }}"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="input-group">--}}
                                                    {{--<label class="w-100 font-weight-bold">@lang('Released Date') </label>--}}
                                                    {{--<input type="date" class="form-control" placeholder="0" name="released_date" value="{{ $project->released_date }}"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="input-group">--}}
                                                    {{--<label class="w-100 font-weight-bold">@lang('Client') </label>--}}
                                                    {{--<input type="text" class="form-control" placeholder="client" name="client" value="{{ $project->client }}"/>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
                                        {{--<div class="card border--primary mt-3">--}}
                                            {{--<h5 class="card-header bg--primary">@lang('Contact')</h5>--}}
                                            {{--<div class="card-body">--}}
                                                {{--<div class="input-group mb-3">--}}
                                                    {{--<label class="w-100 font-weight-bold">@lang('Location')</label>--}}
                                                    {{--<input type="text" class="form-control" placeholder="UK" name="location" value="{{$project->location }}"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="input-group">--}}
                                                    {{--<label class="w-100 font-weight-bold">@lang('Link')</label>--}}
                                                    {{--<input type="text" class="form-control" placeholder="google.com" name="link" value="{{ $project->link }}">--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
                                        {{--<div class="card border--dark mt-3">--}}

                                            {{--<h5 class="card-header bg--dark">@lang('Description')</h5>--}}
                                            {{--<div class="card-body">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<textarea rows="8" class="form-control border-radius-5 nicEdit" name="desc">{{ $project->desc }}</textarea>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-lg-12">--}}
                                        {{--<div class="card border--dark mt-3">--}}
                                            {{--<label class="card-header bg--dark  text-white">@lang('Categories')</label>--}}
                                            {{--<select id="multi-select-demo" multiple="multiple" name="categories[]">--}}
                                                {{--@foreach($categories as $category)--}}
                                                    {{--<option value="{{$category->id}}" @if(in_array($category->id,$project->projectCategories->pluck('id')->toArray()) ) selected @endif>{{$category->title}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="card-footer">--}}
                        {{--<button type="submit" class="btn btn--primary btn-block">@lang('Save Method')</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="la la-fw la-backward"></i> @lang('Go Back') </a>
@endpush

