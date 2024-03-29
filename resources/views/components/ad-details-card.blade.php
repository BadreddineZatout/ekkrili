<a href="ads/{{ $ad->id }}" class="w-full sm:w-1/3 h-fit px-3 pb-5 rounded-lg hover:shadow-lg">
    <div class="rounded-lg overflow-hidden relative">
        <img src="{{ $ad->getFirstMedia() ? $ad->getFirstMedia()?->getUrl() : '/no_image.png' }}"
            alt="{{ $ad->name }}">
        <p class="absolute flex items-center gap-x-1 text-gold-100 bottom-2 right-5">
            <svg class="w-5 h-5" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                    stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span>
                {{ $ad->getMedia()->count() }}x
            </span>
            <svg class="w-5 h-5" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                    stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span>
                {{ $ad->vues }}x
            </span>
        </p>
    </div>
    <div class="mt-3">
        <h3 class="text-xl text-gold-600">{{ $ad->price }} DA</h3>
        <p class="text-sm text-gray-400">{{ $ad->location?->city }}</p>
        <h1 class="text-2xl font-semibold">{{ $ad->name }}</h1>
        <p class="mt-5 text-gray-400">{{ $ad->created_at->locale('fr')->diffForHumans() }} <span
                class="font-bold text-2xl mx-1">.</span> {{ $ad->category->name }} <span
                class="font-bold text-2xl mx-1">.</span> {{ $ad->type ? 'Vendre' : 'Location' }}
        </p>
    </div>
</a>
