<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <h3 class="text-capitalize">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
        </h3>
    </div>
    <div class="divider"></div>

    <ul class="nav nav-pills flex-column mb-auto menu p-0">

        <li class="nav-item">
            <a class="{{ request()->segment(1)=='all-ba-girls' ? 'active' : '' }}" href="" data-bs-toggle="collapse" data-bs-target="#sidebar-menu-1"
                aria-expanded="false">
                <span>Beauty Adviors</span>
                <i class="fa fa-plus"></i>
            </a>
        </li>
        <ul class="children collapse" id="sidebar-menu-1">
            <li class="children-item {{ request()->segment(1)=='all-ba-girls' ? 'active' : '' }}">
                <a class="" href="/all-ba-girls"><i class="fa fa-arrow-right"></i>All Beauty Advisors</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='beauty-advisors' ? 'active' : '' }}">
                <a class="" href="/beauty-advisors"><i class="fa fa-arrow-right"></i>Add Beauty Advisor</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='assign-store-to-beauty-advisor-form' ? 'active' : '' }}">
                <a class="" href="/assign-store-to-beauty-advisor-form"><i class="fa fa-arrow-right"></i>Assign Store to Beauty Advisor</a>
            </li>
        </ul>

        <li class="nav-item">
            <a href="" data-bs-toggle="collapse" data-bs-target="#sidebar-sales" aria-expanded="false">
                <span>Sales</span>
                <i class="fa fa-plus"></i>
            </a>
        </li>
        
        <ul class="children collapse" id="sidebar-sales">
            <li class="children-item {{ request()->segment(1)=='all-products' ? 'active' : '' }}">
                <a class="" href="/all-products"><i class="fa fa-arrow-right"></i>BA Sales</a>
            </li>
        </ul>

        <li class="nav-item">
            <a href="" data-bs-toggle="collapse" data-bs-target="#sidebar-menu-2" aria-expanded="false">
                <span>Products</span>
                <i class="fa fa-plus"></i>
            </a>
        </li>
        
        <ul class="children collapse" id="sidebar-menu-2">
            <li class="children-item {{ request()->segment(1)=='all-products' ? 'active' : '' }}">
                <a class="" href="/all-products"><i class="fa fa-arrow-right"></i>All Products</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-products-form' ? ' active' : '' }}">
                <a class="" href="/add-products-form"><i class="fa fa-arrow-right"></i>Add Products</a>
            </li>
        </ul>

        <li class="nav-item">
            <a href="" data-bs-toggle="collapse" data-bs-target="#sidebar-menu-3" aria-expanded="false">
                <span>Store</span>
                <i class="fa fa-plus"></i>
            </a>
        </li>
        <ul class="children collapse" id="sidebar-menu-3">
            <li class="children-item {{ request()->segment(1)=='all-stores' ? 'active' : '' }}" href="/all-stores">
                <a class="" href="/all-stores"><i class="fa fa-arrow-right"></i>All Stores</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-store-form' ? 'active' : '' }}">
                <a class="" href="/add-store-form"><i class="fa fa-arrow-right"></i>Create Store</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='assign-store-to-beauty-advisor-form' ? 'active' : '' }}">
                <a href="/assign-store-to-beauty-advisor-form"><i class="fa fa-arrow-right"></i>Assign Store to Beauty Advisor</a>
            </li>
        </ul>

        <li class="nav-item">
            <a href="" data-bs-toggle="collapse" data-bs-target="#sidebar-menu-4" aria-expanded="false">
                <span>City</span>
                <i class="fa fa-plus"></i>
            </a>
        </li>

        <ul class="children collapse" id="sidebar-menu-4">
            <li class="children-item {{ request()->segment(1)=='all-cities' ? 'active' : '' }}">
                <a href="/all-cities"><i class="fa fa-arrow-right"></i>All Cities</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-city-form' ? 'active' : '' }}">
                <a href="/add-city-form"><i class="fa fa-arrow-right"></i>Add City</a>
            </li>
        </ul>

        <li class="nav-item">
            <a href="" data-bs-toggle="collapse" data-bs-target="#sidebar-menu-5" aria-expanded="false">
                <span>Categories</span>
                <i class="fa fa-plus"></i>
            </a>
        </li>
        <ul class="children collapse" id="sidebar-menu-5">
            <li class="children-item {{ request()->segment(1)=='all-categories' ? 'active' : '' }}">
                <a href="/all-categories"><i class="fa fa-arrow-right"></i>All Categories</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-category-form' ? 'active' : '' }}">
                <a href="/add-category-form"><i class="fa fa-arrow-right"></i>Add Catogories</a>
            </li>
        </ul>

        <li class="nav-item">
            <a href="" data-bs-toggle="collapse" data-bs-target="#sidebar-menu-6" aria-expanded="false">
                <span>Sub Categories</span>
                <i class="fa fa-plus"></i>
            </a>
        </li>

        <ul class="children collapse" id="sidebar-menu-6">
            <li class="children-item {{ request()->segment(1)=='all-sub-categories' ? 'active' : '' }}" >
                <a href="/all-sub-categories"><i class="fa fa-arrow-right"></i>All Sub Categories</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-sub-category-form' ? 'active' : '' }}">
                <a href="/add-sub-category-form"><i class="fa fa-arrow-right"></i>Add Sub Category</a>
            </li>
        </ul>

        <!-- <li class="nav-item {{ request()->segment(1)=='home' ? 'active' : '' }}"><a href="/home"><em
                    class="fa fa-dashboard">&nbsp;</em>Dashboard</a></li>
        <li class="parent nav-item">
            <a class="collapsed" data-bs-toggle="collapse" data-bs-target="#beauty-advisors" aria-expanded="false">
                <em class="fa fa-navicon">&nbsp;</em> Beauty Advisors <span data-toggle="collapse" href="#sub-item-1"
                    class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>

            <ul class="children collapse" id="beauty-advisors">
                <li class=""><a class="{{ request()->segment(1)=='all-ba-girls' ? 'active' : '' }}" href="/all-ba-girls"
                        id="all-ba-girls">
                        <span class="fa fa-arrow-right">&nbsp;</span>All Beauty Advisors</a>
                </li>
                <li><a class="{{ request()->segment(1)=='beauty-advisors' ? 'active' : '' }}" href="/beauty-advisors">
                        <span class="fa fa-arrow-right">&nbsp;</span>Add Beauty Advisor</a>
                </li>
                <li><a class="{{ request()->segment(1)=='assign-store-to-beauty-advisor-form' ? 'active' : '' }}"
                        href="/assign-store-to-beauty-advisor-form">
                        <span class="fa fa-arrow-right">&nbsp;</span>Assign Store to Beauty
                        Advisor</a>
                </li>
            </ul>
        </li>
        <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#products"
                aria-expanded="false">
                <em class="fa fa-navicon">&nbsp;</em> Products <span data-toggle="collapse" href="#sub-item-5"
                    class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="products">
                <li><a class="{{ request()->segment(1)=='all-products' ? 'active' : '' }}" href="/all-products">
                        <span class="fa fa-arrow-right">&nbsp;</span>All Products</a>
                </li>
                <li><a class="{{ request()->segment(1)=='add-products-form' ? ' active' : '' }}"
                        href="/add-products-form">
                        <span class="fa fa-arrow-right">&nbsp;</span>Add Products</a>
                </li>
            </ul>
        </li>
        <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#stores"
                aria-expanded="false">
                <em class="fa fa-navicon">&nbsp;</em> Stores <span data-toggle="collapse" href="#sub-item-2"
                    class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="stores">
                <li><a class="{{ request()->segment(1)=='all-stores' ? 'active' : '' }}" href="/all-stores">
                        <span class="fa fa-arrow-right">&nbsp;</span> All Stores</a>
                </li>
                <li><a class="{{ request()->segment(1)=='add-store-form' ? 'active' : '' }}" href="/add-store-form">
                        <span class="fa fa-arrow-right">&nbsp;</span> Create Stores</a>
                </li>
            </ul>
        </li>
        <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#city"
                aria-expanded="false">
                <em class="fa fa-navicon">&nbsp;</em> City <span data-toggle="collapse" href="#sub-item-3"
                    class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="city">
                <li><a class="{{ request()->segment(1)=='all-cities' ? 'active' : '' }}" href="/all-cities">
                        <span class="fa fa-arrow-right">&nbsp;</span>All Cities</a>
                </li>
                <li><a class="{{ request()->segment(1)=='add-city-form' ? 'active' : '' }}" href="/add-city-form">
                        <span class="fa fa-arrow-right">&nbsp;</span>Add Cities</a>
                </li>
            </ul>
        </li>
        <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#categories"
                aria-expanded="false">
                <em class="fa fa-navicon">&nbsp;</em> Categories <span data-toggle="collapse" href="#sub-item-4"
                    class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="categories">
                <li><a class="{{ request()->segment(1)=='all-categories' ? 'active' : '' }}" href="/all-categories">
                        <span class="fa fa-arrow-right">&nbsp;</span>All Categories</a>
                </li>
                <li><a class="{{ request()->segment(1)=='add-category-form' ? 'active' : '' }}"
                        href="/add-category-form">
                        <span class="fa fa-arrow-right">&nbsp;</span>Add Categories</a>
                </li>
            </ul>
        </li>
        <li class="parent nav-item"><a class="collapsed" data-bs-toggle="collapse" data-bs-target="#sub-categories"
                aria-expanded="false">
                <em class="fa fa-navicon">&nbsp;</em>Sub Categories <span data-toggle="collapse" href="#sub-item-6"
                    class="icon pull-right"><em class="fa fa-plus"></em></span>
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
        </li> -->
        <form action="{{route('logout')}}" method="post"> @csrf
            <li><button class="btn sidebar-logout-btn" type="submit" href="" onClick=""><em
                        class="fa fa-power-off">&nbsp;</em> Logout</button></li>
        </form>
    </ul>
</div>
<!--/.sidebar-->