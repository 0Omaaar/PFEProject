@extends('base')
@section('title', 'Afficher l\'annonce')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <main class="main">
        @if (session()->has('success'))
            <div class="alert alert-success">
                <h5>{{ session()->get('success') }}</h5>
            </div>
        @endif
        <div class="car-item-single bg pt-4">
            <div class="container">
                <div class="car-single-wrapper">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="car-single-details">
                                <div class="car-single-widget">
                                    <div class="car-single-top">
                                        <h3 class="car-single-title">{{ $annonce->titre }}</h3>
                                        <ul class="car-single-meta">
                                            <li>Postée le : {{ $annonce->created_at }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="{{ asset('images/miniature/' . $annonce->miniature) }}"
                                            alt="{{ $annonce->titre }}" class="img-fluid" id="mainImage" />
                                        <div class="mt-2">
                                            <img src="{{ asset('images/miniature/' . $annonce->miniature) }}"
                                                alt="{{ $annonce->titre }}" class="img-thumbnail w-25"
                                                onclick="showImage('{{ asset('images/miniature/' . $annonce->miniature) }}')" />
                                            @foreach ($annonce->image as $image)
                                                @if ($image->annonce_id == $annonce->id)
                                                    <img src="{{ asset('images/images/' . $image->chemin) }}"
                                                        alt="{{ $annonce->titre }}" class="img-fluid w-25 img-thumbnail"
                                                        onclick="showImage('{{ asset('images/images/' . $image->chemin) }}')" />
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                <div class="car-single-widget">
                                    <h4 class="mb-4">Informations</h4>
                                    <div class="car-key-info">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="car-key-item">
                                                    <div class="car-key-icon">        
                                                    </div>
                                                    <div class="car-key-content">
                                                        <span>Type de voiture</span>
                                                        <h6>{{ $annonce->voiture->type }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="car-key-item">
                                                    <div class="car-key-icon">
                                                    </div>
                                                    <div class="car-key-content">
                                                        <span>Kilométrage</span>
                                                        <h6>{{ $annonce->voiture->kilometrage }} km</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="car-key-item">
                                                    <div class="car-key-icon">
                                                    </div>
                                                    <div class="car-key-content">
                                                        <span>Année</span>
                                                        <h6>{{ $annonce->voiture->annee }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="car-key-item">
                                                    <div class="car-key-icon">
                                                    </div>
                                                    <div class="car-key-content">
                                                        <span>Carburant</span>
                                                        <h6>{{ $annonce->voiture->carburant }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="car-key-item">
                                                    <div class="car-key-icon">
                                                    </div>
                                                    <div class="car-key-content">
                                                        <span>Transmission</span>
                                                        <h6>{{ $annonce->voiture->transmission }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="car-key-item">
                                                    <div class="car-key-icon">
                                                    </div>
                                                    <div class="car-key-content">
                                                        <span>Puissance fiscale</span>
                                                        <h6> {{ $annonce->voiture->puissance_fiscale }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="car-key-item">
                                                    <div class="car-key-icon">
                                                    </div>
                                                    <div class="car-key-content">
                                                        <span>Dédouanée</span>
                                                        <h6>{{ $annonce->voiture->dedouanee }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="car-key-item">
                                                    <div class="car-key-icon">
                                                    </div>
                                                    <div class="car-key-content">
                                                        <span>Première main:</span>
                                                        <h6>{{ $annonce->voiture->premiere_main }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="car-key-item">
                                                    <div class="car-key-icon">
                                                    </div>
                                                    <div class="car-key-content">
                                                        <span>Modele:</span>
                                                        <h6>{{ $annonce->voiture->modele->nom }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="car-key-item">
                                                    <div class="car-key-icon">
                                                    </div>
                                                    <div class="car-key-content">
                                                        <span>Marque</span>
                                                        <h6>{{ $annonce->voiture->marque->nom }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-single-widget">
                                    <div class="car-single-overview">
                                        <h4 class="mb-3">Description</h4>
                                        <div class="mb-4">
                                            <p>{{ $annonce->description }}</p>
                                        </div>
                                        @if ($options->count() > 0)
                                            <div class="row mb-3">
                                                <div class="col-lg-4">
                                                    <ul class="car-single-list">
                                                        @foreach ($options->take(4) as $option)
                                                            <li>{{ $option->nom }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <ul class="car-single-list">
                                                        @foreach ($options->skip(4)->take(4) as $option)
                                                            <li>{{ $option->nom }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <ul class="car-single-list">
                                                        @foreach ($options->skip(8)->take(4) as $option)
                                                            <li>{{ $option->nom }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <ul class="car-single-list">
                                                        @foreach ($options->skip(12)->take(4) as $option)
                                                            <li>{{ $option->nom }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @else
                                            <p>Aucune option n'est disponible</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="car-single-widget">
                                    <div class="car-single-review">
                                        <div class="blog-comments mb-0">
                                            <h4>Commentaires</h4>
                                            <div class="blog-comments-wrapper">
                                                @if ($commentaires->count() > 0)
                                                    @foreach ($commentaires as $commentaire)
                                                        <div class="blog-comments-single">
                                                            <div class="blog-comments-content">
                                                                <h5>{{ $commentaire->user->prenom . ' ' . $commentaire->user->prenom }}
                                                                </h5>
                                                                <span>
                                                                    @if ($commentaire->created_at->diffInDays() > 0)
                                                                        Posté il y a
                                                                        {{ $commentaire->created_at->diffInDays() }} jours
                                                                    @else
                                                                        Posté il y a
                                                                        {{ $commentaire->created_at->diff()->format('%h heures et %i minutes') }}
                                                                    @endif
                                                                </span>
                                                                <p>
                                                                    @if (Auth::check() && auth()->user()->id === $commentaire->user_id)
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
                                                                <p>{{ $commentaire->contenu }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>Aucun commentaire pour le moment.</p>
                                                @endif
                                            </div>
                                            <div class="blog-comments-form">
                                                <h4>Laisser un commentaire</h4>
                                                <form
                                                    action="{{ route('annonces.commentaire', ['annonce' => $annonce->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group mt-4">
                                                                <textarea class="form-control" rows="5" placeholder="Votre Commentaire*" name="contenu"></textarea>
                                                            </div>
                                                            <button type="submit" class="theme-btn"><span
                                                                    class="far fa-paper-plane"></span> Envoyer</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="car-single-widget">
                                <ul class="car-single-meta">
                                    <li>{{ $annonce->voiture->kilometrage }} Km
                                    </li>
                                    <li>25/B Milford, New York</li>
                                </ul>
                                @if ($annonce->prix == null)
                                    <h4 id="appeler-prix" style="cursor: pointer;"><strong>Appelez pour le prix</strong>
                                    </h4>
                                    <h4 id="tel" class="car-single-price" style="display:none;">
                                        <strong>{{ $annonce->user->telephone }}</strong></p>
                                    @else
                                        <h4 class="car-single-price">Prix : {{ $annonce->prix }}</h4>
                                @endif
                            </div>
                        </div>
                    </div>
    </main>
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
