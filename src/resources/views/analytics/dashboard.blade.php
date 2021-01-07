@extends('layouts.app')

@section('content')
<div class="">
    <x-header icon="<span class='fas fa-chart-line mr-3'></span>" title='Dashboard'>
    </x-header>

    <dashboard-component></dashboard-component>

        
        {{--<div class="card-deck">
                <div class="card mb-3 mediumDashboardCard bg-light border-0">
                    <div class="card-body">
                        <presence-chart-container></presence-chart-container>
                    </div>
                </div>
                <div class="card mb-3 mediumDashboardCard bg-light border-0">
                    <div class="card-body">
                        <state-chart-container></state-chart-container>
                    </div>
                </div>  
                <div class="card mb-3 bigDashboardCard bg-light border-0">
                    <div class="card-body">
                        <temperature-chart-container></temperature-chart-container>
                    </div>
                </div>
                <div class="card mb-3 bigDashboardCard bg-light border-0">
                    <div class="card-body">
                        <humidity-chart-container></humidity-chart-container>
                    </div>
                </div> 
                <div class="card mb-3 bigDashboardCard bg-light border-0">
                    <div class="card-body">
                        <lux-chart-container></lux-chart-container>
                    </div>
                </div> 
            </div> --}}
</div>
@endsection