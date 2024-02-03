@if (count($ads))
    <div class="mt-10 px-10">
        <h1 class="text-3xl font-bold">La sélection premium</h1>

        <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
            <div class="w-full relative flex items-center justify-center">
                @if (count($ads) > 1)
                    <button aria-label="slide backward"
                        class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer"
                        id="prev">
                        <svg class="text-gold-400 dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                @endif
                <div class="h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="slider"
                        class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                        @foreach ($ads as $ad)
                            <div class="flex shrink-0 relative w-full sm:h-96 sm:w-1/4 hover:scale-105">
                                <img src="{{ $ad->getFirstMedia()?->getUrl() }}" alt="{{ $ad->name }}"
                                    class="object-fill object-center w-full" />
                                <div class="bg-gray-800 bg-opacity-30 absolute bottom-4 w-full h-full p-6">
                                    <h2
                                        class="lg:text-xl py-3 px-4 rounded-full w-fit leading-4 text-base lg:leading-5 text-gray-900 bg-gold-400 dark:text-gray-900">
                                        Premium</h2>
                                    <div class="flex h-full items-end pb-6">
                                        <a href="/ads/{{ $ad->id }}"
                                            class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                                            {{ $ad->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if (count($ads) > 1)
                    <button aria-label="slide forward"
                        class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400"
                        id="next">
                        <svg class="text-gold-400 dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    </div>

    <script>
        let defaultTransform = 0;

        function goNext() {
            defaultTransform = defaultTransform - 398;
            var slider = document.getElementById("slider");
            if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }
        $("#next").click(goNext);

        function goPrev() {
            var slider = document.getElementById("slider");
            if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
            else defaultTransform = defaultTransform + 398;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }
        $("#prev").click(goPrev);
    </script>
@endif
