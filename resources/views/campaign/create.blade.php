@extends('layouts.public')

@section('content')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <style>
        .error{
            color: #f98768;
        }
        .input-ctrl, .aui .input-ctrl {
             margin-bottom: 0px;
        }
        .surviving_family_relation_description{
            margin-bottom: 12px;
        }
    </style>
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->fundraise_page_cover_image)) ?  url('storage/site_settings/'.$site->fundraise_page_cover_image): asset('images/12.png')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>{{$site->fundraise_page_header_title ? $site->fundraise_page_header_title:"Campaign"}}</h1>
                </div>
{{--                <ul class="bread-crumb clearfix">--}}
{{--                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home &nbsp;</a></li><li class="breadcrumb-item">Campaign--}}
{{--                    </li> --}}
{{--                </ul>--}}
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
                                <h2 class="h2 create-volunteer-act__title">{{$site->fundraise_page_campaign_title ? $site->fundraise_page_campaign_title:"Start a fundraising campaign"}}</h2>
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
                            <form method="post" name="campaign-form" id="campaign-form" action="{{ !empty($uid) ? route('campaign.update',['id'=>$uid]):route('campaign.store')}}" novalidate="novalidate">
                                @csrf
                                <div class="ctn-1200" id="">
                                    <div data-role="page-holder" class="rounded-card rounded-card--no-pad rounded-card--light-shadow rounded-card--height-auto rounded-card--full create-volunteer-act__main js-create-volunteer-act__main" >
                                        <div id="tab-page-1" style ="display: none;" class="rounded-card__body rounded-card__body--responsive js-create-volunteer-act__page js-create-volunteer-act__page--1" data-role="page" >
                                            <h3 class="h3 font-dark-grey">{{$site->fundraise_page_form_title ? $site->fundraise_page_form_title:"Deceased Information"}}</h3>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="deceased_first_name">First Name </label>
                                                <input type="text" name="deceased_first_name" id="deceased_first_name"  class="form-control field-required input txtOnly">

                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="deceased_last_name">Last Name </label>
                                                <input type="text" name="deceased_last_name" id="deceased_last_name"  class="form-control field-required input txtOnly">

                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="nric">NRIC </label>
                                                <input type="text" name="nric" id="nric"  class="form-control field-required input">

                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="date_of_birth">Date of Birth</label>
                                                <input type="text" name="date_of_birth" id="date_of_birth" class="form-control field-required input" placeholder="YYYY-MM-DD" >

                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="date_of_death">Date and Time Of Death </label>
                                                <input type="text" name="date_of_death" id="date_of_death" class="form-control field-required input"  placeholder="YYYY-MM-DD HH:MM" >

                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="wake_location">Wake Location </label>
                                                <input type="text" name="wake_location" id="wake_location" class="form-control field-required input" >

                                                <input type="hidden" id="wake_location_json" name="wake_location_json">
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="wake_period">Wake Period</label>
                                                <div class="ctn">
                                                    <div class="grid-12 grid-tablet-portrait-up-11">
                                                        <input type="number" name="wake_period" id="wake_period" class="input nbrOnly form-control field-required" >
                                                    </div>
                                                    <div class="grid-12 grid-tablet-portrait-up-1-last">
                                                        <span class="txt-days">days</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="funeral_date">Funeral Date </label>
                                                <input type="text" name="funeral_date" id="funeral_date" class="form-control field-required input"  placeholder="YYYY-MM-DD HH:MM">

                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="funeral_location">Funeral Location </label>
                                                <input type="text" name="funeral_location" id="funeral_location" class="form-control field-required input">

                                                <input type="hidden" id="funeral_location_json" name="funeral_location_json">
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="funeral_location">Default Donation Amount </label>
                                                <input type="text" name="default_amount" id="default_amount" class="form-control nbrOnly field-required input">

                                                <input type="hidden" id="funeral_location_json" name="funeral_location_json">
                                            </div>
                                            <br>
                                            <div class="input-ctrl">
                                                <ul class="checkbox-list causesFilter" data-role="list-show-more" style="max-height: none;">
                                                    <li class="title-ctn__child"><label class="checkbox-list__checkbox">
                                                            <input type="checkbox" value="1" name="public_donation" id="public_donation" class="callSearch causesType">
                                                            <span class="checkbox-list__lbl-spn ">Donation Is Public</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="deceased_picture">Deceased Picture</label>
                                                <input data-default-file="{{!empty($campaign) ?  url('storage/deceased_picture/'.$campaign->deceased_picture): ''}}"  accept="image/gif, image/png,, image/jpg,, image/jpeg"  type="file" name="deceased_picture" id="deceased_picture" class="form-control dropify field-required file">

                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="death_certificate">Death Certificate</label>
                                                <input data-default-file="{{!empty($campaign) ?  url('storage/death_certificate/'.$campaign->death_certificate): ''}}"  accept="application/pdf" type="file" name="death_certificate" id="death_certificate" class="form-control dropify field-required file">

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h3 class="h3 font-dark-grey" style="margin-top: 15px">Surviving Family</h3>
                                                </div>
                                                <div class="col-sm-6" style="text-align: right;padding-top: 17px;">
                                                    <button type="button" id="addMoreRelation">Add More</button>
                                                </div>
                                            </div>

                                            <hr class="hr">
                                            <span id="surviving_family_list">
                                                <div class="content-side col-xs-12 col-sm-12 col-md-12 mb-12" style="border: 1px solid #cccc">
                                                    <div class="input-ctrl">
                                                        <div class="row">
                                                            <div class="col-6"><label class="lbl" >Relation Title </label></div>
                                                            <div class="col-6" align="right"><button type="button" class="removeSurvivingFamily btn-danger btn-sm">Remove</button></div>
                                                        </div>
                                                        <input type="text" name="surviving_family_relation_title[]" class="form-control field-required input" placeholder="Wife,son,daughter etc" />
                                                    </div>
                                                    <div class="input-ctrl">
                                                        <label class="lbl">Name </label>
                                                        <input type="text" name="surviving_family_relation_name[]" class="form-control field-required input" placeholder="Wife name,son name,daughter name etc" />
                                                    </div>
                                                    <div class="input-ctrl">
                                                        <label class="lbl" >Description </label>
                                                        <textarea type="text" name="surviving_family_relation_description[]"  class="surviving_family_relation_description form-control field-required input" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </span>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="poa_wills"> Power of attorney / Power of probate</label>
                                                <textarea   name="poa_wills" id="poa_wills"    class="form-control field-required textarea"></textarea>
                                            </div>
                                            <div class="input-ctrl">
                                                <label class="lbl" for="message">About Campaign </label>
                                                <textarea   name="message" id="message"    class="form-control field-required textarea"></textarea>
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
                                            @if(!empty($uid))
                                                <button class="button button--135 button--large save-for-approval m-top10 js-create-campaign-act__next button-page-next" id="submit-btn" style="display: none" type="button" onclick="submitForm('campaign-approval-form')">CONFIRM SUBMISSION</button>

                                            @endif
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
    @if(!empty($uid))
        <form method="post" id="campaign-approval-form" action="{{route('campaign.submit.approval',['id'=>$uid])}}" style="display: none">
            @csrf
        </form>
    @endif
