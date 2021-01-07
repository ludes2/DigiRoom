@extends('layouts.app')

@section('content')
<!--<div class="container-fluid">
    <div class="card bg-light border-0">

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="jumbotron">
                <h1>PHP Graph Tutorial</h1>
                <p class="lead">This sample app shows how to use the Microsoft Graph API to access a user's data from PHP</p>
                @if(isset($userName))
                    <h4>Welcome {{ $userName }}!</h4>
                    <p>Use the navigation bar at the top of the page to get started.</p>
                @else
                    <a href="/signin" class="btn btn-primary btn-large">Click here to sign in</a>
                @endif
            </div>
            
        </div>
    </div>
</div>-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <h1 class="display-1 card-title">{{ config('app.name', 'mySuperSmartHome') }}</h1>
                            <h3 class="card-subtitle">this website is a private project and access is only granted to authorized users. </h3>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
