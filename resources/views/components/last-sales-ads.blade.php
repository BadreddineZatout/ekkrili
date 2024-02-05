<div class="mt-10 px-10">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Dernières annonces de vente</h1>
        <a href="/ads?type=1"
            class="border border-gold-200 rounded-full p-2 text-gold-400 hover:text-white hover:bg-gold-400">voir
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
