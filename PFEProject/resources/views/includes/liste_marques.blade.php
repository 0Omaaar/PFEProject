<!-- Liste des marques -->
<div class="car-category pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <!-- <span class="site-title-tagline">Explorez les voitures selon votre marque préférée</span> -->
                    <h2 class="site-title">Voiture par <span>marque</span></h2>
                    <div class="heading-divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($marques->take(12) as $marque)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ route('annonces.parmarque', $marque->id) }}" class="category-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="category-img">
                            <img src="{{ asset('images/logos/' . $marque->logo) }}" width="45px" alt="{{ $marque->nom }}" />
                        </div>
                        <h5>{{ $marque->nom }}</h5>
                    </a>
                </div>
            @endforeach

        </div>
        @if ($marques->count() > 12)
            <div class="text-center">
                <a href="#" id="loadMore" class="theme-btn" style="padding: 6px 10px; border-radius: 4px;">
                    Suivant <i class="fa-solid fa-chevron-down"></i>
                    <!-- <i class="mdi mdi-menu-down"></i> -->
                </a>
            </div>
            <div class="row mx-auto text-center align-items-center mb-5" id="marquesHidden" style="display:none">
                @foreach ($marques->skip(12)->take(15) as $marque)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ route('annonces.parmarque', $marque->id) }}" class="category-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="category-img">
                            <img src="{{ asset('images/logos/' . $marque->logo) }}" width="45px" alt="{{ $marque->nom }}" />
                        </div>
                        <h5>{{ $marque->nom }}</h5>
                    </a>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>