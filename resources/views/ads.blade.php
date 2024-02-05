@extends('layout')

@section('content')
    <div class="w-full flex gap-x-5 px-20 mt-10 mb-5">
        <div class="w-1/4 border border-gold-100">
            <x-filters />
        </div>
        <div class="w-3/4">
            <h1 class="text-2xl font-semibold">{{ count($ads) }} résultats trouvés</h1>
            <div class="w-full my-10 px-5 flex flex-wrap gap-y-5">
                @foreach ($ads as $ad)
                    <x-ad-details-card :ad="$ad" />
                @endforeach
            </div>
            {{ $ads->links() }}
        </div>
    </div>
@endsection
