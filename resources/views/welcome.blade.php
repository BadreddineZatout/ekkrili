@extends('layout')

@section('content')
    <div class="bg-gold-50 w-full h-fit mb-20 shadow-lg flex flex-col sm:flex-row">
        <div class="px-5 py-20 sm:py-40">
            <h1 class="text-6xl sm:text-7xl text-gold-500 font-bold mb-1 animate-bounce">EKKRILI</h1>
            <h2 class="text-xl font-semibold indent-3">
                Le portail d'annonces immobilières <br>
            </h2>
            <h2 class="text-xl font-semibold mb-5 indent-3">
                Trouver votre clé 🔑
            </h2>
        </div>
        <img class="float-end object-fill" src="{{ asset('background.jpg') }}" alt="" />
    </div>
    <div class="w-full mb-10 px-10 lg:px-20 py-10 flex justify-between items-center">
        <div class="w-full text-xl font-semibold lg:w-1/2">
            <p class="indent-8">
                Bienvenue sur Ekkrili, nous sommes une nouvelle plateforme de communication immobilière
                En Algérie. Vous pouvez maintenant créer avec nous des annonces professionnel mise en relation directe
                avec notre client.
            </p>
            <p class="indent-8 mt-5">
                On propose un service audiovisuel innovant professionnel pour nos partenaires
            </p>
            <ul>
                <li class="flex items-center gap-2"><svg class="w-5" data-slot="icon" aria-hidden="true" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>Une visite virtuelle 3d en ligne</li>
                <li class="flex items-center gap-2"><svg class="w-5" data-slot="icon" aria-hidden="true" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>Photo en 2d</li>
                <li class="flex items-center gap-2"><svg class="w-5" data-slot="icon" aria-hidden="true" fill="none"
                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>Vidéo publicitaire</li>
            </ul>
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
