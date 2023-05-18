<div class="container">
    <div class="find-car-form">
        <h4 class="find-car-title">Trouvez votre voiture comme vous la désirez</h4>
        <form action="{{ route('annonces.recherche') }}" method="GET">
            @csrf
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="marque_id">Marque</label>
                        <select class="nice-select" name="marque_id" id="marque_id" onchange="filterModels()">
                            <option value="">Toutes les marques</option>
                            @foreach ($marques as $marque)
                            <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="modele_id">Modèle</label>
                        <select class="nice-select" name="modele_id" id="modele_id">
                            <option value="">Tous les modèles Model</option>
                            @foreach ($modeles as $modele)
                            <option value="{{ $modele->id }}" data-marque="{{ $modele->marque_id }}">
                                {{ $modele->nom }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="prix_min">Prix minimal</label>
                        <input type="number" class="nice-select" name="prix_min" id="prix_min" min="0" placeholder="Prix minimal">
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="prix_max">Prix maximale</label>
                        <input type="number" class="nice-select" name="prix_max" id="prix_max" min="0" placeholder="Prix maximale">
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="type">Année minimale</label>
                        <select class="nice-select" name="annee_min" id="annee_min">
                            <option value="">Toutes les années</option>
                            @foreach (['2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997', '1996', '1995', '1994', '1993', '1992', '1991', '1990'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="type">Année maximale</label>
                        <select class="nice-select" name="annee_max" id="annee_max">
                            <option value="">Toutes les années</option>
                            @foreach (['2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997', '1996', '1995', '1994', '1993', '1992', '1991', '1990'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="ville">Ville :</label>
                        <select class="nice-select" name="ville" id="ville">
                            <option value="">Toutes les villes</option>
                            @foreach (['agadir', 'ait benhaddou', 'ait daoud', 'ait ourir', 'azrou', 'ben slimane', 'benguerir', 'beni mellal', 'berkane', 'berrechid', 'bouskoura', 'bouznika', 'casablanca', 'chefchaouen', 'chemaia', 'chichaoua', 'dakhla', 'dar bouazza', 'demnate', 'el hajeb', 'el jadida', 'errachidia', 'essaouira', 'fes', 'ifrane', 'kenitra', 'khemis zemamra', 'khemisset', 'larache', 'marrakech', 'martil', 'meknes', 'midelt', 'mohammedia', 'moulay bousselham', 'ouarzazate', 'ouezzane', 'oujda', 'settat', 'sidi slimane', 'tanger', 'taounate', 'taznakht', 'temara', 'tetouan'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3 align-self-end">
                    <button class="theme-btn" type="submit"></span>Lancer la recherche</button>
                </div>

                <!-- Recherche avancée -->
                <div id="recherche-avancee" style="display: none;">
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="carburant">Carburant :</label>
                                <select class="nice-select" name="carburant" id="carburant">
                                    <option value="">Sélectionnez le carburant</option>
                                    <option title="Essence" value="Essence">Essence</option>
                                    <option title="Diesel" value="Diesel">Diesel</option>
                                    <option title="Electrique" value="Electrique">Electrique</option>
                                    <option title="Hybride" value="Hybride">Hybride</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="transmission">Transmission</label>
                                <select class="nice-select" name="transmission" id="transmission">
                                    <option value="">Toutes les transmissions</option>
                                    <option title="Manuelle" value="Manuelle">
                                        Manuelle </option>
                                    <option title="Automatique" value="Automatique">
                                        Automatique </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="puissance_fiscale">Puissance Fiscale :</label>
                                <select class="nice-select" name="puissance_fiscale" id="puissance_fiscale">
                                    <option value="">Toutes les puissances</option>
                                    @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60] as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="nice-select" name="type" id="type">
                                    <option value="">Toutes les puissances</option>
                                    @foreach (['CABRIOLET', 'SUV ET 4X4', 'COUPé', 'CITADINE', 'BREAK', 'MONOSPACE', 'BERLINE', 'CC', 'MICRO-CITADINE', 'COMPACT', 'CROSSOVER', 'PICK UP', 'UTILITAIRE (MINIVAN)', 'UTILITAIRE (VAN)'] as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <p><a href="#" class="btn btn-primary btn-sm mt-3" id="recherche-avancee-link" onclick="toggleRechercheAvancee(event)">Recherche avancée</a></p>
                </div>
            </div>
        </form>
    </div>
</div>