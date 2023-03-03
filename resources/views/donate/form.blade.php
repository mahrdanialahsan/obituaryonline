@extends('layouts.public')

@section('content')
<style>
    .editableAmount input {
        height: 28px;
        width: 60px;
    }
</style>
{{--    @dd($campaigns);--}}
    <!-- Page Title -->
    <section class="page-title" style="background-image: url('images/12.jpg');">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>Campaign</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li class="breadcrumb-item"><a href="index.html">Home &nbsp;</a></li><li class="breadcrumb-item">Campaign</li> </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <style>
        #enetsqrmodal h2{ font-size: 19px!important; } .creditcard-option { padding: 4px; } button.creditcard-option img { height: 100%; width: auto; } .pad-0-5{ padding: 0px 5px ; } .aui label[for="dobDay"], .aui label[for="dobMonth"] { display: none !important; } div#incorrectRole { padding: 1em; border-radius: 5px; } div#incorrectRole .fa-exclamation { color: #FFFFFF; background-color: #f48291; width: 1.5em; border-radius: 1em; height: 1.5em; background-attachment: fixed; line-height: 1.5em; margin-right: 0.2em; } .creditCardPaymentArea { width: 380px; margin: 0 auto; text-align: initial; display: inline-block; } .cartOptionSection { border: 1px solid #DDD !important; border-radius: 8px !important; border-collapse: separate !important; margin-bottom: 3em !important; } #mailingAddressSection { margin-top: 3em; } .aui .control-group { margin: 0; padding: 0; } .select-control-group.error { border-color: #F16577; } .error.help-block { color: #F16577; } .aui .tab-content { overflow: initial !important; } .aui .pw-vis, .pw-vis { bottom: 7px !important; } .cardTypeImg { height: 50px; width: 50px; border: 1px solid black; display: inline-block; text-align:center; } .cardTypeImg .helper { display: inline-block; height: 100%; vertical-align: middle; margin-left: -0.3em; } .card-number-expiry { display: inline-block; /*height: auto;*/ position: relative; padding-left: 5px; transform: translateY(10%); } label.paymentTokens { line-height: 32px; } .aui .row-fluid [class*="span"] { margin-left: 0; } #userDetails .sod_select { width: 100%; text-transform: none; }
        #userDetails input, #userDetails .sod_select { text-align: center; display:inline; } a.lnkFaq { color:#17A4E1 !important; text-decoration: underline !important; } .left-col~.right-col { margin-bottom: 1em; } .left-col { text-align: right; padding-right: 1em; line-height: 33px; /*line height of textbox is also specified as 33px*/ } .right-col { text-align: center; } .postallabel { line-height: 70px; } .postalcontainer { line-height: 49px; } .postalcontainer { margin-left:-180px; width: 100%; } .postalcontainer>div { margin-left:180px; line-height: 58px; } .postalcontainer~.btn{ width: 150px; margin: 0; } input[type=checkbox]~label { display: inline; } #user_sal, #parishCode { text-align-last: center; } @media (max-width: 768px) { .left-col { text-align: center; } #user_sal { width: 15em; } } span.check.expired { background-color: #eeeeee !important; } .expiredCampaign { font-size: .875em; font-style: italic; } #donation-details .default, #donation-details .age18, #donation-details .age13 { display:none; } #donation-details .default.active, #donation-details .age18.active, #donation-details .age13.active { display:block; } .radio-pay-type, .radio-pay-token { margin-left : 50px; } .radio-pay-type.active, .radio-pay-token.active { display: block !important; } .creditCardPaymentArea { background-color: #FFF; } .radio-pay-type .small { border-bottom: 0px !important; } .choice-buttons button.no.active { background-color: #F16577 !important; color: #FFF !important; } .choice-buttons button.yes.active { background: #43AD49 !important; color: #FFF !important; } .user-img { width: 40px; height: 40px; } .warning { background: transparent !important; } .active .warning { background-color: rgb(241, 242, 242) !important; } .cartItemSelection div.lbl-warning{ color: #f5866c !important; } #gf-bkt-table { margin-bottom: 20px; } .gf-bkt-table-footer { margin-bottom: 0; } @media (min-width: 56.25rem) { #gf-bkt-table { margin-bottom: 0; } .gf-bkt-table-footer { margin-bottom: 20px; } } #donation-details a { color: #ea2722 }  #donation-details li.active a { color: white!important; } .m-bot20{ margin-bottom:20px !important; } .aui input[type="radio"], .aui input[type="checkbox"] { margin: 0px!important; }
    </style>
    <div class="section-page pad-navbar" id="donation-details">
        <div class=" auto-container gf" id="gf-bkt-wrapper">

