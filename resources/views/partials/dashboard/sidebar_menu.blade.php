<ul class="nav side-menu">
    <li>
        <a href="{{ route('dashboard.index') }}">
            <i class="fa fa-home"></i> @lang('dashboard.sidebar.menu.home')
        </a>
    </li>
    <li>
        <a href="{{ route('dashboard.transactions.index') }}">
            <i class="fa fa-sellsy"></i> @lang('dashboard.sidebar.menu.transactions')
        </a>
    </li>
    <li>
        <a href="{{ route('dashboard.requests.index') }}"> {{-- rm - receive money --}}
            <i class="fa fa-archive"></i> @lang('dashboard.sidebar.menu.requests')
        </a>
    </li>
</ul>