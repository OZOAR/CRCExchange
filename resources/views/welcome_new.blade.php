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
        <div class="container">
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
        <h3>Buy Bitcoin with credit card</h3>
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
            let BTC = (euros / currencies.EUR).toFixed(5);
            $('#btc-field').val(BTC);

            $('#payment-form').on('change', '#eur-field', function () {
                let euros = $(this).val();
                console.log(euros);

                let BTC = (euros / currencies.EUR).toFixed(5);
                $('#btc-field').val(BTC);
                console.log(BTC);
            });

            let lang = $('#language-switcher option:selected').val();

            if (lang === 'ru') {
                $('#payment-process h1').css('font-size', '28px')
            }
        });
    </script>
@endsection