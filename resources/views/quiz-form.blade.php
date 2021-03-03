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
        <div class="card">
            <div class="card-body p-b-0">
                <h4 class="card-title">Form </h4>
                <h6 class="card-subtitle">Choose Form Option</h6>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab2" role="tablist">
                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#form4" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Form 4</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#form2" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-book"></i></span> <span class="hidden-xs-down">Form 2</span></a> </li>
                    
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active show" id="form4" role="tabpanel">
                        <div class="p-20">                                                        
                            <p class="text-muted m-b-30 font-13"> Quiz 4 Option </p>                            
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="{{ route('quiz.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Question</label>
                                            <textarea required class="form-control" rows="3" name="question"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Option 1</label>
                                            <input required type="text" class="form-control" name="option_0">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Option 2</label>
                                            <input required type="text" class="form-control" name="option_1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Option 3</label>
                                            <input required type="text" class="form-control" name="option_2">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Option 4</label>
                                            <input required type="text" class="form-control" name="option_3">
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
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Add</button>
                                        
                                    </form>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="tab-pane p-20" id="form2" role="tabpanel">                                                                          
                        <p class="text-muted m-b-30 font-13"> Quiz 2 Option </p>
                        
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form action="{{ route('quiz.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Question</label>
                                        <textarea required class="form-control" rows="3" name="question"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Option 1</label>
                                        <input required type="text" class="form-control" name="option_0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Option 2</label>
                                        <input required type="text" class="form-control" name="option_1">
                                    </div>                                   
                                    <div class="form-group">
                                        <label>Correct Option</label>
                                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="correct_option">
                                            <option value="0" selected="0">Option 1</option>
                                            <option value="1">Option 2</option>                                            
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Add</button>
                                    
                                </form>
                            </div>
                        </div>                            
                    </div>
                    <div class="tab-pane p-20" id="messages7" role="tabpanel">
                        3
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