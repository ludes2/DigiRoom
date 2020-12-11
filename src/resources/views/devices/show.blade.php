@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <x-header icon="<span class='fas fa-server fa-fw mr-3'></span>" title='Devices'>
    </x-header>
    <div class="card bg-light border-0">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-10">
                    <h3>{{ $device->name }}</h3>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="#" role="button" class="btn btn-primary" title="Create new Device"><i class="fas fa-edit"></i>&nbspEdit Device</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name</strong></li>
                        <li class="list-group-item"><strong>MAC Address</strong></li>
                        <li class="list-group-item"><strong>IP Address</strong></li>
                        <li class="list-group-item"><strong>Room</strong></li>
                    </ul>    
                </div>
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item">{{ $device->name }}</li>
                        <li class="list-group-item">{{ $device->mac }}</li>
                        <li class="list-group-item">{{ $device->ip }}</li>
                        <li class="list-group-item">{{ $device->room->name }}</li>
                    </ul>    
                </div>
                <div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Status</strong></li>
                    </ul>    
                </div>
                <div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item">{!! ( $status === 0 ) ? '<i class="fas fa-circle text-success"></i>' : '<i class="fas fa-circle text-danger"></i>' !!}</li>
                    </ul>    
                </div>
                <div class="col-md-3">
                    <img src="https://media.digikey.com/Photos/Raspberry%20Pi/MFG_RASPBERRY-PI-3-MODEL-B.jpg" class="align-self-end img-fluid" style="max-width: 100%; height: auto;">
                </div>
            </div>            
        </div>
        <div class="card-footer bg-light"></div>
    </div> <!-- card -->

    <div class="card bg-light border-0">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-10">
                    <h5>Sensors</h5>
                </div>
            </div>
            @if(count($sensors) < 1)
            <div>
                <p>There are currently no sensor connected.</p>
            </div>
            @else
            <x-table id="sensorsTable">
                <x-slot name="thead">
                    <th>Name</th>
                    <th>Model</th>
                    <th>MAC Address</th>
                    <th>IP Address</th>
                    <th>Battery</th>
                </x-slot>
                <tbody>
                    @foreach($sensors as $sensor)
                        <tr>
                            <td class="text-center align-middle"><i class="fas fa-broadcast-tower"></i></td>
                            <td class="align-middle"><a href="#" style="color: #212529;">{{ $sensor->name }}</a></td>
                            <td class="align-middle">{{ $sensor->model }}</td>
                            <td class="align-middle">{{ $sensor->mac }}</td>
                            <td class="align-middle">{{ $sensor->ip }}</td>
                            <td class="align-middle">{!! ( !empty($sensor->battery) ) ? (( $sensor->battery[0]->value > 75 ) ? 
                                '<i class="fas fa-lg fa-battery-full text-success"></i>&nbsp' . $sensor->battery[0]->value .'%' : (( $sensor->battery[0]->value > 50 && $sensor->battery[0]->value <= 75 ) ?  
                                '<i class="fas fa-lg fa-battery-three-quarters text-warning"></i>' . $sensor->battery[0]->value .'%' : (( $sensor->battery[0]->value > 25 && $sensor->battery[0]->value <= 50 ) ? 
                                '<i class="fas fa-lg fa-battery-half text-warning"></i>' . $sensor->battery[0]->value .'%'  : '<i class="fas fa-lg fa-battery-quarter text-danger"></i>' . $sensor->battery[0]->value .'%' ))) : '-' !!}</td>
                            <td class="d-flex justify-content-center">
                                <img src="https://via.placeholder.com/150" class="img-thumbnail" alt="placeholder"> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table>
            @endif
        </div>
        <div class="card-footer bg-light"></div>
    </div> <!-- card -->
</div>
@endsection

@section('scripts')
<script>
Echo.channel('temperatures')
    .listen('.NewTemperature', (e) => {
        console.log(e);
    });
</script>
@endsection