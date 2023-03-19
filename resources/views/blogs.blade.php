@extends('layouts.public')
@push('meta')
    <meta property="og:url"           content="{{route('blogs')}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Blogs" />
    <meta property="og:description"   content="{{$site->site_title ? $site->site_title:"Obituary Online."}}" />
    <meta property="og:image"         content="{{file_exists(storage_path('app/public/site_settings/'.$site->site_logo)) ?  url('storage/site_settings/'.$site->site_logo): asset('images/logo.png')}}" />
@endpush
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->archive_page_cover_image)) ?  url('storage/site_settings/'.$site->archive_page_cover_image): asset('images/12.png')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{$site->archive_page_title ? $site->archive_page_title:"Blogs"}}</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- sidebar-page-container -->
    <section class="portlet" id="portlet_search_WAR_givingsgportlet">
        <div class="portlet-content"> <div class=" portlet-content-container" style="">
                <div class="portlet-body">
                    <main class=" pad search-result">
                        <div class="pad-navbar search-result__body ctn-1200">
                            <div class="blog-details-content">
                                <div class="thm-unit-test">
                                    <div class="content-one">
                                        <div class="upper-box">
                                            <span><a href="#" rel="category tag">Our Blogs</a></span>
                                        </div>
                                    </div>
                                </div>
                                <!--End thm-unit-test-->
                            </div>
                            <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty mb-20" id="searchlisting">
                                @foreach(@$data as $blog)
                                    <div class="card--flex card">
                                        <div class="card__head">
                                            <div class="gradient-over-image">
                                                <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url({{file_exists(storage_path('app/public/pages/'.$blog->thumbnail_image)) ?  url('storage/pages/'.$blog->thumbnail_image): asset('images/12.jpg')}})"></div>
                                            </div>
                                        </div>
                                        <div class="card__body">
                                            <div class="media-obj">
                                                <h2 class="card__title truncate break-word">{{$blog->title}}</h2>
                                            </div>
                                            <div class="media-obj mt-10">
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                                                    {!! $blog->short_description !!}
                                                </div>
                                            </div>
                                            <div class="card__cta">
                                                <a href="{{route('blog',['slug'=>$blog->slug])}}" class="button button--no-bg button--full" >LEARN MORE</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>

@endsection

