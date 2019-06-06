<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    @if(Auth::user()->isAdministrator())
                        @include('partials.dashboard.top_links')
                    @else
                        @include('partials.profile.top_links')
                    @endif
                </li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="padding: 8px 8px 0 8px">
                        @include('partials.locale')
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->