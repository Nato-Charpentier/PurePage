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
                    <a href="#tarifs" data-scroll class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/5 px-5 py-3 font-medium text-white/90 hover:bg-white/10">Voir les prestations</a>
                </div>
                <div class="mt-6 flex flex-wrap items-center gap-4 text-xs text-white/60">
                    <div class="inline-flex items-center gap-1 rounded-md border border-white/10 bg-white/5 px-2 py-1">⏱️ Livraison rapide</div>
                    <div class="inline-flex items-center gap-1 rounded-md border border-white/10 bg-white/5 px-2 py-1">🧾 Contrat & facture</div>
                    <div class="inline-flex items-center gap-1 rounded-md border border-white/10 bg-white/5 px-2 py-1">📱 Responsive partout</div>
                </div>
            </div>

            <div class="hero-preview-wrap" aria-label="Aperçu d'un site moderne conçu par PurPage">
                <div class="hero-preview-glow" aria-hidden="true"></div>
                <div class="hero-browser">
                    <div class="hero-browser-bar">
                        <div class="flex gap-1.5" aria-hidden="true">
                            <span class="browser-dot bg-red-400"></span>
                            <span class="browser-dot bg-amber-300"></span>
                            <span class="browser-dot bg-emerald-400"></span>
                        </div>
                        <div class="hero-browser-address">
                            <span class="text-emerald-400">●</span>
                            votre-site.pf
                        </div>
                        <span class="text-xs text-white/30">PURPAGE</span>
                    </div>

                    <div class="hero-browser-content">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <x-logo class="h-8 w-8" />
                                <span class="text-xs font-semibold tracking-wide">Votre activité</span>
                            </div>
                            <div class="hidden items-center gap-3 text-[10px] text-white/50 sm:flex">
                                <span>Services</span><span>Projets</span><span>Contact</span>
                            </div>
                        </div>

                        <div class="hero-demo-copy">
                            <span class="hero-demo-kicker">Création locale · Impact digital</span>
                            <h2>Une présence en ligne qui vous ressemble.</h2>
                            <p>Design soigné, navigation fluide et expérience pensée pour convertir.</p>
                            <span class="hero-demo-button">Découvrir le projet →</span>
                        </div>

                        <div class="hero-demo-stats">
                            <div><strong>Design unique</strong><span>Une image qui vous ressemble</span></div>
                            <div><strong>Parcours fluide</strong><span>Une navigation sans friction</span></div>
                            <div><strong>Contact facile</strong><span>Des actions claires et visibles</span></div>
                        </div>
                    </div>
                </div>

                <div class="hero-float-card hero-float-card-top" aria-hidden="true">
                    <span class="hero-status-dot"></span>
                    Site en ligne
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICES --}}
    <section id="services" class="reveal section-band">
            <div class="section-shell">
                <div class="section-heading">
                    <span class="section-eyebrow">Ce que je réalise</span>
                    <h2>Des services pensés pour votre présence en ligne</h2>
                    <p>Choisissez ce dont vous avez besoin. Je peux intervenir à la carte ou avec une solution clé en main.</p>
                </div>

                <div class="services-grid">
                    @foreach(config('purpage.services') as $s)
                    <article class="card glow service-card">
                        <div class="service-card-top">
                            <div class="icon">{{ $s['icon'] }}</div>
                            <span class="service-index">0{{ $loop->iteration }}</span>
                        </div>
                        <h3>{{ $s['title'] }}</h3>
                        <p>{{ $s['desc'] }}</p>
                    </article>
                    @endforeach
                </div>
            </div>
    </section>

    {{-- TARIFS --}}
<section id="tarifs" class="section-band section-band-muted">
    <div class="section-shell">
        <div class="section-heading">
            <span class="section-eyebrow">Votre projet, votre solution</span>
            <h2>Des prestations adaptées à vos objectifs</h2>
            <p>Chaque projet est unique. Après un échange rapide, je vous propose un devis clair, adapté à vos besoins et sans surprise.</p>
        </div>

        <div class="offers-grid">

            <article class="card glow offer-card">
                <span class="offer-label">Présenter</span>
                <h3>🌐 Site vitrine</h3>
                <p>
                    Présentez votre activité avec un site moderne,
                    responsive et optimisé pour inspirer confiance.
                </p>
                <a href="#contact" data-scroll>Parler de mon projet <span>→</span></a>
            </article>

            <article class="card glow offer-card">
                <span class="offer-label">Vendre</span>
                <h3>🛒 Site e-commerce</h3>
                <p>
                    Vendez vos produits en ligne avec une boutique
                    simple, rapide et sécurisée.
                </p>
                <a href="#contact" data-scroll>Parler de mon projet <span>→</span></a>
            </article>

            <article class="card glow offer-card">
                <span class="offer-label">Convertir</span>
                <h3>🚀 Landing page</h3>
                <p>
                    Une page conçue pour convertir vos visiteurs
                    en prospects ou clients.
                </p>
                <a href="#contact" data-scroll>Parler de mon projet <span>→</span></a>
            </article>

            <article class="card glow offer-card">
                <span class="offer-label">Moderniser</span>
                <h3>🔄 Refonte de site</h3>
                <p>
                    Modernisation complète de votre présence en ligne
                    pour améliorer votre image et vos performances.
                </p>
                <a href="#contact" data-scroll>Parler de mon projet <span>→</span></a>
            </article>

        </div>

        <div class="section-cta">
            <p>
                Demandez un devis gratuit et recevez une estimation adaptée à votre projet.
            </p>

            <a href="#contact"
               data-scroll
               class="section-cta-button">
                Demander un devis gratuit →
            </a>
        </div>

    </div>
