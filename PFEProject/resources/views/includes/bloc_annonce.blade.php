<div class="col-md-4">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('images/miniature/' . $annonce->miniature) }}" alt="{{ $annonce->titre }}" style="object-fit: cover; width: 100%; height: 190px;" />
        <div class="card-body">
            <h5 class="card-title">{{ $annonce->titre }}</h5>
            @if ($annonce->prix == null)
            <p id="appeler-prix" class="card-text"><strong><a href="#" style="text-decoration: none;">Appelez pour le prix</a></strong></p>
            <p id="tel" class="card-text" style="display:none;">
                <strong>{{ $annonce->user->telephone }}</strong>
            </p>
            @else
            <p class="card-text"><strong>Prix:</strong> {{ $annonce->prix }}</p>
            @endif
            <a href="{{ route('annonces.show', ['annonce' => $annonce->id]) }}" class="btn btn-primary">Plus d'infos</a>
        </div>
    </div>
</div>