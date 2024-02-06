@extends('layout')

@section('content')
    <div class="mt-10 w-3/4 px-36">
        <h1 class="text-3xl font-bold my-10">{{ $ad->name }}</h1>
        <x-carousel :images="$ad->getMedia()" />
    </div>
@endsection
