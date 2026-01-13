<section id="menu" class="py-20 bg-neutral-950 text-white">
    <div class="max-w-6xl mx-auto px-6">

        <!-- TITRE -->
        <h2 class="text-3xl font-bold text-center">Notre menu</h2>
        <p class="mt-2 text-center text-white/70">
            Une cuisine locale et généreuse
        </p>

        <!-- SPÉCIALITÉS -->
        <div class="mt-12">
            <h3 class="text-2xl font-semibold mb-6">⭐ Spécialités de la maison</h3>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach (['Poisson cru au lait de coco', 'Plat du jour', 'Burger maison'] as $item)
                    <div class="rounded-2xl bg-white/5 border border-white/10 p-6">
                        <h4 class="text-xl font-semibold">{{ $item }}</h4>
                        <p class="mt-2 text-sm text-white/70">
                            Produits frais, préparés sur place.
                        </p>
                        <span class="mt-4 block font-bold">À partir de 2 500 XPF</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- MENU CLASSIQUE -->
        <div class="mt-20">
            <h3 class="text-2xl font-semibold mb-6">🍽️ À la carte</h3>

            <div class="grid md:grid-cols-2 gap-6">
                @foreach (['Salades', 'Plats chauds', 'Desserts', 'Boissons'] as $item)
                    <div class="rounded-xl border border-white/10 p-5">
                        <h4 class="font-semibold">{{ $item }}</h4>
                        <p class="mt-1 text-sm text-white/60">
                            Sélection de plats disponibles
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
