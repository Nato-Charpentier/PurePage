<x-layouts.app>
    {{-- HERO --}}
    <section class="relative hero-bg">
        <div class="mx-auto grid max-w-6xl grid-cols-1 items-center gap-10 px-4 py-20 md:grid-cols-2">
            <div>
                <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs text-white/80">
                    🚀 Lancement rapide · Design soigné
                </div>
                <h1 class="text-3xl font-bold leading-tight md:text-5xl">
                    Je crée des sites <span class="bg-gradient-to-r from-emerald-400 to-sky-400 bg-clip-text text-transparent">modernes</span>
                    qui transforment vos visiteurs en clients.
                </h1>
                <p class="mt-4 max-w-xl text-white/80">
                    Vitrine, e-commerce ou refonte — je conçois et développe des sites rapides, beaux et orientés conversion. Basé en Polynésie, j’accompagne des marques partout.
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a href="#contact" data-scroll class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 font-semibold text-black shadow hover:shadow-lg">Demander un devis →</a>
                    <a href="#packs" data-scroll class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/5 px-5 py-3 font-medium text-white/90 hover:bg-white/10">Voir les packs</a>
                </div>
                <div class="mt-6 flex flex-wrap items-center gap-4 text-xs text-white/60">
                    <div class="inline-flex items-center gap-1 rounded-md border border-white/10 bg-white/5 px-2 py-1">⏱️ Livraison rapide</div>
                    <div class="inline-flex items-center gap-1 rounded-md border border-white/10 bg-white/5 px-2 py-1">🧾 Contrat & facture</div>
                    <div class="inline-flex items-center gap-1 rounded-md border border-white/10 bg-white/5 px-2 py-1">📱 Responsive partout</div>
                </div>
            </div>

            <div class="relative">
                <div class="mx-auto aspect-[4/3] w-full max-w-xl rounded-3xl border border-white/10 bg-gradient-to-br from-emerald-800/30 to-sky-500/30 p-2 shadow-2xl">
                    <div class="flex h-full w-full items-center justify-center rounded-2xl bg-black/40">
                        <div class="text-center">
                            <x-logo class="w-14 h-14 mx-auto" />
                            <div class="mt-3 text-sm text-white/70">{{ config('purpage.tagline') }}</div>
                        </div>
                    </div>
                </div>
                <div class="pointer-events-none absolute -right-4 -top-4 hidden rotate-6 rounded-full border border-white/10 bg-white/10 px-3 py-1 text-xs backdrop-blur md:block">
                    ✦ Welcome ✦
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICES --}}
    <section id="services" class="border-t border-white/10 py-12 md:py-16">
        <div class="mx-auto max-w-6xl px-4">
            <h2 class="text-2xl font-semibold md:text-3xl">Services</h2>
            <p class="mt-2 max-w-2xl text-white/70">Choisissez ce dont vous avez besoin. Je peux intervenir à la carte ou en pack clé en main.</p>

            <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach(config('purpage.services') as $s)
                <div class="card">
                    <div class="icon">{{ $s['icon'] }}</div>
                    <h3 class="text-lg font-semibold">{{ $s['title'] }}</h3>
                    <p class="mt-1 text-sm text-white/80">{{ $s['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PACKS --}}
    <section id="packs" class="border-t border-white/10 py-12 md:py-16">
        <div class="mx-auto max-w-6xl px-4">
            <h2 class="text-2xl font-semibold md:text-3xl">Packs & tarifs</h2>
            <p class="mt-2 max-w-2xl text-white/70">Des offres simples et transparentes. Tous les packs sont personnalisables selon vos objectifs.</p>

            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach(config('purpage.pricing') as $p)
                <div class="relative rounded-3xl border bg-white/5 p-6 backdrop-blur {{ $p['highlighted'] ? 'border-emerald-400/40 shadow-[0_0_0_3px_rgba(16,185,129,0.25)]' : 'border-white/10' }}">
                    @if(!empty($p['badge']))
                    <div class="absolute -top-3 left-4 rounded-full border border-white/10 bg-emerald-700/20 px-3 py-1 text-xs font-medium text-emerald-100 backdrop-blur">
                        {{ $p['badge'] }}
                    </div>
                    @endif

                    <h3 class="text-xl font-semibold">{{ $p['name'] }}</h3>
                    <div class="mt-2 text-3xl font-extrabold" data-price="{{ (int)$p['price'] }}">{{ number_format($p['price'], 0, ',', ' ') }} XPF</div>

                    <ul class="mt-4 space-y-2">
                        @foreach($p['features'] as $f)
                        <li class="flex items-start gap-2 text-sm text-white/90">✅ {{ $f }}</li>
                        @endforeach
                    </ul>

                    <a href="#contact" data-scroll class="mt-6 block w-full rounded-xl px-4 py-2 text-center font-semibold shadow border border-white/20 bg-white/5 text-white hover:bg-white/10">
                        {{ $p['cta'] }}
                    </a>
                    <p class="mt-3 text-xs text-white/60">*Frais tiers (domaine, Stripe…) non inclus.</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PROCESS --}}
    <section id="process" class="border-t border-white/10  py-12 md:py-16">
        <div class="mx-auto max-w-6xl px-4">
            <h2 class="text-2xl font-semibold md:text-3xl">Mon process</h2>
            <p class="mt-2 max-w-2xl text-white/70">Une méthode claire, sans jargon, pour avancer vite et bien.</p>

            <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach(config('purpage.steps') as $s)
                <div class="card">
                    <div class="mb-2 inline-grid place-items-center w-9 h-9 rounded-lg bg-white/10 text-lg">{{ $s['icon'] }}</div>
                    <h3 class="font-semibold">{{ $s['t'] }}</h3>
                    <p class="text-sm text-white/80">{{ $s['d'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PORTFOLIO / Maquettes --}}
    <section id="portfolio" class="border-t border-white/10 py-12 md:py-16">
        <div class="mx-auto max-w-6xl px-4">
            <h2 class="text-2xl font-semibold md:text-3xl">Exemples de maquettes</h2>
            <p class="mt-2 max-w-2xl text-white/70">Maquettes non contractuelles — idéales pour se projeter rapidement avant réalisation.</p>

            <p class="mt-2 max-w-2xl text-white/60 text-sm">
                Ces maquettes sont actuellement en cours de conception.
                Elles servent d’exemples visuels pour se projeter.
            </p>

            <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-3">
                @foreach(config('purpage.mocks') as $m)
                <article class="relative rounded-2xl border border-white/10 bg-white/5 p-4 opacity-60 grayscale">
                    <div class="thumb"></div>
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold">{{ $m['title'] }}</h3>
                        <p class="text-sm text-white/70">{{ $m['subtitle'] }}</p>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="inline-flex items-center rounded-full bg-yellow-500/10 border border-yellow-400/30 px-3 py-1 text-xs text-yellow-300">
                            🚧 Maquette en cours de création
                        </span>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- MODAL --}}
    <div id="mock-modal" class="modal hidden">
        <div class="modal-card relative">
            <button class="modal-close" aria-label="Fermer">✕</button>
            <div class="modal-content"><!-- injecté par JS --></div>
            <div class="modal-actions">
                <a href="#" class="btn wa-open" id="mock-wa">WhatsApp</a>
                <a href="#" class="btn btn-primary" id="mock-mail">Demander un devis →</a>
            </div>
        </div>
    </div>

    {{-- AVIS --}}
    <section id="avis" class="border-t border-white/10 py-12 md:py-16">
        <div class="mx-auto px-4">
            <h2 class="font-semibold md:text-3xl">Avis clients</h2>
            <div class="card mt-8">
                <p class="text-white/90"><strong>Les premiers avis arrivent.</strong> Devenez <strong>client pilote</strong> : on construit votre site ensemble, et vous partagez un retour transparent.</p>
                <div class="mt-4 flex flex-wrap gap-3">
                    <a href="#contact" data-scroll class="btn btn-primary">Devenir client pilote →</a>
                    <a href="#" class="btn wa-open" data-text="Ia ora na ! Je souhaite devenir client pilote.">Parler sur WhatsApp</a>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="faq-section">
        <h2>Questions fréquentes</h2>

        <div class="faq-grid">

            <div class="faq-item">
                <button class="faq-question">
                    Combien de temps pour livrer un site ?
                    <span>+</span>
                </button>
                <div class="faq-answer">
                    <p>En général entre 3 et 7 jours selon le projet.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Les textes et images sont-ils fournis ?
                    <span>+</span>
                </button>
                <div class="faq-answer">
                    <p>Oui, ou je peux t’aider à les créer.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Puis-je payer en plusieurs fois ?
                    <span>+</span>
                </button>
                <div class="faq-answer">
                    <p>Oui, paiement possible en plusieurs fois.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Gérez-vous le domaine & l’hébergement ?
                    <span>+</span>
                </button>
                <div class="faq-answer">
                    <p>Oui, je m’occupe de tout si besoin.</p>
                </div>
            </div>

        </div>
    </section>

    {{-- CONTACT --}}
    <section id="contact" class="border-t border-white/10 py-12 md:py-16">
        <div class="mx-auto max-w-6x1 px-4">
            <h2 class="text-2xl font-semibold md:text-3xl">Parlons de votre projet</h2>
            <p class="mt-2 max-w-2xl text-white/70">Expliquez vos objectifs, je reviens vers vous sous 24h ouvrées.</p>

            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="card md:col-span-2">
                    <form id="contact-form" class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                        @csrf

                        <input type="hidden" name="started_at" id="started_at">

                        <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

                        <div>
                            <label class="text-xs text-white/70">Nom</label>
                            <input
                                name="name"
                                required
                                class="mt-1 w-full rounded-xl border border-white/10 bg-black/30 px-3 py-2 text-sm outline-none placeholder:text-white/40"
                                placeholder="Votre nom" />
                        </div>

                        <div>
                            <label class="text-xs text-white/70">Email</label>
                            <input
                                name="email"
                                type="email"
                                required
                                class="mt-1 w-full rounded-xl border border-white/10 bg-black/30 px-3 py-2 text-sm outline-none placeholder:text-white/40"
                                placeholder="vous@exemple.com" />
                        </div>

                        <div class="sm:col-span-2">
                            <label class="text-xs text-white/70">Message</label>
                            <textarea
                                name="message"
                                rows="5"
                                required
                                class="mt-1 w-full rounded-xl border border-white/10 bg-black/30 px-3 py-2 text-sm outline-none placeholder:text-white/40"
                                placeholder="Parlez-moi de votre projet (objectifs, délais, budget)…"></textarea>
                        </div>

                        <div class="sm:col-span-2 flex flex-wrap items-center gap-3">
                            <button
                                id="submitBtn" type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-2.5 font-semibold text-black shadow hover:shadow-lg">
                                Envoyer ma demande →
                            </button>

                            <span class="text-xs" id="submit-status"></span>

                        </div>
                    </form>
                </div>

                <div class="space-y-4">
                    <div class="card">
                        <h3 class="font-semibold">Contact direct</h3>
                        <div class="mt-3 space-y-2 text-sm">
                            <a href="mailto:{{ config('purpage.brand_email') }}" class="flex items-center gap-2 text-white/90 hover:underline">✉️ {{ config('purpage.brand_email') }}</a>
                            <a href="#" class="flex items-center gap-2 text-white/90 hover:underline wa-open" data-text="Ia ora na ! Je souhaite parler de mon projet web.">📱 WhatsApp {{ config('purpage.whatsapp_intl') }}</a>
                            <div class="flex items-center gap-2 text-white/70">🌍 Papeete, Polynésie française</div>
                        </div>
                        <p class="mt-3 text-xs text-white/60">*Mentions légales & CGV disponibles sur demande.</p>
                    </div>

                    <div class="card">
                        <h3 class="font-semibold">Réservation</h3>
                        <div class="mt-3 overflow-hidden rounded-xl border border-white/10">
                            <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                            <script src="https://assets.calendly.com/assets/external/widget.js" async></script>

                            <button
                                class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition"
                                onclick="Calendly.initPopupWidget({url: 'https://calendly.com/ncharp14/new-meeting?primary_color=0e2b5d'}); return false;">
                                Réserver un appel gratuit
                            </button>

                        </div>
                    </div>
                </div>
            </div>
    </section>
</x-layouts.app>