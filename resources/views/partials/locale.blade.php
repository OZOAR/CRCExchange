<form action="{{ route('locale.reset') }}">
    <select name="lang" id="language-switcher" class="form-control" onchange="this.form.submit()">
        <option value="ru" {{ \App\Helpers\Locale::isSelected('ru') }}>ru</option>
        <option value="en" {{ \App\Helpers\Locale::isSelected('en') }}>en</option>
    </select>
</form>