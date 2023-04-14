@extends('base')
@section('title', 'Ajouter une annonce')
@section('content')
    <div class="container">
        <h1 class="text text-center">Ajouter une annonce</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <div class="form-group">
            <form action="{{ route('annonces.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Titre</label>
                    <input type="text" class="form-control" name="titre">
                </div>
                <div>
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div>
                    <label for="">Prix</label>
                    <input type="number" class="form-control" name="prix">
                </div>
                <div>
                    <label for="">Miniature</label>
                    <input type="file" class="form-control" name="miniature">
                </div>
                <div>
                    <label for="">Annee</label>
                    <select name="annee" id="annee" style="width: 100px; margin-left: 10px">
                        <option>Sélectionnez l'année</option>
                        <option value="2023">
                            2023 </option>
                        <option value="2022">
                            2022 </option>
                        <option value="2021">
                            2021 </option>
                        <option value="2020">
                            2020 </option>
                        <option value="2019">
                            2019 </option>
                        <option value="2018">
                            2018 </option>
                        <option value="2017">
                            2017 </option>
                        <option value="2016">
                            2016 </option>
                        <option value="2015">
                            2015 </option>
                        <option value="2014">
                            2014 </option>
                        <option value="2013">
                            2013 </option>
                        <option value="2012">
                            2012 </option>
                        <option value="2011">
                            2011 </option>
                        <option value="2010">
                            2010 </option>
                        <option value="2009">
                            2009 </option>
                        <option value="2008">
                            2008 </option>
                        <option value="2007">
                            2007 </option>
                        <option value="2006">
                            2006 </option>
                        <option value="2005">
                            2005 </option>
                        <option value="2004">
                            2004 </option>
                        <option value="2003">
                            2003 </option>
                        <option value="2002">
                            2002 </option>
                        <option value="2001">
                            2001 </option>
                        <option value="2000">
                            2000 </option>
                        <option value="1999">
                            1999 </option>
                        <option value="1998">
                            1998 </option>
                        <option value="1997">
                            1997 </option>
                        <option value="1996">
                            1996 </option>
                        <option value="1995">
                            1995 </option>
                        <option value="1994">
                            1994 </option>
                        <option value="1993">
                            1993 </option>
                        <option value="1992">
                            1992 </option>
                        <option value="1991">
                            1991 </option>
                        <option value="1990">
                            1990 </option>
                        <option value="1989">
                            1989 </option>
                        <option value="1988">
                            1988 </option>
                        <option value="1987">
                            1987 </option>
                        <option value="1986">
                            1986 </option>
                        <option value="1985">
                            1985 </option>
                        <option value="1984">
                            1984 </option>
                        <option value="1983">
                            1983 </option>
                        <option value="1982">
                            1982 </option>
                        <option value="1981">
                            1981 </option>
                        <option value="1980">
                            1980 </option>
                        <option value="1979">
                            1979 </option>
                        <option value="1978">
                            1978 </option>
                        <option value="1977">
                            1977 </option>
                        <option value="1976">
                            1976 </option>
                        <option value="1975">
                            1975 </option>
                        <option value="1974">
                            1974 </option>
                        <option value="1973">
                            1973 </option>
                        <option value="1972">
                            1972 </option>
                        <option value="1971">
                            1971 </option>
                        <option value="1970">
                            1970 </option>
                        <option value="1969">
                            1969 </option>
                        <option value="1968">
                            1968 </option>
                        <option value="1967">
                            1967 </option>
                        <option value="1966">
                            1966 </option>
                        <option value="1965">
                            1965 </option>
                        <option value="1964">
                            1964 </option>
                        <option value="1963">
                            1963 </option>
                        <option value="1962">
                            1962 </option>
                        <option value="1961">
                            1961 </option>
                        <option value="1960">
                            1960 </option>
                        <option value="1959">
                            1959 </option>
                        <option value="1958">
                            1958 </option>
                        <option value="1957">
                            1957 </option>
                        <option value="1956">
                            1956 </option>
                        <option value="1955">
                            1955 </option>
                        <option value="1954">
                            1954 </option>
                        <option value="1953">
                            1953 </option>
                        <option value="1952">
                            1952 </option>
                        <option value="1951">
                            1951 </option>
                        <option value="1950">
                            1950 </option>
                        <option value="1949">
                            1949 </option>
                        <option value="1948">
                            1948 </option>
                        <option value="1947">
                            1947 </option>
                        <option value="1946">
                            1946 </option>
                        <option value="1945">
                            1945 </option>
                        <option value="1944">
                            1944 </option>
                        <option value="1943">
                            1943 </option>
                        <option value="1942">
                            1942 </option>
                        <option value="1941">
                            1941 </option>
                        <option value="1940">
                            1940 </option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="">Type</label>
                    <select id="type" name="type" style="width: 100px; margin-left: 10px">
                        <option value="" selected="selected"></option>
                        <option value="CABRIOLET">
                            CABRIOLET </option>
                        <option value="SUV ET 4X4">
                            SUV ET 4X4 </option>
                        <option value="COUPé">
                            COUPé </option>
                        <option value="CITADINE">
                            CITADINE </option>
                        <option value="BREAK">
                            BREAK </option>
                        <option value="MONOSPACE">
                            MONOSPACE </option>
                        <option value="BERLINE">
                            BERLINE </option>
                        <option value="CC">
                            CC </option>
                        <option value="MICRO-CITADINE">
                            MICRO-CITADINE </option>
                        <option value="COMPACT">
                            COMPACT </option>
                        <option value="CROSSOVER">
                            CROSSOVER </option>
                        <option value="PICK UP">
                            PICK UP​ </option>
                        <option value="UTILITAIRE (MINIVAN)">
                            UTILITAIRE (MINIVAN) </option>
                        <option value="UTILITAIRE (VAN)">
                            UTILITAIRE (VAN) </option>
                    </select>
                </div>
                <div>
                    <label for="">Carburant</label>
                    <select style="width: 100px; margin-left: 10px" name="carburant" id="carburant" required>
                        <option></option>
                        <option title="Essence" value="Essence">
                            Essence </option>
                        <option title="Diesel" value="Diesel">
                            Diesel </option>
                        <option title="Electrique" value="Electrique">
                            Electrique </option>
                        <option title="Hybride" value="Hybride">
                            Hybride </option>
                    </select>
                </div>
                <div>
                    <label for="">Transmission</label>
                    <select style="width: 100px; margin-left: 10px" name="transmission" id="transmission" required>
                        <option></option>
                        <option title="Manuelle" value="Manuelle">
                            Manuelle </option>
                        <option title="Automatique" value="Automatique">
                            Automatique </option>
                    </select>
                </div>
                <div>
                    <label for="">Kilometrage</label>
                    <input type="number" class="form-control" name="kilometrage">
                </div>
                <div>
                    <label for="">Puissance Fiscale</label>
                    <select style="width: 100px; margin-left: 10px" id="puissance_fiscale" name="puissance_fiscale">
                        <option value="" selected="selected"></option>
                        <option value="2">
                            2 </option>
                        <option value="3">
                            3 </option>
                        <option value="4">
                            4 </option>
                        <option value="5">
                            5 </option>
                        <option value="6">
                            6 </option>
                        <option value="7">
                            7 </option>
                        <option value="8">
                            8 </option>
                        <option value="9">
                            9 </option>
                        <option value="10">
                            10 </option>
                        <option value="11">
                            11 </option>
                        <option value="12">
                            12 </option>
                        <option value="13">
                            13 </option>
                        <option value="14">
                            14 </option>
                        <option value="15">
                            15 </option>
                        <option value="16">
                            16 </option>
                        <option value="17">
                            17 </option>
                        <option value="18">
                            18 </option>
                        <option value="19">
                            19 </option>
                        <option value="20">
                            20 </option>
                        <option value="21">
                            21 </option>
                        <option value="22">
                            22 </option>
                        <option value="23">
                            23 </option>
                        <option value="24">
                            24 </option>
                        <option value="25">
                            25 </option>
                        <option value="26">
                            26 </option>
                        <option value="27">
                            27 </option>
                        <option value="28">
                            28 </option>
                        <option value="29">
                            29 </option>
                        <option value="30">
                            30 </option>
                        <option value="31">
                            31 </option>
                        <option value="32">
                            32 </option>
                        <option value="33">
                            33 </option>
                        <option value="34">
                            34 </option>
                        <option value="35">
                            35 </option>
                        <option value="36">
                            36 </option>
                        <option value="37">
                            37 </option>
                        <option value="38">
                            38 </option>
                        <option value="39">
                            39 </option>
                        <option value="40">
                            40 </option>
                        <option value="41">
                            41 </option>
                        <option value="42">
                            42 </option>
                        <option value="43">
                            43 </option>
                        <option value="44">
                            44 </option>
                        <option value="45">
                            45 </option>
                        <option value="46">
                            46 </option>
                        <option value="47">
                            47 </option>
                        <option value="48">
                            48 </option>
                        <option value="49">
                            49 </option>
                        <option value="50">
                            50 </option>
                        <option value="51">
                            51 </option>
                        <option value="52">
                            52 </option>
                        <option value="53">
                            53 </option>
                        <option value="54">
                            54 </option>
                        <option value="55">
                            55 </option>
                        <option value="56">
                            56 </option>
                        <option value="57">
                            57 </option>
                        <option value="58">
                            58 </option>
                        <option value="59">
                            59 </option>
                        <option value="60">
                            60 </option>
                    </select>
                </div>
                <div>
                    <label for="">Dedouanee</label>
                    <select style="width: 100px; margin-left: 10px" id="dedouanee" name="dedouanee">
                        <option value="0">
                        </option>
                        <option value="Non">
                            Non, acheté au maroc (ww) </option>
                        <option value="Oui">
                            Oui, dédouané </option>
                        <option value="Pas encore dédouané">
                            Pas encore dédouané </option>
                        <option value="Importé neuf">
                            Importé neuf </option>
                    </select>
                </div>
                <div>
                    <label for="premiere_main">Première main:</label>
                    <select id="premiere_main" name="premiere_main" style="width: 100px; margin-left: 10px">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="marque_id">Marque</label>
                    <select id="marque_id" name="marque_id" style="width: 100px; margin-left: 10px"
                        onchange="filterModels()">
                        <option value=""></option>
                        @foreach ($marques as $marque)
                            <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-2">
                    <label for="modele_id">Modèle</label>
                    <select id="modele_id" name="modele_id" style="width: 100px; margin-left: 10px">
                        <option value=""></option>
                        @foreach ($modeles as $modele)
                            <option value="{{ $modele->id }}" data-marque="{{ $modele->marque_id }}">{{ $modele->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Images</label>
                    <input type="file" class="form-control" name="images[]" multiple>
                </div>
                <div>
                    <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
                    <a href="{{ route('annonces.index') }}" class="btn btn-danger mt-3">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <script>
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
@endsection
