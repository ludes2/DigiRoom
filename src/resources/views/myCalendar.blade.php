@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.components.side_nav')
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h1>My Calendar</h1>
                        </div>
                        <div class="col-md-2 d-flex align-items-center justify-content-end">
                            <a href="" role="button" class="btn btn-primary" title="Create new Event"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive-md">
                        <table class="table table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Organizer</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($events)
                            @foreach($events as $event)
                                <tr>
                                <td>{{ $event->getOrganizer()->getEmailAddress()->getName() }}</td>
                                <td>{{ $event->getSubject() }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->getStart()->getDateTime())->format('j.n.Y, G:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->getEnd()->getDateTime())->format('j.n.Y, G:i') }}</td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    </div>                    
                </div> <!-- card-body -->
            </div>
        </div>
    </div>
</div>
@endsection