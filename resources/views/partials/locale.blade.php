<form action="{{ route('locale.reset') }}">
    <select name="lang" onchange="this.form.submit()">
        <option value="ru">ru</option>
        <option value="en" {{ \App\Helpers\Locale::isSelected('en') }}>en</option>
    </select>
</form>