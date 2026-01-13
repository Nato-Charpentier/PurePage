<section id="calendar" class="py-20 border-t border-white/10">
<link rel="stylesheet" href="{{ asset('templates/coach/css/calendar.css') }}">
<div class="container mx-auto max-w-4xl px-4 text-center mb-10">
        <h2 class="text-3xl font-semibold mb-4">Réservez une séance avec votre coach</h2>
        <p class="text-white/80">Choisissez une date et un créneau horaire pour planifier votre séance de coaching personnalisée.</p>
    </div>
@push('scripts')
<script src="{{ asset('templates/coach/js/calendar.js') }}"></script>
@endpush
    <div class="container mx-auto max-w-4xl px-4 grid gap-8 md:grid-cols-2">
    <div class="card">
        <input
            type="date"
            id="datePicker"
            class="input w-full">

        <div
            id="slots"
            class="mt-4 grid grid-cols-2 gap-2"></div>
    </div>
    <div class="card">
        <form id="fakeBooking" class="grid gap-4">
            <input
                class="input"
                placeholder="Votre nom"
                required>

            <input
                type="email"
                class="input"
                placeholder="Votre email"
                required>

            <textarea
                class="input"
                placeholder="Message (optionnel)"></textarea>

            <button type="submit" class="btn-primary">
                Demander ce créneau
            </button>

            <p
                id="successMsg"
                class="hidden text-green-400 text-sm mt-2">
                ✔️ Demande envoyée. Le coach vous recontactera.
            </p>
        </form>
    </div>
    </div>
</section>
