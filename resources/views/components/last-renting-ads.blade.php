<div class="mt-5 sm:mt-10 px-5 sm:px-10">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl sm:text-3xl font-bold">Dernières annonces de location</h1>
        <a href="/ads?type=0"
            class="border border-gold-200 rounded-lg sm:rounded-full text-center p-1 sm:p-2 text-gold-400 hover:text-white hover:bg-gold-400">voir
            plus</a>
    </div>
    @if (count($ads))
        <div class="mt-10 px-10 flex items-center flex-wrap gap-y-5">
            @foreach ($ads as $ad)
                <x-ad-card :ad="$ad" />
            @endforeach
        </div>
    @else
        <h1>No Ads yet</h1>
    @endif
</div>
