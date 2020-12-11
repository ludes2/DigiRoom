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
                    <h3>{{ $building->name }}</h3>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('buildings.edit', $building) }}" role="button" class="btn btn-primary" title="Edit Building"><i class="fas fa-edit"></i>&nbspEdit Building</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID</strong></li>
                        <li class="list-group-item"><strong>Name</strong></li>
                        <li class="list-group-item"><strong>Address</strong></li>
                        <li class="list-group-item"><strong>Description</strong></li>
                    </ul>    
                </div>
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">{{ $building->id }}</li>
                        <li class="list-group-item">{{ $building->name }}</li>
                        <li class="list-group-item">{{ $building->address['street']}}, {{ $building->address['postcode'] }} {{ $building->address['city'] }}</li>
                        <li class="list-group-item">{{ ( isset($buildings->description) ) ? $building->description : '-' }}</li>
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
                    <h3>Floors</h1>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('floors.create') }}" role="button" class="btn btn-primary" title="Add new Floor"><i class="fas fa-plus"></i>&nbspAdd Floor</a>
                </div>
            </div>

            @if(($building->floors)->count() < 1)
            <div>
                <p>There are currently no floors registrated. Add a new floors.</p>
            </div>
            @else
            <x-table id="floorsTable">
                <x-slot name="thead">
                    <th>Name</th>
                </x-slot>
                <tbody>
                    @foreach($building->floors as $floor)
                        <tr>
                            <td class="text-center"><i class="fas fa-layer-group"></i></td>
                            <td><a href="{{ route('floors.show', $floor) }}" style="color: #212529;">{{ $floor->name }}</a></td>
                            <td class="d-flex justify-content-around">
                                <a href="" class="" title="Edit Floor"><i class="fas fa-lg fa-edit"></i></a>
                                <a href="" class="" data-id="{{ $floor->id }}" title="Delete Floor" data-toggle="modal" data-target="#deleteFloorModal"><i class="fas fa-lg fa-trash"></i></a>
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