@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <x-header icon="<span class='fas fa-warehouse fa-fw mr-3'></span>" title='My Organisation'>
    </x-header>
    <form action="{{ route('buildings.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="card bg-light border-0">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="row">
                        <div class="col-md-12">
                            <h3>Add Building</h3>
                        </div>
                    </div>   
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6 input-group">
                            <input type="text" class="form-control " id="name" name="name" value="{{ old('name') }}" required autocomplete="name">
                        </div>
                    </div>  

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Street') }}</label>
                        <div class="col-md-6 input-group">
                            <input type="text" class="form-control" id="street" name="address[street]" value="" required autocomplete="street">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('ZIP') }}</label>
                        <div class="col-md-1 input-group">
                            <input type="text" class="form-control" id="postcode" name="address[postcode]" value="" required autocomplete="postcode">
                        </div>
                        <label for="address" class="col-md-1 col-form-label text-md-right">{{ __('City') }}</label>
                        <div class="col-md-4 input-group">
                            <input type="text" class="form-control" id="city" name="address[city]" value="" required autocomplete="city">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                        <div class="col-md-6 custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    
                </div> <!-- card-body -->
                <div class="card-footer text-center bg-light">
                    <button type="submit" class="btn btn-primary mx-2">Add</button>
                    <button type="reset" onclick="location.relaod()" class="btn btn-secondary mx-2">Cancel</button>
                </div>
            </div> <!-- card -->
        </form>
</div>
@endsection