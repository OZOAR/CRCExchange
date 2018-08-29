@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Widget</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <img src="/images/image.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">CRCExchange <b>BUY & SELL</b></div>
                                <div class="panel-body" style="font-family: Arial,serif;">
                                    <form action="{{ route('payment.submit') }}" method="post">

                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-md-12">
                                                Course: 1 BTC = {{ $currencies->EUR->BTC }} EUR
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" id="form">
                                                <p>Amount to deposit:</p>
                                                <div class="input-group">
                                                    <input type="number" id="eur-field" class="form-control"
                                                           required="required" name="eur-amount"
                                                           min="10" max="10000" value="10">
                                                    <span class="input-group-addon">EUR</span>
                                                </div>
                                                <p style="margin-bottom: 0">Min 10 EUR</p>
                                                <p>Max 10000 EUR</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Amount you will receive:</p>
                                                <div class="input-group">
                                                    <input id="btc-field" type="number" class="form-control" readonly>
                                                    <span class="input-group-addon">BTC</span>
                                                </div>
                                                <p style="margin-bottom: 0">This is final amount</p>
                                                <p>that already includes 7% comission</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="btc-address">Address</label>
                                                <input type="text" id="btc-address" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-8">
                                                Fee:
                                            </div>
                                            <div class="col-md-4" style="text-align: right">
                                                10%
                                            </div>
                                            <div class="col-md-8">
                                                Total:
                                            </div>
                                            <div class="col-md-4" style="text-align: right">
                                                200 EUR
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center">
                                                <button type="submit" class="btn btn-primary">
                                                    Continue
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron" style="text-align: center; background-color: transparent;">
            <h1>HOW TO START</h1>
            <br>
            <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus
                commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
            <br>
        </div>

        <div class="jumbotron"
             style="text-align: center; background-color: white; overflow: hidden; padding-left: 30px; padding-right: 30px;">
            <h1>ABOUT US</h1>
            <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus
                commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
            <br>
        </div>

        <div class="jumbotron"
             style="text-align: center; background-color: transparent; overflow: hidden; padding-left: 0; padding-right: 0;">
            <div class="col-md-12">
                <h1 style="text-align: center; text-transform: uppercase">Our partners</h1>
            </div>
            <div class="col-md-12">
                <br>
                <br>
                <ul style="list-style: none; text-align: center;padding-left: 0">
                    <li style="display: inline-table">
                        <img style="width: 50%"
                             src="https://orig00.deviantart.net/60fe/f/2011/265/b/3/lsi_logo_icon_256_png_by_mahesh69a-d4an1lt.png"
                             alt=""></li>
                    <li style="display: inline-table">
                        <img style="width: 50%"
                             src="https://orig00.deviantart.net/60fe/f/2011/265/b/3/lsi_logo_icon_256_png_by_mahesh69a-d4an1lt.png"
                             alt=""></li>
                    <li style="display: inline-table">
                        <img style="width: 50%"
                             src="https://orig00.deviantart.net/60fe/f/2011/265/b/3/lsi_logo_icon_256_png_by_mahesh69a-d4an1lt.png"
                             alt=""></li>
                    <li style="display: inline-table">
                        <img style="width: 50%"
                             src="https://orig00.deviantart.net/60fe/f/2011/265/b/3/lsi_logo_icon_256_png_by_mahesh69a-d4an1lt.png"
                             alt=""></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            window.currencies = {
                EUR: {{ $currencies->EUR->BTC }}
            };

            let euros = $('#eur-field').val();
            console.log(currencies.EUR);
            let BTC = (euros / currencies.EUR).toFixed(5);
            $('#btc-field').val(BTC);

            $('#form').on('change', '#eur-field', function () {
                let euros = $(this).val();
                console.log(euros);

                let BTC = (euros / currencies.EUR).toFixed(5);
                $('#btc-field').val(BTC);
                console.log(BTC);
            });
        });
    </script>
@endsection