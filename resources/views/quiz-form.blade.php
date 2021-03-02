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
    <div class="col-md-6">
        <div class="card card-body">
            <h3 class="box-title m-b-0">Form</h3>
            <p class="text-muted m-b-30 font-13"> Quiz 4 Option </p>
            
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{ route('quiz.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Question</label>
                            <textarea class="form-control" rows="3" name="question"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Option 1</label>
                            <input type="text" class="form-control" name="option_0">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Option 2</label>
                            <input type="text" class="form-control" name="option_1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Option 3</label>
                            <input type="text" class="form-control" name="option_2">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Option 4</label>
                            <input type="text" class="form-control" name="option_3">
                        </div>
                        <div class="form-group">
                            <label>Correct Option</label>
                            <select class="custom-select col-12" id="inlineFormCustomSelect" name="correct_option">
                                <option value="0" selected="0">Option 1</option>
                                <option value="1">Option 2</option>
                                <option value="2">Option 3</option>
                                <option value="3">Option 4</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-body">
            <h3 class="box-title m-b-0">Form</h3>
            <p class="text-muted m-b-30 font-13"> Quiz 2 Option</p>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{ route('quiz.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Question</label>
                            <textarea class="form-control" rows="3" name="question"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Option 1</label>
                            <input type="text" class="form-control" name="option_0">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Option 2</label>
                            <input type="text" class="form-control" name="option_1">
                        </div>
                        
                        <div class="form-group">
                            <label>Correct Option</label>
                            <select class="custom-select col-12" id="inlineFormCustomSelect" name="correct_option">
                                <option value="0" selected="0">Option 1</option>
                                <option value="1">Option 2</option>                          
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        
                    </form>
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