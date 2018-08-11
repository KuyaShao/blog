@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            DASHBOARD
        </div>
        <div class="panel-body">
             <div class="col-lg-3">
         <div class="panel panel-info">
            <div class="panel-heading text-center">
                POSTED
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{$post}}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
         <div class="panel panel-danger">
            <div class="panel-heading text-center">
                TRASHED POST
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{$trashed}}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
         <div class="panel panel-info">
            <div class="panel-heading text-center">
                USER
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{$user}}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
         <div class="panel panel-info">
            <div class="panel-heading text-center">
                CATEGORIES
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{$categ}}</h1>
            </div>
        </div>
    </div>

        </div>
    </div> 
    

    
@endsection
