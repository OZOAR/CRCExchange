<form action="{{ route('locale.reset') }}">
    <select name="lang" onchange="this.form.submit()">
        <option value="ru">ru</option>
        <option value="en" {{ Locale::isSelected('en') }}>en</option>
        <option value="kz" {{ Locale::isSelected('kz') }}>kz</option>
    </select>
</form>