@extends('layouts.public')
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->archive_page_cover_image)) ?  url('storage/site_settings/'.$site->archive_page_cover_image): asset('images/12.png')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{$site->archive_page_title ? $site->archive_page_title:"Archives"}}</h1>
                </div>
                {{--                <ul class="bread-crumb clearfix">--}}
                {{--                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home &nbsp;</a></li><li class="breadcrumb-item">{{$site->donate_page_header_title ? $site->donate_page_header_title:"Obituary"}}</li>--}}
                {{--                </ul>--}}
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
                            <div class="search-result__main-head" id="search-result-holder">
                                <p class="font-black bold caps search-result__result">
                                    <h2>Archives <small id="result_text" style="font-size: 15px;display: inline-block;float: right;">Showing 0 obituary out of 0 obituary</small></h2>
                                </p>
                            </div>
                            <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty mb-20" id="searchlisting">

                            </div>
                            <div class="row">
                                <div class="col text-center mb-15 mt-15">
                                    <button type="button" onclick="filterObituary()" class="button button--no-bg button--full load-more">LOAD MORE</button>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script>
        let offset = 0;
        let limit  = 8;
        function calAge(dob,dod) {
            var diff = moment(dob).diff(dod, 'milliseconds');
            var duration = moment.duration(diff);
            return duration.format().replace("-","");
        }
        function filterObituary(){
            $('#searchlisting').LoadingOverlay("show");
            $.ajax({
                type        : 'GET', // define the type of HTTP verb we want to use (POST for our form)
                url         : `/load-obituaries/${limit}/${offset}`,
                headers     : {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {

                    let total       =   response.data.total;
                    let count       =   response.data.count;
                    let obituaries  =   response.data.obituaries;
                    offset          =   offset+parseInt(count);
                    $('#result_text').text(`Showing ${offset} obituar${offset > 1 ? 'ies':'y'} out of ${total} obituar${total > 1 ? 'ies':'y'}`);
                    if(count < limit){
                        $('.load-more').hide();
                        $('.load-more').attr('disabled',true);
                    }
                    if(obituaries){
                        obituaries.forEach(x=>{
                            var age = calAge(moment(x.date_of_birth).format('YYYY-MM-DD'),moment( x.date_of_death).format('YYYY-MM-DD'));
                            $('#searchlisting').append(`<div class="card--flex card">
                                            <div class="card__head">
                                                <div class="gradient-over-image">
                                                    <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url('/storage/deceased_picture/${x.deceased_picture}')"></div>
                                                </div>
                                            </div>
                                            <div class="card__body">
                                                <div class="media-obj">
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> {{--by --}} <span class="bold break-word">In loving memory of </span></p>
                                                    <h2 class="card__title truncate break-word">${x.deceased_first_name} ${x.deceased_last_name}</h2>
                                                    <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word"> by <span class="bold break-word">JL KAH for children society </span></p>
                                                </div>
                                                <div class="media-obj mt-10">
                                                    <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">

                           <strong>Age:</strong> ${age}
                           </div>
                       </div>
                       <div class="media-obj mt-10">
                           <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                               Passed away peacefully on ${moment( x.date_of_death).format('YYYY-MM-DD')}
                           </div>
                       </div>
                       <div class="media-obj mt-10">
                           <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small" align="center">
                               Dearly missed and fondly remembered by loved ones
                           </div>
                       </div>
                       <div class="card__cta">
                           <button type="button" title="${x.deceased_first_name} ${x.deceased_last_name}" uid="${x.uid}" class=" btn-ghost clearfix triggerDonateNow impact-message button button--small button--full " id="user-input-holder"> DONATE</button>
                                                </div>
                                                <div class="card__cta">
                                                    <a href="/obituary-details/${x.uid}" class="button button--no-bg button--full" >LEARN MORE</a>
                                                </div>
                                            </div>
                                        </div>`).show('slow');
                        });
                        $('#searchlisting').LoadingOverlay("hide");
                    }

                },
                error: function (data) {
                    toaster('Error',data.responseJSON.message,'error');
                    $('#searchlisting').LoadingOverlay("hide");
                }
            })
        }
        $(document).ready(function () {
            filterObituary();
        });

    </script>
@endpush
