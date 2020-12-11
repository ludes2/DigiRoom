@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('devices.store') }}" method="post" enctype="multipart/form-data">
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
                            <h1>Register device</h1>
                        </div>
                    </div>   
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Friendly Name') }}</label>
                        <div class="col-md-6 input-group">
                            <input type="text" class="form-control " id="name" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Room-110-Device">
                        </div>
                    </div>  

                    <div class="form-group row">
                        <label for="mac" class="col-md-4 col-form-label text-md-right">{{ __('MAC Address') }}</label>
                        <div class="col-md-6 input-group">
                            <input type="text" class="form-control" id="mac" name="mac" value="{{ old('mac') }}" required autocomplete="mac" placeholder="00:80:41:AE:FD:7E">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ip" class="col-md-4 col-form-label text-md-right">{{ __('IP Address') }}</label>
                        <div class="col-md-6 input-group">
                            <input type="text" class="form-control" id="ip" name="ip" value="{{ old('ip') }}" required autocomplete="ip" placeholder="192.168.1.1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="resourceType" class="col-md-4 col-form-label text-md-right">{{ __('Resource Type') }}</label>
                        <div class="col-md-6 input-group">
                            <select name="resourceType" id="resourceType" class="form-control">
                                <option selected>Select the Type of Resource the Device will be linked to</option>
                                @foreach(__('messages.resourceTypes') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('resourceType')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="room" class="col-md-4 col-form-label text-md-right">{{ __('Resource') }}</label>
                        <div class="col-md-6 input-group">
                            <select name="room" id="room" class="form-control">
                                <option selected>Select the specific Resource the Device will be linked to</option>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                            @error('resource')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                </div> <!-- card-body -->
                <div class="card-footer text-center bg-light">
                    <button type="submit" class="btn btn-primary mx-2">Add and link</button>
                    <button type="reset" onclick="location.relaod()" class="btn btn-secondary mx-2">Cancel</button>
                </div>
            </div> <!-- card -->
        </form>
</div>
@endsection