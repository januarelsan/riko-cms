@extends('layouts.main')

@section('breadcrumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Player Answer</a></li>
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
                        <input disabled class="form-control" rows="3" value="{{$playerFinishMission->player_activity->player->firebase_uuid}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input disabled class="form-control" rows="3" value="{{$playerFinishMission->player_activity->player->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input disabled class="form-control" rows="3" value="{{$playerFinishMission->player_activity->player->email}}">
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="card card-body">
            <h3 class="box-title m-b-0">Player</h3>
            <p class="text-muted m-b-30 font-13"> {{$playerFinishMission->player_activity->activity->title}}  </p>            
            <div class="row">
                <div class="col-sm-12 col-xs-12">

                    <div class="form-group">
                        <label>Score</label>
                        <input disabled class="form-control" rows="3"  value="{{$playerFinishMission->scores}}">                        
                    </div>                    
                    
                    <div class="form-group">
                        <label>Play Time (Seconds) </label>
                        <input disabled class="form-control" rows="3"  value="{{$playerFinishMission->play_time}}">                        
                    </div>                    
                    
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