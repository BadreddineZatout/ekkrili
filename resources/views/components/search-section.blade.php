<div class="w-full">
    <div class=" flex justify-center pt-20 mb-10">
        <h1 class="w-1/3 text-3xl font-semibold">Quel est votre projet ?</h1>
    </div>
    <div class="w-full flex justify-center">
        <div class="w-1/3 shadow-md rounded-md">
            <div class="flex items-center">
                <button id="louer" class="w-1/2 rounded-t-md bg-blue-500 text-white py-2">Louer</button>
                <button id="acheter" class="w-1/2 rounded-t-md bg-blue-500 text-white py-2">Acheter</button>
            </div>
            <form class="px-5 py-10 w-full">
                <div class="w-full mb-5">
                    <input class=" w-full px-3 py-2 border border-gray-300 rounded-md" type="text"
                        placeholder="Entrez un mot clé ...">
                </div>
                <div class="w-full flex gap-x-3">
                    <input class="w-3/5 px-3 py-2 border border-gray-300 rounded-md" type="text"
                        placeholder="Dans quelle ville ? Quartier ?">

                    <input class="w-2/5 px-3 py-2 border border-gray-300 rounded-md" type="text"
                        placeholder="Votre budget max ?">
                </div>
                <div class="mt-5">
                    <span id="radio-1" class="px-3 py-2 border border-dashed border-gray-400 rounded-md"><input
                            type="radio" name="type" id="maison"> <label for="maison">Maison</label></span>
                    <span id="radio-2" class="px-3 py-2 border border-dashed border-gray-400 rounded-md"><input
                            type="radio" name="type" id="appartement"> <label
                            for="appartement">Appartement</label></span>
                    <span id="radio-3" class="px-3 py-2 border border-dashed border-gray-400 rounded-md"><input
                            type="radio" name="type" id="evenement"> <label
                            for="evenement">Evenement</label></span>
                </div>
                <div class="w-full text-center mt-10">
                    <button class="px-5 py-3 rounded-full bg-blue-600 text-white hover:bg-blue-500">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#louer").removeClass("bg-blue-500 text-white");
        $("#louer").addClass("bg-white text-black");
    });
    $("#louer").click(function(e) {
        e.preventDefault();
        $("#louer").removeClass("bg-blue-500 text-white");
        $("#louer").addClass("bg-white text-black");
        $("#acheter").removeClass("bg-white text-black");
        $("#acheter").addClass("bg-blue-500 text-white");
    });
    $("#acheter").click(function(e) {
        e.preventDefault();
        $("#acheter").removeClass("bg-blue-500 text-white");
        $("#acheter").addClass("bg-white text-black");
        $("#louer").removeClass("bg-white text-black");
        $("#louer").addClass("bg-blue-500 text-white");
    });

    $("#radio-1").click(function(e) {
        $("#radio-1").removeClass("border-dashed border-gray-400");
        $("#radio-1").addClass("border-solid border-blue-400");
        $("#radio-2").removeClass("border-solid border-blue-400");
        $("#radio-3").removeClass("border-solid border-blue-400");
        $("#radio-2").addClass("border-dashed border-gray-400");
        $("#radio-3").addClass("border-dashed border-gray-400");
    });
    $("#radio-2").click(function(e) {
        $("#radio-2").removeClass("border-dashed border-gray-400");
        $("#radio-2").addClass("border-solid border-blue-400");
        $("#radio-1").removeClass("border-solid border-blue-400");
        $("#radio-3").removeClass("border-solid border-blue-400");
        $("#radio-1").addClass("border-dashed border-gray-400");
        $("#radio-3").addClass("border-dashed border-gray-400");
    });
    $("#radio-3").click(function(e) {
        $("#radio-3").removeClass("border-dashed border-gray-400");
        $("#radio-3").addClass("border-solid border-blue-400");
        $("#radio-1").removeClass("border-solid border-blue-400");
        $("#radio-2").removeClass("border-solid border-blue-400");
        $("#radio-1").addClass("border-dashed border-gray-400");
        $("#radio-2").addClass("border-dashed border-gray-400");
    });
</script>