{{--            boxed-wrapper--}}
            <div class="row-fluid">
                <div class="span12 text-center" id="">
                    <div class="section-header">
                        <div class="span12 text-center">
                            <h4 class="m-0">Here's what is in your</h4>
                            <h3 class="m-top0 m-bot30">Giving Cart</h3>
                            <div class="text-center">
                                <div class="text-center" style="padding-bottom:20px"> <div class="user-img mt-16">
                                        <img class="profile-pic" src="{{asset('images/ph-pink.jpg')}}"></div>
{{--                                    <p class="small mt-16 text-center">You are making a donation as &nbsp;--}}
{{--                                        <select name="user-role-select" id="user-role-select" class="select select2 small roleSwitch">--}}
{{--                                            <option value="" data-image-path="{{asset('images/ph-pink.jpg')}}'" data-role-id="" data-group-role-id="INDIVIDUAL" data-identity-number="" data-name="" data-salutation="" data-email="" data-poscode="" data-block="" data-address1="" data-address2="" data-unit="" data-group-role-desc="INDIVIDUAL" data-org-type="" selected>Individual</option>--}}
{{--                                        </select>--}}
{{--                                    </p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-section clear-both giving-cart-content " style="margin-bottom: 80px" >
                        <table class="table gf-bkt" id="gf-bkt-table">
                            <thead>
                            <tr>
                                <td  width="40%">Campaign</td>
                                <td  >Eligibility for <br> Tax Deduction</td>
                                <td width="30%" colspan="2">Donation <br class="hidden-phone"> Amount</td>
                            </tr>
                            </thead>
                            <tbody class="cart-body">

                            </tbody>
                            <tfoot>
                                <tr class="summary">
                                    <td class="hidden-phone">
                                        <a href="{{route('donate')}}">
                                            <span class="fa fa-plus-circle text-danger"></span>  Add another donation
                                        </a>
                                    </td>
                                    <td><h4>TOTAL</h4></td>
                                    <td colspan="2" > <h4 class="td-large-sm ttl_amount">0$</h4> </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="gf-bkt-table-footer text-right pull-right">
                            <span class="text-error message only1"><i> * You have selected <b class="ttl_amount">0$</b> donation.</i> </span> <br>
                            <span style="color: black; font-style: italic;">* You can select multiple donations with a total amount up to $999,999.</span>
                        </div>
                        <div class="gf-bkt-table-footer delete-all-area pull-left">
                            <span class="check main main-mobile active"></span>
                            <a href="javascript:;" uid="" class="delete cartItemRemove"><span class="fa fa-trash"></span> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="button  "  style="color: #fff;background-color: #ea2722 !important " href="{{route('cart.checkout')}}">DONATE TODAY</a>
    </div>

@endsection
@push('js')
    <script>
        var cart_items = [];
        function LoadcartItems(response) {
            $('.ttl_amount').text(response.data.ttl_amount+'$');
            if(response.data.ttl_amount > 0){
                $('.cart-items').html(`<i class="fa fa-shopping-cart"></i> <sup class="badge bg-danger"><small>${response.data.ttl_amount}$</small></sup>`)
            }else{
                $('.cart-items').html(`<i class="fa fa-shopping-cart"></i></span>`)
            }
            $('.cart-body').empty();
            if(response.data.donations.length){
                cart_items = response.data.cart;
                response.data.donations.forEach(donation=>{
                    $('.cart-body').append(`<tr class="cartItemListing">
                                                                <td  class="cartItemSelection">
                                                                    <div class="truncate">${donation.deceased_first_name} ${donation.deceased_last_name}</div>
                                                                </td>
                                                                <td style="text-align: center"  class="success ">
                                                                    Donation is eligible for tax deduction
                                                                </td>
                                                                <td  style="text-align: center" class="editableAmount" id="editableAmount-${donation.uid}">${cart_items[donation.uid]} $</td>
                                                                <td class=" edit-holder" style="min-width: 100px;">
                                                                    <a uid="${donation.uid}" amount="${cart_items[donation.uid]}" action="edit" id="edit-id-${donation.uid}" href="javascript:;"  class="cartItemEdit"> <i class="edit-table fa fa-pencil"></i> </a>&nbsp;
                                                                    <a uid="${donation.uid}" amount="${cart_items[donation.uid]}" id="delete-id-${donation.uid}" href="javascript:;" class="cartItemRemove"> <i class="edit-table fa fa-trash"></i> </a>&nbsp;

                                                                </td>
                                                            </tr>`)
                });
            }
        }

        function loadCart(){
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : `/get-cart`, // the url where we want to POST
                data        : {},
                processData : false,
                contentType : false,
                cache       : false,
                headers     : {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if(response.status == 'success'){
                       LoadcartItems(response);
                        //toaster('Success','Item added to cart.','success');
                    }
                    else{
                        toaster('Error',response.msg,'error');
                    }
                },
                error: function (data) {
                    toaster('Error',data.responseJSON.message,'error');
                }
            })
        }
        $(document).on('click','.cartItemRemove',function () {
            let uid = $(this).attr('uid');
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : `/empty-cart/${uid}`, // the url where we want to POST
                data        : {},
                processData : false,
                contentType : false,
                cache       : false,
                headers     : {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if(response.status == 'success'){
                        LoadcartItems(response);
                        //toaster('Success','Item added to cart.','success');
                    }else{
                        toaster('Error',response.msg,'error');
                    }
                },
                error: function (data) {
                    toaster('Error',data.responseJSON.message,'error');
                }
            })
        });
        loadCart();
        $(document).on('click','.cartItemEdit',function(){

            let uid      = $(this).attr('uid');
            if($(this).attr('action') =='save'){
                let amount = parseInt($(`#input-uid-${uid}`).val());
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
                            LoadcartItems(response);
                        }else{
                            toaster('Error',response.msg,'error');
                        }
                    },
                    error: function (data) {
                        toaster('Error',data.responseJSON.message,'error');
                    }
                })
            }else{

                let c_amount = $(this).attr('amount');
                $(this).attr('action','save');
                $(`#delete-id-${uid}`).hide();
                $(`#editableAmount-${uid}`).html(`<input id="input-uid-${uid}" typ="number" value="${c_amount}">`);
                $(this).html(`<i class="edit-table fa fa-check"></i>`);
            }
        })
    </script>
@endpush
