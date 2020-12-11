@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
</div>
@endsection
