<div class="row" id="sidebar">
    <div class="col-md-12">
        <div class="card card-body bg-light border-0">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item mb-3">
                    <a href="{{ route('users.index') }}" class="nav-link {{ ( Request::is('users*') ) ? 'active' : '' }} mb-1"><i class="fas fa-user fa-lg fa-fw mr-2"></i><span>Users</span></a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ route('devices.index') }}" class="nav-link {{ ( Request::is('devices*') ) ? 'active' : '' }} mb-1"><i class="fas fa-server fa-lg fa-fw mr-2"></i><span>Devices</span></a>
                </li>
                <li class="nav-item mb-3">
                    <a role="button" href="#subRessource" class="nav-link mb-1" data-toggle="collapse" aria-expanded="false" aria-controls="subRessource"><i class="fas fa-file fa-lg fa-fw mr-2"></i><span>Resources</span></a>
                    <ul class="nav nav-pills ml-3 collapse {{ ( Request::is('resource/workspace*') ) ? 'show' : '' }}" id="subRessource">
                        <li class="nav-item mb-3">
                            <a href="{{ route('buildings.index') }}" class="nav-link {{ ( Request::is('*workspace*') ) ? 'active' : '' }} mb-1"><i class="fas fa-network-wired fa-lg fa-fw mr-2"></i><span>Workspaces</span></a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="" class="nav-link {{ ( Request::is('*parking*') ) ? 'active' : '' }} mb-1"><i class="fas fa-parking fa-lg fa-fw mr-2 "></i><span>Parking</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ route('getDashboard') }}" class="nav-link {{ ( Request::is('analytics*') ) ? 'active' : '' }} mb-1"><i class="fas fa-chart-bar fa-lg fa-fw mr-2"></i><span>Analytics</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>