<div id="sidebar-collapse" class="col-md-4 col-lg-3 sidebar">


    <ul class="nav nav-pills flex-column mb-auto menu p-0">

        <li class="nav-item">
            <a class="" href="" data-bs-toggle="collapse" data-bs-target="#sidebar-menu-1"
                aria-expanded="false">
                <span>BEAUTY ADVISORS</span>
                <i class="fa fa-caret-down"></i>
            </a>
        </li>

        <ul class="children collapse" id="sidebar-menu-1">
            <li class="children-item {{ request()->segment(1)=='all-ba-girls' ? 'active' : '' }}">
                <a class="" href="/all-ba-girls"><i class="fa fa-circle-thin me-2"></i>All Beauty Advisors</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='beauty-advisors' ? 'active' : '' }}">
                <a class="" href="/beauty-advisors"><i class="fa fa-circle-thin me-2"></i>Add Beauty Advisor</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='ba-change-password' ? 'active' : '' }}">
                <a class="" href="{{route('forgot.password')}}"><i class="fa fa-circle-thin me-2"></i>BA Change Password</a>
            </li>
            
            <li class="children-item {{ request()->segment(1)=='assign-store-to-beauty-advisor-form' ? 'active' : '' }}">
                <a class="" href="/assign-store-to-beauty-advisor-form"><i class="fa fa-circle-thin me-2"></i>Assign Store to BA</a>
            </li>
        </ul>

        <li class="nav-item">
            <a href="" data-bs-toggle="collapse" data-bs-target="#sidebar-sales" aria-expanded="false">
                <span>SALES</span>
                <i class="fa fa-caret-down"></i>
            </a>
        </li>
        
        <ul class="children collapse" id="sidebar-sales">
            <li class="children-item {{ request()->segment(1)=='ba-sales' ? 'active' : '' }}">
                <a class="" href="/all-products"><i class="fa fa-circle-thin me-2"></i>BA Sales</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='sales' ? 'active' : '' }}">
                <a class="" href="{{route('pending_sales')}}"><i class="fa fa-circle-thin me-2"></i>Pending Sales</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='sales' ? 'active' : '' }}">
                <a class="" href="{{route('ba.sales.reports')}}"><i class="fa fa-circle-thin me-2"></i>BA Sales Reports</a>
            </li>
        </ul>

        <li class="nav-item">
            <a href="" data-bs-toggle="collapse" data-bs-target="#sidebar-inventory-managment" aria-expanded="false">
                <span>INVENTORY MANAGMENT</span>
                <i class="fa fa-caret-down"></i>
            </a>
        </li>
        
        <ul class="children collapse" id="sidebar-inventory-managment">
            <li class="children-item {{ request()->segment(1)=='all-products' ? 'active' : '' }}">
                <a class="" href="/all-products"><i class="fa fa-circle-thin me-2"></i>Products</a>
            </li>
            <!-- <li class="children-item {{ request()->segment(1)=='add-products-form' ? ' active' : '' }}">
                <a class="" href="/add-products-form"><i class="fa fa-circle-thin me-2"></i>Add Products</a>
            </li> -->
            <li class="children-item {{ request()->segment(1)=='all-stores' ? 'active' : '' }}" href="/all-stores">
                <a class="" href="/all-stores"><i class="fa fa-circle-thin me-2"></i>Stores</a>
            </li>
            <!-- <li class="children-item {{ request()->segment(1)=='add-store-form' ? 'active' : '' }}">
                <a class="" href="/add-store-form"><i class="fa fa-circle-thin me-2"></i>Create Store</a>
            </li> -->
            <li class="children-item {{ request()->segment(1)=='all-cities' ? 'active' : '' }}">
                <a href="{{route('city.index')}}"><i class="fa fa-circle-thin me-2"></i>Cities</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-city-form' ? 'active' : '' }}">
                <a href="{{route('city.create')}}"><i class="fa fa-circle-thin me-2"></i>Add City</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='all-categories' ? 'active' : '' }}">
                <a href="{{route('category.index')}}"><i class="fa fa-circle-thin me-2"></i>All Categories</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-category-form' ? 'active' : '' }}">
                <a href="{{route('category.create')}}"><i class="fa fa-circle-thin me-2"></i>Add Catogories</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='all-sub-categories' ? 'active' : '' }}" >
                <a href="{{route('sub_category.index')}}"><i class="fa fa-circle-thin me-2"></i>All Sub Categories</a>
            </li>
            <li class="children-item {{ request()->segment(1)=='add-sub-category-form' ? 'active' : '' }}">
                <a href="{{route('sub_category.create')}}"><i class="fa fa-circle-thin me-2"></i>Add Sub Category</a>
            </li>
        </ul>

        <!-- <ul class="children">
            <li class="children-item">
                <form action="{{route('logout')}}" method="post"> @csrf
                    <button class="btn sidebar-logout-btn" type="submit" href="" onClick=""><em
                        class="fa fa-power-off">&nbsp;</em> Logout</button>
                </form>
            </li>
        </ul> -->
        
        
    </ul>
</div>
<!--/.sidebar-->