@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card bg-light border-0">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <h3>Devices</h3>
                </div>
                <div class="col-6 d-flex align-items-center justify-content-end">
                    <a href="{{ route('devices.create') }}" role="button" class="btn btn-primary" title="Create new Device"><i class="fas fa-plus"></i>&nbspAdd Device</a>
                </div>
            </div>

            @if(($devices)->count() < 1)
            <div>
                <p>There are currently no devices registrated. Registrate new devices using the "Plus" Button and link the device to a ressource.</p>
            </div>
            @else
            <x-table id="devicesTable">
                <x-slot name="thead">
                    <th style="width: 30%">Name</th>
                    <th style="width: 30%">MAC Address</th>
                    <th style="width: 30%">IP Address</th>
                </x-slot>
                <tbody>
                    @foreach($devices as $device)
                        <tr>
                            <td class="text-center"><i class="fas fa-server"></i></td>
                            <td><a href="{{ route('devices.show', $device) }}" style="color: #212529;">{{ $device->name }}</a></td>
                            <td>{{ $device->mac }}</td>
                            <td>{{ $device->ip }}</td>
                            <td class="d-flex justify-content-around">
                                <a href="" class="" title="Edit Device"><i class="fas fa-lg fa-edit"></i></a>
                                <a href="" class="" data-id="{{ $device->id }}" title="Delete Device" data-toggle="modal" data-target="#deleteDeviceModal"><i class="fas fa-lg fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table>
            @endif
        </div>
    </div> <!-- card -->
</div>

<x-modal title="Delete Device" message="Are you sure to delete this Device?" id="deleteDeviceModal">
    <form action="" method="POST" id="deleteDeviceForm">
    @csrf
    @method('delete')
        <button type="submit" class="btn btn-danger" title="Delete Device">Delete</button>
    </form>
</x-modal>

@endsection

@section('scripts')
<script>
    $('#deleteDeviceModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var url = '{{ route("devices.destroy", ":id") }}';
        url = url.replace(':id', id);
        $('#deleteDeviceForm').attr('action', url);
    })
</script>
@endsection