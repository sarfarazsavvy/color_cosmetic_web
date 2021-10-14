<!doctype html>
<html lang="en">
  <head>

    @include('head')
    
    <title>Hello, world!</title>

    @yield('styles')
  </head>
  <body>

    @yield('body')

    @include('scripts')
    
    @yield('custom-scripts')
  </body>
</html>