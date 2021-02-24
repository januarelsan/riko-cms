<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="nav-small-cap">{{ Auth::user()->role->name }}</li>
        <li>
            <a href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Dashboard</span></a>
        </li>
        
    </ul>
</nav>