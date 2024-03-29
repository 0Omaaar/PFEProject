<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <div class="header-top-left">
                </div>
                @guest
                <div class="header-top-right">
                    <div class="header-top-link">
                        <a href="{{ route('login') }}">S'authentifier</a>
                        <a href="{{ route('register-user') }}">Créer un compte</a>
                    </div>
                </div>
                @else
                <div class="header-top-right">
                    <div class="header-top-link">
                        <a class="nav-link padd" href="{{ route('profil.show') }}">
                            <i class="fa fa-user fa-sm"></i>  Mon compte
                        </a>
                    </div>
                    <div class="header-top-link">
                        <a href="{{ route('signout') }}">Se déconnecter</a>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </div>
    
    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg">
            <div class="container position-relative">
                <a class="navbar-brand" href="{{ route('annonces.index') }}">
                    <img src="{{ asset('images/brand/4Roues.png') }}" alt="LOGO du site"/>
                </a>
                <div class="mobile-menu-right">
                    {{-- <div class="search-btn">
                        <button type="button" class="nav-right-link"></button>
                    </div> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-mobile-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="main_nav">
                    @if (Auth::check())
                    <ul class="navbar-nav">
                        @php
                        $annonceController = app(\App\Http\Controllers\Front\AnnonceController::class);
                        $nombreFavorites = $annonceController->nombreFavorites();
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link padd" href="{{ route('favorites') }}">
                                <span>{{ $nombreFavorites > 0 ? $nombreFavorites : '' }}</span> <i class="far fa-heart fa-lg"></i> Favorites
                            </a>
                            <h4 id="favorite-count" class="favorite-count"></h4>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link padd" href="{{ route('profil.show') }}">
                                <i class="far fa-user fa-lg"></i> Mon compte
                            </a>
                        </li> -->
                    </ul>
                    @endif
                    <div class="nav-right">
                        {{-- <div class="search-btn">
                            <button type="button" class="nav-right-link"></button>
                        </div> --}}
                        <div class="nav-right-btn mt-2">
                            <a href="{{ route('annonces.ajouter') }}" class="theme-btn">Vendre une
                                voiture</a>
                        </div>
                        <div class="sidebar-btn">
                            <button type="button" class="nav-right-link"></button>
                        </div>
                    </div>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" data-bs-toggle="dropdown">Pages</a>
                        <ul class="dropdown-menu fade-down">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item " href="{{route('contact')}}">Contact</a>
                            </li>
                            @guest
                            <li class="dropdown-submenu">
                                <!-- <a class="dropdown-item " href="#">Authentification</a> -->
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="login.html">Login</a></li>
                                    <li><a class="dropdown-item" href="register.html">Register</a></li>
                                    <li><a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                    </li>
                    </ul>

                </div>
                <div class="search-area">
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Type Keyword...">
                            {{-- <button type="submit" class="search-icon-btn"></button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>