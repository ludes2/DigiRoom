@extends('layouts.app')

@section('content')
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