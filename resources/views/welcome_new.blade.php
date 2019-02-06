@extends('layouts.app_new')

@section('content')
    <section id="payment-process">
        <div class="container">
            <div class="col-sm-6">
                <h1 style="padding-top:60px">@lang('homepage.payment.title')</h1>
                <div id="accepted-cards">
                    <span class="visa"></span>
                    <span class="text">@lang('homepage.payment.description')</span>
                </div>
            </div>
            <div class="col-sm-6 payment">
                <div class="payment-form-head">
                    <span class="text">@lang('homepage.payment.form.title')</span>
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
                                <small>@lang('homepage.payment.form.min_transaction')</small>
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
                               placeholder="@lang('homepage.payment.form.bitcoin_field_placeholder')"
                               required="required" value="{{ old('btc-address') }}">
                        @if ($errors->has('btc-address'))
                            <span class="help-block">
                            <small><strong>{{ $errors->first('btc-address') }}</strong></small>
                        </span>
                        @endif
                        <small>@lang('homepage.payment.form.bitcoin_field_description')</small>
                    </div>

                    <div class="col-md-12" style="text-align: center">
                        <button type="submit" class="btn btn-primary">
                            @lang('common.buttons.continue') &nbsp; &#8594;
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
                        <span class="text">
                  We offer lightning-fast transactions taking just 10-30 minutes in regular circumstances
                </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="process-item">
                        <span class="icon icon-support"></span>
                        <span class="highlights">INSTANT SUPPORT</span>
                        <span class="text">
                  Feel free to contact <a href="mailto:support@crcexchange.com"
                                          class="link">support@crcexchange.com</a> should you have questions
                </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="transaction-limits">
        <h3>Transaction limits</h3>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="transaction-limit-item">
                        <div class="highlights">TRANSACTION</div>
                        <div class="text">
                            from <b>€30</b> to <b>€10000</b>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="transaction-limit-item">
                        <div class="highlights">DAILY LIMIT</div>
                        <div class="text">
                            up to <b>€20000</b>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="transaction-limit-item">
                        <div class="highlights">MONTHLY LIMIT</div>
                        <div class="text">
                            up to <b>€50000</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="buy-now">
        <h3>Buy Bitcoin with credit card </h3>
        <p>In a few easy steps</p>
        <a class="btn btn-primary btn-lg" href="#">@lang('common.buttons.buy_now')</a>
    </section>
    <section id="reviews-list">
        <h3>@lang('homepage.reviews.title')</h3>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="review-item">
                        <span class="photo"></span>
                        <span class="name">@lang('homepage.reviews.list.kirillstoks.author')</span>
                        <p class="review">@lang('homepage.reviews.list.kirillstoks.text')</p>
                        <p class="date">@lang('homepage.reviews.list.kirillstoks.date')</p>
                    </div>
                    <div class="review-item">
                        <span class="photo"></span>
                        <span class="name">@lang('homepage.reviews.list.jey_moon.author')</span>
                        <p class="review">@lang('homepage.reviews.list.jey_moon.text')</p>
                        <p class="date">@lang('homepage.reviews.list.jey_moon.date')</p>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="review-item">
                        <span class="photo"></span>
                        <span class="name">@lang('homepage.reviews.list.miner_anarchist.author')</span>
                        <p class="review">@lang('homepage.reviews.list.miner_anarchist.text')</p>
                        <p class="date">@lang('homepage.reviews.list.miner_anarchist.date')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
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