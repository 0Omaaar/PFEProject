@extends('base')
@section('title', 'Afficher l\'annonce')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                <h5>{{ session()->get('success') }}</h5>
            </div>
        @endif
        <h3>Infos Annonce</h3>
        <div class="row">
            <div class="col-lg-4">
                <img src="{{ asset('images/miniature/' . $annonce->miniature) }}" alt="{{ $annonce->titre }}" class="img-fluid"
                    id="mainImage" />
                <div class="mt-2">
                    <img src="{{ asset('images/miniature/' . $annonce->miniature) }}" alt="{{ $annonce->titre }}"
                        class="img-thumbnail w-25"
                        onclick="showImage('{{ asset('images/miniature/' . $annonce->miniature) }}')" />
                    @foreach ($annonce->image as $image)
                        @if ($image->annonce_id == $annonce->id)
                            <img src="{{ asset('images/images/' . $image->chemin) }}" alt="{{ $annonce->titre }}"
                                class="img-fluid w-25 img-thumbnail"
                                onclick="showImage('{{ asset('images/images/' . $image->chemin) }}')" />
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-8">
                <h2>{{ $annonce->titre }}</h2>
                <p class="lead">{{ $annonce->description }}</p>
                <div class="row">
                    <div class="col-lg-6">
                        @if ($annonce->prix == null)
                            <p id="appeler-prix"><strong>Appelez pour le prix</strong></p>
                            <p id="tel" style="display:none;"><strong>{{ $annonce->user->telephone }}</strong></p>
                        @else
                            <p><strong>Prix:</strong> {{ $annonce->prix }}</p>
                        @endif
                        <p><strong>Année:</strong> {{ $annonce->voiture->annee }}</p>
                        <p><strong>Kilométrage:</strong> {{ $annonce->voiture->kilometrage }}</p>
                        <p><strong>Type de carburant:</strong> {{ $annonce->voiture->carburant }}</p>
                        <p><strong>Type de transmission:</strong> {{ $annonce->voiture->transmission }}</p>
                        <p><strong>Type :</strong> {{ $annonce->voiture->type }}</p>
                    </div>
                    <div class="col-lg-6">
                        <p><strong>Puissance fiscale:</strong> {{ $annonce->voiture->puissance_fiscale }}</p>
                        <p><strong>Dédouanée:</strong> {{ $annonce->voiture->dedouanee }}</p>
                        <p><strong>Première main:</strong> {{ $annonce->voiture->premiere_main }}</p>
                        <p><strong>Modele:</strong> {{ $annonce->voiture->modele->nom }}</p>
                        <p><strong>Marque:</strong> {{ $annonce->voiture->marque->nom }}</p>
                        <p><strong>Créée par:</strong> {{ $annonce->user->nom }}</p>


                        @if ($options->count() > 0)
                            <p><strong>Options :</strong></p>
                            <ul>
                                @foreach ($options as $option)
                                    <li>{{ $option->nom }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p><strong>Aucune option n'est disponible</strong></p>
                        @endif


                    </div>
                </div>
                <div>
                    <a href="{{ route('annonces.index') }}" class="btn btn-dark">Liste des annonces</a>

                    @if (Auth::check() && $annonce->user_id == Auth::user()->id)
                        <a href="#" class="btn btn-danger"
                            onclick="if(confirm('Voulez-vous vraiment supprimer cette annonce ?')){document.getElementById('form-{{ $annonce->id }}').submit()}">Supprimer</a>

                        <form id="form-{{ $annonce->id }}"
                            action="{{ route('annonces.supprimer', ['annonce' => $annonce->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                        </form>

                        <a href="{{ route('annonces.modifier', ['annonce' => $annonce->id]) }}"
                            class="btn btn-success mt-2">Modifier</a>
                    @endif
                </div>
            </div>
            <div>
                <section style="background-color: #f7f6f6;">
                    <div class="container my-5 py-5 text-dark">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12 col-lg-10 col-xl-8">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="text-dark mb-0">Commentaires</h4>
                                    <div class="form-outline">
                                        <form action="{{ route('annonces.commentaire') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                                            <input type="text" id="addANote" class="form-control"
                                                placeholder="Ajouter un commentaire..." name="contenu" />
                                            <input type="submit" value="Ajouter" class="btn btn-outline-secondary btn-sm">
                                        </form>
                                    </div>
                                </div>
                                @if ($commentaires->count() > 0)
                                    @foreach ($commentaires as $commentaire)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex flex-start">
                                                    <div class="w-100">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <h6 class="text-primary fw-bold mb-0">
                                                                {{ $commentaire->user->prenom . ' ' . $commentaire->user->prenom }}
                                                                <span
                                                                    class="text-dark ms-2">{{ $commentaire->contenu }}</span>
                                                            </h6>
                                                            <p class="mb-0">
                                                                @if ($commentaire->created_at->diffInDays() > 0)
                                                                    Posté il y a
                                                                    {{ $commentaire->created_at->diffInDays() }} jours
                                                                @else
                                                                    Posté il y a
                                                                    {{ $commentaire->created_at->diff()->format('%h heures et %i minutes') }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="small mb-0" style="color: #aaa;">
                                                                @if (auth()->user()->id === $commentaire->user_id)
                                                                    <form
                                                                        action="{{ route('annonces.commentaires.delete', ['id' => $commentaire->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="submit" value="Supprimer"
                                                                            class="btn btn-sm btn-outline-danger">
                                                                    </form>
                                                                @endif
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Aucun commentaire pour le moment.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
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


        //Pour afficher le numero de telephone a la place du prix
        let appelerPrix = document.getElementById('appeler-prix');
        let tel = document.getElementById('tel');
        appelerPrix.addEventListener('click', function() {
            appelerPrix.style.display = 'none';
            tel.style.display = 'block';
        });
    </script>
@endsection
