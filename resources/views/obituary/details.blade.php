@extends('layouts.public')


@push('meta')
    <meta property="og:url"           content="{{route('obituary.details',['id'=>$obituary->uid])}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$obituary->deceased_first_name}} {{$obituary->deceased_last_name}}" />
    <meta property="og:description"   content="{{$obituary->message}}" />
    <meta property="og:image"         content="{{url('storage/deceased_picture/'.$obituary->deceased_picture)}}" />
@endpush

@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('images/12.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>Obituary </h1>
                </div>
{{--                <ul class="bread-crumb clearfix">--}}
{{--                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home &nbsp;</a></li><li class="breadcrumb-item">My account</li>                --}}
{{--                </ul>--}}
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <br>
    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="blog-details-content">
                        <div class="thm-unit-test">
                            <div class="content-one">
                                <figure class="image-box">
                                    <img src="{{url('storage/deceased_picture/'.$obituary->deceased_picture)}}" class="image" >
                                    <span class="post-date">{{date('F d, Y',strtotime($obituary->created_at))}}</span>
                                </figure>
                            </div>
                            @if(is_mobile_device())
                                @include('obituary.details-sidebar')
                            @endif
                            <br>
                            <div class="text">
                                <h3 class="h3">About Obituary</h3><br>
                                <div class="obituary-description">{!! $obituary->message !!}</div>
                            </div>
                            @if(is_mobile_device() && collect($payments)->count()>0)
                                <div class="volunteer-event__venue">
                                    <div class="obituary-stats mt-16">
                                        <div class="font-black">
                                            <div class="h2">Contributor:</div>
                                            <ul class="list-group list-group-flush">
                                                @foreach($payments as $key=>$payment)
                                                    <li class="list-group-item"> {{$key+1}}. ${{$payment->ttl_amount}} {{$payment->user_name}}</li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="m" id="donate-trig" style="margin-left: 0px;">
                                <h3 class="h3 mt-40">How Your Donation Makes a Difference</h3>
                                <div class="company-profile__donation-cards">
                                    <div class="border-all dtn-amt-item m-bot30 border-round clearfix ">
                                        <div class="horizontal-card">
                                            <div class="horizontal-card__head">
                                                <h2 class="vertical-horizontal-center" style="text-align: center"> ${{$obituary->default_amount}} </h2>
                                            </div>
                                            <div class="clearfix m-left0 horizontal-card__main horizontal-card__main--light-blue" id="other-amt" style="margin-left: 00px;"> <div class="text-left dtn-desc m-left0 text-left"> <span class="small">
<p class="body-txt break-word" id="otherAmtMessage"> Your donation could help provide a meal for 3 children in our Canossaville Student Care programme for a month. </p> </span> </div> </div>
                                            <div class=" horizontal-card__aside horizontal-card__aside--light-blue company-profile__donate-card dtn-btns" style="margin-left: 0px;">
                                                <button amount="{{$obituary->default_amount}}" uid="{{$obituary->uid}}" data-cart-btn="donate"    class=" addToCartDirectly btn-ghost clearfix impact-message button button--small button--full " id="user-input-holder"> DONATE ${{$obituary->default_amount}}</button>
                                                <button amount="{{$obituary->default_amount}}" uid="{{$obituary->uid}}" data-cart-btn="cart"    class=" addToCartDirectly button button--ghost button--small button--full ignore-label-update impact-message user-input-holder custom-amt-input-modal btn-ghost "><span id="user-input-holder">ADD TO CART</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="company-profile__donation-cards">
                                    <div class="border-all dtn-amt-item m-bot30 border-round clearfix other-impact-message">
                                        <div class="horizontal-card">
                                            <div class="horizontal-card__head">
                                                <div class="input-ctrl">
                                                    <label for="other-amt">
                                                        <h3 class="h3">Other amount</h3> </label>
                                                    <div id="custom-amt-input-modal">
                                                        <input id="other-amount" uid="{{$obituary->uid}}" type="number" value="0" class="input input--currency button-input other-amount" placeholder="0">
{{--                                                        <span class="input-ctrl__currency">$</span>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix m-left0 horizontal-card__main horizontal-card__main--light-blue" id="other-amt" style="margin-left: 00px;"> <div class="text-left dtn-desc m-left0 text-left">
                                            <span class="small">
                                            <p class="body-txt break-word" id="otherAmtMessage"> Every Dollar Counts! Thank you for your donation to support our programmes and services. </p> </span> </div> </div>
                                            <div class=" horizontal-card__aside horizontal-card__aside--light-blue company-profile__donate-card dtn-btns" style="margin-left: 0px;">
                                                <button  amount="0" uid="{{$obituary->uid}}" data-cart-btn="donate"   class=" addToCartDirectly CustomAmountButtons btn-ghost clearfix impact-message button button--small button--full user-input-holder " id="user-input-holder">DONATE TODAY</button>
                                                <button  amount="0" uid="{{$obituary->uid}}" data-cart-btn="cart"    class=" addToCartDirectly CustomAmountButtons button button--ghost button--small button--full ignore-label-update impact-message user-input-holder custom-amt-input-modal btn-ghost "><span id="user-input-holder">ADD TO CART</span> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="company-profile__donation-cards">
                                <div class="border-all dtn-amt-item m-bot30 border-round clearfix other-impact-message">
                                    <div class="horizontal-card">
                                        <div class="horizontal-card__head">
                                            <div class="input-ctrl">
                                                <label for="other-amt">
                                                    <h3 class="h3">Wake Service</h3>
                                                </label>
                                                <p><small>{{$obituary->wake_location}}</small></p>
                                                <br>
                                                <p>Date</p>
                                                <p><small>{{date('D, d M Y',strtotime($obituary->date_of_death))}}</small> To</p>
                                                <p><small>{{date('D, d M Y',strtotime($obituary->date_of_death. " +$obituary->wake_period  days"))}}</small></p>
                                            </div>
                                        </div>
                                        <div class="clearfix m-left0 horizontal-card__main horizontal-card__main--light-blue" id="other-amt" style="margin-left: 00px;">
                                            @php
                                                $wake_location_json = json_decode($obituary->wake_location_json);
                                            @endphp
                                            <div class="text-left dtn-desc m-left0 text-left">
                                                <iframe
                                                        width="450"
                                                        height="250"
                                                        frameborder="0" style="border:0"
                                                        referrerpolicy="no-referrer-when-downgrade"
                                                        src="https://www.google.com/maps/embed/v1/search?key=AIzaSyCZ4QlHcp9J08dEpSwRhTY_gFTI5qsx_Ho&q={{$obituary->wake_location}}"
                                                        allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="company-profile__donation-cards">
                                <div class="border-all dtn-amt-item m-bot30 border-round clearfix other-impact-message">
                                    <div class="horizontal-card">
                                        <div class="horizontal-card__head">
                                            <div class="input-ctrl">
                                                <label for="other-amt">
                                                    <h3 class="h3">Funeral Service</h3>
                                                </label>
                                                <p><small>{{$obituary->funeral_location}}</small></p>
                                                <br>
                                                <p>Date</p>
                                                <p><small>{{date('D, d M Y',strtotime($obituary->funeral_date))}}</small></p>
                                                <p>Time</p>
                                                <p><small>{{date('h:i A',strtotime($obituary->funeral_date))}}</small></p>
                                            </div>
                                        </div>
                                        <div class="clearfix m-left0 horizontal-card__main horizontal-card__main--light-blue" id="other-amt" style="margin-left: 00px;">
                                            @php
                                                $funeral_location_json = json_decode($obituary->funeral_location_json);
                                            @endphp
                                            <div class="text-left dtn-desc m-left0 text-left">
                                                <iframe
                                                        width="450"
                                                        height="250"
                                                        frameborder="0" style="border:0"
                                                        referrerpolicy="no-referrer-when-downgrade"
                                                        src="https://www.google.com/maps/embed/v1/search?key=AIzaSyCZ4QlHcp9J08dEpSwRhTY_gFTI5qsx_Ho&q={{$obituary->funeral_location}}"
                                                        allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <div class="default-form comments-form-area">

                                    <div class="group-title"><h3>Can share a memory</h3></div>
                                    <div class="form-inner">
                                        <form action="{{route('memory.store')}}" method="post" id="memory-form" class="comment-form add-comment-form" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" readonly name="uid"  value="{{$obituary->uid}}">
                                            <input type="hidden" readonly name="obituary_id" id="obituary_id" value="{{$obituary->id}}">
                                            <input type="hidden" name="design_id" id="design_id" value="">
                                            <div class="row">
                                                <div class="btn-send col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-15">
                                                            <div class="box__input" align="center">
                                                                <style>
                                                                    .card {
                                                                        position: relative;
                                                                        display: inline-block;
                                                                    }

                                                                    .card-img {
                                                                        width: 100%;
                                                                        height: auto;
                                                                        display: block;
                                                                    }

                                                                    .card-img-overlay {
                                                                        position: absolute;
                                                                        top: 0;
                                                                        bottom: 0;
                                                                        left: 0;
                                                                        right: 0;
                                                                        background-color: rgba(0, 0, 0, 0.5);
                                                                        display: flex;
                                                                        justify-content: center;
                                                                        align-items: center;
                                                                    }

                                                                    .btn {
                                                                        font-size: 1rem;
                                                                    }
                                                                </style>
                                                                <div class="card">
                                                                    <img id="design-image" src="" width="320" height="400" class="card-img" alt="Your Image">
                                                                    <div class="card-img-overlay h-100">
                                                                        <div class="row h-100">
                                                                            <div class="col-12 h-100">
                                                                                <div class="card-body d-flex flex-column justify-content-between h-100">
                                                                                    <div class="flex-fill">
                                                                                        <p id="design-title" class="card-text" style="color: #fff">My dearest condolence.</p>
                                                                                    </div>
                                                                                    <button type="button" class="btn btn-dark mt-auto" onclick="getNextKey()">Change Design</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-15">
                                                            <div class="box__input" align="center">
                                                                <input type="file" name="image"  accept="image/*" data-allowed-file-extensions='["png", "jpg","jpeg"]'  id="files" class="box__file" style="margin-left:50px; border:hidden;">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                            <textarea placeholder="Type Wishes here" id="wishes" name="wishes" class="form-control" rows="7" required="required"></textarea>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12  mb-15 form-group message-btn">
                                                            <button  type="button" onclick="submitForm('memory-form','{{route('memory.store')}}')" id="submit" class="submit theme-btn btn-one" value="Leave a Wishes">Share Memory</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"><br></div>
                        </div>
                        <!--End thm-unit-test-->
                    </div>
                    <!--End blog-content-->
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <aside class="blog-sidebar">
                        @if(!is_mobile_device())
                        @include('obituary.details-sidebar')
                        @endif
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script>
        var designs = JSON.parse('{!! $designs !!}');

        let currentIndex = 0;
        const keys = Object.keys(designs);

        function getNextKey() {
            const nextIndex = currentIndex + 1;
            if (nextIndex < keys.length) {
                currentIndex = nextIndex;
            } else {
                currentIndex = 0;
            }
            let design = designs[keys[currentIndex]];
            $(`#design_id`).val(design.id);
            $(`#design-title`).text(design.title);
            $(`#design-image`).attr('src',`/storage/designs/${design.image}`);
        }
        $(document).ready(function () {

            getNextKey();
          $("#files").dropify();
        });
        $(document).on('input','.other-amount',function () {
            $('.CustomAmountButtons').attr('amount',$(this).val());
        });
        $(document).on('click','.addToCartDirectly',function () {
            let btn_type   =  $(this).attr('data-cart-btn');
            let uid        =  $(this).attr('uid');
            let amount     =  parseInt($(this).attr('amount'));
            if(amount > 0){
                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : `/add-to-cart/${uid}/amount/${amount}`, // the url where we want to POST
                    data        : {},
                    processData : false,
                    contentType : false,
                    cache       : false,
                    headers     : {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if(response.status == 'success'){
                            if(response.amount > 0){
                                $('.cart-items').html(`<i class="fa-brands fa-shopping-cart"  style='display:none'></i> <sup class="badge bg-danger"><small>${response.amount}$</small></sup>`)
                            }else{
                                $('.cart-items').html(`<i class="fa-brands fa-shopping-cart"  style='display:none'></i></span>`)
                            }
                            if(btn_type == 'donate'){
                                window.location = '/cart/donation';
                            }else{
                                $('.modal').modal('hide')
                                toaster('Success','Item added to cart.','success');
                            }

                        }else{
                            toaster('Error',response.msg,'error');
                        }
                    },
                    error: function (data) {
                        toaster('Error',data.responseJSON.message,'error');
                    }
                })
            }else{
                toaster('Error','Please select amount.','error');
            }

        });
        $(document).on('click','.copyText',function () {
            var copyText = $(this).attr('text');
            navigator.clipboard.writeText(copyText);
            toaster('Copied:',$(this).attr('msg'),'success');
        });
        // target the button and pass in:
        // url - url of the site you want to share
        // title -title of your share
        // discription - description of your share

        $( ".shareBtn" ).click(function() {
            let url = $(this).attr('url')
            facebookShareUrl = 'https://www.facebook.com/sharer.php?p[url]=' + url
            // how to open a window - https://www.w3schools.com/jsref/met_win_open.asp
            window.open(facebookShareUrl);


        });

    </script>
@endpush
