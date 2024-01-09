@extends('frontend.layout.app')
    @section('title', 'Cart')
        @section('content')


        <!-- NEWSLETTER -->

                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="" style="text-align: center;">
                                <p>Please pay with <strong>PayPal</strong></p>
                                <form action="{{route('payment')}}" method="post">@csrf
                                    <input type="hidden" name="amount" value="{{}}">
                                    <input type="hidden" name="hosted_button_id" value="000000">
                                    <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" border="0" name="submit" alt="">
                                    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            
		<!-- /NEWSLETTER -->


@endsection