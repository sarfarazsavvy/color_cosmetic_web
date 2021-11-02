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
                <span>BEAUTY ADVISORS</span>
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
                <span>SALES</span>
                <i class="fa fa-plus"></i>
            </a>
        </li>
        
        <ul class="children collapse" id="sidebar-sales">
            <li class="children-item {{ request()->segment(1)=='ba-sales' ? 'active' : '' }}">
                <a class="" href="/all-products"><i class="fa fa-arrow-right"></i>BA SALES</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='sales' ? 'active' : '' }}">
                <a class="" href="{{route('pending_sales')}}"><i class="fa fa-arrow-right"></i>Pending Sales</a>
            </li>
        </ul>

        <li class="nav-item">
            <a href="" data-bs-toggle="collapse" data-bs-target="#sidebar-inventory-managment" aria-expanded="false">
                <span>INVENTORY MANAGMENT</span>
                <i class="fa fa-plus"></i>
            </a>
        </li>
        
        <ul class="children collapse" id="sidebar-inventory-managment">
            <li class="children-item {{ request()->segment(1)=='all-products' ? 'active' : '' }}">
                <a class="" href="/all-products"><i class="fa fa-arrow-right"></i>All Products</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-products-form' ? ' active' : '' }}">
                <a class="" href="/add-products-form"><i class="fa fa-arrow-right"></i>Add Products</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='all-stores' ? 'active' : '' }}" href="/all-stores">
                <a class="" href="/all-stores"><i class="fa fa-arrow-right"></i>All Stores</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-store-form' ? 'active' : '' }}">
                <a class="" href="/add-store-form"><i class="fa fa-arrow-right"></i>Create Store</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='all-cities' ? 'active' : '' }}">
                <a href="/all-cities"><i class="fa fa-arrow-right"></i>All Cities</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-city-form' ? 'active' : '' }}">
                <a href="/add-city-form"><i class="fa fa-arrow-right"></i>Add City</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='all-categories' ? 'active' : '' }}">
                <a href="/all-categories"><i class="fa fa-arrow-right"></i>All Categories</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-category-form' ? 'active' : '' }}">
                <a href="/add-category-form"><i class="fa fa-arrow-right"></i>Add Catogories</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='all-sub-categories' ? 'active' : '' }}" >
                <a href="/all-sub-categories"><i class="fa fa-arrow-right"></i>All Sub Categories</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-sub-category-form' ? 'active' : '' }}">
                <a href="/add-sub-category-form"><i class="fa fa-arrow-right"></i>Add Sub Category</a>
            </li>
        </ul>
        
        <form action="{{route('logout')}}" method="post"> @csrf
            <li><button class="btn sidebar-logout-btn" type="submit" href="" onClick=""><em
                        class="fa fa-power-off">&nbsp;</em> Logout</button></li>
        </form>
    </ul>
</div>
<!--/.sidebar-->