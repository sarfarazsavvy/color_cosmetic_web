<!DOCTYPE html>
<html>

<!-- HEAD SECTION -->
@include('layouts.head')
<!-- HEAD ENDS SECTION -->
@include('layouts.nav')

<body>

<div class="row">
    <!-- SIDEBAR -->
@include('layouts.sidebar')
<!-- SIDEBAR ENDS -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main ms-auto">
        @if(session()->has('success'))
        <div class="alert alert-success">
            <strong>{{session()->get('success')}}</strong>
        </div>
        @endif
        @yield('main')
	</div>
</div>

	

    <!-- SCRIPTS -->
    @include('layouts.scripts')

    @yield('custom-scripts')
	<!-- SCRIPTS ENDS -->
</body>
</html>