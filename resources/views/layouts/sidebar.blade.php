
 <!-- ===== Left-Sidebar ===== -->
    <aside class="sidebar">
        <div class="sidebar-menu"> <!--<div class="scroll-sidebar" "sidebar-inner slimscroll"> -->
            <div class="user-profile">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{ Auth::user()->name }}</h4>
                        @if (!Auth::user()->on_behalf_name==Null)
                            <h5>(pour {{ Auth::user()->on_behalf_name }})</h5>
                        @endif
                        @switch(Auth::user()->is_permission)
                            @case(1)
                                <div class="staff-id">@Lang('Administrator')</div>
                                @break
                            @case(2)
                                <div class="staff-id">@Lang('Super user')</div>
                                @break
                        @endswitch
                    </div>
                    <div class="panel-body">
                        <img src={{ Auth::user()->img_src }} width="80" alt={{ Auth::user()->name }} class="img-circle">
                    </div>
                    <div class="panel-footer">
                        <div class="staff-id">{{ Auth::user()->group }}</div>
                        @if (Auth::user()->assign_right===1)
                            <small class="text-muted">@lang('Can assign') @lang('Projects')</small>
                        @endif
                        <br>
                        @if (Auth::user()->delegate_right===1)
                            <small class="text-muted">@lang('Can delegate') @lang('Projects')</small>
                        @endif                       
                    </div>
                </div>
            </div>
            <nav class="sidebar-nav">
                <ul id="side-menu">
                    <li class="submenu">
                        @if(Request::is('*home*') || Request::is('/'))
                        <a href="home"><span style="font-weight:bold"><i class="fa fa-pie-chart"></i> @lang('Dashboard')</span></a>
                        @else
                        <a href="home"><i class="fa fa-pie-chart"></i> @lang('Dashboard')</a>
                        @endif
                    </li>
                    <li class="submenu">
                        @if(Request::is('*project*'))
                        <a href="projects-index"><span style="font-weight:bold"><i class="fa fa-briefcase"></i> @lang('Projects')</span></a>
                        @else
                        <a href="projects-index"><i class="fa fa-briefcase"></i> @lang('Projects')</a>
                        @endif
                    </li>
                    <li class="submenu">
                        @if(Request::is('*task*'))
                        <a href="tasks-index"><span style="font-weight:bold"><i class="fa fa-clipboard"></i> @lang('Tasks')</span></a>
                        @else
                        <a href="tasks-index"><i class="fa fa-clipboard"></i> @lang('Tasks')</a>
                        @endif
                    </li>
                    <li class="submenu">
                        @if(Request::is('*notification*'))
                        <a href="notifications-unread"><span style="font-weight:bold"><i class="fa fa-sticky-note"></i> @lang('Notifications')</span></a>
                        @else
                        <a href="notifications-unread"><i class="fa fa-sticky-note"></i> @lang('Notifications')</a>
                        @endif
                    </li>
                    @if (Auth::user()->is_permission===1)
                        <li class="submenu">
                            <a href="#" data-toggle="collapse" data-target="#demo"><i class="fa fa-cog"></i> @lang('Configuration')</a>
                            <div id="demo" class="collapse">
                                <ul class="list-unstyled">
                                    <li><a href="users-config-index" style="margin-left:1.5em">@lang('User management')</a></li>
                                    <li><a href="#" style="margin-left:1.5em">Demander l'avancement</a></li>
                                    <li><a href="#" style="margin-left:1.5em">Classifications</a></li>
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>
    <!-- ===== Left-Sidebar-End ===== -->

