@extends('admin.base')
@section('title', 'Accueil')
@section('page-title', 'Tableau de board')
@section('content')

    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-xl-4 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>{{$nombre_annonces}}</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('admin.annonces')}}">Voir Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-1">Nombre d'annonces</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
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
                            <h2>{{$nombre_users}}</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('admin.users')}}">Voir Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-1">Nombre d'utilisateurs</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
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
                <div class="col-xl-4 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>{{$added_users}}</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('admin.users')}}">Voir Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-1">Nombre d'utilisateurs ajoutés ajourd'hui</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
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
            <div class="row">
                <div class="col-xl-4 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>{{$annonces_ajoutees}}</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('admin.annonces')}}">Voir Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-1">Nombre d'annonces ajoutées ajourd'hui</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
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
                <div class="col-xl-5 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>{{$annonces_supprimees}}</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('admin.annonces')}}">Voir Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-1">Nombre d'annonces supprimées ajourd'hui</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
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
            </div>
        </div>
    </div>


@endsection
