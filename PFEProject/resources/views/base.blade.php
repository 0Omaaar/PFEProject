<!DOCTYPE html>
<html lang="eng">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/all-fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/material/css/materialdesignicons.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flex-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    {{-- <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div> --}}

    @include('includes.header')

    <main class="main">

        @yield('content')

    </main>

    @include('includes.footer')

    <script>
        // Afficher les modèles selon la marque séléctionnée

        document.addEventListener('DOMContentLoaded', function() {
            filterModels();
        });

        function filterModels() {
            var marqueSelect = document.getElementById("marque_id");
            var modeleSelect = document.getElementById("modele_id");
            var modeleOptions = modeleSelect.options;

            for (var i = 0; i < modeleOptions.length; i++) {
                var modeleOption = modeleOptions[i];
                if (modeleOption.getAttribute("data-marque") !== marqueSelect.value && marqueSelect.value !== "") {
                    modeleOption.style.display = "none";
                } else {
                    modeleOption.style.display = "";
                }
            }
        }
    </script>

    <script>
        // Afficher les années selon la sélection
        document.addEventListener('DOMContentLoaded', function() {
            filterMinYear();
            filterMaxYear();
        });

        function filterMinYear() {
            var selectedMaxYear = parseInt($('#annee_max').val());
            $('#annee_min option').each(function() {
                var optionYear = parseInt($(this).val());
                if (optionYear > selectedMaxYear && selectedMaxYear !== 0) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        }

        function filterMaxYear() {
            var selectedMinYear = parseInt($('#annee_min').val());
            $('#annee_max option').each(function() {
                var optionYear = parseInt($(this).val());
                if (optionYear < selectedMinYear) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        }
        $('#annee_min').on('change', filterMinYear);
        $('#annee_max').on('change', filterMaxYear);
    </script>

    <script>
        // Afficher les champs de la recherche avancée
        function toggleRechercheAvancee(event) {
            event.preventDefault(); // Empêche le déplacement de la page vers le haut

            var rechercheAvanceeDiv = document.getElementById('recherche-avancee');
            var rechercheAvanceeLink = document.getElementById('recherche-avancee-link');

            if (rechercheAvanceeDiv.style.display === 'block') {
                rechercheAvanceeDiv.style.display = 'none';
                rechercheAvanceeLink.textContent = 'Recherche avancée';
            } else {
                rechercheAvanceeDiv.style.display = 'block';
                rechercheAvanceeLink.textContent = 'Annuler';
            }
        }
    </script>

    <script>
        // Pour afficher le numero de telephone à la place du prix
        function afficherNumero(event) {
            event.preventDefault(); // Empêche le déplacement de la page vers le haut

            let appelerPrix = document.getElementById('appeler-prix');
            let tel = document.getElementById('tel');
            appelerPrix.style.display = 'none';
            tel.style.display = 'block';
        }
    </script>

    <script>
        // Pour afficher les images en taille réelle
        function showImage(src) {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            modal.style.zIndex = '999';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';

            var img = document.createElement('img');
            img.src = src;
            img.style.maxWidth = '90%';
            img.style.maxHeight = '90%';
            img.style.objectFit = 'contain';
            modal.appendChild(img);

            document.body.appendChild(modal);

            modal.addEventListener('click', function() {
                modal.parentElement.removeChild(modal);
            });
        }
    </script>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter-up.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/flex-slider.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>