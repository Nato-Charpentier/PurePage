<x-layouts.mockup title="Votre Resto">
    <title>Votre Resto – Restaurant local | Cuisine & convivialité</title>
    <meta name="description" content="Votre Resto – Restaurant local. Cuisine maison, produits frais, sur place ou à emporter. Réservez par téléphone.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- HEADER DU TEMPLATE --}}
    @include('templates.resto.sections.header')

    {{-- HERO --}}
    @include('templates.resto.sections.hero')

    {{-- MENU --}}
    @include('templates.resto.sections.menu')

    {{-- À PROPOS --}}
    @include('templates.resto.sections.about')

    {{-- CONTACT --}}
    @include('templates.resto.sections.contact')

    {{-- MESSENGER BUBBLE --}}
    @include('templates.resto.components.messenger-bubble')

    {{-- FOOTER DU TEMPLATE --}}
    @include('templates.resto.sections.footer')

</x-layouts.mockup>