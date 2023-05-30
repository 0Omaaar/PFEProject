@extends('base')
@section('title', 'Créer une annonce')
@section('content')
<style>
    .page {
        display: none;
    }

    .form-data label{
        margin-bottom: 5px;
    }

    .form-data select, input{
        margin-bottom: 12px;
    }

    .next,
    .prev,
    .save {
        padding: 4px 16px;
        border-radius: 8px;
    }
</style>

<!-- <div class="container card col-lg-6 my-5"> -->
<div class="container col-lg-7 my-5">
    <div class="user-profile-card card-body">
        <h3 class="text text-center card-header" id="card-header">Créer une annonce</h3>
        @if ($errors->any())
        <div class="alert alert-danger mt-2 text-center">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- <div class="form-group card-body"> -->
        <div class="user-profile-form">

            <form action="{{ route('annonces.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="page" id="page1">
                    <div class="form-data">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control nice-select-2" name="titre">
                    </div>
                    <div class="form-data">
                        <label for="description">Description</label>
                        <textarea class="form-control nice-select-2" name="description" id="description" rows="4" cols="50"></textarea>
                    </div>
                    <div class="form-data">
                        <label for="prix">Prix</label>
                        <input type="number" class="form-control nice-select" name="prix" min="0">
                        <caption>( <i>Vous laissez la case du prix vide si vous ne désirez pas afficher le prix</i> )</caption>
                    </div>
                    <div class="form-data">
                        <label for="miniature">Miniature</label>
                        <input type="file" class="form-control " name="miniature">
                    </div>
                    <div class="form-data">
                        <label for="annee">Année</label>
                        <select name="annee" id="annee" class="nice-select">
                            <option>Sélectionnez l'année</option>
                            @foreach (['2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997', '1996', '1995', '1994', '1993', '1992', '1991', '1990'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="next theme-btn mt-4" type="button">
                        Suivant <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
                <div class="page" id="3">
                    <div class="form-data">
                        <label for="type">Type</label>
                        <select id="type" name="type" class="nice-select">
                            <option>Sélectionnez le type</option>
                            @foreach (["Berline", "SUV", "Break", "Monospace", "Coupé", "Cabriolet", "Limousine", "Crossover", "Hayon", "Fourgon", "Citadine", "Pick Up", "Compact", "Utilitaire (MINIVAN)", "Utilitaire (VAN)"] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-data">
                        <label for="carburant">Carburant</label>
                        <select class="nice-select" name="carburant" id="carburant" required>
                            <option value="">Sélectionnez le carburant</option>
                            <option title="Essence" value="Essence">Essence</option>
                            <option title="Diesel" value="Diesel">Diesel</option>
                            <option title="Electrique" value="Electrique">Electrique</option>
                            <option title="Hybride" value="Hybride">Hybride</option>
                        </select>
                    </div>
                    <div class="form-data">
                        <label for="transmission">Transmission</label>
                        <select class="nice-select" name="transmission" id="transmission" required>
                            <option>Sélectionnez le type de transmission</option>
                            <option title="Manuelle" value="Manuelle">
                                Manuelle </option>
                            <option title="Automatique" value="Automatique">
                                Automatique </option>
                        </select>
                    </div>
                    <div class="form-data">
                        <label for="kilometrage">Kilométrage</label>
                        <input type="number" class="form-control" name="kilometrage" min="0" placeholder="Entrez le nombre de kilométrage">
                    </div>
                    <div class="form-data">
                        <label for="puissance_fiscale">Puissance fiscale</label>
                        <select id="puissance_fiscale" name="puissance_fiscale" class="nice-select">
                            <option>Sélectionnez la puissance fiscale</option>
                            @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="prev theme-btn mt-4" type="button">
                        <i class="fa-solid fa-arrow-left"></i> Précédent
                    </button>
                    <button class="next theme-btn mt-4" type="button">
                        Suivant <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
                <div class="page" id="page3">
                    <div class="form-data">
                        <label for="dedouanee">Dédouanée</label>
                        <select class="nice-select" id="dedouanee" name="dedouanee">
                            <option>Sélectionnez la réponse</option>
                            <option value="Non">Non, achetée au maroc (ww)</option>
                            <option value="Oui">Oui, dédouanée</option>
                            <option value="Pas encore dédouané">Pas encore dédouanée</option>
                            <option value="Importé neuf">Importée neuve</option>
                        </select>
                    </div>
                    <div class="form-data">
                        <label for="premiere_main">Première main:</label>
                        <select id="premiere_main" name="premiere_main" class="nice-select">
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                        </select>
                    </div>
                    <div class="form-data">
                        <label for="marque_id">Marque</label>
                        <select id="marque_id" name="marque_id" class="nice-select" onchange="filterModels()">
                            <option>Sélectionnez la marque</option>
                            @foreach ($marques as $marque)
                            <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-data">
                        <label for="modele_id">Modèle</label>
                        <select id="modele_id" name="modele_id" class="nice-select">
                            <option>Sélectionnez le modèle</option>
                            @foreach ($modeles as $modele)
                            <option value="{{ $modele->id }}" data-marque="{{ $modele->marque_id }}">
                                {{ $modele->nom }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-data">
                        <label>Options</label>
                        @foreach ($options as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="options[]" value="{{ $option->id }}" id="{{ $option->nom }}">
                            <label class="form-check-label" for="{{ $option->nom }}">
                                {{ $option->nom }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-data">
                        <label for="images[]">Images</label>
                        <input type="file" class="form-control" name="images[]" multiple>
                    </div>
                    
                    <button class="prev theme-btn mt-4" type="button">
                        <i class="fa-solid fa-arrow-left"></i> Précédent
                    </button>
                    <button class="save theme-btn mt-4" type="submit">
                        Enregistrer <i class="fa-solid fa-cloud-arrow-down"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/ajouter_annonce.js') }}"></script>
@endsection