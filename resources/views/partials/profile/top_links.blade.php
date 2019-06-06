<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
   aria-expanded="false" style="padding-top: 12px; padding-bottom:16px">
    {{ Auth::user()->getName() }}
    <span class="fa fa-angle-down"></span>
</a>
<ul class="dropdown-menu dropdown-usermenu pull-right">
    <li><a href="{{ route('index') }}">@lang('profile.actions.homepage')</a></li>
    <li><a href="{{ route('profile.index') }}">@lang('profile.actions.profile')</a></li>
    <li><a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out pull-right"></i> @lang('profile.actions.logout')
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</ul>