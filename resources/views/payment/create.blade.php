@extends('admin.index')
@section('title','Patment')
@section('section_title','Patment')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-secondary my-3">
                    @include('admin.error')
                    <div class="card-header">
                        <h3 class="panel-title display-td">Payment Details</h3>
                        <img class="img-responsive float-right" src="{{asset('control')}}/media/img/misc/visa.png">
                    </div>
                    <!-- /.card-header -->
                    <div class='form-row row '>
                        <div class='col-md-12 error form-group d-none'>
                            <div class='alert-danger alert'>Please correct the errors and try
                                again.</div>
                        </div>
                    </div>

                    @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                        @endif
                    <!-- form start -->
                    <form method="POST" role="form" action="{{route('stripe.store')}}" class="require-validation"
                        data-cc-on-file="false" id="payment-form" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                        <div class="card-body">
                            <div class="form-group  required">
                                <label for="exampleInputaddress">Amount</label>
                                <input type="number" name="amount" required 
                                    class="form-control amount" id="exampleInputaddress"
                                    placeholder="Enter Amount By Cent">
                            </div>
                            <div class="form-group  required">
                                <label for="exampleInputaddress">Card Number</label>
                                <input type="text" name="card_number" required minlength="15" maxlength="20" autocomplete='off'
                                    class="form-control card-number" id="exampleInputaddress"
                                    placeholder="Enter Card Number">
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label  class="control-label" for="exampleInputaddress">CVC</label>
                                    <input type="text" name="card_cvc" required minlength="2" maxlength="3" autocomplete='off'
                                        class="form-control card-cvc" id="exampleInputaddress"
                                        placeholder="Enter CVC  ex. 311 ">
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' required name="exp_month" placeholder='MM'
                                        size='2' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' required name="exp_year" placeholder='YYYY'
                                        size='4' type='text'>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Pay Now</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('script')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function () {

        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function (e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;

                
                $errorMessage.addClass('d-none');
                
            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('d-none');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('d-none')
                    .find('.alert')
                    .text(response.error.message);
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
@endsection
