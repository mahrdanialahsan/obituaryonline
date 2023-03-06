@extends('layouts.public')
@push('css')
<style>
    .title-ctn__child-input{
        margin-bottom: 0px !important;

    }
    .input-small{
        font-size: 12px !important;
        width: 195px;
    }
</style>
@endpush
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->donate_page_cover_image)) ?  url('storage/site_settings/'.$site->donate_page_cover_image): asset('images/12.png')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{$site->donate_page_header_title ? $site->donate_page_header_title:"Obituary"}}</h1>
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

                            <div class="search-result__aside"> <!-- show btn -->
                                <div class="search-result__aside-head">
                                    <div class="flag-obj flag-obj--full">
                                        <div class="flag-obj__item">
                                            <span class="body-txt font-mid-grey">Filter By</span>
                                        </div>
                                        <div class="flag-obj__item text-right">
                                            <a class="text-link disabled body-txt--smaller bold js-clear-filters js-clear-filters-btn">CLEAR ALL</a>
                                        </div>
                                    </div>
                                </div>
                                <form id="filter-form" method="post">
                                <div class="res-ctn search-result__mobile-menu" id="js-res-ctn--filter">
                                    <div class="res-ctn__bd lock-body">
                                        <div class="title-ctn is-expanded mt-12 causes_div mb-40" data-role="accr">
                                            <div class="title-ctn__body title-ctn__body--collapsible" data-role="accr__body">
                                                <ul class="checkbox-list causesFilter" data-role="list-show-more">
                                                    <li class="title-ctn__child-input">
                                                        <label class="checkbox-list__checkbox">
                                                            <span class="checkbox-list__lbl-spn" style="margin-left: 0;margin-bottom: 2px">Post Date</span>
                                                            <input type="text" id="filter_post_date" name="filter_post_date" class="filter-obituaries form-control input-small">
                                                        </label>
                                                    </li>
                                                    <li class="title-ctn__child-input">
                                                        <label class="checkbox-list__checkbox">
                                                            <span class="checkbox-list__lbl-spn" style="margin-left: 0;margin-bottom: 2px">Name</span>
                                                            <input type="text"  id="filter_name" name="filter_name"   class="filter-obituaries form-control input-small">
                                                        </label>
                                                    </li>
                                                    <li class="title-ctn__child-input">
                                                        <label class="checkbox-list__checkbox">
                                                            <span class="checkbox-list__lbl-spn" style="margin-left: 0;margin-bottom: 2px">ID(last 4 digit)</span>
                                                            <input type="text"   id="filter_post_nric" name="filter_post_nric"  class=" filter-obituaries form-control input-small">
                                                        </label>
                                                    </li>
                                                    <li class="title-ctn__child-input">
                                                        <label class="checkbox-list__checkbox">
                                                            <span class="checkbox-list__lbl-spn" style="margin-left: 0;margin-bottom: 2px">Year of Born</span>
                                                            <input type="text"  id="filter_born_year" name="filter_born_year"   class=" filter-obituaries form-control input-small">
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="title-ctn__head" data-role="accr__head"> Sort BY (Default ASC order)</div>
                                            <div class="title-ctn__body title-ctn__body--collapsible" data-role="accr__body">
                                                <ul class="checkbox-list causesFilter" data-role="list-show-more">
                                                    <li class="title-ctn__child">
                                                        <label class="checkbox-list__checkbox">
                                                            <input type="checkbox" value="1" id="sort_by_name" name="sort_by_name" class="filter-obituaries callSearch causesType">
                                                            <span class="checkbox-list__lbl-spn">Name</span>
                                                        </label>
                                                    </li>
                                                    <li class="title-ctn__child">
                                                        <label class="checkbox-list__checkbox">
                                                            <input type="checkbox" value="1" id="sort_by_date" name="sort_by_date" class="filter-obituaries callSearch causesType">
                                                            <span class="checkbox-list__lbl-spn">Date</span>
                                                        </label>
                                                    </li>
                                                    <li class="title-ctn__child">
                                                        <label class="checkbox-list__checkbox">
                                                            <input type="checkbox" value="1" id="sort_by_age" name="sort_by_age"    class="filter-obituaries callSearch causesType">
                                                            <span class="checkbox-list__lbl-spn">Age</span>
                                                        </label>
                                                    </li>
                                                    <li class="title-ctn__child">
                                                        <label class="checkbox-list__checkbox">
                                                            <input type="checkbox" value="1"  id="sort_by_desc" name="sort_by_desc"     class=" filter-obituaries callSearch causesType">
                                                            <span class="checkbox-list__lbl-spn">DESC order</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>


                            <div class="search-result__main">
                                <div class="search-result__main-head" id="search-result-holder">
                                    <p class="font-black bold caps search-result__result">
                                        <strong class="big "><span  id="resultcount"></span> </strong><span id="result_text">RESULTS FOUND</span>
                                    </p>
                                </div>

                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">

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
        function calAge(dob,dod) {
            var diff = moment(dob).diff(dod, 'milliseconds');
            var duration = moment.duration(diff);
            return duration.format().replace("-","");
        }
        function filterObituary(){
            $('#searchlisting').LoadingOverlay("show");
            $('#resultcount').text(0);
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : '/filter-obituaries', // the url where we want to POST
                data        : $('#filter-form').serialize(),
                headers     : {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#searchlisting').empty();
                    if(response.data.length){
                        $('#resultcount').text(response.data.length);
                        response.data.forEach(x=>{
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
                           <a href="javascript:;" title="${x.deceased_first_name} ${x.deceased_last_name}" uid="${x.uid}" class=" btn-ghost clearfix triggerDonateNow impact-message button button--small button--full " id="user-input-holder"> DONATE</a>
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
                    $('#searchlisting').LoadingOverlay("hide");
                    $('#searchlisting').empty();

                    if(typeof data.responseJSON.errors !== 'undefined'){
                        const keys = Object.keys(data.responseJSON.errors);
                        keys.forEach(x=>{
                            toaster('Error',data.responseJSON.errors[x][0],'error');
                        });
                    }else{
                        toaster('Error',data.responseJSON.message,'error');
                    }
                }
            })
        }
        $(document).ready(function () {
            //$('#date_of_birth').mask('0000-00-00');
            $('#filter_post_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
            $("#filter_post_date").on("blur", function() {
                filterObituary()
            });
            $('#filter_born_year').datetimepicker({
                format: 'YYYY',
            })
            $("#filter_born_year").on("blur", function() {
                filterObituary()
            });
            filterObituary();
        });
        $(document).on('input','.filter-obituaries',function () {
            filterObituary()
        })
        $(document).on('click','.js-clear-filters-btn',function () {
            $('.filter-obituaries').val('');
            $('.filter-obituaries').prop("checked",false);
            setTimeout(filterObituary(),5);

        })

    </script>
@endpush
