<!doctype html>
<html lang="fr"
  data-brand="{{ config('purepage.brand_name') }}"
  data-email="{{ config('purepage.brand_email') }}"
  data-tagline="{{ config('purepage.tagline') }}"
  data-wa="{{ config('purepage.whatsapp_intl') }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{-- Favicon (.ico) --}}
  <link rel="icon" type="image/x-icon" href="{{ asset('img/purepage-favicon.ico') }}">
  {{-- Bonus conseillés --}}
  <link rel="shortcut icon" href="{{ asset('img/purepage-favicon.ico') }}">
  <meta name="theme-color" content="#0b0c1a">
  <title>{{ config('purepage.brand_name') }} — Création de sites</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body class="min-h-screen text-white bg-[#0b0c1a]">
  <header class="sticky top-0 z-40 border-b border-white/10 bg-black/30 backdrop-blur">
    <div class="container mx-auto max-w-6xl flex items-center justify-between px-4 py-3">
      <div class="flex items-center gap-2">
        <x-logo class="w-14 h-14 mx-auto" />
        <span class="font-semibold tracking-wide">{{ config('purepage.brand_name') }}</span>
      </div>
      <nav class="hidden md:flex items-center gap-6">
        @foreach(['services'=>'Services','packs'=>'Packs & tarifs','process'=>'Process','portfolio'=>'Portfolio','avis'=>'Avis','faq'=>'FAQ'] as $id=>$lbl)
        <a href="#{{ $id }}" data-scroll class="text-sm text-white/80 hover:text-white">{{ $lbl }}</a>
        @endforeach
        <a href="#contact" data-scroll class="inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2 text-sm font-semibold text-black shadow hover:shadow-lg">Devis gratuit →</a>
      </nav>
      <button class="md:hidden nav-toggle">☰</button>
    </div>
    <div class="nav-mobile hidden md:hidden border-t border-white/10 bg-black/60 px-4 py-3">
      <div class="flex flex-col gap-2">
        @foreach(['services','packs','process','portfolio','avis','faq'] as $id)
        <a href="#{{ $id }}" data-scroll class="rounded-lg px-2 py-2 text-left text-sm text-white/80 hover:bg-white/5">{{ ucfirst($id) }}</a>
        @endforeach
        <a href="#contact" data-scroll class="mt-2 inline-flex items-center justify-center gap-2 rounded-xl bg-white px-4 py-2 text-sm font-semibold text-black">Devis gratuit →</a>
      </div>
    </div>
  </header>

  <main>{{ $slot }}</main>

  <footer class="border-t border-white/10 py-10">
    <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-4 text-sm text-white/70 md:flex-row">
      <div>© {{ now()->year }} {{ config('purepage.brand_name') }} — Tous droits réservés.</div>
      <div class="flex items-center gap-4">
        <a href="#" class="hover:underline">Mentions légales</a>
        <a href="#" class="hover:underline">CGV</a>
        <a href="#" class="hover:underline">Politique de confidentialité</a>
      </div>
    </div>
  </footer>

  <a class="fixed bottom-5 right-5 inline-flex items-center gap-2 rounded-full bg-emerald-700 px-4 py-2 text-sm font-semibold text-black shadow-lg hover:brightness-95 wa-open"
    href="#" data-text="Ia ora na ! J'ai un projet de site vitrine (Starter 30 000 XPF)." title="Discuter sur WhatsApp">📱 WhatsApp</a>

  <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>