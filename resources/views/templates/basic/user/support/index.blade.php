@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Subject')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Last Reply')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($supports as $key => $support)
                                <tr>
                                    <td data-label="@lang('Subject')"> <a href="{{ route('ticket.view', $support->ticket) }}" class="font-weight-bold"> [Ticket#{{ $support->ticket }}] {{ __($support->subject) }} </a></td>
                                    <td data-label="@lang('Status')">
                                        @if($support->status == 0)
                                            <span class="badge badge--success">@lang('Open')</span>
                                        @elseif($support->status == 1)
                                            <span class="badge badge--primary">@lang('Answered')</span>
                                        @elseif($support->status == 2)
                                            <span class="badge badge--warning">@lang('Customer Reply')</span>
                                        @elseif($support->status == 3)
                                            <span class="badge badge--dark">@lang('Closed')</span>
                                        @endif
                                    </td>
                                    <td data-label="@lang('Last Reply')">{{ \Carbon\Carbon::parse($support->last_reply)->diffForHumans() }} </td>

                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('ticket.view', $support->ticket) }}" class="btn btn--primary btn-sm">
                                            <i class="fa fa-desktop m-0"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">@lang('No result found!')</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ paginateLinks($supports) }}
                </div>
            </div><!-- card end -->
        </div>
    </div>

@endsection

@push('breadcrumb')
    <a class="btn btn-sm btn--primary box--shadow1 text-white text--small" href="{{route('ticket.open') }}"><i
            class="fa fa-fw fa-plus"></i>@lang('New Ticket')</a>
@endpush
