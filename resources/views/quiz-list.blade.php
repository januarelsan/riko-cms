@extends('layouts.main')

@section('breadcrumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Question</a></li>
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
                <h4 class="card-title">Quiz Data</h4>
                {{-- <h6 class="card-subtitle">-----</h6> --}}
                <div class="table-responsive m-t-40">
                    <a href="{{ route('quiz.export') }}" type="button" class="btn waves-effect waves-light btn-info">Export Quiz Data</a>
                    <table id="quizTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Question</th>
                                <th hidden>Option 1</th>
                                <th hidden>Option 2</th>
                                <th hidden>Option 3</th>
                                <th hidden>Option 4</th>
                                <th hidden>Correct Option</th>
                                <th >Action</th>
                                
                            </tr>
                        </thead>
                        
                        
                        <tbody>
                            @foreach ($quizzes as $quiz)    
                            @php                                
                                $correct_option = 2;
                            @endphp
                            <tr>
                                <td>{{$quiz->id}}</td>
                                <td>{{ \Illuminate\Support\Str::limit($quiz->question, 100, $end=' ...') }} </td>                                                                                                                          
                                @for ($i = 0; $i < 4; $i++)                                    
                                    @if ($i < count($quiz->options))
                                        <td hidden>{{$quiz->options[$i]->value}}</td>                                                                              
                                        @php                                            
                                            if ($quiz->options[$i]->correct_option){
                                                $correct_option = $i;
                                            }
                                        @endphp                                        
                                    @else
                                        <td hidden></td>                                      
                                    @endif
                                @endfor     
                                @switch($correct_option)
                                    @case(0)                                    
                                        <td hidden>A</td>                            
                                        @break
                                    @case(1)
                                        <td hidden>B</td>                            
                                        @break
                                    @case(2)
                                        <td hidden>C</td>                            
                                        @break
                                    @case(3)
                                        <td hidden>D</td>                            
                                        @break
                                    @default
                                        <td hidden>A</td>                            
                                        @break
                                @endswitch                                
                                <td>                                    
                                    <a href="{{route('quiz.edit.form',$quiz->id)}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="{{route('quiz.remove',$quiz->id)}}" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash-o text-danger m-r-10"></i> </a>
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

<script>
$(document).ready(function() {
    $('#quizTable').DataTable();
    
});

</script>

<script src="{{asset ('material/plugins/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset ('material/js/toastr.js')}}"></script>

@if(Session::has('message'))
    <script>    
    $(function() {        
        $("document").ready(function(){
            $.toast({                
                text: 'Question Removed',
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

@endsection
