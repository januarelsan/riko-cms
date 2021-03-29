<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="nav-small-cap">{{ Auth::user()->role->name }}</li>
        <li>
            <a href="{{route('index')}}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Dashboard</span></a>
        </li>
        <li>
            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Player</span></a>
            <ul aria-expanded="false" class="collapse">                
                <li><a href="{{route('player.list')}}">List</a></li>
                <li><a href="{{route('player.leaderboard')}}">Leaderboard</a></li>
            </ul>
        </li>  
        <li>
            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-alphabetical"></i><span class="hide-menu">Quiz</span></a>
            <ul aria-expanded="false" class="collapse">                
                <li><a href="{{route('quiz.form')}}">Add</a></li>
            </ul>
            <ul aria-expanded="false" class="collapse">                
                <li><a href="{{route('quiz.import.form')}}">Import Excel (Bulk)</a></li>
            </ul>
            <ul aria-expanded="false" class="collapse">                
                <li><a href="{{route('quiz.list')}}">List</a></li>
            </ul>
            <ul aria-expanded="false" class="collapse">                
                <li><a href="{{route('quiz.leaderboard')}}">Leaderboard</a></li>
            </ul>
        </li> 
        <li>
            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bookmark-check"></i><span class="hide-menu">Episode</span></a>
            <ul aria-expanded="false" class="collapse">                
                <li><a href="{{route('player.finishMission.leaderboard')}}">Leaderboard</a></li>
            </ul>
            
        </li>  
        
    </ul>
</nav>