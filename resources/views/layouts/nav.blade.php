<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand primary-text" href="#">Revlon</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center align-items-center">

      </ul>
      <ul>
          @if (Route::has('login'))
              <div class="top-right links">
                  @auth
                  <li class="nav-item">
                      <a class="nav-link" href="#"><span class="text-uppercase primary-text">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</span></a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                          <a class="nav-link" href="{{ route('register') }}">Register</a>
                        @endif
                    </li>
                  @endauth
              </div>
          @endif
      </ul>
    </div>
  </div>
</nav>