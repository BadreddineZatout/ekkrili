<form method="GET" action="/ads" class="p-5 h-fit">
    <div class="w-full mb-5">
        <label class="font-semibold" for="search">Mot Clé</label>
        <input
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gold-400"
            id="search" name="search" type="text" placeholder="Entrez un mot clé ...">
    </div>
    <div class="w-full mb-5">
        <label class="font-semibold" for="location">Location</label>
        <input
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gold-400"
            id="location" name="location" type="text" placeholder="Dans quelle ville ? Quartier ?">
    </div>
    <div class="w-full mb-5">
        <label class="font-semibold" for="price_min">Prix Min</label>
        <input
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gold-400"
            id="price_min" name="price_min" type="number" placeholder="Votre budget min ?">
    </div>
    <div class="w-full mb-5">
        <label class="font-semibold" for="price_max">Prix Max</label>
        <input
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gold-400"
            id="price_max" name="price_max" type="number" placeholder="Votre budget max ?">
    </div>
    <div class="w-full mb-5">
        <label class="font-semibold mb-2" for="type">type</label>
        <div class="w-full flex items-center gap-x-5 mt-2">
            <label class="flex items-center gap-x-2" for="type-0"><input type="radio" value="0" name="type"
                    id="type-0">Louer</label>
            <label class="flex items-center gap-x-2" for="type-1"><input type="radio" value="1" name="type"
                    id="type-1">Acheter</label>
        </div>
    </div>
    <div class="w-full mb-5">
        <label class="font-semibold mb-2" for="category">Catégorie</label>
        <select name="category" id="category"
            class="w-full px-3 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gold-400">
            <option value="" selected>Choisissez La Catégorie</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="w-full flex justify-between items-center gap-x-5 text-center">
        <button class="w-1/2 px-5 py-2 rounded-sm bg-gold-500 text-white hover:bg-gold-400">
            Rechercher
        </button>
        <button id="clear" class="w-1/2 px-5 py-2 rounded-sm bg-gold-500 text-white hover:bg-gold-400">
            Clear
        </button>
    </div>
</form>

<script>
    $("#clear").click(function(e) {
        e.preventDefault();
        window.location.href = "/ads";
    });
</script>
