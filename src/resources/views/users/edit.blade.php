@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="card bg-light border-0">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif       
                        <div class="row">
                            <div class="col-md-10">
                                <h3>Edit {{ $user->firstname }} {{ $user->lastname }}</h3>
                            </div>
                        </div>     

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>
                            <div class="col-md-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ $user->firstname }}" required autocomplete="firstname">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>
                            <div class="col-md-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ $user->lastname }}" required autocomplete="lastname">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div> <!-- card-body -->
                    <div class="card-footer text-center bg-light">
                        <button type="submit" class="btn btn-primary mx-2">Save</button>
                        <button type="reset" onclick="(function(){window.history.back();})()" class="btn btn-secondary mx-2">Cancel</button>
                    </div>
                </div> <!-- card -->
            </form>
        </div>
    </div>
</div>
@endsection