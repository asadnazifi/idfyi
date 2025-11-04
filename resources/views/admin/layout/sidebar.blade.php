<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{ Auth::guard('admin')->user()->photo_url }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>{{ Auth::guard('admin')->user()->lastname }} {{ Auth::guard('admin')->user()->farstname }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">منو</li>
            <li class=" treeview {{ request()->routeIs('admin.users.*') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-user-circle"></i> <span>کاربران</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-right pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{ request()->routeIs('admin.users.index') ? 'active' : '' }}"><a
                            href="{{ route('admin.users.index') }}"><i class="fa fa-list"></i>لیست کاربران</a></li>
                    <li class="{{ request()->routeIs('admin.users.create') ? 'active' : '' }}"><a
                            href="{{route('admin.users.create')}}"><i class="fa fa-plus"></i>افزودن کاربر</a></li>
                </ul>
            </li>
            <li class=" treeview {{ request()->routeIs('admin.categories.*') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>دسته بندی ها</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-right pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}"><a
                            href="{{ route('admin.categories.index') }}"><i class="fa fa-list"></i>لیست دسته بندی ها</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.categories.create') ? 'active' : '' }}"><a
                            href="{{route('admin.categories.create')}}"><i class="fa fa-plus"></i>افزودن دسته بندی</a>
                    </li>
                </ul>
            </li>
            <li class=" treeview {{ request()->routeIs('admin.orders.*') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-credit-card"></i> <span>سفارشات</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-right pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{ request()->routeIs('admin.orders.index') ? 'active' : '' }}"><a
                            href="{{ route('admin.orders.index') }}"><i class="fa fa-list"></i>لیست سفارش ها</a></li>
                    <li class="{{ request()->routeIs('admin.categories.create') ? 'active' : '' }}"><a
                            href="{{route('admin.categories.create')}}"><i class="fa fa-plus"></i>افزودن دسته بندی</a>
                    </li>
                </ul>
            </li>
            <li class=" treeview {{ request()->routeIs('admin.articles.*') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>مقالات</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-right pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{ request()->routeIs('admin.articles.index') ? 'active' : '' }}"><a
                            href="{{ route('admin.articles.index') }}"><i class="fa fa-list"></i>لیست مقالات</a></li>
                    <li class="{{ request()->routeIs('admin.articles.create') ? 'active' : '' }}"><a
                            href="{{route('admin.articles.create')}}"><i class="fa fa-plus"></i>افزودن مقاله</a></li>
                </ul>
            </li>
            <li class=" treeview {{ request()->routeIs('admin.products.*') ? 'menu-open active' : '' }}">
                <a href="#">
                    <i class="fa  fa-file"></i> <span>محصولات</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-right pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{ request()->routeIs('admin.products.index') ? 'active' : '' }}"><a
                            href="{{ route('admin.products.index') }}"><i class="fa fa-list"></i>لیست محصولات ها</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.products.create') ? 'active' : '' }}"><a
                            href="{{route('admin.products.create')}}"><i class="fa fa-plus"></i>افزودن محصول</a></li>
                </ul>
            </li>

            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-arrow-right"></i>
                    <span>خروچ</span>
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
