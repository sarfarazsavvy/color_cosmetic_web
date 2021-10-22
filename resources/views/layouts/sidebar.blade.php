<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
                <h3 class="text-capitalize">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                </h3>
        </div>
        <div class="divider"></div>

        <ul class="nav nav-pills flex-column mb-auto menu">
                <li class="nav-item {{ request()->segment(1)=='home' ? 'active' : '' }}"><a href="/home"><em
                                        class="fa fa-dashboard">&nbsp;</em>Dashboard</a></li>
                <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#beauty-advisors" aria-expanded="false">
                                <em class="fa fa-navicon">&nbsp;</em> Beauty Advisors <span data-toggle="collapse"
                                        href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                        </a>
                        <ul class="children collapse" id="beauty-advisors">
                                <li class=""><a class="{{ request()->segment(1)=='all-ba-girls' ? 'active' : '' }}"
                                                href="/all-ba-girls" id="all-ba-girls">
                                                <span class="fa fa-arrow-right">&nbsp;</span>All Beauty Advisors</a>
                                </li>
                                <li><a class="{{ request()->segment(1)=='beauty-advisors' ? 'active' : '' }}"
                                                href="/beauty-advisors">
                                                <span class="fa fa-arrow-right">&nbsp;</span>Add Beauty Advisor</a>
                                </li>
                                <li><a class="{{ request()->segment(1)=='assign-store-to-beauty-advisor-form' ? 'active' : '' }}"
                                                href="/assign-store-to-beauty-advisor-form">
                                                <span class="fa fa-arrow-right">&nbsp;</span>Assign Store to Beauty
                                                Advisor</a>
                                </li>
                        </ul>
                </li>
                <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#products" aria-expanded="false">
                                <em class="fa fa-navicon">&nbsp;</em> Products <span data-toggle="collapse"
                                        href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
                        </a>
                        <ul class="children collapse" id="products">
                                <li><a class="{{ request()->segment(1)=='all-products' ? 'active' : '' }}"
                                                href="/all-products">
                                                <span class="fa fa-arrow-right">&nbsp;</span>All Products</a>
                                </li>
                                <li><a class="{{ request()->segment(1)=='add-products-form"' ? ' active' : '' }}"
                                                href="/add-products-form">
                                                <span class="fa fa-arrow-right">&nbsp;</span>Add Products</a>
                                </li>
                        </ul>
                </li>
                <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#stores" aria-expanded="false">
                                <em class="fa fa-navicon">&nbsp;</em> Stores <span data-toggle="collapse"
                                        href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                        </a>
                        <ul class="children collapse" id="stores">
                                <li><a class="{{ request()->segment(1)=='all-stores' ? 'active' : '' }}"
                                                href="/all-stores">
                                                <span class="fa fa-arrow-right">&nbsp;</span> All Stores</a>
                                </li>
                                <li><a class="{{ request()->segment(1)=='add-store-form' ? 'active' : '' }}"
                                                href="/add-store-form">
                                                <span class="fa fa-arrow-right">&nbsp;</span> Create Stores</a>
                                </li>
                                <li><a class="{{ request()->segment(1)=='add-products-to-store' ? 'active' : '' }}"
                                                href="/add-products-to-store">
                                                <span class="fa fa-arrow-right">&nbsp;</span>Add Products To Store</a>
                                </li>
                        </ul>
                </li>
                <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#city" aria-expanded="false">
                                <em class="fa fa-navicon">&nbsp;</em> City <span data-toggle="collapse"
                                        href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                        </a>
                        <ul class="children collapse" id="city">
                                <li><a class="{{ request()->segment(1)=='all-cities' ? 'active' : '' }}"
                                                href="/all-cities">
                                                <span class="fa fa-arrow-right">&nbsp;</span>All Cities</a>
                                </li>
                                <li><a class="{{ request()->segment(1)=='add-city-form' ? 'active' : '' }}"
                                                href="/add-city-form">
                                                <span class="fa fa-arrow-right">&nbsp;</span>Add Cities</a>
                                </li>
                        </ul>
                </li>
                <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#categories" aria-expanded="false">
                                <em class="fa fa-navicon">&nbsp;</em> Categories <span data-toggle="collapse"
                                        href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
                        </a>
                        <ul class="children collapse" id="categories">
                                <li><a class="{{ request()->segment(1)=='all-categories' ? 'active' : '' }}"
                                                href="/all-categories">
                                                <span class="fa fa-arrow-right">&nbsp;</span>All Categories</a>
                                </li>
                                <li><a class="{{ request()->segment(1)=='add-category-form' ? 'active' : '' }}"
                                                href="/add-category-form">
                                                <span class="fa fa-arrow-right">&nbsp;</span>Add Categories</a>
                                </li>
                        </ul>
                </li>
                <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#sub-categories" aria-expanded="false">
                                <em class="fa fa-navicon">&nbsp;</em>Sub Categories <span data-toggle="collapse"
                                        href="#sub-item-6" class="icon pull-right"><em class="fa fa-plus"></em></span>
                        </a>
                        <ul class="children collapse" id="sub-categories">
                                <li><a class="{{ request()->segment(1)=='all-sub-categories' ? 'active' : '' }}"
                                                href="/all-sub-categories">
                                                <span class="fa fa-arrow-right">&nbsp;</span>All Sub Categories</a>
                                </li>
                                <li><a class="{{ request()->segment(1)=='add-sub-category-form' ? 'active' : '' }}"
                                                href="/add-sub-category-form">
                                                <span class="fa fa-arrow-right">&nbsp;</span>Add Sub Categories</a>
                                </li>
                        </ul>
                </li>
                <form action="{{route('logout')}}" method="post"> @csrf
                        <li><button class="btn sidebar-logout-btn" type="submit" href="" onClick=""><em
                                                class="fa fa-power-off">&nbsp;</em> Logout</button></li>
                </form>
        </ul>
</div>
<!--/.sidebar-->