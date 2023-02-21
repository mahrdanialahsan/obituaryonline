@extends('layouts.public')

@section('content')
    <style>
        /*.input-ctrl{*/
        /*    height: 80px;*/
        /*}*/
        .error{
            color: #f98768;
        }
        .bootstrap-datetimepicker-widget.dropdown-menu  {
            z-index: 9 !important;
        }
    </style>
    <!-- Page Title -->
    <section class="page-title" style="background-image: url('images/12.jpg');">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>Campaign</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home &nbsp;</a></li><li class="breadcrumb-item">Campaign</li> </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <div class="content-side col-xs-12 col-sm-12 col-md-12">
                    <div class="blog-list-content">
                        <div class="thm-unit-test">
                            <div class="hero-container hero-container--light-grey hero-container--auto-w create-volunteer-act__head pad-navbar">
                                <h2 class="h2 create-volunteer-act__title">Start a fundraising campaign</h2>
{{--                                <div class="mobile-title m-top20 centered visible-phone">--}}
{{--                                    <span class="small breakword">Start a fundraising campaign</span>--}}
{{--                                </div>--}}
                                <div class="ctn-1200">
                                    <div class="create-volunteer-act__hero-ctn hero-container__body hero-container__body--no-pad hero-container__body--auto relative js-bcrumb bcrumb bcrumb--grey-back bcrumb--center js-create-volunteer-act__bcrumb">
                                        <div tab="1" id="tab-nav-1" class="js-bcrumb__child bcrumb__child bcrumb__child--responsive bcrumb__child is-active">
                                            <span class="bcrumb__number">1</span>
                                            <p class="roboto-font">Enter campaign details</p></div>
                                        <div tab="2" id="tab-nav-2" class="js-bcrumb__child bcrumb__child bcrumb__child--responsive bcrumb__child">
                                            <span class="bcrumb__number">2</span>
                                            <p class="roboto-font">Submit for approval</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form method="post" name="compaign-form" id="compaign-form" action="{{ !empty($uid) ? route('campaign.update',['id'=>$uid]):route('campaign.store')}}" novalidate="novalidate">
                                @csrf
                                <div class="ctn-1200" id="">
                                    <div data-role="page-holder" class="rounded-card rounded-card--no-pad rounded-card--light-shadow rounded-card--height-auto rounded-card--full create-volunteer-act__main js-create-volunteer-act__main" >
                                        <div id="tab-page-1" style ="display: none;" class="rounded-card__body rounded-card__body--responsive js-create-volunteer-act__page js-create-volunteer-act__page--1" data-role="page" >
                                            <h3 class="h3 font-dark-grey">Deceased Information</h3>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="deceased_name">Name </label>
                                                <input type="text" name="deceased_name" id="deceased_name"  class="form-control field-required input">
                                                <label for="deceased_name" class="error help-block"></label>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="date_of_birth">Date of Birth</label>
                                                <input type="text" name="date_of_birth" id="date_of_birth" class="form-control field-required input" placeholder="YYYY-MM-DD" >
                                                <label for="date_of_birth" class="error help-block"></label>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="date_of_death">Date and Time Of Death </label>
                                                <input type="text" name="date_of_death" id="date_of_death" class="form-control field-required input"  placeholder="YYYY-MM-DD HH:MM" >
                                                <label for="date_of_death" class="error help-block"></label>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="wake_location">Wake Location </label>
                                                <input type="text" name="wake_location" id="wake_location" class="form-control field-required input" >
                                                <label for="wake_location" class="error help-block"></label>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="wake_period">Wake Period</label>
                                                <div class="ctn">
                                                    <div class="grid-12 grid-tablet-portrait-up-11">
                                                        <input type="number" name="wake_period" id="wake_period" class="input date-picker-time form-control field-required" >
                                                    </div>
                                                    <div class="grid-12 grid-tablet-portrait-up-1-last">
                                                        <span class="txt-days">days</span>
                                                    </div>
                                                </div>
                                                <label for="wake_period" class="error help-block"></label>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="funeral_date">Funeral Date </label>
                                                <input type="text" name="funeral_date" id="funeral_date" class="form-control field-required input"  placeholder="YYYY-MM-DD HH:MM">
                                                <label for="funeral_date" class="error help-block"></label>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="funeral_location">Funeral Location </label>
                                                <input type="text" name="funeral_location" id="funeral_location" class="form-control field-required input">
                                                <label for="funeral_location" class="error help-block"></label>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="surviving_family">Surviving Family </label>
                                                <input type="text" name="surviving_family" id="surviving_family" class="form-control field-required input">
                                                <label for="surviving_family" class="error help-block"></label>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="deceased_picture">Deceased Picture</label>
                                                <input data-default-file="{{!empty($campaigns) ?  url('storage/deceased_picture/'.$campaigns->deceased_picture): ''}}"  accept="image/gif, image/png,, image/jpg,, image/jpeg"  type="file" name="deceased_picture" id="deceased_picture" class="form-control dropify field-required file">
                                                <label for="deceased_picture" class="error help-block"></label>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="death_certificate">Death Certificate</label>
                                                <input data-default-file="{{!empty($campaigns) ?  url('storage/death_certificate/'.$campaigns->death_certificate): ''}}"  accept="application/pdf" type="file" name="death_certificate" id="death_certificate" class="form-control dropify field-required file">
                                                <label for="death_certificate" class="error help-block"></label>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="message">About Campaign </label>
                                                <textarea   name="message" id="message" maxlength="1500" rows="10"   class="form-control field-required textarea"></textarea>
                                                <label for="message" class="error help-block"></label>
                                            </div>
                                        </div>
                                        <div id="tab-page-2" style ="text-align: center;display: none;" class="rounded-card__body rounded-card__body--responsive js-create-volunteer-act__page js-create-volunteer-act__page--1" data-role="page" >
                                            <h3 class="h3 font-dark-grey">One last look and we're off!</h3>
                                            <h3 class="h3 font-dark-grey">Please confirm you'd like to submit for approval.</h3>
                                            <div class="input-ctrl" style="margin-top: 10px">
                                                <label class="lbl" style="text-align: justify">Once submitted, you can edit this and any other campaigns, on the "My Campaigns" page.</label>
                                            </div>
                                            <br/>
                                            <hr>
                                            <br/>
                                            <div class="input-ctrl">
                                                <p class="lbl" style="text-align: justify">
                                                    By submitting, I declare that this campaign is to raise funds for local charitable purposes only, and that I am aware of, and abide by the requirements under the Charities Act of Singapore (Chapter 37), including the
                                                    Charities (Fund-raising appeals for <a href="https://www.charities.gov.sg/Pages/Fund-Raising/Types-of-FR-Permits/Fund-Raising-for-Local-Charitable-Purposes.aspx#" target="_blank">Local</a> &amp; <a href="https://www.charities.gov.sg/Pages/Fund-Raising/Types-of-FR-Permits/Fund-Raising-for-Foreign-Charitable-Purposes.aspx#" target="_blank">Foreign</a> Charitable Purposes) Regulations.
                                                </p>
                                            </div>
                                            <br/>
                                        </div>
                                        <div class="create-volunteer-act__footer" style="margin-top: 1px" id="">
                                            <button tab="1" class="button button--135 button--large m-top10 js-create-campaign-act__next button-page-next" id="tab-next-btn" type="button">SUBMIT</button>
                                            <button class="button button--135 button--large save-for-approval m-top10 js-create-campaign-act__next button-page-next" id="submit-btn" style="display: none" type="button">CONFIRM SUBMISSION</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        var tab = 1;
        var base_url = '{{url('/')}}';
        function setValue(){
            @if(!empty($uid))
                $.get("/campaign/{!! $uid !!}").done(function(response){

                    $('#deceased_name').val(response.deceased_name);
                    $('#date_of_birth').val(moment(response.date_of_birth).format('YYYY-MM-DD'));
                    $('#date_of_death').val(moment(response.date_of_death).format('YYYY-MM-DD HH:MM'));
                    $('#wake_location').val(response.wake_location);
                    $('#wake_period').val(response.wake_period);
                    $('#funeral_date').val(moment(response.funeral_date).format('YYYY-MM-DD HH:MM'));
                    $('#funeral_location').val(response.funeral_location);
                    $('#surviving_family').val(response.surviving_family);
                    $('#message').val(response.message);
                    tab     =   2;
                    $(`.rounded-card__body`).hide();
                    $(`#tab-page-${tab}`).show();
                    $('.bcrumb__child').removeClass('is-active');
                    $(`#tab-nav-${tab}`).addClass('is-active');
                    $('#tab-next-btn').attr('tab',tab);
                    $('#tab-next-btn').text(tab == 1 ? 'UPDATE':'EDIT');
                    $('.save-for-approval').css('display',tab == 1 ? 'none':'inline')

                })
            @else
                $('#tab-page-1').show('slow')
            @endif
        }
        setValue();
        $(document).on('click','#tab-next-btn',function () {
            tab = $(this).attr('tab');

            if( tab == 1 ){
                if(checkRequiredFileds(tab)){
                    submitForm('compaign-form');
                }

            }else{
                tab     =   tab == 1 ? 2:1;
                $(`.rounded-card__body`).hide();
                $(`#tab-page-${tab}`).show();
                $('.bcrumb__child').removeClass('is-active');
                $(`#tab-nav-${tab}`).addClass('is-active');
                $(this).attr('tab',tab);
                $(this).text(tab == 1 ? 'UPDATE':'EDIT');
                $('.save-for-approval').css('display',tab == 1 ? 'none':'inline')
            }

        });
        function checkRequiredFileds() {
            let flag =  true;
            return flag;
            $( ".field-required" ).each(function( index ) {
                $(this).next().text('');
                if($.trim($(this).val()) == ''){
                    debugger

                    $(this).next().text('Field is missing.').show();
                    flag = false;
                }
            });
            return flag;
        }
        $(document).ready(function () {
            //$('#date_of_birth').mask('0000-00-00');
            $('#date_of_birth').datetimepicker({
                format: 'YYYY-MM-DD',
            });
            $('#date_of_death').datetimepicker({
                format: 'YYYY-MM-DD HH:MM',
            });
            $('#funeral_date').datetimepicker({
                format: 'YYYY-MM-DD HH:MM',
            });
            $('.dropify').dropify();

            // Translated

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element){
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e){
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        })

    </script>
@endpush
