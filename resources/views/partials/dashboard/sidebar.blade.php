<div class="navbar nav_title" style="border: 0;">
    <a href="{{ route('dashboard.index') }}" class="site_title">
        <i class="fa fa-bitcoin"></i> <span>@lang('dashboard.sidebar.title')</span>
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
