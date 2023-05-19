@extends('admin.base')
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
                        <p><strong>Prix:</strong> {{ $annonce->prix }}</p>
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
                    <a href="{{ route('admin.annonces') }}" class="btn btn-dark mb-2">Annuler</a>
                    @if (!$annonce->isActive())
                        <form action="{{ route('admin.activer', $annonce->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success btn-sm" type="submit">Activer
                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.desactiver', $annonce->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Desactiver
                            </button>
                        </form>
                    @endif
                </div>
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
    </script>
@endsection
