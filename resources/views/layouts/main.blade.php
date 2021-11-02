<!DOCTYPE html>
<html>

<!-- HEAD SECTION -->
@include('layouts.head')
<!-- HEAD ENDS SECTION -->
@include('layouts.nav')

<body>

	<div class="col-md-9 col-lg-10 main">
        @yield('main')
	</div>	<!--/.main-->

    <!-- SCRIPTS -->
    @include('layouts.scripts')
    @yield('scripts')
	<!-- SCRIPTS ENDS -->
</body>
</html>