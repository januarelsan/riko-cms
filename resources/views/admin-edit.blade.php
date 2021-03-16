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
            <h3 class="box-title m-b-0">Form Edit</h3>
            <p class="text-muted m-b-30 font-13"> Admin  </p>
            
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{ route('admin.edit.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input hidden type="text" name="id" value="{{$user->id}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input required class="form-control" rows="3" name="name" placeholder="{{$user->name}}" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input required class="form-control" rows="3" name="email" placeholder="{{$user->email}}" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input required class="form-control" rows="3" name="password" >
                        </div>
                        
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                        <a type="button" href="{{ route('index') }}" class="btn btn-inverse">Cancel</a>
                        
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

@endsection