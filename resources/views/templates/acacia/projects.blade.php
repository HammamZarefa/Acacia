,@extends($activeTemplate.'layouts.frontend')
@section('content')
            <!-- /.offcanvas-info -->
            <div class="wrapper light-wrapper page-title-wrapper">
                <div class="container inner text-center">
                    <h1 class="page-title">@lang('Our Portfolio')</h1>
                    <p class="lead">@lang('Explore Work Space')</p>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.wrapper -->
            <div class="wrapper light-wrapper">
                <div class="container inner">
                    <div class="grid grid-view boxed">
                        <div class="isotope-filter text-center">
                            <ul class="filter-project">
                                <li><a class="button active" data-filter="*">All</a></li>
                                @foreach($projectCategories as $category)
                                <li><a class="button" data-filter=".{{$category->id}}">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tiles text-center light-gallery-wrapper">
                            <div class="row isotope">
                                @forelse($projects as $project)
                                <div class="item grid-sizer col-md-6 col-lg-4 {{$project->projectCategories->implode('id',' ')}}">
                                    <div class="box bg-white shadow p-30">
                                        <figure class="main overlay overlay2 rounded mb-30"><a href="{{ getImage('assets/images/project/' . @$project->images[0]->filename) }}" class="lightbox"> <img src="{{ getImage('assets/images/project/' . @$project->images[0]->filename) }}" alt="" /></a></figure>
                                        <div class="post-content">
                                            <h2 class="post-title mb-10"><a href="{{route('project.show',$project->id)}}">{{$project->title}}</a></h2>
                                            <div class="meta mb-0">{{$project->projectCategories->implode('title',', ')}}</div>
                                        </div>
                                        <!-- /.post-content -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.item -->
                                    @empty
                                @endforelse
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.tiles -->
                    </div>
                    <!-- /.grid -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.wrapper -->
@endsection