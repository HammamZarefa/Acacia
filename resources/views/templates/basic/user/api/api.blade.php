@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>

                            <tr>
                                <th scope="row">@lang('API URL')</th>
                                <td>{{ route('api.v1') }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('Response format')</th>
                                <td>@lang('JSON')</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('HTTP Method')</th>
                                <td>POST</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">@lang('Your API key')</th>
                                <td>{{ auth()->user()->api_key }}</td>
                                <td>
                                    <a href="javascript:void(0)" class="icon-btn apiBtn"
                                       data-original-title="@lang('Generate New Key')" data-toggle="modal"
                                       data-target="#apiModal">
                                        @lang('Generate New Key')
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
        <div class="col-lg-12 mb-30">
            <div class="accordion cmn-accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <button class="acc-btn collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <span class="text">@lang('Service List')</span>
                            <span class="plus-icon"></span>
                        </button>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <b>@lang('Required parameters')</b>

                                    <div id="type_0">
                                        <ul>
                                            <li><b width="20%">key</b> - @lang('Your API Key')</li>
                                            <li><b>action</b> - "services"</li>
                                        </ul>
                                    </div>
                                    <br>
                                    <b>@lang('Success response') :</b>
                                    <pre>[
     {<em>
        "id": 1,
        "name": "Facebook Auto Like",
        "rate": 20,
        "min": 500,
        "max": 1000,
        "category": {
            "id": 1,
            "name": "Facebook",
            "status": 1,
            "created_at": "2021-03-28T11:40:27.000000Z",
            "updated_at": "2021-03-29T06:57:47.000000Z"
        }
     </em>},
     {<em>
        "id": 1,
        "name": "Instagram Last Story Max 5k",
        "rate": 20,
        "min": 500,
        "max": 1000,
        "category": {
            "id": 1,
            "name": "Instagram",
            "status": 1,
            "created_at": "2021-03-28T11:40:27.000000Z",
            "updated_at": "2021-03-29T06:57:47.000000Z"
        }
     </em>}
]</pre>
                                    <br>
                                    <b>@lang('Error response') :</b>
                                    <ol>
                                        <li><em>{"@lang('error')" : "@lang('The action field is required')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('The api key field is required')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('Invalid api key')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('Invalid request')"}</em></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <button class="acc-btn collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="text">@lang('Place New Order')</span>
                            <span class="plus-icon"></span>
                        </button>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <b>@lang('Required parameters')</b>

                                    <div id="type_0">
                                        <ul>
                                            <li><b width="20%">key</b> - @lang('Your API Key')</li>
                                            <li><b>action</b> - "add"</li>
                                            <li><b>service</b> - @lang('Service ID')</li>
                                            <li><b>link</b> - @lang('Link to page')</li>
                                            <li><b>quantity</b> - @lang('Quantity to be delivered')</li>
                                        </ul>
                                    </div>
                                    <br>
                                    <b>@lang('Success response') :</b>
                                    <ol>
                                        <li><em>{"order" : "1242"}</em></li>
                                    </ol>
                                    <br>
                                    <b>@lang('Error response') :</b>
                                    <ol>
                                        <li><em>{"@lang('error')" : "@lang('The action field is required')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('The api key field is required')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('Invalid api key')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('The service must be an integer')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('Invalid Service Id')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('The link field is required')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('The quantity field is required')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('The quantity must be greater than or equal 500')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('The quantity must be less than or equal 2000')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('Insufficient balance')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('Invalid request')"}</em></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <button class="acc-btn collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span class="text">@lang('Order Status')</span>
                            <span class="plus-icon"></span>
                        </button>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <b>@lang('Required parameters')</b>

                                    <div id="type_0">
                                        <ul>
                                            <li><b width="20%">key</b> - @lang('Your API Key')</li>
                                            <li><b>action</b> - "status"</li>
                                            <li><b>order</b> - @lang('Order ID')</li>
                                        </ul>
                                    </div>
                                    <br>
                                    <b>@lang('Success response') :</b>
                                    <ol>
                                        <li><em>{"status" : "Pending", "start_count" : "1000", "remains" :
                                                "500"}</em></li>
                                    </ol>
                                    <br>
                                    <b>@lang('Available status')</b>
                                    <ul>
                                        <li><span class="text-warning">Pending</span></li>
                                        <li><span class="text-info">Processing</span></li>
                                        <li><span class="text-success">Complete</span></li>
                                        <li><span class="text-danger">Order Cancelled</span></li>
                                        <li><span class="text-dark">Refunded</span></li>
                                    </ul>
                                    <br>
                                    <b>@lang('Error response') :</b>
                                    <ol>
                                        <li><em>{"@lang('error')" : "@lang('The action field is required')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('The api key field is required')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('Invalid api key')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('Invalid request')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('The order field is required')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('The order must be an integer')"}</em></li>
                                        <li><em>{"@lang('error')" : "@lang('Invalid Order Id')"}</em></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Order MODAL --}}
    <div class="modal fade" id="apiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="myModalLabel"><i
                            class="fa fa-fw fa-exclamation-triangle"></i>@lang('Caution!')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form method="post" action="{{ route('user.generateNewKey') }}">
                    @csrf

                    <div class="modal-body">

                        <h6>@lang('Your current api key will revoked. Are you sure to generate new api key?')</h6>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary" id="btn-save"
                                value="add">@lang("Yes I'm Sure")</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb')
    <a class="btn btn-sm btn--primary box--shadow1 text-white text--small" href="{{ asset('assets/examplePhpCode.txt') }}" target="_blank">@lang('Example PHP Code')</a>
