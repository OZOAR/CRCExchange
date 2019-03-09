<form action="{{ route('locale.reset') }}">
    <div id="locale-switcher">
        <div>ru</div>
        <div class="material-switch">
            <input id="someSwitchOptionDanger" name="lang" type="checkbox" onchange="this.form.submit()"
                   value="{{ \App\Helpers\Locale::isSelected('ru') ? 'en' : 'ru' }}"
                    {{ \App\Helpers\Locale::isSelected('ru') ? ' ' : ' checked' }} />
            <label for="someSwitchOptionDanger" class="label-default"></label>
        </div>
        <div>en</div>
    </div>
</form>