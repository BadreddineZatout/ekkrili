@extends('layout')

@section('content')
    <div class="w-full flex flex-wrap sm:flex-nowrap gap-5 px-5 sm:px-20 mt-10 mb-5">
        <div class="w-full sm:w-1/4 h-fit border border-gold-100">
            <x-filters :categories="$categories" :filters="$filters" />
        </div>
        <div class="w-full sm:w-3/4">
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
