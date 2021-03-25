@extends('layouts.main')

@section('breadcrumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Player</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>                    
</div>
@endsection

@section('content')

<div class="row">    
    <div class="col-md-6">
        <div class="card card-body">
            <h3 class="box-title m-b-0">Player</h3>
            <p class="text-muted m-b-30 font-13"> Account  </p>            
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">UUID</label>
                        <input disabled class="form-control" rows="3" placeholder="{{$player->firebase_uuid}}" value="{{$player->firebase_uuid}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input disabled class="form-control" rows="3" placeholder="{{$player->name}}" value="{{$player->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input disabled class="form-control" rows="3" placeholder="{{$player->email}}" value="{{$player->email}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Score</label>
                        <input disabled class="form-control" rows="3" value="{{$totalScore}}">
                    </div>
                    
                </div>
            </div>
        </div>

    </div>  

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Player Activities</h4>
                <p class="text-muted m-b-30 font-13">Table</p>   
                <div class="table-responsive m-t-40">
                    <table id="playerActivityTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Activity</th>
                                <th>Date</th>                                
                                <th>Action</th>       
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($player->player_activities as $player_activity)                                
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$player_activity->activity->title}}</td>
                                    <td>{{ Carbon\Carbon::parse($player_activity->created_at)->format('d/m/Y')}}</td>   
                                    @if($player_activity->activity->id < 3 && $player_activity->activity->id > 27)
                                        @switch($player_activity->activity->id)
                                            @case(2)
                                                <td><a href="{{ route('playerQuizAnswer.show',$player_activity->id)}}" data-toggle="tooltip" data-original-title="Detail"> <i class="fa fa-eye text-inverse m-r-10"></i></a></td>                                
                                                @break                                            
                                            @default
                                                <td></td>
                                        @endswitch
                                    @else
                                    <td><a href="{{ route('player.finishMission.show',$player_activity->id)}}" data-toggle="tooltip" data-original-title="Detail"> <i class="fa fa-eye text-inverse m-r-10"></i></a></td>                                

                                    @endif
                                    
                                </tr>
                            @endforeach   
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>        
</div>


      

@endsection

@section('scripts')
    
<script src="{{asset ('material/plugins/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset ('material/js/toastr.js')}}"></script>

@if(Session::has('success'))
    <script>    
    $(function() {        
        $("document").ready(function(){
            $.toast({                
                text: 'Admin Successfully Added',
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'success',
                hideAfter: 4000, 
                stack: 6
            });

        });
        
    });            
    </script>
@endif

<script>
    $(document).ready(function() {
        $('#playerActivityTable').DataTable();
        
    });
</script>

@endsection