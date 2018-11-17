 <!-- ===== Global layout when user is logged-in ===== -->
 <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.head')
</head>
<body>
    <div class="main-wrapper">
        <div class="header">
            @include('layouts.topnavbar')
        </div>
        <div class="sidebar" id="sidebar">
            @include('layouts.sidebar')
        </div>
        <div class="page-wrapper">
            <div class="chat-main-row">
                <div class="chat-main-wrapper">
                    <div class="col-xs-7 message-view task-view">
                        <div class="chat-window">
                            <div class="chat-header">
                                <div class="navbar">
                                    <div class="col-sm-8">
                                        <h4 class="page-title">@lang('Notifications')</h4>
                                    </div>
                                    <ul class="nav navbar-nav pull-right chat-menu">
                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0)">Pending Tasks</a></li>
                                                <li><a href="javascript:void(0)">Completed Tasks</a></li>
                                                <li><a href="javascript:void(0)">All Tasks</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-contents">
                                <div class="chat-content-wrap">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="task-wrapper">
                                                <div class="task-list-container">
                                                    <div class="task-list-body">
                                                        <ul id="task-list">
                                                            <li class="task">
                                                                <div class="task-container">
                                                                    <span class="task-action-btn task-check">
                                                                        <span class="action-circle large complete-btn" title="Mark Complete">
                                                                            <i class="material-icons">check</i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="task-label" contenteditable="true">Patient appointment booking</span>
                                                                    <span class="task-action-btn task-btn-right">
                                                                        <span class="action-circle large delete-btn" title="Delete Task">
                                                                            <i class="material-icons">delete</i>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </li>
                                                            <li class="completed task">
                                                                <div class="task-container">
                                                                    <span class="task-action-btn task-check">
                                                                        <span class="action-circle large complete-btn" title="Mark Complete">
                                                                            <i class="material-icons">check</i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="task-label">Doctor available starting 1pm</span>
                                                                    <span class="task-action-btn task-btn-right">
                                                                        <span class="action-circle large delete-btn" title="Delete Task">
                                                                            <i class="material-icons">delete</i>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-popup hide">
                                                <p>
                                                    <span class="task"></span>
                                                    <span class="notification-text"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff="#sidebar"></div>
    <div class="task-overlay" data-reff="#task_window"></div>
   <!-- Notifications Specific scripts -->
    <script type="text/template" id="task-template">
        <li class="task">
            <div class="task-container">
                <span class="task-action-btn task-check">
                    <span class="action-circle large complete-btn" title="Mark Complete">
                        <i class="material-icons">check</i>
                    </span>
                </span>
                <span class="task-label" contenteditable="true"></span>
                <span class="task-action-btn task-btn-right">
                    <span class="action-circle large delete-btn" title="Delete Task">
                        <i class="material-icons">delete</i>
                    </span>
                </span>
            </div>
        </li>
    </script>
    <script type="text/javascript" src="/assets/js/task.js"></script>
    @include('layouts.script')
</body>
</html>