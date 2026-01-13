<header x-data="{ open: false }"
    class="sticky top-0 z-50 bg-black/70 backdrop-blur border-b border-white/10">

    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

        {{-- LOGO / NOM --}}
        <span class="text-xl font-bold tracking-wide">
            Votre nom
        </span>

        {{-- MENU DESKTOP --}}
        <nav class="hidden md:flex items-center gap-8 text-sm text-white/80">
            <a href="#services" class="hover:text-white">Services</a>
            <a href="#method" class="hover:text-white">Méthode</a>
            <a href="#contact" class="hover:text-white">Contact</a>

            <a href="tel:+68900000000"
               class="ml-4 inline-flex items-center rounded-lg bg-white px-4 py-2 text-sm font-semibold text-black hover:bg-white/90">
                Appeler
            </a>
        </nav>

        {{-- BURGER MOBILE --}}
        <button @click="open = !open" class="md:hidden text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    {{-- MENU MOBILE --}}
    <div x-show="open" x-transition @click.outside="open = false"
         class="md:hidden bg-black/90 border-t border-white/10">
        <nav class="flex flex-col gap-4 px-6 py-6 text-white/90 text-sm">
            <a @click="open=false" href="#services">Services</a>
            <a @click="open=false" href="#method">Méthode</a>
            <a @click="open=false" href="#contact">Contact</a>

            <a @click="open=false"
               href="tel:+68900000000"
               class="mt-2 inline-flex justify-center rounded-lg bg-white px-4 py-2 font-semibold text-black">
                Appeler
            </a>
        </nav>
    </div>
</header>
