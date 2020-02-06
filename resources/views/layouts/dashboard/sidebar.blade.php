@guest
@else
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="{{ route('home') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>{{ __('Candle Business') }}</span>
                        </a>
                        <ul class="collapse">
                          <li><a href="{{ route('businessnews.create') }}">Add New</a></li>
                          <li><a href="{{ route('businessnews.index') }}">All Business News</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>{{ __('Candle Sport') }}</span>
                        </a>
                        <ul class="collapse">
                          <li><a href="{{ route('sportnews.create') }}">Add New</a></li>
                          <li><a href="{{ route('sportnews.index') }}">All Sports News</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>{{ __('Candle Weather - Status') }}</span>
                        </a>
                        <ul class="collapse">
                          <li><a href="{{ route('weather.create') }}">Add New</a></li>
                          <li><a href="{{ route('weather.index') }}">All Status</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>{{ __('Candle Freebies - Airtime') }}</span>
                        </a>
                        <ul class="collapse">
                          <li><a href="{{ route('pins.create') }}">Add New</a></li>
                          <li><a href="{{ route('pins.index') }}">All Recharge</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>{{ __('Candle Freebies - Networks') }}</span>
                        </a>
                        <ul class="collapse">
                          <li><a href="{{ route('networks.create') }}">Add New</a></li>
                          <li><a href="{{ route('networks.index') }}">All Networks</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>{{ __('Sponsors') }}</span>
                        </a>
                        <ul class="collapse">
                          <li><a href="{{ route('sponsors.create') }}">Add New</a></li>
                          <li><a href="{{ route('sponsors.index') }}">All Sponsors</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>{{ __('Locations') }}</span>
                        </a>
                        <ul class="collapse">
                          <li><a href="{{ route('locations.create') }}">Add New</a></li>
                          <li><a href="{{ route('locations.index') }}">All Location</a></li>
                        </ul>
                    </li>           

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>{{ __('Accounts') }}</span>
                        </a>
                        <ul class="collapse">
                          <li><a href="{{ route('accounts.create') }}">Add New</a></li>
                          <li><a href="{{ route('accounts.index') }}">All Accounts</a></li>
                          <li><a href="#">Permissions</a></li>
                        </ul>
                    </li>        

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>{{ __('Candle Analytics') }}</span>
                        </a>
                        <ul class="collapse">
                          <li><a href="{{ route('canalytics.create') }}">Add New</a></li>
                          <li><a href="{{ route('canalytics.index') }}">All Analytics</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i>
                            <span>{{ __('Indoor Candle Analytics') }}</span>
                        </a>
                        <ul class="collapse">
                          <li><a href="{{ route('canalytics_indoor.create') }}">Add New</a></li>
                          <li><a href="{{ route('canalytics_indoor.index') }}">All Analytics</a></li>
                        </ul>
                    </li>        

                </ul>
            </nav>
        </div>
    </div>
@endguest