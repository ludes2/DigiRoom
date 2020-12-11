@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <x-header icon="<span class='fas fa-warehouse fa-fw mr-3'></span>" title='My Organisation'>
    </x-header>
    <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
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
                            <h3>Add Event</h3>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="room" class="col-md-3 col-form-label text-md-right">{{ __('Room') }}</label>
                        <div class="col-md-7 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                            </div>
                            <select name="room" id="room" class="form-control">
                                <option selected>Choose...</option>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                            @error('room')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-7 input-group">
                            <input type="text" class="form-control " id="title" name="title" value="{{ old('title') }}" required autocomplete="title">
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="start" class="col-md-3 col-form-label text-md-right">{{ __('Start') }}</label>
                        <div class="col-md-3 input-group">
                            <input type="text" class="form-control date" id="start" name="start" value="{{ old('start') }}" required>
                        </div>
                        <label for="end" class="col-md-1 col-form-label text-md-right">{{ __('End') }}</label>
                        <div class="col-md-3 input-group">
                            <input type="text" class="form-control date" id="end" name="end" value="{{ old('end') }}" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="type" class="col-md-3 col-form-label text-md-right">{{ __('Type') }}</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <div class="col-md-7 d-flex align-items-center">
                                <input type="radio" id="type_single" name="type" value="single" class="custom-control-input">
                                <label class="custom-control-label" for="type_single">Single</label>                   
                            </div>
                            <div class="col-md-7 d-flex align-items-center">
                                <input type="radio" id="type_serie" name="type" value="serie" class="custom-control-input">
                                <label class="custom-control-label" for="type_serie">Serie</label>                   
                            </div>
                        </div>
                    </div> 

                    <div class="form-group row" id="serie" style="display: none">
                        <label for="sample" class="col-md-3 col-form-label text-md-right">{{ __('Sample') }}</label>
                        <div class="custom-control custom-radio border-right">
                            <div class="col-md-3 d-flex align-items-center">
                                <input type="radio" id="sample_daily" name="properties[sample]" value="daily" class="custom-control-input">
                                <label class="custom-control-label" for="sample_daily">Daily</label>                   
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <input type="radio" id="sample_weekly" name="properties[sample]" value="weekly" class="custom-control-input">
                                <label class="custom-control-label" for="sample_weekly">Weekly</label>                   
                            </div>
                             <div class="col-md-3 d-flex align-items-center">
                                <input type="radio" id="sample_monthly" name="properties[sample]" value="monthly" class="custom-control-input">
                                <label class="custom-control-label" for="sample_monthly">Monthly</label>                   
                            </div>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="duration" class="col-form-label text-md-right">{{ __('Ends after') }}</label>
                            <div class="input-group">
                                <input type="number" min="1" max="10" class="form-control" id="duration" name="properties[duration]" value="{{ old('duration') }}">
                            </div>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-7 input-group">
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

@section('scripts')
<script>
$('input[name="type"]').change(function(){
    $('#serie').toggle($('#type_serie').is(':checked'));
})
</script>
@endsection