<div
    class="w-full border border-gold-100 sm:w-1/4 sm:px-3 py-5 min-h-[500px] rounded-lg hover:shadow-lg flex flex-col justify-between">
    <div>
        <div class="rounded-lg overflow-hidden relative">
            <img src="{{ $ad->getFirstMedia() ? $ad->getFirstMedia()?->getUrl() : '/no_image.png' }}"
                alt="{{ $ad->name }}">
            @if ($ad->agency_link)
                <a class="absolute flex items-center gap-2 top-2 left-2 px-4 py-2 rounded-lg bg-gold-300 text-white font-bold text-xs hover:bg-gold-400 hover:border hover:border-gold-900"
                    href="{{ $ad->agency_link }}" target="_blank">Agence <svg class="w-4" data-slot="icon"
                        aria-hidden="true" fill="none" stroke-width="2.0" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            @endif
            <p class="absolute flex items-center gap-x-1 text-white bottom-2 right-5">
                <svg class="w-5 h-5" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                {{ $ad->getMedia()->count() }}X
                @if ($ad->link_3d)
                    <span class="ml-1">@svg('tabler-360-view')</span>
                @endif
            </p>
        </div>
        <div class="mt-3 font-semibold">
            <h3 class="text-2xl font-bold text-gold-600">{{ $ad->price }} DA</h3>
            <h1 class="text-xl">{{ $ad->category->name }} - {{ $ad->name }}</h1>
            <div class="w-full flex flex-wrap gap-2">
                @foreach ($ad->tags as $index => $tag)
                    <div class="w-fit flex items-center">{{ $tag->pivot->value }}
                        @if ($index != count($ad->tags) - 1)
                            <x-tabler-point-filled class="w-5 ml-2" />
                        @endif
                    </div>
                @endforeach
            </div>
            <p class="text-sm mt-5 text-gray-500">{{ $ad->location?->city }}</p>
        </div>
    </div>
    <div class="w-full flex justify-between items-center">
        <p class="text-gray-500">{{ $ad->created_at->locale('fr')->diffForHumans() }}
        </p>
        <a class="float-end flex items-center gap-1 text-xl font-semibold hover:cursor-pointer hover:underline hover:text-gold-400"
            href="ads/{{ $ad->id }}">Details
            <svg class="w-5" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="m8.25 4.5 7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></a>
    </div>
</div>
