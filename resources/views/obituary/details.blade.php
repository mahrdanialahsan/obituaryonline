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
                    <h1>Memory</h1>
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
                            <div class="" id="donate-trig" style="margin-left: 0px;">
                                <h3 class="h3 mt-40">How Your Donation Makes a Difference</h3>
                                <div class="company-profile__donation-cards">
                                    <div class="border-all dtn-amt-item m-bot30 border-round clearfix ">
                                        <div class="horizontal-card">
                                            <div class="horizontal-card__head">
                                                <h2 class="vertical-horizontal-center"> ${{$obituary->default_amount}} </h2>
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
                            <br>
                            <div class="text">
                                <h3 class="h3">About Obituary</h3><br>
                                <div class="obituary-description">{!! $obituary->message !!}</div>
                            </div>
                            <div class="clearfix"><br></div>
                        </div>
                        <!--End thm-unit-test-->
                    </div>
                    <!--End blog-content-->
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <aside class="blog-sidebar">
                        <h5>In laving memory of</h5>
                        <h2 class="h2 volunteer-event__title break-word">{{$obituary->deceased_first_name}} {{$obituary->deceased_last_name}}</h2>
                        <p class="mt-10">Passed away on {{date('d F Y',strtotime($obituary->date_of_death))}}</p>
                        <br>
                        <div class="social-list social-list--just-left mt-16">
                            <div class="dropdown" style="margin-right: 5px">
                                <a class=" dropdown-toggle button button--icon button--ghost centered shareit addthis_button_compact" data-toggle="dropdown">
                                    <i class="ico ico-share button--icon__icon" style="margin-top:2px;"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a target="_blank" class="dropdown-item" href="https://api.whatsapp.com/send?text={{urlencode($obituary->message." ".route('obituary.details',['id'=>$obituary->uid]))}}"> <i class="fa-brands fa-whatsapp" style="color: #25D366"></i> &nbsp;&nbsp; WhatsApp</a>
                                    <a  class="dropdown-item shareBtn" url="{{route('obituary.details',['id'=>$obituary->uid])}}" href="javascript:;"><i class="fa-brands fa-facebook-f" style="color: #4267B2" ></i> &nbsp;&nbsp; Facebook</a>
{{--                                    <a class="dropdown-item" href="#">Twitter</a>--}}
                                </div>
                            </div>
                            <a id="copy-url" text="{{route('obituary.details',['id'=>$obituary->uid])}}" class="button button--icon button--ghost copyText" data-clipboard-text="" msg="Link is copied to clipboard">
                                <i class="ico ico-link button--icon__icon" style="margin-top:2px;"></i>
                                <span class="button--icon__name">LINK</span>
                            </a>
                        </div>
{{-- <a  target="_blank" href="https://api.whatsapp.com/send?text={{urlencode("Charities Week 2023 by Caritas Singapore Community Council - The Caritas Singapore Agape Fund https://www.giving.sg/caritas-singapore-community-council-the-cscc-agape-fund/charities_week_2023#.ZARS9R1KVIs.whatsapp")}}" data-action="share/whatsapp/share">Share via Whatsapp</a>--}}



                        <div class="volunteer-event__venue">
                            @if($obituary->public_donation == 1 || $obituary->created_by == auth()->id())
                            <div class="obituary-stats mt-16">
                                <div class="font-black">
                                    <div class="h2">${{number_format($obituary->total_donation)}}</div>
                                    @if(collect($payments)->count())
                                        <div class="body-txt body-txt--small body-txt--no-letter-space bold">raised from {{collect($payments)->count()}} donors</div>
                                    @endif
                                    <div class="progress-bar mt-8 mb-8">
                                        <div class="progress-bar__fill" style="width: 20%;"></div>
                                    </div>
                                    <span class="body-txt body-txt--small body-txt--no-letter-space bold">20% of $220,000</span>
                                    <span style="position: absolute;right: 1px;" class="body-txt body-txt--small body-txt--no-letter-space float-right bold">20 more days</span>
                                </div>
                            </div>
                            @endif
                        </div>



                        <div class="post-widget" style="text-align:center; margin-top:5rem;">
                            @php
                                $dateOfBirth =    $obituary->date_of_birth;
                                $dob         =    new DateTime($dateOfBirth);
                                $now         =    new DateTime();
                                $diff        =    $now->diff($dob);
                            @endphp
                            <div class="widget-title"><h3>Age:  <small>{{getAge($obituary->date_of_birth,$obituary->date_of_death)}} </small></h3></div>
                            <div class="post-inner">
                                <p>Passed away peacefully on {{date('d F Y',strtotime($obituary->date_of_death))}}. </p>
                                <p>Dearly missed and fondly remembered by loved ones.</p>
                            </div>
                            <div class="widget-title"><h3></h3></div>
                            @php
                              $surviving_family =    json_decode($obituary->surviving_family);
                            @endphp
                            @if(is_array($surviving_family) || is_object($surviving_family))
                                @foreach($surviving_family as $row)
                                    <div class="post-inner">
                                        <span class="post-date" style="color:#000000; font-size:1.5rem;">{{$row->surviving_family_relation_title}}</span>
                                        <p>{{$row->surviving_family_relation_name}}</p>
                                        @if(trim($row->surviving_family_relation_description) != '')
                                         <p><small>{{$row->surviving_family_relation_description}}</small></p>
                                        @endif
                                    </div>
                                    <br>
                                @endforeach
                            @endif
                        </div>

                        @if(collect($payments)->count()>0)

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
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script>
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
                                $('.cart-items').html(`<i class="fa-brands fa-shopping-cart"></i> <sup class="badge bg-danger"><small>${response.amount}$</small></sup>`)
                            }else{
                                $('.cart-items').html(`<i class="fa-brands fa-shopping-cart"></i></span>`)
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
