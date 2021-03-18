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

<div class="row">

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">                
                <form action="{{ route('quiz.import.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">                        
                        <h4 class="card-title">File Upload1</h4>                        
                        <input required type="file" name="file" id="input-file-now" class="dropify" />
                    </div>                    
                    <button class="btn btn-success">Import Quiz Data</button>
                </form>
            </div>
            
        </div>
    </div>    
    
</div>
@endsection

@section('scripts')


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