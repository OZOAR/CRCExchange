<div class="row">
    <div class="col-md-12">
        @include('partials.dashboard.messages')
    </div>
</div>

<form action="{{ route('profile.btc.update') }}" method="POST" class="form-horizontal form-label-left">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="balance">
            @lang('profile.labels.balance')
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" value="{{ Auth::user()->getBalance() . ' BTC'}}"
                   id="balance" class="form-control" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="percentage">
            @lang('profile.labels.percentage.title')
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" value="{{ round(Auth::user()->getPercentage(), 2) . '%' }}"
                   id="percentage" class="form-control" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="referral">
            @lang('profile.labels.referral.title')
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" value="{{ Auth::user()->getReferralLink() }}"
                   id="referral" class="form-control" readonly>
        </div>
    </div>

    <div class="form-group{{ $errors->has('btc-address') ? ' has-error' : '' }}">
        <label class="control-label col-md-2 col-sm-3 col-xs-12"
               for="btc-address">@lang('profile.labels.btc.title')</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="btc-address" value="{{ old('btc-address', Auth::user()->getBtc()) }}"
                   id="btc-address" class="form-control">
            @if ($errors->has('btc-address'))
                <span class="help-block">
                <strong>{{ $errors->first('btc-address') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
            <button type="submit" class="btn btn-success">@lang('common.buttons.update')</button>
        </div>
    </div>
</form>