@endpush


@push('style')
    <style>
        .cmn-accordion .card + .card {
            margin-top: 15px;
        }

        .cmn-accordion .card {
            border: none;
            background-color: transparent;
            border-radius: 0;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -ms-border-radius: 0;
            -o-border-radius: 0;
        }

        .cmn-accordion .card-header {
            background-color: #7367f0;
            padding: 0;
            margin-bottom: 0 !important;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 5px !important;
            -webkit-border-radius: 5px !important;
            -moz-border-radius: 5px !important;
            -ms-border-radius: 5px !important;
            -o-border-radius: 5px !important;
        }

        .cmn-accordion .card-header .acc-btn {
            display: block;
            width: 100%;
            justify-content: space-between;
            background-color: transparent;
            cursor: pointer;
            position: relative;
            text-align: left;
            padding: 10px 50px 10px 15px;
        }

        .cmn-accordion .card-header .acc-btn:focus {
            outline: none;
        }

        .cmn-accordion .card-header .acc-btn.collapsed .plus-icon::after {
            -webkit-transform: translate(-50%, -50%) rotate(0deg);
            -ms-transform: translate(-50%, -50%) rotate(0deg);
            transform: translate(-50%, -50%) rotate(0deg);
        }

        .cmn-accordion .card-header .acc-btn .text {
            font-weight: 500;
            font-size: 18px;
            padding: 10px;
            color: #fff;
        }

        @media (max-width: 991px) {
            .cmn-accordion .card-header .acc-btn .text {
                font-size: 18px;
            }
        }

        @media (max-width: 575px) {
            .cmn-accordion .card-header .acc-btn .text {
                font-size: 15px;
            }
        }

        .cmn-accordion .card-header .acc-btn .plus-icon {
            position: absolute;
            width: 70px;
            right: 0;
            top: 0;
            height: 100%;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
        }

        .cmn-accordion .card-header .acc-btn .plus-icon::before {
            position: absolute;
            content: '';
            top: 50%;
            left: 50%;
            width: 15px;
            height: 2px;
            background-color: #fff;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .cmn-accordion .card-header .acc-btn .plus-icon::after {
            position: absolute;
            content: '';
            top: 50%;
            left: 50%;
            height: 15px;
            width: 2px;
            background-color: #fff;
            -webkit-transform: translate(-50%, -50%) rotate(90deg);
            -ms-transform: translate(-50%, -50%) rotate(90deg);
            transform: translate(-50%, -50%) rotate(90deg);
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }

        .cmn-accordion .card-body {
            padding: 20px 20px;
            background: #f8f9fa;
        }

    </style>
@endpush
