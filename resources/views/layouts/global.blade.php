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
            @yield('content')
        </div>
    </div>
    <div class="sidebar-overlay" data-reff="#sidebar"></div>
    @yield('customscript')
    @include('layouts.script')
</body>
</html>