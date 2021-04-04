@extends('layouts.main')

@section('breadcrumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Player</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </div>                    
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daily Active Player </h4>
                <h6 class="card-subtitle">{{\Carbon\Carbon::parse($from)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($to)->format('d/m/Y')}}</h6>
                <div class="col-sm-6 col-xs-12">
                    
                    <form class="form-material m-t-40 row" action="{{ route('player.dau.list') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group col-md-6 m-t-20">
                            <label for="exampleInputEmail1">From</label>
                            <input class="form-control" type="date" id="fromDate" value="{{$from}}" name="from">                            
                        </div>                        
                        <div class="form-group col-md-6 m-t-20">
                            <label for="exampleInputEmail1">To</label>
                            <input class="form-control" type="date" id="toDate" value="{{$to}}" name="to">                            
                        </div>                        
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Search</button>
                        
                    </form>
                </div>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>UUID</th>                                
                                <th>Status</th>    
                                <th>Actions</th>                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($players as $player)                                
                                <tr>

                                    <td>{{$player->name ?: 'Name Not Found'}}</td>
                                    
                                    
                                    <td>{{$player->email}}</td>                              
                                    <td>{{$player->firebase_uuid}}</td>      
                                    
                                    
                                    @if ($player->isActivated())                                        
                                    
                                    <td><p class="text-primary"><b>Activated</b></p></td>
                                    <td>
                                        <a href="{{route('player.detail',$player->firebase_uuid)}}" data-toggle="tooltip" data-original-title="Detail"> <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                        
                                    </td>                                    
                                    @else
                                        <td><p class="text-danger"><b>Inactive</b></p></td>
                                    
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

$('#example23').DataTable({
    dom: 'Bfrtip',
    "ordering": false  ,
    buttons: [
        
        {
            extend: 'excelHtml5',
            text: 'Export Data to Excel',
            exportOptions: {
                columns: [ 0,1,2 ]
            }
        },
            
    ]
});





</script>
@endsection