@endsection
@push('js')
    <script>

        $(document).on('click','.removeSurvivingFamily',function () {
            var thisvar = $(this);
            if(confirm("Are you sure to remove ?")){
                thisvar.parent().parent().parent().parent().remove();
            }
        });
        $(document).on('click','#addMoreRelation',function () {
            $('#surviving_family_list').append(`<div class="content-side col-xs-12 col-sm-12 col-md-12" style="border: 1px solid #cccc;margin-top: 12px">

                                                    <div class="input-ctrl">
                                                        <div class="row">
                                                            <div class="col-6"><label class="lbl" >Relation Title </label></div>
                                                            <div class="col-6" align="right"><button type="button" class="removeSurvivingFamily btn-danger btn-sm">Remove</button></div>
                                                        </div>
                                                        <input type="text" name="surviving_family_relation_title[]" class="form-control field-required input" placeholder="Wife,son,daughter etc" />
                                                    </div>
                                                    <div class="input-ctrl">
                                                        <label class="lbl">Name </label>
                                                        <input type="text" name="surviving_family_relation_name[]" class="form-control field-required input" placeholder="Wife name,son name,daughter name etc" />
                                                    </div>
                                                    <div class="input-ctrl">
                                                        <label class="lbl" >Description </label>
                                                        <textarea type="text" name="surviving_family_relation_description[]"  class="surviving_family_relation_description form-control field-required input" placeholder=""></textarea>
                                                    </div>
                                                </div>`);
        });

        var tab = 1;
        var base_url = '{{url('/')}}';
        function setValue(){
            @if(!empty($uid))
                $.get("/campaign/get/{!! $uid !!}").done(function(response){

                    $('#deceased_first_name').val(response.deceased_first_name);
                    $('#deceased_last_name').val(response.deceased_last_name);
                    $('#nric').val(response.nric);
                    $('#date_of_birth').val(moment(response.date_of_birth).format('YYYY-MM-DD'));
                    $('#date_of_death').val(moment(response.date_of_death).format('YYYY-MM-DD HH:MM'));
                    $('#wake_location').val(response.wake_location);
                    $('#wake_location_json').val(response.wake_location_json);
                    $('#wake_period').val(response.wake_period);
                    $('#default_amount').val(response.default_amount);
                    $('#funeral_date').val(moment(response.funeral_date).format('YYYY-MM-DD HH:MM'));
                    $('#funeral_location').val(response.funeral_location);
                    $('#funeral_location_json').val(response.funeral_location_json);
                    $('#public_donation').prop("checked",response.public_donation == 1 ? true:false );
                    // CKEDITOR.instances["surviving_family"].setData(response.surviving_family);
                    CKEDITOR.instances["poa_wills"].setData(response.poa_wills);
                    //CKEDITOR.instances["message"].setData(response.message);

                    if($.trim(response.surviving_family) != ''){
                        var surviving_family = JSON.parse(response.surviving_family);
                        $('#surviving_family_list').empty();
                        surviving_family.forEach(x=>{
                            $('#surviving_family_list').append(`<div class="content-side col-xs-12 col-sm-12 col-md-12" style="border: 1px solid #cccc;margin-top: 12px">

                                                    <div class="input-ctrl">
                                                        <div class="row">
                                                            <div class="col-6"><label class="lbl" >Relation Title </label></div>
                                                            <div class="col-6" align="right"><button type="button" class="removeSurvivingFamily btn-danger btn-sm">Remove</button></div>
                                                        </div>
                                                        <input type="text" value="${x.surviving_family_relation_title}" name="surviving_family_relation_title[]" class="form-control field-required input" placeholder="Wife,son,daughter etc" />
                                                    </div>
                                                    <div class="input-ctrl">
                                                        <label class="lbl">Name </label>
                                                        <input type="text" value="${x.surviving_family_relation_name}" name="surviving_family_relation_name[]" class="form-control field-required input" placeholder="Wife name,son name,daughter name etc" />
                                                    </div>
                                                    <div class="input-ctrl">
                                                        <label class="lbl" >Description </label>
                                                        <textarea type="text" name="surviving_family_relation_description[]"  class="surviving_family_relation_description form-control field-required input" placeholder="">${x.surviving_family_relation_description}</textarea>
                                                    </div>
                                                </div>`);
                        });
                    }
                    $('#message').val(response.message);
                    debugger
                    setTimeout(function () {
                        for ( instance in CKEDITOR.instances )
                            CKEDITOR.instances[instance].updateElement();
                    },10)
                    tab     =   response.status == null ? 2:1;
                    $(`.rounded-card__body`).hide();
                    $(`#tab-page-${tab}`).show();
                    $('.bcrumb__child').removeClass('is-active');
                    $(`#tab-nav-${tab}`).addClass('is-active');
                    $("#tab-next-btn").attr('tab',tab);
                    $("#tab-next-btn").text(tab == 1 ? 'UPDATE':'EDIT');
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
                    submitForm('campaign-form');
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
                format: 'YYYY-MM-DD HH:mm',
            });
            $('#funeral_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
            });
            $('.dropify').dropify();

            toolbar = [
                { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                { name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },
                //{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent','JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
                { name: 'justify', groups: [  'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },

                { name: 'links', items: [ 'Link', 'Unlink' ] },
                { name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },
                { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },
                { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
                { name: 'links', items: [ 'Link', 'Unlink' ] },
                { name: 'insert', items: [ 'Image'] },
                { name: 'spell', items: [ 'jQuerySpellChecker' ] },
                { name: 'table', items: [ 'Table' ] }
            ];
            // CKEDITOR.replace('surviving_family', {
            //    // toolbar: toolbar,
            // });
            // CKEDITOR.replace('message', {
            //     // toolbar: toolbar,
            // });
            CKEDITOR.replace('poa_wills', {
                // toolbar: toolbar,
            });
            CKEDITOR.on('instanceReady', function(){
                $.each( CKEDITOR.instances, function(instance) {
                    CKEDITOR.instances[instance].on("change", function(e) {
                        for ( instance in CKEDITOR.instances )
                            CKEDITOR.instances[instance].updateElement();
                    });
                });
            });
        })

    </script>
@endpush






@push('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZ4QlHcp9J08dEpSwRhTY_gFTI5qsx_Ho&libraries=places&callback=initAutocomplete"
            async defer></script>
    <script type="text/javascript">
        function initAutocomplete1() {
            var input = document.getElementById('wake_location');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                // document.getElementById('city2').value = place.name;
                // document.getElementById('cityLat').value = place.geometry.location.lat();
                // document.getElementById('cityLng').value = place.geometry.location.lng();
                    document.getElementById('wake_location_json').value = JSON.stringify({
                                                                    "address" :  document.getElementById('wake_location').value,
                                                                    "city" :  place.name,
                                                                    "lat" :  place.geometry.location.lat(),
                                                                    "long" :  place.geometry.location.lng()
                                                                });
                //alert("This function is working!");
                //alert(place.name);
                // alert(place.address_components[0].long_name);

            });
        }
        function initAutocomplete2() {
            var input1 = document.getElementById('funeral_location');
            var autocomplete1 = new google.maps.places.Autocomplete(input1);
            google.maps.event.addListener(autocomplete1, 'place_changed', function () {
                var place = autocomplete1.getPlace();
                document.getElementById('funeral_location_json').value = JSON.stringify({
                                                                "address" :  document.getElementById('funeral_location').value,
                                                                "city" :  place.name,
                                                                "lat" :  place.geometry.location.lat(),
                                                                "long" :  place.geometry.location.lng()
                                                            });
                //alert("This function is working!");
                //alert(place.name);
                // alert(place.address_components[0].long_name);

            });
        }

        function initAutocomplete() {
            initAutocomplete1()
            initAutocomplete2()
        }
    </script>
@endpush
