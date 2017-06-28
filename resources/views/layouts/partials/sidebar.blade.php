<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/default-profile.png')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Home</span></a></li>

            @if(Auth::user()->role === 'administrator')
            <li class="">
                <a href="#"> <i class='fa fa-database'></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-users" aria-hidden="true"></i>Data User</a></li>
                    <li><a href="{{ route('items.index') }}"><i class="fa fa-archive" aria-hidden="true"></i>Data Item</a></li>
                </ul>
            </li>
            @endif
            
            <li class="treeview">
                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Purchase Data</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('pr.index') }}"><i class="fa fa-cart-plus" aria-hidden="true"></i>Purchase Request</a></li>
                    <li><a href="{{ route('po.index') }}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Purchase Order</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
