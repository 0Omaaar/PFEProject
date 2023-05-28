@extends('admin.base')
@section('title', 'Statistiques Annonce')
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
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>{{$nombre_etat_active}}</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('admin.index')}}">Voir Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-0">Nombre d'annonces activées</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>{{$nombre_etat_desactive}}</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('admin.index')}}">Voir Plus</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                <span class="mr-1">Nombre d'annonces désactivées</span>
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
