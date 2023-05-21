@extends('base')
@section('title', 'Afficher l\'annonce')
@section('content')

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
                                    <li><i class="mdi mdi-calendar-today mdi-18px"></i> Publiée le : {{ \Carbon\Carbon::parse($annonce->created_at)->format('d-m-Y') }}</li>
                                </ul>
                            </div>
                            <div class="car-single-slider">
                                <div class="item-gallery">
                                    <div class="flexslider-thumbnails">
                                        <ul class="slides">
                                            <li class="miaw" data-thumb="{{ asset('images/miniature/' . $annonce->miniature) }}">
                                                <img src="{{ asset('images/miniature/' . $annonce->miniature) }}" alt="{{ $annonce->titre }}" onclick="showImage('{{ asset('images/miniature/' . $annonce->miniature) }}')" />
                                            </li>
                                            @foreach ($annonce->image as $image)
                                            @if ($image->annonce_id == $annonce->id)
                                            <li class="miaw" data-thumb="{{ asset('images/images/' . $image->chemin) }}">
                                                <img src="{{ asset('images/images/' . $image->chemin) }}" alt="{{ $annonce->titre }}" onclick="showImage('{{ asset('images/images/' . $image->chemin) }}')" />
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="car-single-widget">
                            <i class="mdi mdi-information-slab-circle"></i>
                            <h4 class="mb-4"><i class="mdi mdi-information"></i> Informations</h4>
                            <div class="car-key-info">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="car-key-item">
                                            <div class="car-key-icon">
                                                <i class="mdi mdi-car-estate"></i>
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
                                                <i class="mdi mdi-gauge"></i>
                                            </div>
                                            <div class="car-key-content">
                                                <span>Kilométrage</span>
                                                <h6>{{ $annonce->voiture->kilometrage }} km</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-3 col-md-4 col-6">
                                        <div class="car-key-item">
                                            <div class="car-key-icon">
                                                <i class="mdi mdi-calendar-outline"></i>
                                            </div>
                                            <div class="car-key-content">
                                                <span>Année</span>
                                                <h6>{{ $annonce->voiture->annee }}</h6>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="car-key-item">
                                            <div class="car-key-icon">
                                                <i class="mdi mdi-gas-station"></i>
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
                                                <i class="mdi mdi-cogs"></i>
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
                                                <i class="mdi mdi-engine"></i>
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
                                                <i class="mdi mdi-file-document-check-outline"></i>
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
                                                <i class="mdi mdi-key-variant"></i>
                                            </div>
                                            <div class="car-key-content">
                                                <span>Première main:</span>
                                                <h6>{{ $annonce->voiture->premiere_main }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-3 col-md-4 col-6">
                                        <div class="car-key-item">
                                            <div class="car-key-icon">
                                            </div>
                                            <div class="car-key-content">
                                                <span>Modele:</span>
                                                <h6>{{ $annonce->voiture->modele->nom }}</h6>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-lg-3 col-md-4 col-6">
                                        <div class="car-key-item">
                                            <div class="car-key-icon">
                                            </div>
                                            <div class="car-key-content">
                                                <span>Marque</span>
                                                <h6>{{ $annonce->voiture->marque->nom }}</h6>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="car-single-widget">
                            <div class="car-single-overview">
                                <!-- <h4 class="mb-3">Description</h4>
                                <div class="mb-4">
                                    <p>{{ $annonce->description }}</p>
                                </div> -->
                                <h4 class="mb-3"><i class="mdi mdi-feature-search"></i> Caractéristiques de la voiture</h4>
                                @if ($options->count() > 0)
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <ul class="car-single-list">
                                            @foreach ($options->take(4) as $option)
                                            <li> <i class="mdi mdi-check-circle-outline"></i>{{ $option->nom }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="car-single-list">
                                            @foreach ($options->skip(4)->take(4) as $option)
                                            <li> <i class="mdi mdi-check-circle-outline"></i>{{ $option->nom }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="car-single-list">
                                            @foreach ($options->skip(8)->take(4) as $option)
                                            <li> <i class="mdi mdi-check-circle-outline"></i>{{ $option->nom }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="car-single-list">
                                            @foreach ($options->skip(12)->take(4) as $option)
                                            <li> <i class="mdi mdi-check-circle-outline"></i>{{ $option->nom }}</li>
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
                                    <h4><i class="mdi mdi-comment-multiple"></i> Commentaires</h4>
                                    <div class="blog-comments-wrapper">
                                        @if ($commentaires->count() > 0)
                                        @foreach ($commentaires as $commentaire)
                                        <div class="blog-comments-single">
                                            <div class="blog-comments-content">
                                                <h5><i class="mdi mdi-account"></i> {{ $commentaire->user->prenom . ' ' . $commentaire->user->prenom }}
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
                                                <form action="{{ route('annonces.commentaires.delete', ['id' => $commentaire->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="Supprimer" class="btn btn-sm btn-outline-danger">
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
                                        <form action="{{ route('annonces.commentaire', ['annonce' => $annonce->id]) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mt-4">
                                                        <textarea class="form-control" rows="5" placeholder="Votre Commentaire*" name="contenu"></textarea>
                                                    </div>
                                                    <button type="submit" class="theme-btn"><i class="mdi mdi-send"></i> Envoyer</button>
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
                        <h6>{{ $annonce->voiture->modele->nom }} {{ $annonce->voiture->marque->nom }} {{ $annonce->voiture->annee }}</h6>
                        @if ($annonce->prix == null)
                        <h4 id="appeler-prix" style="cursor: pointer;"><strong>Appelez pour le prix</strong>
                        </h4>
                        <h4 id="tel" class="car-single-price" style="display:none;">
                            <strong>{{ $annonce->user->telephone }}</strong></p>
                            @else
                            <h4 class="car-single-price">{{ $annonce->prix }} DH</h4>
                            @endif
                        </h4>
                        <ul class="car-single-meta">
                            <li><i class="mdi mdi-gauge mdi-18px"></i> {{ $annonce->voiture->kilometrage }} Km</li>
                            <li><i class="mdi mdi-map-marker-outline mdi-18px"></i> {{ $annonce->user->ville }}</li>
                        </ul>
                    </div>
                    <div class="car-single-widget">
                        <h4 class="mb-3">Description</h4>
                        <div class="mb-4">
                            <p>{{ $annonce->description }}</p>
                        </div>
                    </div>
                    @if (Auth::check() && $annonce->user_id == Auth::user()->id)
                    <div class="car-single-widget">
                        <ul class="car-single-meta">
                            <li>
                                <a href="#" class="theme-btn" onclick="if(confirm('Voulez-vous vraiment supprimer cette annonce ?')){document.getElementById('form-{{ $annonce->id }}').submit()}">Supprimer</a>
                                <form id="form-{{ $annonce->id }}" action="{{ route('annonces.supprimer', ['annonce' => $annonce->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                                <a href="{{ route('annonces.modifier', ['annonce' => $annonce->id]) }}" class="theme-btn">Modifier</a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection