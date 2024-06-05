<div class="text-left px-10 py-1 shadow-lg flex justify-between items-center">
    <a href="/">
        <img class="object-cover w-24 sm:w-32" src="/logo.png" alt="Logo">
    </a>
    <div class="space-x-2 font-semibold text-sm sm:text-lg">
        <a class="hover:text-gold-500" href="/ads">Annonces</a>
        @if (auth()->user())
            <a class="hover:text-gold-500" href="/admin">Dashboard</a>
        @else
            <a class="hover:text-gold-500" href="/admin/login">Connecter</a>
            <a class="hover:text-gold-500" href="/admin/register">Inscrire</a>
        @endif
    </div>
</div>
