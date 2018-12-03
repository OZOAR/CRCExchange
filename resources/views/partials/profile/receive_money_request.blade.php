<div class="row">
    <div class="col-md-12">
        @include('partials.dashboard.messages')
    </div>
</div>

<p>@lang('profile.messages.requests.description')</p>

<form action="{{ route('profile.receive_money.request') }}" method="POST" class="form-horizontal form-label-left">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="btc-address">
            @lang('profile.labels.btc.title')
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" value="{{ Auth::user()->getBtc() }}" id="btc-address" class="form-control" readonly>
        </div>
    </div>

    <div class="form-group{{ $errors->has('request-total') ? ' has-error' : '' }}">
        <label class="control-label col-md-2 col-sm-3 col-xs-12"
               for="request-total">@lang('profile.labels.request_total') (BTC) *</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="number" step="0.0001" name="request-total" value="{{ old('request-total', 0.0001) }}"
                   id="request-total" class="form-control" required>
            @if ($errors->has('request-total'))
                <span class="help-block">
                <strong>{{ $errors->first('request-total') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
            <button type="submit" class="btn btn-success">@lang('common.buttons.request')</button>
        </div>
    </div>
</form>