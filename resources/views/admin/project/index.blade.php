@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two custom-data-table">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Tilte')</th>
                                <th scope="col">@lang('Link')</th>
                                <th scope="col">@lang('Summry')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($projects as $project)
                                <tr>
                                    <td data-label="@lang('Project')">
                                        <div class="user">
                                            {{--<div class="thumb"><img src="{{ getImage(imagePath()['gateway']['path'].'/'. $gateway->image,imagePath()['gateway']['size'])}}" alt="@lang('image')"></div>--}}
                                            <span class="name">{{__($project->title)}}</span>
                                        </div>
                                    </td>
                                    <td data-label="@lang('Link')">
                                        <div class="user">
                                            <span class="name">{{__($project->link)}}</span>
                                        </div>
                                    </td>
                                    <td data-label="@lang('Summary')">
                                        <div class="user">
                                            <span class="name">{{__($project->summary)}}</span>
                                        </div>
                                    </td>
                                    <td data-label="@lang('Status')">
                                        <div class="user">
                                            <span class="name">{{__($project->status)}}</span>
                                        </div>
                                    </td>
                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="icon-btn editGatewayBtn" data-toggle="tooltip" title="@lang('Edit')" data-original-title="@lang('Edit')">
                                            <i class="la la-pencil"></i>
                                        </a>

                                        @if($project->deleted_at)
                                            <a  href="{{route('admin.projects.destroy',$project->id)}}" class="icon-btn bg--success ml-1 activateBtn">
                                                <i class="la la-eye"></i>
                                            </a>
                                        @else
                                            <a  href="{{route('admin.projects.destroy',$project->id)}}" class="icon-btn bg--danger ml-1 deactivateBtn" >
                                                <i class="la la-eye-slash"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">@lang(' No Data Found')</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>

@endsection


@push('breadcrumb-plugins')
    <a class="btn btn-sm btn--primary box--shadow1 text--small" href="{{ route('admin.projects.create') }}"><i class="fa fa-fw fa-plus"></i>@lang('Add New')</a>
@endpush
