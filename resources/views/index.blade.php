@extends('layouts.main')

@section('breadcrumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>                    
</div>
@endsection

@section('content')
    
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                Welcome to RIKO Content Management System
            </div>

            
        </div>
        <div class="card">
            <div class="card-body">
                @if ($scoring_status->activated == 0)                                        
                    <h3 class="box-title m-b-0">Scoring Status <p class="text-danger"><b>Inactive</b></p></h3>                                    
                    <a type="button" href="{{ route('scoring.activate') }}" class="btn btn-success">Activate</a>                                        
                @else
                    <h3 class="box-title m-b-0">Scoring Status <p class="text-primary"><b>Actived</b></p></h3>                                                               
                    <a type="button" href="{{ route('scoring.deactivate') }}" class="btn btn-danger">Deactive</a>                                        
                @endif                                   

            </div>    
        </div>

        
        
    </div>

    <div class="col-6">
        
        <div class="card">
            <div class="card-body">
                
                <h4 class="card-title">Daily Active Player</h4>
                <div class="ct-bar-chart" style="height: 400px;"></div>
            </div>    
        </div>
        
    </div>
</div>

@endsection




@section('scripts')

<!-- chartist chart -->
<script src="{{asset ('material/plugins/chartist-js/dist/chartist.min.js')}}"></script>
<script src="{{asset ('material/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset ('material/plugins/chartist-js/dist/chartist-init.js')}}"></script>


@endsection