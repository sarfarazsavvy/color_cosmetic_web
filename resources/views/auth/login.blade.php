
<!DOCTYPE html>
<html>

<!-- HEAD SECTION -->
@include('layouts.head')
<!-- HEAD ENDS SECTION -->

<body style="background: url({{ asset('img/login-bg.jpg') }}); background-size: cover;">


<div class="container-fluid">
    <div class="row">
        <div class="offset-md-4 mt-5 col-md-4">
            <div class="login-form-parent">
            <h1 class="text-center">Welcome</h1>
            <h4 class="text-center">Revlon Color Cosmetics</h4>
            <div class="login-form">
                @if(session()->has('message'))
                    <p class="alert alert-success" role="alert">
                        {{session()->get('message')}}
                    </p>
                @endif
                <form class="theme-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="mt-3 form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="mt-3 form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn bg-red text-white">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>


    <!-- SCRIPTS -->
    @include('layouts.scripts')
    @yield('scripts')
	<!-- SCRIPTS ENDS -->
</body>
</html>

