<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- <script src="{{ asset('admin/plugins/jquery-3.6.0.min.js') }}"></script> -->
    <!-- GOOGLE FONTS -->
    <link href="{{ asset('admin/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/all-fontawesome.min.css') }}">
    <link href="{{ asset('admin/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('admin/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <link href="{{ asset('admin/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />

    <!-- FAVICON -->
    <link href="{{ asset('admin/images/favicon.png') }}" rel="shortcut icon" />

    <script src="{{ asset('admin/plugins/nprogress/nprogress.js') }}"></script>
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>
    {{-- Wrapper --}}
    <div class="wrapper">
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <!-- <div class="app-brand">
                    <a href="{{ route('admin.index') }}">
                        <span class="brand-name"><i class="fa fa-user fa-sm"></i> ADMIN</span>
                    </a>
                </div> -->
                <!-- begin sidebar scrollbar -->
                <div class="left-sidebar" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.index') }}">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">Accueil</span>
                            </a>
                        </li>
                        <li class="section-title">
                            Gestion
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="{{ asset('admin/javascript:void(0)') }}" data-toggle="collapse" data-target="#formations" aria-expanded="false" aria-controls="formations">
                                <i class="fa-solid fa-bullhorn"></i>
                                <span class="nav-text"> Annonces</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="formations" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.annonces') }}">
                                            <span class="nav-text"><i class="fa-solid fa-angle-right"></i> Liste des annonces</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.annoncesSupp') }}">
                                            <span class="nav-text"><i class="fa-solid fa-angle-right"></i> Liste des annonces</br>supprimées</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.annoncesVend') }}">
                                            <span class="nav-text"><i class="fa-solid fa-angle-right"></i> Liste des annonces</br>Vendues</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.stats.annonce') }}">
                                            <span class="nav-text"><i class="fa-solid fa-angle-right"></i> Stats Annonces</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="{{ asset('admin/javascript:void(0)') }}" data-toggle="collapse" data-target="#familles" aria-expanded="false" aria-controls="familles">
                                <i class="fa-solid fa-user fa-sm"></i>
                                <span class="nav-text"> Utilisateurs</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="familles" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.users') }}">
                                            <span class="nav-text"><i class="fa-solid fa-angle-right"></i> Liste des utilisateurs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.stats.users') }}">
                                            <span class="nav-text"><i class="fa-solid fa-angle-right"></i> Stats Utilisateurs</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="{{ asset('admin/javascript:void(0)') }}" data-toggle="collapse" data-target="#sousfamilles" aria-expanded="false" aria-controls="sousfamilles">
                                <i class="fa-solid fa-sliders"></i>
                                <span class="nav-text"> Gestion Supplémentaire</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="sousfamilles" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.marques') }}">
                                            <span class="nav-text"><i class="fa-solid fa-angle-right"></i> Liste des marques</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('admin.options') }}">
                                            <span class="nav-text"><i class="fa-solid fa-angle-right"></i> Liste des options</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="{{ asset('admin/javascript:void(0)') }}" data-toggle="collapse" data-target="#messagerie" aria-expanded="false" aria-controls="messagerie">
                                <i class="fa-solid fa-envelope"></i>
                                <span class="nav-text"> Messagerie</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="messagerie" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{route('admin.contacts')}}">
                                            <span class="nav-text"><i class="fa-solid fa-angle-right"></i> Contacts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="">
                                            <span class="nav-text"><i class="fa-solid fa-angle-right"></i> Réclamations</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <!-- <span class="page-title">Tableau de board</span> -->
                    <span class="page-title">@yield('page-title')</span>
                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <!-- <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <span class="d-none d-lg-inline-block">Admin</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-footer">
                                        <a class="dropdown-link-item" href="{{ route('signout') }}"> <i
                                                class="mdi mdi-logout"></i>
                                            Se deconnecter
                                        </a>
                                    </li>
                                </ul> -->
                                <a href="{{ route('signout') }}">
                                    <i class="mdi mdi-logout"></i> Déconnexion
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            @yield('content')

            <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/simplebar/simplebar.min.js') }}"></script>
            <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

            <script src="{{ asset('admin/plugins/apexcharts/apexcharts.js') }}"></script>

            <script src="{{ asset('admin/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

            <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
            <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>

            <script src="{{ asset('admin/plugins/daterangepicker/moment.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
            <script>
                jQuery(document).ready(function() {
                    jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                            cancelLabel: 'Clear'
                        }
                    });
                    jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                        jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                    });
                    jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                        jQuery(this).val('');
                    });
                });
            </script>

            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

            <script src="{{ asset('admin/plugins/toaster/toastr.min.js') }}"></script>

            <script src="{{ asset('admin/js/mono.js') }}"></script>
            <script src="{{ asset('admin/js/chart.js') }}"></script>
            <script src="{{ asset('admin/js/map.js') }}"></script>
            <script src="{{ asset('admin/js/custom.js') }}"></script>

</body>

</html>