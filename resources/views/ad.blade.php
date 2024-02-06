@extends('layout')

@section('content')
    <div class="mt-10 w-3/4 px-36">
        <x-carousel :images="$ad->getMedia()" />
        <h1 class="text-3xl font-bold my-10">{{ $ad->name }}</h1>
        <p>{{ $ad->category->name }} <span class="font-bold text-2xl mx-1">.</span>
            {{ $ad->type ? 'Vendre' : 'Location' }}
            <span class="font-bold text-2xl mx-1">.</span> {{ $ad->vues }} Vues
            <span class="font-bold text-2xl mx-1">.</span> ID: {{ $ad->id }}
        </p>
        <h3 class="my-2 text-2xl text-gold-500">{{ $ad->price }} DA</h3>
        <p class="text-gray-400">Publié le {{ $ad->created_at->format('d M Y') }}. Modifié le
            {{ $ad->updated_at->format('d M Y') }}</p>
    </div>
@endsection
