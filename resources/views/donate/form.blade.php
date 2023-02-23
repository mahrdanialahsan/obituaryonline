@extends('layouts.public')
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{file_exists(storage_path('app/public/site_settings/'.$site->donate_page_cover_image)) ?  url('storage/site_settings/'.$site->donate_page_cover_image): asset('images/12.png')}});">
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

    <style id="charitable-highlight-colour-styles">.campaign-raised .amount,.campaign-figures .amount,.donors-count,.time-left,.charitable-form-field a:not(.button),.charitable-form-fields .charitable-fieldset a:not(.button),.charitable-notice,.charitable-notice .errors a { color:#f89d35; }.campaign-progress-bar .bar,.donate-button,.charitable-donation-form .donation-amount.selected,.charitable-donation-amount-form .donation-amount.selected { background-color:#f89d35; }.charitable-donation-form .donation-amount.selected,.charitable-donation-amount-form .donation-amount.selected,.charitable-notice,.charitable-drag-drop-images li:hover a.remove-image,.supports-drag-drop .charitable-drag-drop-dropzone.drag-over { border-color:#f89d35; }</style>

    <style>
        #enetsqrmodal h2{ font-size: 19px!important; } .creditcard-option { padding: 4px; } button.creditcard-option img { height: 100%; width: auto; } .pad-0-5{ padding: 0px 5px ; } .aui label[for="dobDay"], .aui label[for="dobMonth"] { display: none !important; } div#incorrectRole { padding: 1em; border-radius: 5px; } div#incorrectRole .fa-exclamation { color: #FFFFFF; background-color: #f48291; width: 1.5em; border-radius: 1em; height: 1.5em; background-attachment: fixed; line-height: 1.5em; margin-right: 0.2em; } .creditCardPaymentArea { width: 380px; margin: 0 auto; text-align: initial; display: inline-block; } .cartOptionSection { border: 1px solid #DDD !important; border-radius: 8px !important; border-collapse: separate !important; margin-bottom: 3em !important; } #mailingAddressSection { margin-top: 3em; } .aui .control-group { margin: 0; padding: 0; } .select-control-group.error { border-color: #F16577; } .error.help-block { color: #F16577; } .aui .tab-content { overflow: initial !important; } .aui .pw-vis, .pw-vis { bottom: 7px !important; } .cardTypeImg { height: 50px; width: 50px; border: 1px solid black; display: inline-block; text-align:center; } .cardTypeImg .helper { display: inline-block; height: 100%; vertical-align: middle; margin-left: -0.3em; } .card-number-expiry { display: inline-block; /*height: auto;*/ position: relative; padding-left: 5px; transform: translateY(10%); } label.paymentTokens { line-height: 32px; } .aui .row-fluid [class*="span"] { margin-left: 0; } #userDetails .sod_select { width: 100%; text-transform: none; }

        #userDetails input, #userDetails .sod_select { text-align: center; display:inline; } a.lnkFaq { color:#17A4E1 !important; text-decoration: underline !important; } .left-col~.right-col { margin-bottom: 1em; } .left-col { text-align: right; padding-right: 1em; line-height: 33px; /*line height of textbox is also specified as 33px*/ } .right-col { text-align: center; } .postallabel { line-height: 70px; } .postalcontainer { line-height: 49px; } .postalcontainer { margin-left:-180px; width: 100%; } .postalcontainer>div { margin-left:180px; line-height: 58px; } .postalcontainer~.btn{ width: 150px; margin: 0; } input[type=checkbox]~label { display: inline; } #user_sal, #parishCode { text-align-last: center; } @media (max-width: 768px) { .left-col { text-align: center; } #user_sal { width: 15em; } } span.check.expired { background-color: #eeeeee !important; } .expiredCampaign { font-size: .875em; font-style: italic; } #donation-details .default, #donation-details .age18, #donation-details .age13 { display:none; } #donation-details .default.active, #donation-details .age18.active, #donation-details .age13.active { display:block; } .radio-pay-type, .radio-pay-token { margin-left : 50px; } .radio-pay-type.active, .radio-pay-token.active { display: block !important; } .creditCardPaymentArea { background-color: #FFF; } .radio-pay-type .small { border-bottom: 0px !important; } .choice-buttons button.no.active { background-color: #F16577 !important; color: #FFF !important; } .choice-buttons button.yes.active { background: #43AD49 !important; color: #FFF !important; } .user-img { width: 40px; height: 40px; } .warning { background: transparent !important; } .active .warning { background-color: rgb(241, 242, 242) !important; } .cartItemSelection div.lbl-warning{ color: #f5866c !important; } #gf-bkt-table { margin-bottom: 20px; } .gf-bkt-table-footer { margin-bottom: 0; } @media (min-width: 56.25rem) { #gf-bkt-table { margin-bottom: 0; } .gf-bkt-table-footer { margin-bottom: 20px; } } #donation-details a { color: #ea2722!important; } #donation-details li.active a { color: white!important; } .m-bot20{ margin-bottom:20px !important; } .aui input[type="radio"], .aui input[type="checkbox"] { margin: 0px!important; } </style>


    <div class="section-page pad-navbar" id="donation-details">
        <div class="boxed-wrapper gf" id="gf-bkt-wrapper">

            <div class="row-fluid">
                <div class="span12 text-center" id="">
                    <div class="section-header">
                        <div class="span12 text-center">
                            <h4 class="m-0">Here's what is in your</h4>
                            <h3 class="m-top0 m-bot30">Giving Cart</h3>
                            <div class="text-center">
                                <div class="text-center" style="padding-bottom:20px"> <div class="user-img mt-16">
                                        <img class="profile-pic" src="/images/ph-pink.jpg"></div>
                                    <p class="small mt-16 text-center">You are making a donation as &nbsp;
                                        <select name="user-role-select" id="user-role-select" class="select select2 small roleSwitch">
                                            <option value="" data-image-path="/images/ph-pink.jpg" data-role-id="" data-group-role-id="INDIVIDUAL" data-identity-number="" data-name="" data-salutation="" data-email="" data-poscode="" data-block="" data-address1="" data-address2="" data-unit="" data-group-role-desc="INDIVIDUAL" data-org-type="" selected>Individual</option> </select> </p>
                                </div>
                            </div> </div>
                    </div>

                    <div class="p-section clear-both giving-cart-content" >

                        <table class="table gf-bkt" id="gf-bkt-table">
                            <thead>
                            <tr>
                                <td class="check-col">
                                    <div class="hold-col"><span class="add-txt main">All</span></div>
                                    <input name="saveToken" value="" id="saveToken" class="form-control m-top0" type="checkbox">
                                </td>
                                <td colspan="2">Organisation or <br class="hidden-phone"> Campaign</td>
                                <td class="hidden-phone">Eligibility for <br> Tax Deduction</td>
                                <td>Donation <br class="hidden-phone"> Amount $</td>
                                <td class="hidden-phone"></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="cartItemListing">
                                <td class="check-col cartItemSelection" rev-org="3103596" tabindex="1">
                                    <input name="saveToken" value="" id="saveToken" class="form-control m-top0" type="checkbox">
                                </td>
                                <td colspan="2" class="cartItemSelection" tabindex="1">
                                    <div class="truncate">Help 2EC support CARE Singapore</div>
                                    <span class="small success visible-phone tax-statement">Donation is eligible for tax deduction</span></td>
                                <td class="success hidden-phone cartItemSelection" tabindex="1"><i class="fa fa-check-circle-o"></i>Donation is eligible for tax deduction</td>
                                <td data-function="editable" don-id="86104698" rev-id="85849237" rev-type="CAMPAIGN" class="editableAmount" tabindex="1">  <div style="display: -webkit-inline-box;"> 100 &nbsp; </div>
                                    <div class="phone-box">
                                        <div class="edit-box" style="display: none;">
                                            <i class="edit-table fa fa-pencil"></i>
                                            <i class="delete-row fa fa-trash"></i>
                                        </div> <div class="edit-pencil-area">
                                            <span class="fa fa-pencil"></span> </div> </div> </td>
                                <td class="hidden-phone edit-holder" tabindex="1">
                                    <div class="edit-box" >
                                        <i class="edit-table fa fa-pencil"></i>
                                        <i class="delete-row fa fa-trash"></i>
                                    </div>
                                    <div class="edit-pencil-area">
                                        <span class="fa fa-pencil"></span> </div>
                                </td> </tr>

                            <tr class="cartItemListingBreakpoint summary hide"></tr>
                            <tr class="visible-phone summary">
                                <td colspan="4"><a href="#"><i class="fa fa-plus-circle"></i> Add another donation</a></td>
                            </tr>
                            <tr class="summary"> <td class="check-col"></td>
                                <td colspan="2" class="hidden-phone"><a href="#"><i class="fa fa-plus-circle"></i> Add another donation</a></td>
                                <td><h4>TOTAL</h4></td>
                                <td colspan="2" class="cartDonationTotalAmount"> <h4 class="td-large-sm">0</h4> </td> </tr>
                            </tbody>
                        </table>

                        <div class="gf-bkt-table-footer text-right pull-right">
                            <span class="text-error message only1"><i> * You have selected <b>0</b> donation.</i> </span>
                            <span class="text-error message morethan1 "><i> * You have selected <b>0</b> donations.</i> </span> <br>
                            <span style="color: black; font-style: italic;">* You can select multiple donations with a total amount up to $999,999.</span>
                        </div>



                        <div class="gf-bkt-table-footer delete-all-area pull-left">
                            <span class="check main main-mobile active"></span>
                            <a href="javascript:;" class="delete cartItemRemove">
                                <span class="fa fa-trash"></span> Delete </a> </div> </div> </div> </div> </div>

        <div class="boxed-wrapper gf cartOptionSection giving-cart-content" id="paymentOptionsSection">
            <div class="row-fluid">
                <div class="span12 text-center">
                    <h4 class="mt-24 m-bot20">I'd like to pay by</h4>
                    <div class="panel-heading text-center">

                        <ul class="nav nav-pills">
                            <li class=""><a href="#tabSavedCards" data-toggle="tab">Saved Cards</a></li>
                            <li class="active"><a href="#tabNewCard" data-toggle="tab">New Payment Methods</a></li> </ul> </div>
                    <div class="panel-body"> <div class="tab-content">
                            <div class="tab-pane " id="tabSavedCards">
                                <div>Select card</div>
                                <h6 class="m-bot20">You currently have no saved cards.</h6> </div>
                            <div class="tab-pane active" id="tabNewCard">
                                <div>Select payment type</div>

                                <div class="form-group payType"> <div class="btn-toolbar">
                                        <div class="btn-group"> <button type="button" class="btn btn-small creditcard-option ccgroup" style="width:200px" data-value="cc-group">
                                                <img src="/images/cc-group-logo.png"></button><label class="or">or</label>

                                            <button type="button" class="btn btn-small creditcard-option enets" style="width:230px" data-value="enets">

                                                <img src="/images/NETS-QR-mark.png"></button> <label class="or">or</label>

                                            <button type="button" class="btn btn-small creditcard-option ewallet" style="width:160px" data-value="ewallet">

                                                <img src="/images/grabpay.png"></button> </div> </div> </div>
                                <ul class="m-left0 m-top10 unstyled ">
                                    <div class="">&nbsp;</div>
                                    <li id="saveTokenliElem" class="text-center m-top20 pad-0-5">
                                        <input name="saveToken" value="" id="saveToken" class="form-control m-top0" type="checkbox" style="display:inline;">
                                        <label style="font-size:16px; display:inline;">
                                            Save this card. Card details to be entered on the next page.</label>
                                    </li>
                                    <li id="enetsQrInfoliElem" class="text-center m-top20 pad-0-5" style="display:none;">
                                        <label style="font-size:16px">
<span class="desktopNetsQr">Scan and donate via QR Code.
<a class="lnkFaq" target="_blank" href="#">Find out how</a>.
</span>
                                            <span class="mobileNetsQr">Donate via NETSPay app installed on your device.
<a class="lnkFaq" target="_blank" href="#">Find out how</a>.
</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="boxed-wrapper gf cartOptionSection giving-cart-content"  id="taxDeductionSection">
            <div class="row-fluid">
                <div class="span12 text-center">
                    <h4 class="mt-24 m-bot20">Tax Deductions</h4>
                    <div class="panel-heading text-center">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#tabClaimTaxDeduction" data-toggle="tab">Claim Tax Deduction</a></li>
                            <li class=""><a href="#tabSkipTaxDeduction" data-toggle="tab">Skip Tax Deduction</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabClaimTaxDeduction">
                                <div class="row-fluid">
                                    <h6 class="span12" style="margin-bottom: 50px;">
                                        Please provide the following details to the charity for your tax deduction claim.
                                        <br/> <a class="lnkFaq" target="_blank" href="#">Learn more about claiming Tax Deduction.</a></h6> </div> </div>
                            <div class="tab-pane " id="tabSkipTaxDeduction"> <div class="row-fluid m-bot50">
                                    <h6 class="span12" style="margin: 0.82rem 0 0.656rem 0;">Make this an anonymous donation to the charity?</h6>
                                    <div class="cleafix m-bot20">
                                        <input type="checkbox" id="switchAnonymous" class="cleafix">
                                    </div>
                                </div>
                            </div>



                            <div class="row-fluid" id="userDetails">
                                <form id="frmUserDetails">
                                    <div class="clearfix">
                                        <div class="clearfix control-group salutation-section">
                                            <div class="span3 left-col">Salutation</div>
                                            <div class="span9 right-col pad-0-5">
                                                <div class="controls">
                                                    <select
                                                            name="#"
                                                            class="select-giving1 span12 text-center"
                                                            data-custom-id="selSalutation" id="user_sal">
                                                        <option value="">Please Select</option>

                                                        <option value="Mr">Mr</option>

                                                        <option value="Ms">Ms</option>

                                                        <option value="Mrs">Mrs</option>

                                                        <option value="Miss">Miss</option>

                                                        <option value="Mdm">Mdm</option>

                                                        <option value="Dr">Dr</option>

                                                    </select>
                                                    <label for="user_sal" class="error help-block"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group" id="userNameSubsection">
                                            <div class="span3 left-col">Name as per NRIC</div>
                                            <div class="span9 right-col pad-0-5">
                                                <input type="text" name="#" id="userName"
                                                       placeholder="Enter Name" class="form-control field-required" value=""
                                                ></input>
                                                <label for="userName" class="error help-block"></label>
                                            </div>
                                        </div>
                                        <div class="control-group" id="userNRICSubsection">
                                            <div class="span3 left-col">NRIC/FIN</div>
                                            <div>
                                            </div>
                                            <div class="span9 right-col pad-0-5">
                                                <input type="text" name="#" id="userNRIC"
                                                       placeholder="Enter NRIC" class="form-control field-required" value=""
                                                ></input>
                                                <label for="userNRIC" class="error help-block"></label>
                                            </div>
                                        </div>
                                        <div class="span3 left-col">Contact Email</div>
                                        <div class="span9 right-col pad-0-5">
                                            <input type="text" name="userEmail" id="userEmail" placeholder="" class="form-control field-required" type="text" value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="span3 left-col">&nbsp;</div>

                                        <div class="span9 right-col text-left shareMailingAddress pad-0-5">

                                            <input type="checkbox" id="shareMailingAddress" class="form-control"/>
                                            <label style="font-size:16px">Share my Singapore mailing address with the charity</label>
                                </form>

                            </div> </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
