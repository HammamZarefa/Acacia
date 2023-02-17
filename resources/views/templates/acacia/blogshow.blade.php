@extends($activeTemplate.'layouts.frontend')
@section('content')

    <!-- /.offcanvas-info -->
    <div class="wrapper light-wrapper">
        <div class="container inner pt-80">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog classic-view boxed">
                        <div class="post mb-0">
                            <div class="box bg-white shadow">
                                <figure class="main rounded"><img src="{{ getImage('assets/images/post/' . $post->cover) }}" alt="" /></figure>
                                <div class="space40"></div>
                                <div class="post-content">
                                    <div class="category text-center"><a href="#" class="badge badge-pill bg-hibiscus">{{$post->category->title}}</a></div>
                                    <h2 class="post-title text-center">{{$post->title}}</h2>
                                    <div class="meta text-center"><span class="date"><i class="jam jam-clock"></i>{{$post->date}}</span><span class="author"><i class="jam jam-user"></i><a href="#">{{$post->author}}</a></span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">{{$post->views}} @lang('Views')</a></span></div>
                                    <p>{!! $post->body !!}</p>
                                    <div class="space20"></div>

                                    <div class="d-lg-flex justify-content-between align-items-center meta-footer">
                                        <ul class="list-unstyled tag-list">
                                            @foreach($post->tags as $tag)
                                            <li><a href="#" class="btn btn-s">{{$tag->name}}</a></li>
                                           @endforeach
                                        </ul>
                                        <div class="space20 d-lg-none"></div>
                                        <div class="d-flex align-items-center">
                                            <p class="pr-20 mb-0"><strong>@lang('Share on'):</strong></p>
                                            <ul class="social social-mute">
                                                <li><a href="https://www.facebook.com/sharer/sharer.php?u="><i class="jam jam-facebook"></i></a></li>
                                                <li><a href="https://twitter.com/share?url=<URL>&text=<TEXT>via=<USERNAME>"><i class="jam jam-twitter"></i></a></li>
                                                <li><a href="https://pinterest.com/share?url=<URL>&text=<TEXT>via=<USERNAME>"><i class="jam jam-pinterest"></i></a></li>
                                            </ul>
                                            <!-- /.social -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.post-content -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.post -->
                        <!-- <div class="space50"></div>
                        <div class="box bg-white shadow">
                          <div class="row">
                            <div class="col-md-4">
                              <figure class="rounded"><img alt="" src="style/images/art/about.jpg" /></figure>
                            </div>

                            <div class="col-md-8">
                              <h4>About the Author</h4>
                              <p class="mb-10">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Maecenas faucibus mollis interdum. Fusce dapibus, tellus ac. Maecenas faucibus mollis interdum. Praesent commodo.</p>
                              <ul class="social">
                                <li><a href="#"><i class="jam jam-twitter"></i></a></li>
                                <li><a href="#"><i class="jam jam-facebook"></i></a></li>
                                <li><a href="#"><i class="jam jam-pinterest"></i></a></li>
                                <li><a href="#"><i class="jam jam-vimeo"></i></a></li>
                                <li><a href="#"><i class="jam jam-instagram"></i></a></li>
                              </ul>
                            </div>
                          </div>
                        </div> -->
                        <!-- <div class="space50"></div>
                        <div class="box bg-white shadow">
                          <div id="comments">
                            <h3>5 Comments</h3>
                            <ol id="singlecomments" class="commentlist">
                              <li>
                                <div class="message">
                                  <figure class="user rounded"><img alt="" src="style/images/art/u1.jpg" /></figure>
                                  <div class="message-inner">
                                    <h6 class="comment-author"><a href="#">Connor Gibson</a></h6>
                                    <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Sed posuere consectetur est at lobortis. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Vestibulum id ligula porta felis euismod semper.</p>
                                    <div class="meta"> <span class="date">January 14, 2019</span><span class="reply"><a href="#">Reply</a></span> </div>
                                  </div>
                                </div>
                              </li>
                              <li>
                                <div class="message">
                                  <figure class="user rounded"><img alt="" src="style/images/art/u2.jpg" /></figure>
                                  <div class="message-inner">
                                    <h6 class="comment-author"><a href="#">Nikolas Brooten</a></h6>
                                    <p>Quisque tristique tincidunt metus non aliquam. Quisque ac risus sit amet quam sollicitudin vestibulum vitae malesuada libero. Mauris magna elit, suscipit non ornare et, blandit a tellus. Pellentesque dignissim ornare elit, quis mattis eros.</p>
                                    <div class="meta"> <span class="date">February 21, 2019</span><span class="reply"><a href="#">Reply</a></span> </div>
                                  </div>
                                </div>
                                <ul class="children">
                                  <li class="bypostauthor">
                                    <div class="message">
                                      <figure class="user rounded"><img alt="" src="style/images/art/u3.jpg" /></figure>
                                      <div class="message-inner bypostauthor">
                                        <h6 class="comment-author"><a href="#">Pearce Frye</a></h6>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit non.</p>
                                        <div class="meta"> <span class="date">February 22, 2019</span><span class="reply"><a href="#">Reply</a></span> </div>
                                      </div>
                                    </div>
                                    <ul class="children">
                                      <li>
                                        <div class="message">
                                          <figure class="user rounded"><img alt="" src="style/images/art/u2.jpg" /></figure>
                                          <div class="message-inner">
                                            <h6 class="comment-author"><a href="#">Nikolas Brooten</a></h6>
                                            <p>Nullam id dolor id nibh ultricies vehicula ut id. Cras mattis consectetur purus sit amet fermentum. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                                            <div class="meta"> <span class="date">April 4, 2019</span><span class="reply"><a href="#">Reply</a></span> </div>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <div class="message">
                                  <figure class="user rounded"><img alt="" src="style/images/art/u4.jpg" /></figure>
                                  <div class="message-inner">
                                    <h6 class="comment-author"><a href="#">Lou Bloxham</a></h6>
                                    <p>Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                    <div class="meta"> <span class="date">May 03, 2019</span><span class="reply"><a href="#">Reply</a></span> </div>
                                  </div>
                                </div>
                              </li>
                            </ol>
                          </div>
                          <div class="space80"></div>
                          <h3>Would you like to share your thoughts?</h3>
                          <p>Your email address will not be published. Required fields are marked *</p>
                          <div class="space20"></div>
                          <form class="comment-form">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Name*">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Email*">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Website">
                            </div>
                            <div class="form-group">
                              <textarea name="textarea" class="form-control" rows="5" placeholder="Enter your comment here..."></textarea>
                            </div>
                            <button type="submit" class="btn">Submit</button>
                          </form>
                        </div> -->
                    </div>
                </div>
                <!-- <div class="space30 d-none d-md-block d-lg-none"></div>
                <aside class="col-lg-4 sidebar">
                  <div class="sidebox widget">
                    <h3 class="widget-title">Search</h3>
                    <form class="search-form fields-white">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search something">
                      </div>
                    </form>
                  </div>
                  <div class="sidebox widget">
                    <h3 class="widget-title">About Us</h3>
                    <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum. Nulla vitae elit libero, a pharetra augue. Donec id elit.</p>
                    <ul class="social social-color social-s">
                      <li><a href="#"><i class="jam jam-twitter"></i></a></li>
                      <li><a href="#"><i class="jam jam-facebook"></i></a></li>
                      <li><a href="#"><i class="jam jam-pinterest"></i></a></li>
                      <li><a href="#"><i class="jam jam-vimeo"></i></a></li>
                      <li><a href="#"><i class="jam jam-instagram"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="sidebox widget">
                    <h3 class="widget-title">Popular Posts</h3>
                    <ul class="image-list">
                      <li>
                        <figure class="rounded"><a href="blog-post.html"><img src="style/images/art/a1.jpg" alt="" /></a></figure>
                        <div class="post-content">
                          <h6 class="post-title"> <a href="blog-post.html">Magna Mollis Ultricies Mauris</a> </h6>
                          <div class="meta"><span class="date"><i class="jam jam-clock"></i>12 Nov 2017</span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">4</a></span></div>
                        </div>
                      </li>
                      <li>
                        <figure class="rounded"> <a href="blog-post.html"><img src="style/images/art/a2.jpg" alt="" /></a></figure>
                        <div class="post-content">
                          <h6 class="post-title"> <a href="blog-post.html">Ornare Nullam Risus Cursus</a> </h6>
                          <div class="meta"><span class="date"><i class="jam jam-clock"></i>12 Nov 2017</span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">4</a></span></div>
                        </div>
                      </li>
                      <li>
                        <figure class="rounded"><a href="blog-post.html"><img src="style/images/art/a3.jpg" alt="" /></a></figure>
                        <div class="post-content">
                          <h6 class="post-title"> <a href="blog-post.html">Euismod Nullam Fusce</a> </h6>
                          <div class="meta"><span class="date"><i class="jam jam-clock"></i>12 Nov 2017</span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">4</a></span></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="sidebox widget">
                    <h3 class="widget-title">Categories</h3>
                    <ul class="icon-list">
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">Lifestyle (21)</a></li>
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">Photography (19)</a></li>
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">Journal (16)</a></li>
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">Works (7)</a></li>
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">Conceptual (12)</a></li>
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">Videography (14)</a></li>
                    </ul>
                  </div>
                  <div class="sidebox widget">
                    <h3 class="widget-title">Tags</h3>
                    <ul class="list-unstyled tag-list">
                      <li><a href="#" class="btn btn-s">Still Life</a></li>
                      <li><a href="#" class="btn btn-s">Urban</a></li>
                      <li><a href="#" class="btn btn-s">Nature</a></li>
                      <li><a href="#" class="btn btn-s">Landscape</a></li>
                      <li><a href="#" class="btn btn-s">Macro</a></li>
                      <li><a href="#" class="btn btn-s">Fun</a></li>
                      <li><a href="#" class="btn btn-s">Workshop</a></li>
                      <li><a href="#" class="btn btn-s">Photography</a></li>
                    </ul>
                  </div>
                  <div class="sidebox widget">
                    <h3 class="widget-title">Archive</h3>
                    <ul class="icon-list">
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">February 2019</a></li>
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">January 2019</a></li>
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">December 2018</a></li>
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">November 2018</a></li>
                      <li class="bullet-default"><i class="jam jam-chevron-right"></i><a href="#">October 2018</a></li>
                    </ul>
                  </div>
                </aside> -->
            </div>
        </div>
    </div>
    <!-- <div class="wrapper gray-wrapper">
      <div class="container inner">
        <h3 class="mb-30">You Might Also Like</h3>
        <div class="grid-view">
          <div class="carousel owl-carousel" data-margin="30" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "3"}}'>
            <div class="item">
              <figure class="overlay overlay1 rounded mb-30"><a href="#"> <img src="style/images/art/b1.jpg" alt="" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Read More</h5>
                </figcaption>
              </figure>
              <div class="category"><a href="#" class="badge badge-pill bg-purple">Concept</a></div>
              <h2 class="post-title"><a href="blog-post.html">Ligula tristique quis risus eget urna mollis ornare porttitor</a></h2>
              <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>5 Jul 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">3 Comments</a></span></div>
            </div>
            <div class="item">
              <figure class="overlay overlay1 rounded mb-30"><a href="#"> <img src="style/images/art/b2.jpg" alt="" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Read More</h5>
                </figcaption>
              </figure>
              <div class="category"><a href="#" class="badge badge-pill bg-meander">Business</a></div>
              <h2 class="post-title"><a href="blog-post.html">Nullam id dolor elit id nibh pharetra augue venenatis</a></h2>
              <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>18 Jun 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">5 Comments</a></span></div>
            </div>
            <div class="item">
              <figure class="overlay overlay1 rounded mb-30"><a href="#"> <img src="style/images/art/b3.jpg" alt="" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Read More</h5>
                </figcaption>
              </figure>
              <div class="category"><a href="#" class="badge badge-pill bg-pink">Design</a></div>
              <h2 class="post-title"><a href="blog-post.html">Ultricies fusce porta elit pharetra augue faucibus</a></h2>
              <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>14 May 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">7 Comments</a></span></div>
            </div>
            <div class="item">
              <figure class="overlay overlay1 rounded mb-30"><a href="#"> <img src="style/images/art/b4.jpg" alt="" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Read More</h5>
                </figcaption>
              </figure>
              <div class="category"><a href="#" class="badge badge-pill bg-violet">Ideas</a></div>
              <h2 class="post-title"><a href="blog-post.html">Morbi leo risus porta eget metus est non commodolacus</a></h2>
              <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>9 Apr 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">4 Comments</a></span></div>
            </div>
            <div class="item">
              <figure class="overlay overlay1 rounded mb-30"><a href="#"> <img src="style/images/art/b5.jpg" alt="" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Read More</h5>
                </figcaption>
              </figure>
              <div class="category"><a href="#" class="badge badge-pill bg-green">Workspace</a></div>
              <h2 class="post-title"><a href="blog-post.html">Mollis adipiscing lorem quis mollis eget lacinia faucibus</a></h2>
              <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>23 Feb 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">8 Comments</a></span></div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
@endsection