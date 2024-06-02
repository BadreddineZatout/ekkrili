@extends('layout')

@section('content')
    <div class="mt-10 w-full sm:w-3/4 px-5 sm:px-36">
        <x-carousel :images="$ad->getMedia()" />
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold my-10">{{ $ad->name }}</h1>
            @if ($ad->link_3d)
                <a class="flex items-center rounded-lg border border-gold-500 px-3 py-3 text-gold-400 hover:bg-gold-200 hover:text-white"
                    href="{{ $ad->link_3d }}" target="_blank">
                    <p class="font-bold text-lg mr-1 pb-1">Visit </p> @svg('tabler-360-view') <svg class="w-5" data-slot="icon"
                        aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </a>
            @endif
        </div>
        <p>{{ $ad->category->name }} <span class="font-bold text-2xl mx-1">.</span>
            {{ $ad->type ? 'Vendre' : 'Location' }}
            <span class="font-bold text-2xl mx-1">.</span> {{ $ad->vues }} Vues
            <span class="font-bold text-2xl mx-1">.</span> ID: {{ $ad->id }}
        </p>
        <h3 class="my-2 text-2xl text-gold-500">{{ $ad->price }} DA</h3>
        <p class="text-gray-400">Publié le {{ $ad->created_at->format('d F Y') }}. Modifié le
            {{ $ad->updated_at->format('d F Y') }}</p>
        <div class="mt-10">
            <h1 class="text-xl font-semibold">Attributs</h1>
            @foreach ($ad->tags as $tag)
                <div class="flex justify-between items-center border-b border-gray-200 py-2">
                    <div class="w-1/3 font-semibold">{{ $tag->name }}</div>
                    <div class="w-2/3">{{ $tag->pivot->value }}</div>
                </div>
            @endforeach
        </div>
        <div class="my-10 flex flex-wrap sm:flex-nowrap justify-between items-center">
            <div class="w-full sm:w-3/4 pr-5">
                <h1 class="text-xl font-semibold">Description</h1>
                <p>{{ $ad->description }}</p>
            </div>
            <div class="w-full mt-5 sm:mt-0 sm:w-1/4 sm:pl-5 sm:border-l-4 sm:border-gold-400">
                <h3 class="flex items-center gap-x-2 font-semibold">
                    <svg class="w-5 h-5" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Emplacement
                </h3>
                <p>{{ $ad->location->address }}</p>
                <p>{{ $ad->location->postal_code }}</p>
                <p>{{ $ad->location->city }}</p>
                <p>{{ $ad->location->state }}</p>
                <p>{{ $ad->location->latitude }} {{ $ad->location->longitude }}</p>
            </div>
        </div>

        <div id='map' class="w-full h-96 mb-10"></div>
    </div>
    <script>
        mapboxgl.accessToken = "{{ env('MAPBOX_TOKEN') }}";
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            center: [{{ $ad->location->longitude }},
                {{ $ad->location->latitude }}
            ], // starting position [lng, lat]
            zoom: 14, // starting zoom
        });
        const marker = new mapboxgl.Marker()
            .setLngLat([
                {{ $ad->location->longitude }},
                {{ $ad->location->latitude }}
            ])
            .addTo(map);
    </script>
@endsection
