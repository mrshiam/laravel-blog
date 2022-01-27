@extends('layouts.front.master')
@section('content')
    <div class="site-section py-0">
        <div class="owl-carousel hero-slide owl-style">
            @foreach($editors_picks as $id=>$post)
                @if($id <2)
                    <div class="site-section">
                <div class="container">
                    <div class="half-post-entry d-block d-lg-flex bg-light">
                        <div class="img-bg" style="background-image: url({{ asset($post->image) }})"></div>
                        <div class="contents">
                            <span class="caption">Editor's Pick</span>
                            <h2><a href="{{ route('blog.post.show',$post->id) }}">{{$post->title}}</a></h2>
                            <p class="mb-3">{{Str::limit($post->details,150)}}</p>

                            <div class="post-meta">
                                <span class="d-block"><a href="#">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a></span>
                                <span class="date-read">{{date('M d',strtotime($post->created_at))}} <span class="mx-1">&bullet;</span> {{$post->total_read}} <span class="icon-star2"></span></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
                @endif
            @endforeach


        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>Editor's Pick</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-entry-1">
                                <a href="{{ route('blog.post.show',$editors_picks[0]->id) }}"><img src={{ asset($editors_picks[0]->image) }} alt="Image" class="img-fluid"></a>
                                <h2><a href="{{ route('blog.post.show',$editors_picks[0]->id) }}">{{$editors_picks[0]->title}}</a></h2>
                                <p>{{Str::limit($editors_picks[0]->details, 150)}}</p>
                                <div class="post-meta">
                                    <span class="d-block"><a href="#">{{$editors_picks[0]->author->name}}</a> in <a href="#">{{$editors_picks[0]->category->name}}</a></span>
                                    <span class="date-read">{{date('M d',strtotime($editors_picks[0]->created_at))}} <span class="mx-1">&bullet;</span>{{$editors_picks[0]->total_read}} <span class="icon-star2"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @foreach($editors_picks as $id=>$post)
                                @if($id !=0)
                                    <div class="post-entry-2 d-flex bg-light">
                                        <div class="thumbnail" style="background-image: url({{ asset($post->image) }})"></div>
                                        <div class="contents">
                                            <h2><a href="{{ route('blog.post.show',$post->id) }}">{{$post->title}}</a></h2>
                                            <div class="post-meta">
                                                <span class="d-block"><a href="#">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a></span>
                                                <span class="date-read">{{date('M d', strtotime($post->created_at))}}<span class="mx-1">&bullet;</span> {{$post->total_read}} <span class="icon-star2"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="section-title">
                        <h2>Trending</h2>
                    </div>
                    @foreach($trendings as $id=>$post)
                        @include('front._sidePostTile')
                    @endforeach


                    <p>
                        <a href="#" class="more">See All Trends <span class="icon-keyboard_arrow_right"></span></a>
                    </p>

                </div>
            </div>
        </div>
    </div>
    <div class="py-0">
        <div class="container">
            <div class="half-post-entry d-block d-lg-flex bg-light">
                <div class="img-bg" style="background-image: url({{ asset($editors_picks[2]->image) }})"></div>
                <div class="contents">
                    <span class="caption">Editor's Pick</span>
                    <h2><a href="{{ route('blog.post.show',$editors_picks[2]->id) }}">{{$editors_picks[2]->title}}</a></h2>
                    <p class="mb-3">{{Str::limit($editors_picks[2]->details,150)}}</p>

                    <div class="post-meta">
                        <span class="d-block"><a href="#">{{$editors_picks[2]->author->name}}</a> in <a href="#">{{$editors_picks[2]->category->name}}</a></span>
                        <span class="date-read">{{date('M d',strtotime($editors_picks[2]->created_at))}} <span class="mx-1">&bullet;</span> {{$editors_picks[2]->total_read}} <span class="icon-star2"></span></span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-6">
                    <div class="section-title">
                        <h2>{{$category->name}}</h2>
                    </div>
                        @foreach($category->posts as $id=>$post)
                            @if($id < 2)
                                <div class="post-entry-2 d-flex">
                                    <div class="thumbnail" style="background-image: url({{ asset($post->image) }})"></div>
                                    <div class="contents">
                                        <h2><a href="{{ route('blog.post.show',$post->id) }}">{{$post->title}}</a></h2>
                                        <p class="mb-3">{{Str::limit($post->details,150)}}</p>
                                        <div class="post-meta">
                                            <span class="d-block"><a href="#">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a></span>
                                            <span class="date-read">{{date('M d',strtotime($post->created_at))}} <span class="mx-1">&bullet;</span> {{$post->total_read}} <span class="icon-star2"></span></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="section-title">
                        <h2>Recent Posts</h2>
                    </div>
                    @foreach($recent_posts as $post)
                        <div class="post-entry-2 d-flex">
                        <div class="thumbnail order-md-2" style="background-image: url({{ asset($post->image) }})"></div>
                        <div class="contents order-md-1 pl-0">
                            <h2><a href="{{ route('blog.post.show',$post->id) }}">{{$post->title}}</a></h2>
                            <p class="mb-3">{{ substr($post->details,0,200)}}</p>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a></span>
                                <span class="date-read">{{date('M d',strtotime($post->created_at))}} <span class="mx-1">&bullet;</span> {{$post->total_read}} <span class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-3">
                    <div class="section-title">
                        <h2>Popular Posts</h2>
                    </div>
                    @foreach($popular_posts as $id=>$post)
                        @include('front._sidePostTile')
                    @endforeach
                    <p>
                        <a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <ul class="custom-pagination list-unstyled">
                        <li><a href="#">1</a></li>
                        <li class="active">2</li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