</section>

    {{-- PROCESS --}}
    <section id="process" class="section-band section-band-muted">
        <div class="section-shell">
            <div class="section-heading">
                <span class="section-eyebrow">Une méthode simple</span>
                <h2>Votre projet, étape par étape</h2>
                <p>Une organisation claire, sans jargon, pour comprendre où nous allons et avancer sereinement.</p>
            </div>

            <div class="process-grid">
                @foreach(config('purpage.steps') as $s)
                <article class="card glow process-card">
                    <div class="process-card-head">
                        <span class="process-icon">{{ $s['icon'] }}</span>
                        <span class="process-number">0{{ $loop->iteration }}</span>
                    </div>
                    <h3>{{ $s['t'] }}</h3>
                    <p>{{ $s['d'] }}</p>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PORTFOLIO / Maquettes --}}
    <section id="portfolio" class="reveal section-band">
        <div class="section-shell">
            <div class="section-heading">
                <span class="section-eyebrow">Exemples de projets</span>
                <h2>Des idées pour votre activité</h2>
                <p>Quelques exemples de types de sites que je peux concevoir selon votre activité et vos objectifs. Ces visuels servent uniquement à illustrer les possibilités.</p>
            </div>

            <div class="portfolio-grid">
                @foreach(config('purpage.mocks') as $m)
                @php
                    $features = match ($m['id']) {
                        'resto' => ['Menu digital', 'Réservation', 'Horaires'],
                        'coach' => ['Programmes', 'Prise de rendez-vous', 'Témoignages'],
                        default => ['Galerie', 'Prestations', 'Contact rapide'],
                    };
                @endphp
                <article class="card glow portfolio-card portfolio-{{ $m['id'] }}">
                    <div class="portfolio-preview" aria-hidden="true">
                        <div class="portfolio-preview-nav">
                            <span class="portfolio-preview-brand"></span>
                            <span></span><span></span><span></span>
                        </div>
                        <div class="portfolio-preview-hero">
                            <div>
                                <small>{{ $m['subtitle'] }}</small>
                                <strong>{{ $m['title'] }}</strong>
                                <i></i>
                            </div>
                            <div class="portfolio-preview-visual"><span></span></div>
                        </div>
                        <div class="portfolio-preview-row"><span></span><span></span><span></span></div>
                    </div>

                    <div class="portfolio-card-copy">
                        <div class="portfolio-card-heading">
                            <div>
                                <span>Exemple visuel</span>
                                <h3>{{ $m['title'] }}</h3>
                            </div>
                        </div>
                        <p>{{ $m['subtitle'] }}</p>
                        <div class="portfolio-tags">
                            @foreach($features as $feature)
                                <span>{{ $feature }}</span>
                            @endforeach
                        </div>
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
    <section id="avis" class="reveal section-band pilot-section">
        <div class="section-shell">
            <div class="pilot-card card glow">
                <div class="pilot-copy">
                    <span class="section-eyebrow">Premières collaborations</span>
                    <h2>Construisons une belle référence ensemble</h2>
                    <p>Les premiers avis arrivent. En devenant client pilote, nous construisons votre site ensemble et vous partagez ensuite un retour honnête sur l'expérience.</p>
                    <div class="pilot-actions">
                        <a href="#contact" data-scroll class="section-cta-button">Devenir client pilote →</a>
                        <a href="#" class="btn wa-open" data-text="Ia ora na ! Je souhaite devenir client pilote.">Parler sur WhatsApp</a>
                    </div>
                </div>
                <div class="pilot-visual" aria-hidden="true">
                    <span>“</span>
                    <div class="pilot-lines"><i></i><i></i><i></i></div>
                    <div class="pilot-person"><b></b><div><i></i><i></i></div></div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="reveal faq-section section-band section-band-muted">
        <div class="section-shell">
        <div class="section-heading">
            <span class="section-eyebrow">Questions fréquentes</span>
            <h2>Tout ce qu'il faut savoir avant de commencer</h2>
            <p>Des réponses simples aux questions les plus courantes.</p>
        </div>

        <div class="faq-grid">

            <div class="faq-item">
                <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq-answer-1">
                    Combien de temps pour livrer un site ?
                    <span>+</span>
                </button>
                <div class="faq-answer" id="faq-answer-1">
                    <p>En général entre 3 et 7 jours selon le projet.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq-answer-2">
                    Les textes et images sont-ils fournis ?
                    <span>+</span>
                </button>
                <div class="faq-answer" id="faq-answer-2">
                    <p>Oui, ou je peux t’aider à les créer.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq-answer-3">
                    Puis-je payer en plusieurs fois ?
                    <span>+</span>
                </button>
                <div class="faq-answer" id="faq-answer-3">
                    <p>Oui, paiement possible en plusieurs fois.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq-answer-4">
                    Gérez-vous le domaine & l’hébergement ?
                    <span>+</span>
                </button>
                <div class="faq-answer" id="faq-answer-4">
                    <p>Oui, je m’occupe de tout si besoin.</p>
                </div>
            </div>

        </div>
    </section>

    {{-- CONTACT --}}
    <section id="contact" class="section-band contact-section">
        <div class="section-shell">
            <div class="section-heading">
                <span class="section-eyebrow">Un projet en tête ?</span>
                <h2>Parlons de votre projet</h2>
                <p>Expliquez-moi vos objectifs et vos besoins. Je vous réponds sous 24 heures ouvrées avec une première orientation.</p>
            </div>

            <div class="contact-grid">
                <div class="card glow contact-form-card">
                    <form id="contact-form" class="contact-form">
                        @csrf

                        <input type="hidden" name="started_at" id="started_at">

                        <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

                        <div class="contact-field">
                            <label for="contact-name">Votre nom <span>*</span></label>
                            <input
                                id="contact-name"
                                name="name"
                                required
                                autocomplete="name"
                                placeholder="Votre nom" />
                        </div>

                        <div class="contact-field">
                            <label for="contact-email">Votre email <span>*</span></label>
                            <input
                                id="contact-email"
                                name="email"
                                type="email"
                                required
                                autocomplete="email"
                                placeholder="vous@exemple.com" />
                        </div>

                        <div class="contact-field contact-field-wide">
                            <label for="contact-pack">Type de projet</label>
                            <select id="contact-pack" name="pack">
                                <option value="Contact">Je ne sais pas encore</option>
                                <option value="Site vitrine">Site vitrine</option>
                                <option value="E-commerce">Site e-commerce</option>
                                <option value="Landing page">Landing page</option>
                                <option value="Refonte">Refonte d'un site existant</option>
                            </select>
                        </div>

                        <div class="contact-field contact-field-wide">
                            <label for="contact-message">Votre message <span>*</span></label>
                            <textarea
                                id="contact-message"
                                name="message"
                                rows="5"
                                required
                                placeholder="Parlez-moi de votre projet (objectifs, délais, budget)…"></textarea>
                        </div>

                        <div class="contact-actions">
                            <button
                                id="submitBtn" type="submit"
                                class="contact-submit">
                                Envoyer ma demande →
                            </button>

                            <span id="submit-status" class="contact-status" role="status" aria-live="polite"></span>

                        </div>
                    </form>
                </div>

                <aside class="contact-aside">
                    <div class="card glow contact-info-card">
                        <span class="contact-card-label">Contact direct</span>
                        <h3>Choisissez votre canal préféré</h3>
                        <div class="contact-links">
                            <a href="mailto:{{ config('purpage.brand_email') }}"><span>✉️</span><div><small>Email</small>{{ config('purpage.brand_email') }}</div></a>
                            <a href="#" class="wa-open" data-text="Ia ora na ! Je souhaite parler de mon projet web."><span>📱</span><div><small>WhatsApp</small>{{ config('purpage.whatsapp_intl') }}</div></a>
                            <div><span>🌍</span><div><small>Localisation</small>Papeete, Polynésie française</div></div>
                        </div>
                    </div>

                    <div class="card glow contact-booking-card">
                        <span class="contact-card-label">Rendez-vous</span>
                        <h3>Besoin d'en parler de vive voix ?</h3>
                        <p>Réservez gratuitement un court appel pour présenter votre projet.</p>
                            <button
                                type="button"
                                id="calendly-open"
                                data-url="https://calendly.com/purpage/new-meeting"
                                aria-describedby="calendly-status">
                                Choisir un créneau →
                            </button>
                            <p id="calendly-status" class="contact-calendly-status" aria-live="polite"></p>
                    </div>
                </aside>
            </div>
        </div>
        </div>
    </section>
</x-layouts.app>
