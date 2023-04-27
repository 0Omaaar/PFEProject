<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="{{ route('annonces.index') }}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                        @if (auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.users')}}">Liste des utilisateurs</a>
                            </li>
                            <li>
                                <a href="{{route('admin.index')}}" class="nav-link">Liste des annonces</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="optionsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Gestion supplémentaire
                                </a>
                                <div class="dropdown-menu" aria-labelledby="optionsDropdown">
                                    <a class="dropdown-item" href="{{route('admin.marques')}}">Liste des marques</a>
                                    <a class="dropdown-item" href="{{route('admin.options')}}">Liste des options</a>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

</body>

</html>
