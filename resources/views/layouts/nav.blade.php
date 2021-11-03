<nav class="navbar px-3 navbar-expand-lg bg-dark fixed-top d-flex justify-content-between align-items-center">
    <div class="nav-logo">
        <p class="p-0 m-0 text-white" style="font-size: 22px;"><span class="primary-text me-2">Revlon</span>Color Cosmetic</p>
    </div>
    <div class="greatings">
        <p class="p-0 m-0 text-white " style="font-size: 22px;"><span id="greatingText" class="me-1 text-capitalize">Good Morning,</span><span
                class="font-weight-bold primary-text text-capitalize">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</span>
        </p>
    </div>
    <div class="log-out">
        <form  class="d-flex flex-row" action="{{route('logout')}}" method="post"> @csrf
            <div class="d-flex justify-content-center align-items-center" style="width: 22px;">
              <img class="w-100" src="img/icons/logout.png" alt="">
            </div>
            <button class="btn text-white" style="font-size: 22px;" type="submit" href="" onClick="">Logout</button>
        </form>
    </div>
</nav>


<!-- <nav class="navbar navbar-expand-lg bg-dark fixed-top">
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
</nav> -->