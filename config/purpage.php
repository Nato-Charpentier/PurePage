<?php
return [
    'brand_name'    => env('BRAND_NAME', 'PurPage'),
    'tagline'       => env('TAGLINE', 'Sites vitrines & e-commerce — Polynésie'),
    'brand_email'   => env('BRAND_EMAIL', 'purpage.pf@gmail.com'),
    'whatsapp_intl' => env('WHATSAPP_INTL', '68987218135'),
    'pricing' => [
        ['name' => 'Starter', 'price' => 30000, 'badge' => 'Idéal pour démarrer', 'features' => [
            'Site vitrine 1 – 3 pages',
            'Design moderne & responsive',
            'Formulaire de contact',
            'Optimisation basique SEO',
            'Mise en ligne + domaine*'
        ], 'cta' => 'Commander Starter', 'highlighted' => false],
        ['name' => 'Pro', 'price' => 70000, 'badge' => 'Entre les deux', 'features' => [
            '5 – 8 pages + blog',
            'UI personnalisée',
            'SEO on-page + perf',
            'Suivi Analytics',
            'Maintenance 1 mois'
        ], 'cta' => 'Commander Pro', 'highlighted' => true],
        ['name' => 'E-commerce', 'price' => 100000, 'badge' => 'Vendez en ligne', 'features' => [
            'Boutique (10 – 50 produits)',
            'Paiement en ligne (Stripe)*',
            'Fiches produits & panier',
            'Optimisation vitesse',
            'Accompagnement catalogue'
        ], 'cta' => 'Commander E-commerce', 'highlighted' => false],
    ],
    'services' => [
        ['icon' => '🌐', 'title' => 'Site vitrine', 'desc' => 'Présence claire, rapide et pro.'],
        ['icon' => '🛒', 'title' => 'E-commerce', 'desc' => 'Boutique moderne et sécurisée.'],
        ['icon' => '🎨', 'title' => 'UI/UX & Refonte', 'desc' => 'Image moderne, meilleures conversions.'],
        ['icon' => '⚡', 'title' => 'Performance & SEO', 'desc' => 'Chargement rapide, bonnes pratiques.'],
        ['icon' => '🛡️', 'title' => 'Maintenance', 'desc' => 'Sauvegardes, mises à jour, sécurité.'],
        ['icon' => '🧩', 'title' => 'Intégrations', 'desc' => 'Analytics, CRM, réservation, chat…'],
    ],
    'steps' => [
        ['icon' => '📞', 't' => 'Découverte', 'd' => 'Objectifs, délais et budget.'],
        ['icon' => '🎨', 't' => 'Maquette', 'd' => 'Wireframe + moodboard.'],
        ['icon' => '⚡', 't' => 'Build', 'd' => 'Intégration, optimisation, contenus.'],
        ['icon' => '🚀', 't' => 'Lancement', 'd' => 'Mise en ligne + guide.'],
    ],
    'mocks' => [
        [
            'id' => 'resto',
            'title' => 'Restaurant local',
            'subtitle' => 'Menu + Réservation',
        ],
        [
            'id' => 'coach',
            'title' => 'Coach sportif',
            'subtitle' => 'Prise de rendez-vous',
        ],
        [
            'id' => 'artisan',
            'title' => 'Artisan / Tatoueur',
            'subtitle' => 'Portfolio visuel',
        ],
    ],

];
