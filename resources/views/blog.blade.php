@extends('layouts.public')
@push('meta')
    <meta property="og:url"           content="{{route('blog',['slug'=>$data->slug])}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$data->title}}" />
    <meta property="og:description"   content="{{$data->short_description}}" />
    <meta property="og:image"         content="{{file_exists(storage_path('app/public/pages/'.$data->thumbnail_image)) ?  url('storage/pages/'.$data->thumbnail_image): asset('images/12.jpg')}}" />
@endpush
@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/pages/'.$data->cover_image)) ?  url('storage/pages/'.$data->cover_image): asset('images/12.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
{{--                <div class="title">--}}
{{--                    <h1>Comment</h1>--}}
{{--                </div>--}}
{{--                <ul class="bread-crumb clearfix">--}}
{{--                    <li class="breadcrumb-item"><a href="index.html">Home &nbsp;</a></li>--}}
{{--                    <li class="breadcrumb-item">My account</li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </section>
    <!-- End Page Title -->

    <BR>


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="blog-details-content">
                        <div class="thm-unit-test">
                            <div class="content-one">

                                <div class="upper-box">
                                    <span><a href="#" rel="category tag">{{$data->title}}</a></span>
                                </div>
                            </div>
                            <div class="mb-20">
                                {!! $data->description !!}
                            </div>
                        </div>
                        <!--End thm-unit-test-->
                    </div>
                    <!--End blog-content-->
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <aside class="blog-sidebar default-sidebar">
                        <div id="purehearts_popular_post-3" class="widget sidebar-widget widget_purehearts_popular_post">
                            <!-- Categories Widget -->
                            <div class="post-widget">
                                <div class="widget-title"><h3>Popular Blog</h3></div>
                                <div class="post-inner mb-20">
                                    <!-- Title -->
                                    @foreach(@$blogs as $blog)
                                        <div class="post">
                                            <figure class="post-thumb" style="background-image:url({{file_exists(storage_path('app/public/pages/'.$blog->thumbnail_image)) ?  url('storage/pages/'.$blog->thumbnail_image): asset('images/12.jpg')}})"><a href="{{route('blog',['slug'=>$blog->slug])}}"></a></figure>
                                            <h5><a href="{{route('blog',['slug'=>$blog->slug])}}">{{$blog->title}}</a></h5>
                                            <span class="post-date">{{date('F d, Y',strtotime($blog->created_at))}}</span>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection

