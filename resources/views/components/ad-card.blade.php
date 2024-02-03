<a href="ads/{{ $ad->id }}" class="w-1/4 px-3 pb-5 rounded-lg hover:shadow-lg">
    <div class="rounded-lg overflow-hidden relative">
        <img src="{{ $ad->getFirstMedia() ? $ad->getFirstMedia()?->getUrl() : '/no_image.png' }}"
            alt="{{ $ad->name }}">
        <p class="absolute flex items-center gap-x-1 text-white bottom-2 right-5">
            <svg class="w-5 h-5" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                    stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            {{ $ad->getMedia()->count() }}X
        </p>
    </div>
    <div class="mt-3">
        <h3 class="text-xl text-gold-600">{{ $ad->price }} DA</h3>
        <p class="text-sm text-gray-400">{{ $ad->location?->city }}</p>
        <h1 class="text-xl">{{ $ad->name }}</h1>
    </div>
</a>
