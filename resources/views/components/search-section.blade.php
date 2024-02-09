<div class="w-full pb-10">
    <div class=" flex justify-center pt-10 mb-10">
        <h1 class="w-3/4 sm:w-1/3 text-2xl sm:text-3xl font-bold sm:font-semibold">Quel est votre projet ?</h1>
    </div>
    <div class="w-full flex justify-center">
        <form method="GET" action="/ads" class="w-full px-5 pb-5 sm:px-0 sm:pb-0 sm:w-1/3 shadow-md rounded-md">
            <div class="flex items-center">
                <label class="cursor-pointer w-1/2">
                    <input type="radio" class="peer sr-only" name="type" value="0" checked />
                    <div
                        class="w-full text-center max-w-xl rounded-md p-2 text-gray-300 ring-2 ring-gold-200 transition-all hover:shadow peer-checked:text-gold-600 peer-checked:ring-gold-400 peer-checked:bg-gold-400">
                        <p class="text-sm font-semibold uppercase text-gray-500">Louer</p>
                    </div>
                </label>
                <label class="cursor-pointer w-1/2">
                    <input type="radio" class="peer sr-only" name="type" value="1" />
                    <div
                        class="w-full text-center max-w-xl rounded-md bg-white p-2 text-gray-300 ring-2 ring-gold-200 transition-all hover:shadow peer-checked:text-gold-600 peer-checked:ring-gold-400 peer-checked:bg-gold-400">
                        <p class="text-sm font-semibold uppercase text-gray-500">Acheter</p>
                    </div>
                </label>
            </div>
            <div class="px-5 py-10 w-full border border-t-0 border-gold-400 rounded-b-md">
                <div class="w-full mb-5">
                    <input
                        class=" w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gold-400"
                        name="search" type="text" placeholder="Entrez un mot clé ...">
                </div>
                <div class="w-full flex flex-wrap sm:flex-nowrap gap-3">
                    <input
                        class="w-full sm:w-3/5 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gold-400"
                        name="location" type="text" placeholder="Dans quelle ville ? Quartier ?">

                    <input
                        class="w-full sm:w-2/5 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gold-400"
                        name="price_max " type="text" placeholder="Votre budget max ?">
                </div>
                <div class="mt-5 flex flex-wrap gap-3">
                    @foreach ($categories as $category)
                        <label class="cursor-pointer">
                            <input type="radio" class="peer sr-only" name="category" value="{{ $category->id }}" />
                            <div
                                class="w-fit max-w-xl rounded-md p-2 text-gray-300 ring-2 ring-gold-200 transition-all hover:shadow peer-checked:text-gold-600 peer-checked:ring-gold-400 peer-checked:ring-offset-2">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <p class="text-sm font-semibold uppercase text-gray-500">{{ $category->name }}
                                        </p>
                                        <div>
                                            <svg width="24" height="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m10.6 13.8l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7q0 .425.275.7L9.9 15.9q.275.275.7.275q.425 0 .7-.275l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275q-.425 0-.7.275ZM12 22q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
                <div class="w-full text-center mt-10">
                    <button placeholder="Rechercher"
                        class="px-5 py-3 rounded-full bg-gold-500 text-white hover:bg-gold-300">
                        Rechercher
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#louer").addClass("bg-gold-500 text-white");
        $("#acheter").addClass("bg-white text-black");
        $("#acheter").removeClass("bg-gold-500 text-white");
    });
    $("#louer").click(function(e) {
        e.preventDefault();
        $("#louer").addClass("bg-gold-500 text-white");
        $("#louer").removeClass("bg-white text-black");
        $("#acheter").addClass("bg-white text-black");
        $("#acheter").removeClass("bg-gold-500 text-white");
    });
    $("#acheter").click(function(e) {
        e.preventDefault();
        $("#acheter").addClass("bg-gold-500 text-white");
        $("#acheter").removeClass("bg-white text-black");
        $("#louer").addClass("bg-white text-black");
        $("#louer").removeClass("bg-gold-500 text-white");
    });
</script>
