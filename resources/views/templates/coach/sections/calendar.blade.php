<section id="calendar" class="py-20 border-t border-white/10">
    <div class="container mx-auto max-w-4xl px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-semibold mb-4">Réservez une séance avec votre coach</h2>
            <p class="text-white/80">Choisissez une date et un créneau horaire pour planifier votre séance de coaching personnalisée.</p>
        </div>

        <div class="grid gap-8 md:grid-cols-2">
            <!-- CALENDRIER -->
            <div class="bg-slate-800 p-6 rounded-lg border border-slate-700">
                <div class="flex items-center justify-between mb-6">
                    <button id="prevMonth" class="p-2 hover:bg-slate-700 rounded-lg transition">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <h3 id="monthYear" class="text-white font-semibold min-w-40 text-center"></h3>
                    <button id="nextMonth" class="p-2 hover:bg-slate-700 rounded-lg transition">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>

                <!-- Jours de la semaine -->
                <div class="grid grid-cols-7 gap-2 mb-4">
                    @foreach(['L', 'M', 'M', 'J', 'V', 'S', 'D'] as $day)
                        <div class="text-center text-slate-400 text-sm font-semibold py-2">{{ $day }}</div>
                    @endforeach
                </div>

                <!-- Jours du mois -->
                <div id="calendarDays" class="grid grid-cols-7 gap-2"></div>

                <div class="mt-4 text-xs text-slate-400">
                    <span class="inline-block w-3 h-3 bg-emerald-500 rounded mr-2"></span>
                    Jour disponible
                </div>
            </div>

            <!-- HORAIRES ET FORMULAIRE -->
            <div class="space-y-6">
                <!-- Horaires -->
                <div id="timeSlotsContainer" class="hidden bg-slate-800 p-6 rounded-lg border border-slate-700">
                    <h4 id="selectedDateDisplay" class="text-white font-semibold mb-4"></h4>
                    <div id="timeSlots" class="grid grid-cols-2 gap-3"></div>
                </div>

                <!-- Formulaire -->
                <div id="formContainer" class="hidden bg-slate-800 p-6 rounded-lg border border-slate-700">
                    <h4 class="text-white font-semibold mb-4">Vos informations</h4>
                    
                    <div class="space-y-4">
                        <input
                            id="bookingName"
                            type="text"
                            placeholder="Votre nom"
                            class="w-full bg-slate-700 text-white px-4 py-2 rounded-lg border border-slate-600 focus:border-emerald-500 outline-none">
                        <input
                            id="bookingEmail"
                            type="email"
                            placeholder="Votre email"
                            class="w-full bg-slate-700 text-white px-4 py-2 rounded-lg border border-slate-600 focus:border-emerald-500 outline-none">
                        <input
                            id="bookingPhone"
                            type="tel"
                            placeholder="Votre téléphone"
                            class="w-full bg-slate-700 text-white px-4 py-2 rounded-lg border border-slate-600 focus:border-emerald-500 outline-none">
                    </div>

                    <button
                        id="submitBooking"
                        disabled
                        class="w-full mt-4 bg-emerald-500 hover:bg-emerald-600 disabled:bg-slate-600 text-white font-semibold py-3 rounded-lg transition flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Confirmer la réservation
                    </button>

                    <p id="successMsg" class="hidden text-emerald-400 text-sm mt-4 text-center">
                        ✔️ Demande envoyée. Le coach vous recontactera.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Configuration des créneaux disponibles par jour de la semaine
    const availableSlots = {
        1: ['09:00', '10:00', '14:00', '15:00', '16:00'], // Lundi
        2: ['10:00', '11:00', '15:00', '16:00'],           // Mardi
        3: [],                                              // Mercredi (fermé)
        4: ['09:00', '10:00', '14:00', '15:00', '16:00'], // Jeudi
        5: ['10:00', '11:00', '14:00', '15:00'],           // Vendredi
        6: ['09:00', '10:00', '11:00'],                    // Samedi
        0: []                                               // Dimanche (fermé)
    };

    let currentDate = new Date();
    let selectedDate = null;
    let selectedTime = null;

    // Éléments du DOM
    const monthYearEl = document.getElementById('monthYear');
    const calendarDaysEl = document.getElementById('calendarDays');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const timeSlotsContainer = document.getElementById('timeSlotsContainer');
    const selectedDateDisplay = document.getElementById('selectedDateDisplay');
    const timeSlotsEl = document.getElementById('timeSlots');
    const formContainer = document.getElementById('formContainer');
    const bookingNameInput = document.getElementById('bookingName');
    const bookingEmailInput = document.getElementById('bookingEmail');
    const bookingPhoneInput = document.getElementById('bookingPhone');
    const submitBtn = document.getElementById('submitBooking');
    const successMsg = document.getElementById('successMsg');

    // Fonction pour afficher le calendrier
    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        
        // Afficher le mois et l'année
        monthYearEl.textContent = new Date(year, month).toLocaleString('fr-FR', { month: 'long', year: 'numeric' });

        // Obtenir le premier jour et le nombre de jours
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        calendarDaysEl.innerHTML = '';

        // Ajouter les jours vides du début
        for (let i = 0; i < firstDay; i++) {
            calendarDaysEl.innerHTML += '<div></div>';
        }

        // Ajouter les jours du mois
        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(year, month, day);
            const dayOfWeek = date.getDay();
            const isAvailable = availableSlots[dayOfWeek].length > 0;
            const isSelected = selectedDate && selectedDate.getDate() === day && selectedDate.getMonth() === month && selectedDate.getFullYear() === year;

            const btn = document.createElement('button');
            btn.textContent = day;
            btn.className = `py-3 rounded-lg font-semibold transition text-sm ${
                isSelected
                    ? 'bg-emerald-500 text-white'
                    : isAvailable
                    ? 'bg-slate-700 text-white hover:bg-slate-600 cursor-pointer'
                    : 'bg-slate-900 text-slate-600 cursor-not-allowed'
            }`;
            btn.disabled = !isAvailable;

            if (isAvailable) {
                btn.addEventListener('click', () => selectDate(date));
            }

            calendarDaysEl.appendChild(btn);
        }
    }

    // Fonction pour sélectionner une date
    function selectDate(date) {
        selectedDate = date;
        selectedTime = null;
        renderCalendar();
        renderTimeSlots();
        timeSlotsContainer.classList.remove('hidden');
        formContainer.classList.add('hidden');
    }

    // Fonction pour afficher les créneaux horaires
    function renderTimeSlots() {
        const dayOfWeek = selectedDate.getDay();
        const slots = availableSlots[dayOfWeek];
        
        selectedDateDisplay.textContent = selectedDate.toLocaleString('fr-FR', { 
            weekday: 'long', 
            day: 'numeric', 
            month: 'long' 
        });

        timeSlotsEl.innerHTML = '';
        slots.forEach(time => {
            const btn = document.createElement('button');
            btn.textContent = time;
            btn.className = `py-3 rounded-lg font-semibold transition ${
                selectedTime === time
                    ? 'bg-emerald-500 text-white'
                    : 'bg-slate-700 text-white hover:bg-slate-600'
            }`;
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                selectedTime = time;
                renderTimeSlots();
                formContainer.classList.remove('hidden');
            });
            timeSlotsEl.appendChild(btn);
        });
    }

    // Vérifier le formulaire
    function checkForm() {
        const isValid = bookingNameInput.value && bookingEmailInput.value && bookingPhoneInput.value;
        submitBtn.disabled = !isValid;
    }

    bookingNameInput.addEventListener('input', checkForm);
    bookingEmailInput.addEventListener('input', checkForm);
    bookingPhoneInput.addEventListener('input', checkForm);

    // Soumettre la réservation
    submitBtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        const bookingData = {
            date: selectedDate.toLocaleDateString('fr-FR'),
            time: selectedTime,
            name: bookingNameInput.value,
            email: bookingEmailInput.value,
            phone: bookingPhoneInput.value
        };

        console.log('Réservation:', bookingData);

        // Ici tu peux envoyer à ton serveur Laravel
        // fetch('/api/bookings', {
        //     method: 'POST',
        //     headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        //     body: JSON.stringify(bookingData)
        // });

        // Pour le mockup
        successMsg.classList.remove('hidden');
        setTimeout(() => {
            selectedDate = null;
            selectedTime = null;
            bookingNameInput.value = '';
            bookingEmailInput.value = '';
            bookingPhoneInput.value = '';
            timeSlotsContainer.classList.add('hidden');
            formContainer.classList.add('hidden');
            successMsg.classList.add('hidden');
            renderCalendar();
        }, 2000);
    });

    // Navigation mois
    prevMonthBtn.addEventListener('click', () => {
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1);
        selectedDate = null;
        selectedTime = null;
        timeSlotsContainer.classList.add('hidden');
        formContainer.classList.add('hidden');
        renderCalendar();
    });

    nextMonthBtn.addEventListener('click', () => {
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1);
        selectedDate = null;
        selectedTime = null;
        timeSlotsContainer.classList.add('hidden');
        formContainer.classList.add('hidden');
        renderCalendar();
    });

    // Initialiser
    renderCalendar();
});
</script>
@endpush