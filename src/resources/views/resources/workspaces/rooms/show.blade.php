@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <x-header icon="<span class='fas fa-warehouse fa-fw mr-3'></span>" title='My Organisation'>
    </x-header>
    <div class="card bg-light border-0">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-md-10">
                    <h3>{{ $room->name }}</h3>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('rooms.edit', $room) }}" role="button" class="btn btn-primary" title="Edit Room"><i class="fas fa-edit"></i>&nbspEdit Room</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID</strong></li>
                        <li class="list-group-item"><strong>Name</strong></li>
                        <li class="list-group-item"><strong>Capacity</strong></li>
                        <li class="list-group-item"><strong>Description</strong></li>
                    </ul>    
                </div>
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">{{ $room->id }}</li>
                        <li class="list-group-item">{{ $room->name }}</li>
                        <li class="list-group-item">{{ $room->capacity }}</li>
                        <li class="list-group-item">{{ ( isset($room->description) ) ? $room->description : '-' }}</li>
                    </ul>    
                </div>
                <div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Temperatur</strong></li>
                        <li class="list-group-item"><strong>Humidity</strong></li>
                        <li class="list-group-item"><strong>Door</strong></li>
                    </ul>    
                </div>
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item {{ ( $temperature >= 28 ) ? 'list-group-item-danger' : (( $temperature >= 24 && $temperature < 28 ) ?  'list-group-item-warning' : (( $temperature >= 20 && $temperature < 24 ) ? 'list-group-item-success' : 'list-group-item-info'))}}">{{ $temperature }}&nbsp°C</li>
                        <li class="list-group-item {{ ( $temperature >= 70 ) ? 'list-group-item-info' : (( $temperature >= 50 && $temperature < 70 ) ?  'list-group-item-success' : (( $temperature >= 20 && $temperature < 50 ) ? 'list-group-item-warning' : 'list-group-item-danger'))}}">{{ $humidity }}&nbsp%</li>
                        <li class="list-group-item">{!! ( $door == "open" ) ? '<i class="fas fa-lg fa-door-open"></i>' : '<i class="fas fa-lg fa-door-closed"></i>'  !!}&nbsp{{ $door }}</li>
                    </ul>    
                </div>
            </div>
        </div> <!-- card-body -->
        <div class="card-footer bg-light"></div>
    </div> <!-- card -->

    <div class="card bg-light border-0">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-10">
                    <h3>Connected Device</h3>
                </div>
                @if($room->device()->count() < 1)
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('devices.create') }}" role="button" class="btn btn-primary" title="Add new Device"><i class="fas fa-plus"></i>&nbspAdd Device</a>
                </div>
                <div class="col-md-12">
                    <p>There is currently no Device registrated. Add a new Device.</p>
                </div> 
                @else            
            </div>
            <x-table id="deviceTable">
                <x-slot name="thead">
                    <th>Name</th>
                    <th>MAC Address</th>
                    <th>IP Address</th>
                </x-slot>
                <tbody>
                    <tr>
                        <td class="text-center"><i class="fas fa-server"></i></td>
                        <td><a href="{{ route('devices.show', $room->device) }}" style="color: #212529;">{{ $room->device->name }}</a></td>
                        <td>{{ $room->device->mac }}</td>
                        <td>{{ $room->device->ip }}</td>
                        <td class="d-flex justify-content-around">
                            <a href="" class="" title="Edit Device"><i class="fas fa-lg fa-edit"></i></a>
                            <a href="" class="" data-id="{{ $room->device->id }}" title="Delete Device" data-toggle="modal" data-target="#deleteDeviceModal"><i class="fas fa-lg fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </x-table>
            @endif
        </div> <!-- card-body -->
        <div class="card-footer bg-light"></div>
    </div> <!-- card -->

    <div class="card bg-light border-0">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-10">
                    <h3>Events</h3>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('events.create') }}" role="button" class="btn btn-primary" title="Add new Event"><i class="fas fa-plus"></i>&nbspAdd Event</a>
                </div>            
            </div>

            <fullcalendar-component></fullcalendar-component>
           
        </div> <!-- card-body -->
    </div> <!-- card -->

</div>
@endsection