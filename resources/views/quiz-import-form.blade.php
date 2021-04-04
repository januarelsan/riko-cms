@extends('layouts.main')

@section('breadcrumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Question</a></li>
            <li class="breadcrumb-item active">Import Form</li>
        </ol>
    </div>                    
</div>
@endsection

@section('content')


<!-- <div class="row">

    <div class="col-md-6">
       
        <div class="card">
            <div class="card-body">                
                <h4 class="card-title">File Template</h4>                                               
                <button class="btn btn-success">Download</button>
                
            </div>
            
        </div>
    </div>    
    
</div> -->

<div class="row">

    <div class="col-md-6">
        @if ($errors->any())        
            @foreach ($errors->all() as $error)                
                <div class="alert alert-danger"></i> 
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            @endforeach

            
        @endif
        <div class="card">
            <div class="card-body">                
                <form action="{{ route('quiz.import.two.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">                        
                        <h4 class="card-title">File Upload Two Option</h4>   
                        <p class="text-muted m-b-30 font-13">File yang anda import harus dengan format .xlsx dan dengan ukuran max 2MB</p>
                        
                        <input required type="file" name="file" id="input-file-now" class="dropify" />
                    </div>                    
                    <button class="btn btn-success">Import Quiz Data</button>
                    <a type="button" href="{{ route('quiz.download.two') }}" class="btn btn-inverse">Download Template</a>
                </form>
            </div>
            
        </div>

        <div class="card">
            <div class="card-body">                
                <form action="{{ route('quiz.import.four.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">                        
                        <h4 class="card-title">File Upload Four Option</h4>   
                        <p class="text-muted m-b-30 font-13">File yang anda import harus dengan format .xlsx dan dengan ukuran max 2MB</p>
                        
                        <input required type="file" name="file" id="input-file-now" class="dropify" />
                    </div>                    
                    <button class="btn btn-success">Import Quiz Data</button>
                    <a type="button" href="{{ route('quiz.download.four') }}" class="btn btn-inverse">Download Template</a>
                </form>
            </div>
            
        </div>
    </div>    
    
</div>
@endsection

@section('scripts')

<script src="{{asset ('material/plugins/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset ('material/js/toastr.js')}}"></script>

@if(Session::has('message'))
    <script>    
    $(function() {        
        $("document").ready(function(){
            $.toast({                
                text: 'File Imported',
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
    // Basic
    $('.dropify').dropify();

    // Translated
    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    })
});
</script>

@endsection