    <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="car-item wow fadeInUp" data-wow-delay=".25s">
            <div class="car-img">
                <img src="{{ asset('images/miniature/' . $annonce->miniature) }}" alt="{{ $annonce->titre }}" />
            </div>
            <div class="car-content">
                <div class="car-top">
                    <h4><a href="{{ route('annonces.show', ['annonce' => $annonce->id]) }}">{{ $annonce->titre }}</a></h4>
                </div>
                <ul class="car-list">
                    <li>{{ $annonce->voiture->transmission }}</li>
                    <li>{{ $annonce->voiture->annee }}</li>
                    <li>{{ $annonce->voiture->carburant }}</li>
                    <li>{{ $annonce->voiture->kilometrage }}</li>
                </ul>
                <div class="car-footer">
                    @if ($annonce->prix == null)
                        <p id="appeler-prix" class="car-price">
                            <strong><a href="#" onclick="afficherNumero(event)" style="text-decoration: none;">Appelez pour le prix</a></strong>
                        </p>
                        <p id="tel" class="car-price" style="display:none;">
                            <strong>{{ $annonce->user->telephone }}</strong>
                        </p>
                    @else
                        <p class="car-price"><strong>Prix:</strong> {{ $annonce->prix }}</p>
                    @endif
                    <a href="{{ route('annonces.show', ['annonce' => $annonce->id]) }}" class="theme-btn">Details</a>
                </div>
            </div>
        </div>
    </div>
