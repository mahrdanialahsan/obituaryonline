@extends('layouts.public')

@section('content')


    <style>
        .rounded-card--header-solid {
            max-width: 570px;
        }
        .card-header .icons .fa-cc-visa{
            color: #FFB85F;
        }
        .card-header .icons .fa-cc-discover{
            color: #027878;
        }
        .card-header .icons .fa-cc-amex{
            color: #EB4960;
        }
        .card-body label{
            font-size: 14px;
        }
    </style>


    <!-- sidebar-page-container -->
    <section class="sign-up-overview-card-container" style="margin-top: 10%">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="sign-up-overview-card-container" align="center">
                        <div class="rounded-card--header-solid" id="">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-5 col-12 pt-2">
                                            <h6 class="m-0"><strong>Payment Details</strong></h6>
                                        </div>
                                        <div class="col-md-7 col-12 icons" style="text-align: right">
                                            <i class="fa-brands fa-cc-visa fa-2x" aria-hidden="true"></i>
                                            <i class="fa-brands  fa-cc-mastercard fa-2x" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form
                                            role="form"
                                            action="{{ route('stripe.post') }}"
                                            method="post"
                                            class="require-validation"
                                            data-cc-on-file="false"
                                            data-stripe-publishable-key="{{ env('STRIPE_KEY','pk_test_AGasvfU4csIh1Cbhk2TFfLEJ00uLFx1vrg') }}"
                                            id="payment-form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="validationTooltipCardNumber"><strong>CARD NUMBER</strong></label>
                                            <div class="input-group">
                                                <input type="text" min="16" max="16" class="form-control nbrOnly border-right-0" id="card-number" placeholder="Card Number">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text rounded-right" id="">
                                                        <i class="fa fa-credit-card"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputExpirationDate"><strong>EXPIRATION MONTH</strong></label>
                                                    <input type="text" class="form-control nbrOnly"  min="1" max="2"id="card-expiry-month" placeholder="MM ">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputExpirationDate"><strong>EXPIRATION YEAR</strong></label>
                                                    <input type="text" class="form-control nbrOnly" min="4" max="4" id="card-expiry-year" placeholder="YYYY">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputCvcCode"><strong>CVC CODE</strong></label>
                                                    <input type="text" class="form-control nbrOnly" min="3" max="3" id="card-cvc" placeholder="CVC">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                @if (Session::has('success'))
                                                    <div class="alert alert-success text-center">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                        <p>{{ Session::get('success') }}</p>
                                                    </div>
                                                @endif
                                                @if (Session::has('error'))
                                                    <div class="alert alert-danger text-center">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                        <p>{{ Session::get('error') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <button type="submit" class="button btn btn-info w-100 pb-2 pt-2">Pay Now ({{@array_sum(array_values(session()->get('cart_items')))}}$)</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@push('js')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">

        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.jq_msg').empty();
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('#card-number').val(),
                        cvc: $('#card-cvc').val(),
                        exp_month: $('#card-expiry-month').val(),
                        exp_year: $('#card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    // $('.jq_msg').html(`<div class="alert alert-danger text-center">
                    //                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    //                         <p>${response.error.message}</p>
                    //                     </div>`);
                    toaster('Error',response.error.message,'error');
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endpush
