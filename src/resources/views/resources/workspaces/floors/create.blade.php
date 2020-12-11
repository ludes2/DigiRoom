@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <x-header icon="<span class='fas fa-warehouse fa-fw mr-3'></span>" title='My Organisation'>
    </x-header>
    <form action="{{ route('floors.store') }}" method="post" enctype="multipart/form-data">
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
                            <h3>Add Floor</h3>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="building" class="col-md-4 col-form-label text-md-right">{{ __('Building') }}</label>
                        <div class="col-md-6 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="building" id="building" class="form-control">
                                <option selected>Choose...</option>
                                @foreach($buildings as $building)
                                    <option value="{{ $building->id }}">{{ $building->name }}</option>
                                @endforeach
                            </select>
                            @error('building')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6 input-group">
                            <input type="text" class="form-control " id="name" name="name" value="{{ old('name') }}" required autocomplete="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-6 input-group">
                            <textarea class="form-control " id="description" name="description" autocomplete="description" rows="3"></textarea>
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