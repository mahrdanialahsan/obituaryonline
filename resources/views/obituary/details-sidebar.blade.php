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
            <button type="button"  class="dropdown-item shareBtn" url="{{route('obituary.details',['id'=>$obituary->uid])}}" ><i class="fa-brands fa-facebook-f" style="color: #4267B2" ></i> &nbsp;&nbsp; Facebook</button>
            {{--                                    <a class="dropdown-item" href="#">Twitter</a>--}}
        </div>
    </div>
    <a id="copy-url" text="{{route('obituary.details',['id'=>$obituary->uid])}}" class="button button--icon button--ghost copyText" data-clipboard-text="" msg="Link is copied to clipboard">
        <i class="ico ico-link button--icon__icon" style="margin-top:2px;"></i>
        <span class="button--icon__name">LINK</span>
    </a>
</div>
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
@if(!is_mobile_device() && collect($payments)->count()>0)
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