<ul class="nav side-menu">
    <li>
        <a href="{{ route('profile.index') }}">
            <i class="fa fa-home"></i> @lang('profile.sidebar.menu.home')
        </a>
    </li>
    <li>
        <a href="{{ route('profile.transactions.index') }}">
            <i class="fa fa-sellsy"></i> @lang('profile.sidebar.menu.transactions')
        </a>
    </li>
    <li>
        <a href="{{ route('profile.requests.index') }}"> {{-- rm - receive money --}}
            <i class="fa fa-archive"></i> @lang('profile.sidebar.menu.requests')
        </a>
    </li>
</ul>