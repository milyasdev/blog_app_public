<!DOCTYPE html>
<html lang="en">

    @include('master.head')
    @yield('css')
<body>
    <div class="body-inner">
        @include('admin.component.header')
        @include('admin.component.menu')
        @yield('content')
    </div>
        @yield('js')
        @include('admin.component.js')
</body>
</html>
