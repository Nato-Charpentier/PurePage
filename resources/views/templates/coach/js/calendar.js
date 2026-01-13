document.addEventListener('DOMContentLoaded', () => {

    const datePicker = document.getElementById('datePicker');
    const slotsEl = document.getElementById('slots');
    const form = document.getElementById('fakeBooking');
    const success = document.getElementById('successMsg');

    // 🔒 Sécurité template
    if (!datePicker || !slotsEl || !form || !success) {
        console.warn('Calendar template elements not found');
        return;
    }

    let selectedSlot = null;

    const slots = [
        "08:00 - 09:00",
        "10:00 - 11:00",
        "14:00 - 15:00",
        "16:00 - 17:00"
    ];

    datePicker.addEventListener('change', () => {
        slotsEl.innerHTML = '';
        selectedSlot = null;

        slots.forEach(time => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = time;
            btn.className = 'slot';

            btn.addEventListener('click', () => {
                slotsEl.querySelectorAll('.slot').forEach(b =>
                    b.classList.remove('active')
                );
                btn.classList.add('active');
                selectedSlot = time;
            });

            slotsEl.appendChild(btn);
        });
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        if (!selectedSlot) {
            alert("Veuillez sélectionner un créneau.");
            return;
        }

        success.classList.remove('hidden');
        form.reset();
        slotsEl.innerHTML = '';
        selectedSlot = null;
    });
});
