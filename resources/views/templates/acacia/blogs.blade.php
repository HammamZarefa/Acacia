@extends($activeTemplate.'layouts.frontend')
@section('content')

    <div class="wrapper light-wrapper page-title-wrapper">
        <div class="container inner text-center">
            <h1 class="page-title">@lang('Our Blog')</h1>
            <p class="lead">@lang('Our Blog Description')</p>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <div class="wrapper light-wrapper">
        <div class="container inner">
            <div class="blog grid grid-view boxed">
                <div class="row isotope">
                    @foreach($posts as $post)
                    <div class="item post grid-sizer col-md-6 col-lg-4">
                        <div class="box bg-white shadow p-30">
                            <figure class="main mb-30 overlay overlay1 rounded"><a href="{{route('blog.show',$post->slug)}}"> <img src="{{ getImage('assets/images/post/' . $post->cover) }}" alt="" /></a>
                                <figcaption>
                                    <h5 class="from-top mb-0">@lang('Read More')</h5>
                                </figcaption>
                            </figure>
                            <div class="category"><a href="#" class="badge badge-pill bg-purple">{{$post->category->title}}</a></div>
                            <h2 class="post-title"><a href="{{route('blog.show',$post->id)}}">{{$post->title}}</a></h2>
                            <div class="post-content">
                                <p>{{$post->short_desc}}.</p>
                            </div>
                            <!-- /.post-content -->
                            <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>{{$post->date}}</span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">{{$post->views}} @lang('Views')</a></span></div>
                        </div>
                        <!-- /.box -->
                    </div>
                        <!-- /.post -->
                    @endforeach

                </div>
                <!-- /.row -->
            </div>
            <!-- /.blog -->
            <div class="space30 d-block d-md-none"></div>
            {{--<div class="pagination">--}}
                {{--<ul>--}}
                    {{--<li><a href="#" class="pl-0"><i class="jam jam-arrow-left"></i></a></li>--}}
                    {{--<li class="active"><a href="#"><span>1</span></a></li>--}}
                    {{--<li><a href="#"><span>2</span></a></li>--}}
                    {{--<li><a href="#"><span>3</span></a></li>--}}
                    {{--<li><a href="#" class="pr-0"><i class="jam jam-arrow-right"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            <!-- /.pagination -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.wrapper -->


@endsection