@extends($activeTemplate.'layouts.frontend')
@section('content')
    <section class="ptb-80">
        <div class="container">
            <div class="bodywrapper__inner">

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
                                            <td>JSON</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">@lang('HTTP Method')</th>
                                            <td>POST</td>
                                            <td></td>
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
                                    <h4>@lang('Service List')</h4>
                                </div>

                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <b>Required parameters</b>

                                            <div id="type_0">
                                                <ul>
                                                    <li><b width="20%">key</b> - @lang('Your API Key')</li>
                                                    <li><b>action</b> - "services"</li>
                                                </ul>
                                            </div>
                                            <br>
                                            <b>Success response :</b>
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
                                                <li><em>{"error" : "The action field is required"}</em></li>
                                                <li><em>{"error" : "The api key field is required"}</em></li>
                                                <li><em>{"error" : "Invalid api key"}</em></li>
                                                <li><em>{"error" : "Invalid request"}</em></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h4>@lang('Place New Order')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <b>@lang('Required parameters')</b>

                                            <div id="type_0">
                                                <ul>
                                                    <li><b width="20%">key</b> - @lang('Your API Key')</li>
                                                    <li><b>action</b> - "add"</li>
                                                    <li><b>service</b> - Service ID</li>
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
                                                <li><em>{"error" : "The action field is required"}</em></li>
                                                <li><em>{"error" : "The api key field is required"}</em></li>
                                                <li><em>{"error" : "Invalid api key"}</em></li>
                                                <li><em>{"error" : "The service must be an integer"}</em></li>
                                                <li><em>{"error" : "Invalid Service Id"}</em></li>
                                                <li><em>{"error" : "The link field is required"}</em></li>
                                                <li><em>{"error" : "The quantity field is required"}</em></li>
                                                <li><em>{"error" : "The quantity must be greater than or equal 500"}</em></li>
                                                <li><em>{"error" : "The quantity must be less than or equal 2000"}</em></li>
                                                <li><em>{"error" : "Insufficient balance"}</em></li>
                                                <li><em>{"error" : "Invalid request"}</em></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h4>@lang('Order Status')</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <b>@lang('Required parameters')</b>

                                            <div id="type_0">
                                                <ul>
                                                    <li><b width="20%">key</b> - @lang('Your API Key')</li>
                                                    <li><b>action</b> - "status"</li>
                                                    <li><b>order</b> - Order ID</li>
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
                                                <li><em>{"error" : "The action field is required"}</em></li>
                                                <li><em>{"error" : "The api key field is required"}</em></li>
                                                <li><em>{"error" : "Invalid api key"}</em></li>
                                                <li><em>{"error" : "Invalid request"}</em></li>
                                                <li><em>{"error" : "The order field is required"}</em></li>
                                                <li><em>{"error" : "The order must be an integer"}</em></li>
                                                <li><em>{"error" : "Invalid Order Id"}</em></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
