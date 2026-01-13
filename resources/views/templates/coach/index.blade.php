<x-layouts.mockup title="Votre Resto">
    <title>Votre Resto – Restaurant local | Cuisine & convivialité</title>
    <meta name="description" content="Votre Resto – Restaurant local. Cuisine maison, produits frais, sur place ou à emporter. Réservez par téléphone.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- HEADER --}}
    @include('templates.coach.sections.header')

    {{-- HERO --}}
    @include('templates.coach.sections.hero')

    {{-- CALENDAR --}}
    @include('templates.coach.sections.calendar')

    {{-- ABOUT --}}
    @include('templates.coach.sections.about')

    {{-- SERVICES --}}
    @include('templates.coach.sections.services')

    {{-- METHOD --}}
    @include('templates.coach.sections.method')

    {{-- CONTACT --}}
    @include('templates.coach.sections.contact')

    {{-- MESSENGER BUBBLE --}}
    @include('templates.coach.components.messenger-bubble')

    {{-- FOOTER --}}
    @include('templates.coach.sections.footer')

</x-layouts.mockup>