@extends('layouts.main')

@section('breadcrumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Quiz</a></li>
            <li class="breadcrumb-item active">Leaderboard</li>
        </ol>
    </div>                    
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Quiz Leaderboard</h4>
                
                <div class="table-responsive m-t-40">
                    <table id="leaderboardTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Email</th>
                                                             
                                <th>Answer Correct</th>    
                                <th>Actions</th>                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($players as $player)                                
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$player->name ?: 'Name Not Found'}}</td>                                    
                                    
                                    <td>{{$player->email}}</td>                                                                  
                                    <td>{{$player->player_activities->sum('player_quiz_answer.option.correct_option')}}</td>                                         
                                    <td>
                                        <a href="{{route('player.detail',$player->firebase_uuid)}}" data-toggle="tooltip" data-original-title="Detail"> <i class="fa fa-eye text-inverse m-r-10"></i> </a>                                        
                                    </td>                                    
                                    
                                </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<!-- This is data table -->
<script src="{{asset ('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
$(document).ready(function() {
    $('#leaderboardTable').DataTable({        
        "ordering": false  
    });
    
});

</script>
@endsection
