<!DOCTYPE html>
<html lang="en">
@include("layouts.head")
{{-- {{(Request::is('contact') or Request::is('about') or  Request::is('/')) ? 'dark-bg' : '' }} --}}
<body class="dark-bg" >
    <div id="preloader"></div>
    @if(!Request::is('/'))
        @include('layouts.header')
    @endif
    @yield('main')
    @if(!Request::is('/'))
        @include('layouts.footer')
    @endif
</body>
</html>
