    <input type="hidden" id="liste-favorites" data-value="{{ json_encode($favorites) }}">

    <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="car-item wow fadeInUp" data-wow-delay=".25s">
            <div class="car-img">
                <img src="{{ asset('images/miniature/' . $annonce->miniature) }}" alt="{{ $annonce->titre }}" />
                <div class="car-btns">
                    <!-- <a href="#"><i class="far fa-xmark"></i></a> -->
                    <a href="#" class="favori-button" data-annonce-id="{{ $annonce->id }}">
                        <i class="far fa-heart"></i>
                    </a>
                    <!-- <a href="#"><i class="far fa-arrows-repeat"></i></a> -->
                </div>
            </div>
            <div class="car-content">
                <div class="car-top">
                    <h4><a href="{{ route('annonces.show', ['annonce' => $annonce->id]) }}">{{ $annonce->titre }}</a></h4>
                </div>
                <ul class="car-list">
                    <li><i class="fa-solid fa-gears"></i> {{ $annonce->voiture->transmission}}</li>
                    <li><i class="fa-solid fa-calendar-days"></i> {{ $annonce->voiture->annee}}</li>
                </ul>
                <ul class="car-list">
                    <li><i class="fa-solid fa-gas-pump"></i> {{ $annonce->voiture->carburant}}</li>
                    <li><i class="fa-solid fa-gauge-high"></i> {{ $annonce->voiture->kilometrage}}</li>
                </ul>
                <div class="car-footer">
                    @if ($annonce->prix == null)
                    <p id="appeler-prix" class="cl">
                        <a href="#" onclick="afficherNumero(event)" style="text-decoration: none;font-size: 14px;"><strong>Appelez pour le prix</strong></a>
                    </p>
                    <p id="tel" class="car-price" style="display:none;">
                        <strong>{{ $annonce->user->telephone }}</strong>
                    </p>
                    @else
                    <p class="car-price">{{ $annonce->prix }} DH</p>
                    @endif
                    <a href="{{ route('annonces.show', ['annonce' => $annonce->id]) }}" class="theme-btn">
                        <i class="fa-solid fa-eye fa-sm"></i> Détails
                    </a>
                </div>
            </div>
        </div>
    </div>