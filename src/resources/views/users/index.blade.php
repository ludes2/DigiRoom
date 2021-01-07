@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card bg-light border-0">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <h1>Users</h1>
                </div>
                <div class="col-6 d-flex align-items-center justify-content-end">
                    <a href="{{ route('users.create') }}" role="button" class="btn btn-primary" title="Create new User"><i class="fas fa-plus"></i>&nbspAdd User</a>
                </div>
            </div>
            <x-table id="usersTable">
                <x-slot name="thead">
                    <th style="width: 30%">Firstname</th>
                    <th style="width: 30%">Lastname</th>
                    <th style="width: 30%">E-Mail</th>
                </x-slot>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex justify-content-around">
                                <a href="{{ route('users.edit', $user) }}" class="" title="Edit User"><i class="fas fa-lg fa-edit"></i></a>
                                <a href="" class="" data-id="{{ $user->id }}" title="Delete User" data-toggle="modal" data-target="#deleteUserModal"><i class="fas fa-lg fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table>
        </div>
    </div>
</div>

<x-modal title="Delete User" message="Are you sure to delete this User?" id="deleteUserModal">
    <form action="" method="POST" id="deleteUserForm">
    @csrf
    @method('delete')
        <button type="submit" class="btn btn-danger" title="Delete User">Delete</button>
    </form>
</x-modal>

@endsection

@section('scripts')
<script>
    $('#deleteUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var url = '{{ route("users.destroy", ":id") }}';
        url = url.replace(':id', id);
        $('#deleteUserForm').attr('action', url);
    })
</script>
@endsection