<div class="navbar nav_title" style="border: 0;">
    <a href="{{ route('dashboard.index') }}" class="site_title">
        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" height="40">
    </a>
</div>

<div class="clearfix"></div>

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        @include('partials.dashboard.sidebar_menu')
    </div>
</div>
<!-- /sidebar menu -->
