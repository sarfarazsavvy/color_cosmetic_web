<!DOCTYPE html>
<html>

<!-- HEAD SECTION -->
@include('layouts.head')
<!-- HEAD ENDS SECTION -->
@include('layouts.nav')

<body>

<!-- SIDEBAR -->
@include('layouts.sidebar')
<!-- SIDEBAR ENDS -->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @yield('main')
	</div>	<!--/.main-->

    <!-- SCRIPTS -->
    @include('layouts.scripts')
    @yield('scripts')
	<!-- SCRIPTS ENDS -->
</body>
</html>