@extends('layouts.app_new')

@section('content')
    <section id="payment-process">
        <div class="container">
            <div class="col-sm-6">
                <div id="logo">
                    <a href="/">CRCExchange{{--<img src="/images/" alt="Logo"/>--}}</a>
                </div>
                <h1>Buy Bitcoin<br/>with credit card</h1>
                <div id="accepted-cards">
                    <span class="visa"></span>
                    <span class="text">accepted here</span>
                </div>
            </div>
            <div class="col-sm-6 payment">
                <div class="payment-form-head">
                    <span class="text">CRCExchange <b>BUY & SELL</b></span>
                </div>
                <form id="payment-form" action="{{ _route('payment.submit', [], false) }}" method="post">
                    {{ csrf_field() }}

                    @if(Request::has('ref'))
                        <input type="hidden" name="referral-id" value="{{ Request::query('ref') }}">
                    @endif

                    @include('partials.dashboard.messages')

                    @if ($errors->has('referral-id'))
                        <ul class="alert alert-danger">
                            {{ $errors->first('referral-id') }}
                        </ul>
                    @endif
                    <div class="col-sm-12 input-row">
                        <div class="row">
                            <div class="col-sm-6 {{ $errors->has('eur-amount') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <input type="number" id="eur-field" class="form-control"
                                           required="required" name="eur-amount"
                                           min="30" max="10000" value="{{ old('eur-amount', 30) }}">
                                    <span class="input-group-addon">EUR</span>
                                </div>
                                @if ($errors->has('eur-amount'))
                                    <span class="help-block">
                                        <small><strong>{{ $errors->first('eur-amount') }}</strong></small>
                                    </span>
                                @endif
                                <small>Minimal transaction amount <b>30 EUR</b>.</small>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input id="btc-field" type="number" class="form-control" readonly>
                                    <span class="input-group-addon">BTC</span>
                                </div>
                                <small>1 BTC = {{ $currencies->EUR->BTC }} EUR</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 input-row{{ $errors->has('btc-address') ? ' has-error' : '' }}">
                        <input type="text" id="btc-address" name="btc-address" class="form-control"
                               placeholder="Bitcoin address" required="required"
                               value="{{ old('btc-address') }}">
                        @if ($errors->has('btc-address'))
                            <span class="help-block">
                            <small><strong>{{ $errors->first('btc-address') }}</strong></small>
                        </span>
                        @endif
                        <small>BTC address must be <b>yours</b> and <b>under your full control</b>.</small>
                    </div>

                    <div class="col-md-12" style="text-align: center">
                        <button type="submit" class="btn btn-success">
                            Continue &nbsp; &#8594;
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </section>
    <section id="process-info">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="process-item">
                        <span class="icon icon-fees"></span>
                        <span class="highlights">REASONABLE FEES</span>
                        <br>
                        <span class="text">
                  All fees below are already included in the current exchange rate<br>
                  - CRCExchange fee 2% <br>
                  - Processing fee 10%
                </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="process-item">
                        <span class="icon icon-processing"></span>
                        <span class="highlights">EASY VERIFICATION</span>
                        <br>
                        <span class="text">
                  Payment process is pretty simple and takes just a few steps. No registration is needed.
                </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="process-item">
                        <span class="icon icon-time"></span>
                        <span class="highlights">QUICK TRANSACTIONS</span>
                        <br>
                        <span class="text">
                  We offer lightning-fast transactions taking just 10-30 minutes in regular circumstances
                </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="process-item">
                        <span class="icon icon-support"></span>
                        <span class="highlights">INSTANT SUPPORT</span>
                        <br>
                        <span class="text">
                  Feel free to contact <a href="mailto:support@crcexchange.com"
                                          class="link">support@crcexchange.com</a> should you have questions
                </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--<section id="reviews-list">
        <h3>Trusted by 2 million users worldwide</h3>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="review-item">
                        <a target="_blank" href="#">
                            <span class="photo"></span>
                            <span class="name">John Doe</span>
                            <p class="review">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </a>
                        <p class="date">February 1, 2018</p>
                    </div>
                    <div class="review-item">
                        <a target="_blank" href="#">
                            <span class="photo"></span>
                            <span class="name">John Doe</span>
                            <p class="review">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book. It
                                has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged.</p>
                        </a>
                        <p class="date">February 2, 2018</p>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="review-item">
                        <a target="_blank" href="#">
                            <span class="photo"></span>
                            <span class="name">John Doe</span>
                            <p class="review">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </a>
                        <p class="date">January 1, 2018</p>
                    </div>
                    <div class="review-item">
                        <a target="_blank" href="#">
                            <span class="photo"></span>
                            <span class="name">John Doe</span>
                            <p class="review">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </a>
                        <p class="date">January 2, 2018</p>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <section id="buy-now">
        <h3>Buy Bitcoin with credit card </h3>
        <p>In a few easy steps</p>
        <a class="btn btn-primary btn-lg" href="#">Buy now!</a>
    </section>
    {{--<section id="press">
        <h3>Press about us</h3>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 news-item">
                    <div class="news-item clearfix">
                        <a href="/">
                            CRCExchange Partners with Coinomi Wallet
                        </a>
                        <hr>
                        <span class="date">September 26, 2017</span>
                    </div>
                </div>
                <div class="col-sm-3 news-item">
                    <div class="news-item clearfix">
                        <a href="/">
                            CRCExchange, HitBTC, Bitstamp, BitGo con SegWit
                        </a>
                        <hr>
                        <span class="date">September 29, 2017</span>
                    </div>
                </div>
                <div class="col-sm-3 news-item">
                    <div class="news-item clearfix">
                        <a href="/">
                            Mycelium Wallet Partners with CRCExchange
                        </a>
                        <hr>
                        <span class="date">January 28, 2018</span>
                    </div>
                </div>
                <div class="col-sm-3 news-item">
                    <div class="news-item clearfix">
                        <a href="/">
                            CRCExchange Partners With Binance
                        </a>
                        <hr>
                        <span class="date">January 27, 2018</span>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
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

            $('#payment-form').on('change', '#eur-field', function () {
                let euros = $(this).val();
                console.log(euros);

                let BTC = (euros / currencies.EUR).toFixed(5);
                $('#btc-field').val(BTC);
                console.log(BTC);
            });
        });
    </script>
@endsection