import './bootstrap';

const root = document.documentElement;
const brand = {
    email: root.dataset.email || '',
    wa: String(root.dataset.wa || '').replace(/\D/g, ''),
};

function whatsappUrl(text = '') {
    const query = text ? `?text=${encodeURIComponent(text)}` : '';
    return `https://wa.me/${brand.wa}${query}`;
}

function bindWhatsApp() {
    document.querySelectorAll('.wa-open').forEach((link) => {
        link.href = whatsappUrl(link.dataset.text || '');
        link.target = '_blank';
        link.rel = 'noopener noreferrer';
    });
}

function bindMenuAndScroll() {
    const mobileMenu = document.querySelector('.nav-mobile');

    document.querySelector('.nav-toggle')?.addEventListener('click', () => {
        mobileMenu?.classList.toggle('hidden');
    });

    document.querySelectorAll('[data-scroll]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const target = document.querySelector(link.getAttribute('href'));
            if (!target) return;

            event.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
            mobileMenu?.classList.add('hidden');
        });
    });
}

function bindContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    const status = document.getElementById('submit-status');
    const submitButton = form.querySelector('button[type="submit"]');
    const startedAt = form.querySelector('#started_at');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

    const setStatus = (message, state = '') => {
        if (!status) return;
        status.textContent = message;
        status.dataset.state = state;
    };

    const resetTimer = () => {
        if (startedAt) startedAt.value = Date.now().toString();
    };

    resetTimer();

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        if (submitButton?.disabled) return;

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.textContent = 'Envoi…';
        }
        setStatus('Envoi…', 'loading');

        try {
            const response = await fetch('/lead', {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify(Object.fromEntries(new FormData(form).entries())),
            });

            const payload = await response.json();
            if (!response.ok) {
                const validationMessage = payload.errors
                    ? Object.values(payload.errors).flat()[0]
                    : null;
                throw new Error(validationMessage || payload.error || 'Impossible d’envoyer le message.');
            }

            setStatus('Message envoyé. Je vous répondrai rapidement ✔', 'success');
            form.reset();
            resetTimer();
        } catch (error) {
            setStatus(`Erreur : ${error.message || error}`, 'error');
        } finally {
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.textContent = 'Envoyer ma demande →';
            }
        }
    });
}

function bindCalendly() {
    const button = document.getElementById('calendly-open');
    const status = document.getElementById('calendly-status');
    if (!button) return;

    button.addEventListener('click', () => {
        const url = button.dataset.url;
        if (window.Calendly?.initPopupWidget) {
            window.Calendly.initPopupWidget({ url });
            if (status) status.textContent = '';
            return;
        }

        if (status) status.textContent = 'Calendly charge encore. Ouverture de la page de réservation…';
        window.open(url, '_blank', 'noopener,noreferrer');
    });
}

function bindFaq() {
    document.querySelectorAll('.faq-question').forEach((button) => {
        button.addEventListener('click', () => {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('span');
            const isOpen = Boolean(answer?.style.maxHeight);
            if (answer) answer.style.maxHeight = isOpen ? '' : `${answer.scrollHeight}px`;
            if (icon) icon.textContent = isOpen ? '+' : '−';
            button.setAttribute('aria-expanded', String(!isOpen));
        });
    });
}

function revealVisibleSections() {
    document.querySelectorAll('.reveal').forEach((element) => {
        if (element.getBoundingClientRect().top < window.innerHeight - 80) {
            element.classList.add('active');
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    bindWhatsApp();
    bindMenuAndScroll();
    bindContactForm();
    bindCalendly();
    bindFaq();
    revealVisibleSections();
});

window.addEventListener('scroll', revealVisibleSections, { passive: true });
window.addEventListener('load', revealVisibleSections);
window.addEventListener('hashchange', revealVisibleSections);
window.addEventListener('pageshow', revealVisibleSections);
