@extends('layouts.main')

@section('breadcrumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Question</a></li>
            <li class="breadcrumb-item active">Form</li>
        </ol>
    </div>                    
</div>
@endsection

@section('content')
@if(Session::has('message'))


@endif
<div class="row">
    @if (count($options) > 2)
        <div class="col-md-6">
            <div class="card card-body">
                <h3 class="box-title m-b-0">Form</h3>
                <p class="text-muted m-b-30 font-13"> Quiz 4 Option </p>
                
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{ route('quiz.edit.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input hidden type="text" name="id" value="{{$quiz->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Question</label>
                                <textarea required class="form-control" rows="3" name="question">{{$quiz->question}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option 1</label>
                                <input required type="text" class="form-control" name="option_0" value="{{ isset($options[0]->value) ? $options[0]->value : null }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option 2</label>
                                <input required type="text" class="form-control" name="option_1" value="{{ isset($options[1]->value) ? $options[1]->value : null }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option 3</label>
                                <input required type="text" class="form-control" name="option_2" value="{{ isset($options[2]->value) ? $options[2]->value : null }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option 4</label>
                                <input required type="text" class="form-control" name="option_3" value="{{ isset($options[3]->value) ? $options[3]->value : null }}">
                            </div>
                            <div class="form-group">
                                <label>Correct Option</label>
                                <select required class="custom-select col-12" id="inlineFormCustomSelect" name="correct_option">
                                    @foreach ($options as $option)
                                        <option @if($option->correct_option == 1) selected @endif value="{{ $loop->index }}">Option {{ $loop->index + 1}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                            <a type="button" href="{{ route('quiz.list') }}" class="btn btn-inverse">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    @else
        <div class="col-md-6">
            <div class="card card-body">
                <h3 class="box-title m-b-0">Form</h3>
                <p class="text-muted m-b-30 font-13"> Quiz 2 Option</p>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{ route('quiz.edit.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input hidden type="text" name="id" value="{{$quiz->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Question</label>
                                <textarea required class="form-control" rows="3" name="question" >{{$quiz->question}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option 1</label>
                                <input required type="text" class="form-control" name="option_0" value="{{ isset($options[0]->value) ? $options[0]->value : null }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option 2</label>
                                <input required type="text" class="form-control" name="option_1" value="{{ isset($options[1]->value) ? $options[1]->value : null }}">
                            </div>
                            
                            <div class="form-group">
                                <label>Correct Option</label>
                                <select required class="custom-select col-12" id="inlineFormCustomSelect" name="correct_option">
                                    @foreach ($options as $option)
                                        <option @if($option->correct_option == 1) selected @endif value="{{ $loop->index }}">Option {{ $loop->index + 1}}</option>    
                                    @endforeach
                                                       
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                            <a type="button" href="{{ route('quiz.list') }}" class="btn btn-inverse">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif 
</div>

<div class="row">

    @php                                
        $total_correct = 0;
        $correct_percentage = 0;
        $wrong_percentage = 0;
    @endphp
    
    @foreach ($playerQuizAnswers as $playerQuizAnswer)                                
        @php                                
            $correct_option_id = 0;
        @endphp                         

        @foreach ($playerQuizAnswer->option->quiz->options as $option)  
            @if ($option->correct_option == 1) 
                @php  
                    $correct_option_id = $option->id;
                @endphp                    
            @endif
        @endforeach 

        @if($correct_option_id == $playerQuizAnswer->option->id)
            @php                                                        
            $total_correct ++;            
            @endphp
        @endif
                       
    @endforeach

    @php
        if(count($playerQuizAnswers) > 0){
            $correct_percentage = ($total_correct / count($playerQuizAnswers)) * 100;
            $wrong_percentage = 100 - $correct_percentage;
        }

    @endphp
    

    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-body">
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col p-r-0 align-self-center">
                    <h2 class="font-light m-b-0">{!! $total_correct !!}</h2>
                    <h6 class="text-muted">Correct Answers</h6>
                </div>
                <!-- Column -->
                <div class="col text-right align-self-center">
                    <div>
                        <h2 class="font-light m-b-0 text-success">{{round($correct_percentage)}}%</h2>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-body">
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col p-r-0 align-self-center">
                    <h2 class="font-light m-b-0">{{ count($playerQuizAnswers) - $total_correct }} </h2>
                    <h6 class="text-muted">Wrong Answers</h6></div>
                <!-- Column -->
                <div class="col text-right align-self-center">
                    <div>
                        <h2 class="font-light m-b-0 text-danger">{{round($wrong_percentage)}}%</h2>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Player Answer Data</h4>    
                
                <div class="table-responsive m-t-40">
                    <table id="playerQuizAnswerTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>Player Email</th>                                                                
                                <th>Player Answer</th>
                                <th>Correct Answer</th>
                                <th>Status</th>                                                                
                            </tr>
                        </thead>                        
                        
                        <tbody>
                            @foreach ($playerQuizAnswers as $playerQuizAnswer)                                
                            @php                                
                                $correct_option_id = 0;
                            @endphp
                            <tr>
                                <td>{{$playerQuizAnswer->player_activity->player->email}}</td>   
                                <td>{{$playerQuizAnswer->option->value}}</td>     
                                @foreach ($playerQuizAnswer->option->quiz->options as $option)  
                                    @if ($option->correct_option == 1) 
                                        @php  
                                            $correct_option_id = $option->id;
                                        @endphp
                                        <td>{{$option->value}}</td>                                             
                                    @endif
                                @endforeach 

                                @if($correct_option_id == $playerQuizAnswer->option->id)
                                    <td><p class="text-success"><b>Correct</b></p>
                                @else
                                    <td><p class="text-danger"><b>Wrong</b></p></td>
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
<script>  
$(document).ready(function() {
    $('#playerQuizAnswerTable').DataTable();
    
});
</script>
    
<script src="{{asset ('material/plugins/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset ('material/js/toastr.js')}}"></script>

@if(Session::has('success'))
    <script>    
    $(function() {        
        $("document").ready(function(){
            $.toast({                
                text: 'Question Successfully Added',
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