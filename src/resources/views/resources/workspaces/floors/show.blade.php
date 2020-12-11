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
                    <h3>{{ $floor->name }}</h3>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('floors.edit', $floor) }}" role="button" class="btn btn-primary" title="Edit Floor"><i class="fas fa-edit"></i>&nbspEdit Floor</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID</strong></li>
                        <li class="list-group-item"><strong>Name</strong></li>
                        <li class="list-group-item"><strong>Description</strong></li>
                    </ul>    
                </div>
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">{{ $floor->id }}</li>
                        <li class="list-group-item">{{ $floor->name }}</li>
                        <li class="list-group-item">{{ ( isset($floor->description) ) ? $floor->description : '-' }}</li>
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
                    <h3>Rooms</h1>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('rooms.create') }}" role="button" class="btn btn-primary" title="Add new Room"><i class="fas fa-plus"></i>&nbspAdd Room</a>
                </div>
            </div>

            @if(($floor->rooms)->count() < 1)
            <div>
                <p>There are currently no Rooms registrated. Add a new Rooms.</p>
            </div>
            @else
            <x-table id="roomsTable">
                <x-slot name="thead">
                    <th>Name</th>
                </x-slot>
                <tbody>
                    @foreach($floor->rooms as $room)
                        <tr>
                            <td class="text-center"><i class="fas fa-door-open"></i></td>
                            <td><a href="{{ route('rooms.show', $room) }}" style="color: #212529;">{{ $room->name }}</a></td>
                            <td class="d-flex justify-content-around">
                                <a href="" class="" title="Edit Room"><i class="fas fa-lg fa-edit"></i></a>
                                <a href="" class="" data-id="{{ $floor->id }}" title="Delete Room" data-toggle="modal" data-target="#deleteRoomModal"><i class="fas fa-lg fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table>
            @endif
        </div> <!-- card-body -->
    </div> <!-- card -->

</div>
@endsection