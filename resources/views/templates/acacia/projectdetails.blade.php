@extends($activeTemplate.'layouts.frontend')
@section('content')

            <!-- /.offcanvas-info -->
            <div class="wrapper light-wrapper page-title-wrapper">
                <div class="container inner text-center">
                    <h1 class="page-title">{{$project->title}}</h1>
                    <p class="lead">{{$project->summary}}</p>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.wrapper -->
            <div class="wrapper light-wrapper" >
                <div class="container inner">
                    <div class="basic-slider owl-carousel" data-margin="5" style="direction: ltr !important;">
                        @foreach($project->images as $image)
                        <div class="item"><img src="{{ getImage('assets/images/project/' . $image->filename) }}" alt="" /></div>
                        @endforeach
                    </div>
                    <!-- /.basic-slider -->
                    <div class="space50"></div>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <h2>@lang('About the Project')</h2>
                            <div class="row no-gutters">
                                <div class="col-md-9 text-justify">
                                    <p class="lead">{!! $project->desc !!}.</p>
                                    <a href="{{@$project->link}}" class="btn">@lang('See Project')</a>
                                </div>
                                <!--/column -->
                                <div class="col-md-2 ml-auto">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5 class="mb-5">@lang('Date')</h5>
                                            <p>{{$project->released_date}}</p>
                                        </li>
                                        <li>
                                            <h5 class="mb-5">@lang('Categories')</h5>
                                            <p>{{$project->projectCategories->implode('title',' ,')}}</p>
                                        </li>
                                        <li>
                                            <h5 class="mb-5">@lang('Client Name')</h5>
                                            <p>{{$project->client}}</p>
                                        </li>
                                    </ul>
                                </div>
                                <!--/column -->
                            </div>
                            <!--/.row -->
                        </div>
                        <!-- /column -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.wrapper -->
            <div class="wrapper gray-wrapper">
                <div class="container inner">
                    <h2 class="section-title text-center">@lang('Other Projects')</h2>
                    <div class="grid-view boxed light-gallery-wrapper text-center">
                        <div class="carousel owl-carousel gap-small" data-margin="0" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "3"}}'>
                            @foreach($projects as $project)
                            <div class="item">
                                <div class="item-inner">
                                    <div class="box bg-white shadow p-30">
                                        <figure class="main overlay overlay2 rounded mb-30"><a href="{{ getImage('assets/images/project/' . @$project->images[0]->filename) }}" class="lightbox"> <img src="{{ getImage('assets/images/project/' . @$project->images[0]->filename) }}" alt="" /></a></figure>
                                        <div class="post-content">
                                            <h2 class="post-title mb-10"><a href="{{route('project.show',$project->id)}}">{{$project->title}}</a></h2>
                                            <div class="meta mb-0">{{$project->projectCategories->implode('title',' ,')}}</div>
                                        </div>
                                        <!-- /.post-content -->
                                    </div>
                                    <!--/.item-inner -->
                                </div>
                                <!-- /.box -->
                            </div>
                                <!-- /.item -->
                            @endforeach
                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.grid-view -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.wrapper -->
@endsection