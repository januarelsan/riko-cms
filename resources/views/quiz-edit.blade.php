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
                                <input required type="text" class="form-control" name="option_0" value="{{$options[0]->value}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option 2</label>
                                <input required type="text" class="form-control" name="option_1" value="{{$options[1]->value}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option 3</label>
                                <input required type="text" class="form-control" name="option_2" value="{{$options[2]->value}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option 4</label>
                                <input required type="text" class="form-control" name="option_3" value="{{$options[3]->value}}">
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
                                <input required type="text" class="form-control" name="option_0" value="{{$options[0]->value}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Option 2</label>
                                <input required type="text" class="form-control" name="option_1" value="{{$options[1]->value}}">
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
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    

    
    
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