@extends('layouts.public')
@push('meta')
    <meta property="og:url"           content="{{route('learn')}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$data->title}}" />
    <meta property="og:description"   content="{{$site->site_title ? $site->site_title:"Obituary Online."}}" />
    <meta property="og:image"         content="{{file_exists(storage_path('app/public/site_settings/'.$site->site_logo)) ?  url('storage/site_settings/'.$site->site_logo): asset('images/logo.png')}}" />
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
                                <div class="widget-title"><h3>Today's Obituary</h3></div>
                                <div class="post-inner mb-20">
                                    <!-- Title -->
                                    @foreach(@$obituaries as $row)
                                        <div class="post">
                                            <figure class="post-thumb" style="background-image:url({{file_exists(storage_path('app/public/deceased_picture/'.$row->deceased_picture)) ?  url('storage/deceased_picture/'.$row->deceased_picture): asset('images/12.jpg')}})"><a href="{{route('obituary.details',['id'=>$row->uid])}}"></a></figure>
                                            <h5><a href="{{route('obituary.details',['id'=>$row->uid])}}">{{$row->deceased_first_name}} {{$row->deceased_last_name}}</a></h5>
                                            <span class="post-date">{{date('F d, Y',strtotime($row->created_at))}}</span>
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

