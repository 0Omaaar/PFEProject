@extends('admin.base')
@section('title', 'Accueil')
@section('page-title', 'Tableau de board')
@section('content')

<div class="content-wrapper">
    <div class="content">
        <h3 class="mb-3">Aujourd'hui</h3>
        <div class="row">
            <div class="col-xl-4 col-sm-6">
                <div class="card card-default card-mini">
                    <div class="card-header">
                        <div class="sub-title">
                            <span class="mr-1">Nombre d'annonces ajoutées</span>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('admin.annonces')}}">Voir Plus</a>
                            </div>
                        </div>
                        <h2>{{$annonces_ajoutees}}</h2>
                    </div>
                    <!-- <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-4"></div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card card-default card-mini">
                    <div class="card-header">
                        <div class="sub-title">
                            <span class="mr-1">Nombre d'annonces supprimées</span>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('admin.annonces')}}">Voir Plus</a>
                            </div>
                        </div>
                        <h2>{{$annonces_supprimees}}</h2>
                    </div>
                    <!-- <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-2"></div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card card-default card-mini">
                    <div class="card-header">
                        <div class="sub-title">
                            <span class="mr-1">Nombre d'utilisateurs ajoutés</span>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('admin.users')}}">Voir Plus</a>
                            </div>
                        </div>
                        <h2>{{$added_users}}</h2>

                    </div>
                    <!-- <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-5"></div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>

        <h3 class="mb-3">Tout le temps</h3>
        <div class="row">
            <div class="col-xl-4 col-sm-6">
                <div class="card card-default card-mini">
                    <div class="card-header">
                        <!-- <i class="fa-solid fa-rotate-left fa-lg"></i> -->
                        <div class="sub-title">
                            <span class="mr-1">Nombre d'annonces</span>
                        </div>

                        <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('admin.annonces')}}">Voir Plus</a>
                            </div>
                        </div>
                        <h2>{{$nombre_annonces}}</h2>

                    </div>
                    <!-- <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-1"></div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card card-default card-mini">
                    <div class="card-header">
                        <div class="sub-title">
                            <span class="mr-1">Nombre de contacts</span>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('admin.contacts')}}">Voir Plus</a>
                            </div>
                        </div>
                        <h2>{{$nombre_contacts}}</h2>
                    </div>
                    <!-- <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-2"></div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
        

            <div class="col-xl-4 col-sm-6">
                <div class="card card-default card-mini">
                    <div class="card-header">
                        <div class="sub-title">
                            <span class="mr-1">Nombre d'utilisateurs</span>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('admin.users')}}">Voir Plus</a>
                            </div>
                        </div>
                        <h2>{{$nombre_users}}</h2>
                    </div>
                    <!-- <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-3"></div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection