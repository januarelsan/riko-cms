<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="nav-small-cap">{{ Auth::user()->role->name }}</li>
        <li>
            <a href="{{route('index')}}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Dashboard</span></a>
        </li>
        <li>
            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Admin</span></a>
            <ul aria-expanded="false" class="collapse">                
                <li><a href="{{route('admin.list')}}">List</a></li>
            </ul>
        </li>        
    </ul>
</nav>