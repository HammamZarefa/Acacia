@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form  action="{{route('ticket.store')}}"  method="post" enctype="multipart/form-data" onsubmit="return submitUserForm();">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">@lang('Name')</label>
                                    <input type="text" name="name" value="{{@$user->firstname . ' '.@$user->lastname}}" class="form-control form-control-lg" placeholder="@lang('Enter Name')" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">@lang('Email address')</label>
                                    <input type="email"  name="email" value="{{@$user->email}}" class="form-control form-control-lg" placeholder="@lang('Enter your Email')" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="website">@lang('Subject')</label>
                                    <input type="text" name="subject" value="{{old('subject')}}" class="form-control form-control-lg" placeholder="@lang('Subject')" >
                                </div>
                                <div class="col-12 form-group">
                                    <label for="inputMessage">@lang('Message')</label>
                                    <textarea name="message" id="inputMessage" rows="6" class="form-control form-control-lg">{{old('message')}}</textarea>
                                </div>
                            </div>

                            <div class="row form-group">

                                <div class="form-group col-sm-9 file-upload">
                                    <span class="text-muted text-uppercase label--text">@lang('Attachments')</span>
                                    <div class="custom-file">
                                        <input type="file" name="attachments[]" id="inputAttachments" class="custom-file-input" />
                                        <label class="custom-file-label" for="customFile">@lang('Choose file')</label>
                                    </div>
                                    <p class="ticket-attachments-message text-muted">
                                        @lang('Allowed File Extensions'): .@lang('jpg'), .@lang('jpeg'), .@lang('png'), .@lang('pdf'), .@lang('doc'), .@lang('docx')
                                    </p>
                                    <div id="fileUploadsContainer"></div>
                                </div>

                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-success btn-sm mt-4" onclick="extraTicketAttachment()">
                                        <i class="fa fa-plus m-0"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="row form-group justify-content-center">
                                <div class="col-md-12">
                                    <button class=" btn btn--danger" type="button" onclick="formReset()">&nbsp;@lang('Cancel')</button>
                                    <button class="btn btn--primary" type="submit" id="recaptcha" ><i class="fa fa-paper-plane"></i>&nbsp;@lang('Submit')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('breadcrumb')
    <a class="btn btn-sm btn--primary box--shadow1 text-white text--small" href="{{ url()->previous() }}"><i
            class="fa fa-fw fa-backward"></i>@lang('Go Back')</a>
@endpush


@push('script')
    <script>
        "use strict";
        function extraTicketAttachment() {
            $("#fileUploadsContainer").append(`<div class="custom-file">
                                        <input type="file" name="attachments[]" id="inputAttachments" class="custom-file-input" />
                                        <label class="custom-file-label" for="customFile">@lang('Choose file')</label>
                                    </div>`)
        }
        function formReset() {
            window.location.href = "{{url()->current()}}"
        }
    </script>
@endpush
