<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm mb-3">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <i class="fas fa-home fa-fw mr-2"></i>{{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    {{--<ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link {{$_SERVER['REQUEST_URI'] == '/' ? ' active' : ''}}">Welcome</a>
                        </li>
                        <li class="nav-item">
                            <a href="/home" class="nav-link {{$_SERVER['REQUEST_URI'] == '/home' ? ' active' : ''}}">Home</a>
                        </li>
                        @if(isset($userName))
                        <li class="nav-item" data-turbolinks="false">
                            <a href="/calendar" class="nav-link{{$_SERVER['REQUEST_URI'] == '/calendar' ? ' active' : ''}}">Calendar</a>
                        </li>
                        @endif
                    </ul>--}}

                    <!--<ul class="navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="https://docs.microsoft.com/graph/overview" target="_blank"><i class="fas fa-external-link-alt mr-1"></i>Docs</a>
                        </li>
                    @if(isset($userName))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    @if(isset($user_avatar))
                        <img src="{{ $user_avatar }}" class="rounded-circle align-self-center mr-2" style="width: 32px;">
                    @else
                        <i class="fas fa-user-circle fa-lg rounded-circle align-self-center mr-2" style="width: 32px;"></i>
                     @endif </a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <h5 class="dropdown-item-text mb-0">{{ $userName }}</h5>
                        <p class="dropdown-item-text text-muted mb-0">{{ $userEmail }}</p>
                        <div class="dropdown-divider"></div>
                        <a href="/signout" class="dropdown-item">Sign Out from MS</a>
                    </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/signin" class="nav-link">Sign In to MS</a>
                        </li>
                    @endif
                    </ul>-->

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link">DE</a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">EN</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user fa-lg fa-fw mr-2"></i>{{ __('Login') }}</a>
                            </li>
                            <!--@if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif-->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-circle fa-2x rounded-circle align-self-center mr-1"></i>
                                    Account<span class="caret ml-1"></span>
                                </a>                                 

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>