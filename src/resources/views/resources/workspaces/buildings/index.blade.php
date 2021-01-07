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
                <div class="col-6">
                    <h3>Buildings</h3>
                </div>
                <div class="col-6 d-flex align-items-center justify-content-end">
                    <a href="{{ route('buildings.create') }}" role="button" class="btn btn-primary" title="Add new Building"><i class="fas fa-plus"></i>&nbspAdd Building</a>
                </div>
            </div>
            @if($buildings->count() < 1)
            <div>
                <p>There are currently no Buildings registrated. Add a new Building.</p>
            </div>
            @else
            <x-table id="buildingsTable">
                <x-slot name="thead">
                    <th>Name</th>
                </x-slot>
                <tbody>
                    @foreach($buildings as $building)
                        <tr>
                            <td class="text-center"><i class="fas fa-building"></i></td>
                            <td><a href="{{ route('buildings.show', $building) }}" style="color: #212529;">{{ $building->name }}</a></td>
                            <td class="d-flex justify-content-around">
                                <a href="" class="" title="Edit Building"><i class="fas fa-lg fa-edit"></i></a>
                                <a href="" class="" data-id="{{ $building->id }}" title="Delete Building" data-toggle="modal" data-target="#deleteBuildingModal"><i class="fas fa-lg fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table>
            @endif
        </div>
    </div>
</div>
@endsection