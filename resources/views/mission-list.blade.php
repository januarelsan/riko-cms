@extends('layouts.main')

@section('breadcrumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Mission</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </div>                    
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Mission List</h4>
                
                <div class="table-responsive m-t-40">
                    <table id="missionTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>Mission</th>                                                                                                                       
                                <th>Actions</th>                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            @for ($i = 0; $i < 25; $i++)
                                
                            <tr>
                                <td>{{ $i + 1 }}</td>                                
                                <td>
                                    <a href="{{route('player.finishMission.list', $i + 3)}}" data-toggle="tooltip" data-original-title="Detail"> <i class="fa fa-eye text-inverse m-r-10"></i> </a>                                        
                                </td>                                    
                                
                            </tr>
                            @endfor
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>


</script>
@endsection
