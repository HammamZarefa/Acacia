@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two custom-data-table">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Tilte')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td data-label="@lang('Title')">{{__($category->title)}}</td>
                                    <td data-label="@lang('Action')">
                                        <a href="javascript:void(0)" class="icon-btn ml-1 editBtn"
                                           data-original-title="@lang('Edit')" data-toggle="tooltip"
                                           data-url="{{ route('admin.pcategories.update', $category->id)}}"
                                             data-title="{{  json_encode($category->getTranslations('title')) }}"
                                            data-lang="{{$language}}">
                                            <i class="la la-edit"></i>
                                        </a>
                                        {{--<a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn"--}}
                                           {{--data-original-title="@lang('Delete')" data-toggle="tooltip"--}}
                                           {{--data-url="{{ route('admin.pcategories.destroy', $category->id) }}">--}}
                                            {{--<i class="la la-trash"></i>--}}
                                        {{--</a>--}}
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>



    {{-- NEW MODAL --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i
                                class="fa fa-share-square"></i> @lang('Add New Post Categories')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                </div>
                @include('admin.language_selector')

                <form class="form-horizontal" method="post" action="{{ route('admin.pcategories.store')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body tab-content" id="pills-tabContent">
                        @foreach($language as $lang)
                            <div class="form-row form-group tab-pane fade @if($lang->code == 'en') show active @endif"
                                 id="pills-{{$lang->code}}" role="tabpanel" aria-labelledby="pills-{{$lang->code}}-tab">
                                <label class="font-weight-bold ">@lang('Title') ({{$lang->name}}) <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control has-error bold "
                                           name="title[{{$lang->code}}]"
                                           placeholder="@lang('Web')" required>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary" id="btn-save" value="add">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i
                                class="fa fa-fw fa-share-square"></i>@lang('Edit Category')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                </div>
                @include('admin.language_selector')
                <form method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body tab-content" id="pills-tabContent">
                        @foreach($language as $lang)
                            <div class="form-row tab-pane fade @if($lang->code == 'en') show active @endif"
                                 id="pills-{{$lang->code}}" role="tabpanel" aria-labelledby="pills-{{$lang->code}}-tab">
                                <label for="inputName" class="font-weight-bold">@lang('Tilte') {{$lang->name}} <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" id="title_{{$lang->code}}" class="form-control has-error bold" name="title[{{$lang->code}}]"
                                           required>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary" id="btn-save"
                                value="add">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- DELETE MODAL --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Remove Category')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
                    <div class="modal-body">
                        <p class="text-muted">@lang('Are you sure you want to Delete?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--danger deleteButton">@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    <a class="btn btn-sm btn--primary box--shadow1 text-white text--small" data-toggle="modal" data-target="#myModal"><i
                class="fa fa-fw fa-plus"></i>@lang('Add New')</a>
@endpush

@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.editBtn').on('click', function () {
                var modal = $('#editModal');
                var url = $(this).data('url');
                var lang= $(this).data('lang');
                var title=($(this).data('title'));
                modal.find('form').attr('action', url);
                modal.find('input[id=title_en]').val(title.en);
                modal.find('input[id=title_ar]').val(title.ar);
                // lang.forEach( function(value,key)

                // lang.forEach( fill_feilds)
                // function fill_feilds(item) {
                //     modal.find('input[name=title['+item['code']+']').val(title[item['code']]);
                // }

                modal.modal('show');
            });

            $('.deleteBtn').on('click', function () {
                var modal = $('#deleteModal');
                var url = $(this).data('url');

                modal.find('form').attr('action', url);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
