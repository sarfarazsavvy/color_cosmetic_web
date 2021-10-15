<!doctype html>
<html lang="en">
  <head>

    @include('layouts.head')
    
    <title>Hello, world!</title>

    @yield('styles')
  </head>
  <body>

    @yield('body')

    @include('layouts.scripts')
    
    @yield('custom-scripts')
  </body>
</html>