<div id="locale-switcher">
    <div>
        ru
    </div>
    <div class="material-switch">
        <input id="someSwitchOptionDanger" name="someSwitchOption001" type="checkbox"/>
        <label for="someSwitchOptionDanger" class="label-primary"></label>
    </div>
    <div>
        en
    </div>
</div>

{{--<form action="{{ route('locale.reset') }}">--}}
    {{--<select name="lang" id="language-switcher" class="form-control" onchange="this.form.submit()">--}}
        {{--<option value="ru" {{ \App\Helpers\Locale::isSelected('ru') }}>ru</option>--}}
        {{--<option value="en" {{ \App\Helpers\Locale::isSelected('en') }}>en</option>--}}
    {{--</select>--}}
{{--</form>--}}
