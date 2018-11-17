            <!-- ===== Top Navigation bar for users ===== -->
            <!-- == Logo == -->
            <div class="header-left">
                <a href="/" class="logo">
                    <img src="/assets/img/logo.png" width="175" height="50" alt="logo">
                </a>
            </div>
            <!-- == Title == -->
            <div class="page-title-box pull-left">
                <h3>{{ config('app.longname', 'Laravel') }}</h3>
            </div>
            <!-- == Bars for sidebar == -->
            <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <!-- == Right side == -->
            <ul class="nav navbar-nav navbar-right user-menu pull-right">
                <!-- == Notifications == -->
                <li class="dropdown hidden-xs">
                    @if (count(Auth::user()->unreadNotifications) === 0)
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i></a>
                    @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge bg-danger pull-right">{{ count(Auth::user()->unreadNotifications) }}</span></a>
                    @endif
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>@lang('Notifications')</span>
                        </div>
                        @if (count(Auth::user()->unreadNotifications))
                            <div class="chat-header">
                                <a href="{{ route('markAllRead') }}"><span>@lang('Mark all as Read')</span></a>
                            </div>
                        @endif
                        <div class="drop-scroll">
                            <ul class="media-list">
                                @forelse(Auth::user()->unreadNotifications as $notification)
                                    <li class="media notification-message">    
                                        <a href="notifications">
                                            <div class="media-body">
                                                <p class="m-0 noti-details"><i class="fa fa-envelope"></i><span class="noti-title"> {{$notification->data['title']}}</span> {{$notification->data['detail']}}</p>
                                                <p class="m-0"><span class="notification-time">{{ date('d/M/y H:i',strtotime($notification->created_at)) }}</span></p>
                                            </div>
                                        </a>
                                    <!-- @include('layouts.partials.notifications.'.snake_case(class_basename($notification->type)), ['notificationdata' => $notification->data['detail']])== -->
                                    </li>
                                    @empty
                                    <li class="media notification-message">
                                        <div class="media-body">
                                        <p class="m-0 noti-details"><span class="noti-title"><br>&nbsp @lang('No unread notifications')</span></p>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="notifications-all">@lang('View all Notifications')</a>
                        </div>
                    </div>
                </li>
                <!-- == User Name == -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle user-link" data-toggle="dropdown" title="User">
                        <span class="status online"></span></span>
                        <span>{{ Auth::user()->name }}</span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                @lang('Logout')
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
				</li>
            </ul>
            <div class="dropdown mobile-user-menu pull-right">
                <!-- == Dropdown menu == -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            @lang('Logout')
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
<!-- ===== Top Navigation bar for users-End ===== -->