<!DOCTYPE html>
<html>

<!-- HEAD SECTION -->
@include('layouts.head')
<!-- HEAD ENDS SECTION -->
@include('layouts.nav')

<body>

<div class="row" style="margin-top: 1em;">
    <!-- SIDEBAR -->
@include('layouts.sidebar')
<!-- SIDEBAR ENDS -->
<div class="col-md-8 col-lg-9 main ms-auto">
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