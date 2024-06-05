@extends('layout')

@section('content')
    <div class="bg-gold-50 w-full h-fit mb-20 shadow-lg flex flex-col sm:flex-row">
        <div class="px-5 py-20 sm:py-40">
            <h1 class="text-6xl sm:text-7xl text-gold-500 font-bold mb-1 animate-bounce">EKKRILI</h1>
            <h2 class="text-xl font-semibold mb-5 indent-3">
                Le portail d'annonces immobilières entièrement gratuit dédié aux
                utilisateurs
                particuliers
            </h2>
        </div>
        <img class="float-end object-fill" src="{{ asset('background.jpg') }}" alt="" />
    </div>
    <div class="w-full mb-10 px-10 lg:px-20 py-10 flex justify-between items-center">
        <div class="w-full lg:w-1/2">

            <p class="indent-8">
                Bienvenue sur Ekkrili, le portail d'annonces immobilières entièrement gratuit dédié aux utilisateurs
                particuliers ! Notre site spécialisé offre une plateforme conviviale pour la diffusion d'annonces
                immobilières, avec des options d'achat, de vente et de location soigneusement filtrées pour répondre à tous
                vos besoins.
            </p>
            <p class="indent-8 mt-2">
                Pour les visiteurs, Ekkrili propose une variété de catégories, y compris la location à courte durée par
                nuitée, sous le titre de location événementielle. Vous trouverez des espaces uniques tels que des salles de
                fêtes, des salles de conférence, des lieux d'anniversaire, des locations de vacances, ainsi que divers types
                d'appartements et de maisons, tous disponibles pour vos événements spéciaux. La possibilité de visiter et de
                réserver en ligne à tout moment et à la date de votre choix offre une grande flexibilité.
            </p>
            <p class="indent-8 mt-2">
                Nos annonceurs spécialisés en marketing digital travaillent en étroite collaboration avec les propriétaires,
                les promoteurs et les agences immobilières pour publier et même vendre leurs projets immobiliers en ligne
            </p>
        </div>
        <div class="w-1/2 hidden lg:block">
            <img src="{{ asset('sale-ad.png') }}" alt="" />
        </div>
    </div>
    <x-search-section :categories="$categories" />
    <x-premium-ads :ads="$premium_ads" />
    <x-last-sales-ads :ads="$last_sales" />
    <x-last-renting-ads :ads="$last_rentals" />
@endsection
