@extends('layouts.app_new')

@section('content')

    <section id="payment-process">
        <div class="container">
            <div class="hidden-xs col-sm-6">
                <h1 style="padding-top:60px">@lang('homepage.payment.title')<img src="/images/pay.png"
                                                                                 class="pay-icons"></h1>
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
                                    <input type="text" id="eur-field" class="form-control"
                                           required="required" name="eur-amount"
                                           min="30" max="10000" value="{{ old('eur-amount', 30) }}">
                                    <div class="table-cell input-group-addon">
                                        <select class="" id="curr-select" name="currency">
                                            <option selected>EUR</option>
                                            <option {{(old('currency') == 'USD') ? 'selected' : '' }}>USD</option>
                                            <option {{( old('currency') == 'RUB') ? 'selected' : '' }}>RUB</option>
                                        </select>
                                    </div>
                                </div>
                                @if ($errors->has('eur-amount'))
                                    <span class="help-block">
                                        <small><strong>{{ $errors->first('eur-amount') }}</strong></small>
                                    </span>
                                @endif
                                <small>@lang('homepage.payment.form.min_transaction')<span id="min-amount">30 EUR.</span></small>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input id="btc-field" type="text" class="form-control">
                                    <div class="table-cell input-group-addon">
                                        <select class="" id="crypto-select" name="crypt">
                                            <option selected>BTC</option>
                                            <option {{( old('crypt') == 'ETH') ? 'selected' : '' }}>ETH</option>
                                            <option {{( old('crypt') == 'BCH') ? 'selected' : '' }}>BCH</option>
                                            <option {{( old('crypt') == 'LTC') ? 'selected' : '' }}>LTC</option>
                                            <option {{( old('crypt') == 'EOS') ? 'selected' : '' }}>EOS</option>
                                            <option {{( old('crypt') == 'DASH') ? 'selected' : '' }}>DASH</option>
                                            <option {{( old('crypt') == 'XRP') ? 'selected' : '' }}>XRP</option>
                                        </select>
                                    </div>
                                </div>
                                <small id="current-curse">Идет обновление курса...</small>
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
                    <div class="col-md-12 input-row">
                        <input type="text" id="email-address" name="email-address" class="form-control"
                               placeholder="@lang('homepage.payment.form.email_field_placeholder')"
                               required="required" value="">
                        {{-- @if ($errors->has('btc-address'))
                            <span class="help-block">
                            <small><strong>{{ $errors->first('btc-address') }}</strong></small>
                        </span>
                        @endif --}}
                        <small>@lang('homepage.payment.form.email_field_description')</small>
                    </div>

                    <div class="col-md-12" style="text-align: center">
                        <button type="submit" class="btn btn-primary">
                            @lang('common.buttons.continue') &nbsp; &#8594;
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>

            <div class="visible-xs-block col-sm-6">
                <h1 style="padding-top:60px">@lang('homepage.payment.title')<img src="/images/pay.png"
                                                                                 class="pay-icons"></h1>
            </div>
        </div>
    </section>
    <section id="process-info">
        <h2 class="processes-title">@lang('homepage.processes.title')</h2>
        <div class="container">
            @foreach($processes->chunk(2) as $processChunk)
                <div class="row">
                    @foreach($processChunk as $process)
                        <div class="col-md-6">
                            <div class="process-item">
                                <div class="process-item-image-wrapper">
                                    <span class="icon {{ $process['icon-class'] }}"></span>
                                </div>
                                <span class="highlights">{{ $process['title'] }}</span>
                                <span class="text">{!! $process['text'] !!}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
    <section id="transaction-limits">
        <h3>@lang('homepage.limits.title')</h3>
        <div class="container" style="padding: 25px 0">
            <div class="row">
                @foreach($limits as $limit)
                    <div class="col-md-4">
                        <div class="transaction-limit-item">
                            <div class="highlights">{{ $limit['title'] }}</div>
                            <div class="text">{!! $limit['text'] !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="buy-now">
        <div class="col-md-12">
            <h3>@lang('homepage.buy_now.title')</h3>
            <p>@lang('homepage.buy_now.text')</p>
            <a href="{{ url('/register') }}" id="become-affiliate-link" class="btn btn-primary btn-lg">
                @lang('common.buttons.become_affiliate')
            </a>
            {{--<a href="mailto:support@exrate.net">@lang('homepage.buy_now.contacts') support@exrate.net</a>--}}
        </div>
    </section>
    <section id="reviews-list">
        <h3>@lang('homepage.reviews.title')</h3>
        <div class="container">
            <div class="owl-carousel owl-theme">
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
                <div class="review-item">
                    <span class="photo"></span>
                    <span class="name">@lang('homepage.reviews.list.miner_anarchist.author')</span>
                    <p class="review">@lang('homepage.reviews.list.miner_anarchist.text')</p>
                    <p class="date">@lang('homepage.reviews.list.miner_anarchist.date')</p>
                </div>
                <div class="review-item">
                    <span class="photo"></span>
                    <span class="name">@lang('homepage.reviews.list.jennymitchell.author')</span>
                    <p class="review">@lang('homepage.reviews.list.jennymitchell.text')</p>
                    <p class="date">@lang('homepage.reviews.list.jennymitchell.date')</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        .table-cell {
            display: table-cell;
            padding-top: 0;
            vertical-align: middle;
        }

        .input-group-addon select {
            /* width: 100%; */
            /* height: 100%; */
            display: block;
            /* padding: 0; */
            padding: 7px;
            border: none;
            background: url('/images/dropdown.svg') right 10px top 12px no-repeat, #eeeeee;
            min-width: 75px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        *:focus, *:target {
            outline: none;
        }

        .input-group-addon {
            padding: 0;
        }

        #buy-now a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            /*display: block;*/
            margin-top: 55px;
            font-weight: bold;
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#payment-form input').attr('disabled', true);
        $('#payment-form select').attr('disabled', true);

        function calcCurse(update = 'btc') {
            let currency = $('#curr-select').val();
            let crypto = $('#crypto-select').val();
            let euros = $('#eur-field').val();
            let btc = $('#btc-field').val();

            if (update == 'btc') {
                let BTC = (euros / currencies[currency][crypto]).toFixed(5);
                $('#btc-field').val(BTC);
            } else {
                let euros = (currencies[currency][crypto] * btc).toFixed(5);
                $('#eur-field').val(Math.ceil(euros));
            }
        }

        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                items: 2,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                }
            });

            $.ajax({
                url: '/currencies',
                dataType: 'json',
                success: function (response) {
                    window.currencies = response.currencies;
                    console.log(currencies);

                    let euros = $('#eur-field').val();
                    let BTC = (euros / currencies['EUR']['BTC']).toFixed(5);

                    window.minAmount = {
                        'EUR': '30 EUR.',
                        'USD': '30 USD.',
                        'RUB': '2000 RUB.'
                    };
                    $('#btc-field').val(BTC);
                    $('#payment-form').on('change', '#curr-select', function () {
                        let crypto = $('#crypto-select').val(),
                            currency = $(this).val();
                        $('#current-curse').text('1 ' + crypto + ' = ' + currencies[currency][crypto].toFixed(5) + ' ' + currency);
                        $('#min-amount').text(minAmount[currency]);
                        calcCurse('euro');
                    });
                    $('#payment-form').on('change', '#btc-field', function () {
                        calcCurse('euro');
                    });

                    $('#payment-form').on('change', '#crypto-select', function () {
                        let crypto = $(this).val(),
                            currency = $('#curr-select').val();
                        $('#current-curse').text('1 ' + crypto + ' = ' + currencies[currency][crypto].toFixed(5) + ' ' + currency);
                        calcCurse('btc');
                    });

                    $('#payment-form').on('change', '#eur-field', function () {
                        let money = $(this).val(),
                            currency = $('#curr-select').val(),
                            crypto = $('#crypto-select').val();
                        console.log(money);

                        let BTC = (money / currencies[currency][crypto]).toFixed(5);
                        $('#btc-field').val(BTC);
                        console.log(BTC);
                    });

                    $('#payment-form input').attr('disabled', false);
                    $('#payment-form select').attr('disabled', false);

                    let _crypto = $('#crypto-select').val();
                    let _curr = $('#curr-select').val();

                    $('#current-curse').text('1 ' + _crypto + ' = ' + currencies[_curr][_crypto].toFixed(5) + ' ' + _curr);
                },
                error: function (error) {
                    console.log(error);
                    $('#current-curse').text('Произошла ошибка загрузки курсов.');
                }
            });

            let checked = $('#locale-switcher input').prop('checked');

            if (!checked) {
                $('#payment-process h1').css('font-size', '36px')
            }
        });
    </script>
@endsection
