const ROOT = document.documentElement;
const BRAND = {
    name: ROOT.dataset.brand || 'PurePage',
    email: ROOT.dataset.email || 'purepage.pf@gmail.com',
    tagline: ROOT.dataset.tagline || '',
    wa: ROOT.dataset.wa || '68987218135',
};

// Garder uniquement les chiffres (wa.me n'accepte pas +, espaces…)
function cleanPhone(num) { return String(num || '').replace(/\D/g, ''); }

// Construit l’URL finale
function waUrl(text) {
  const phone = cleanPhone(BRAND.wa);
  const q = text ? `?text=${encodeURIComponent(text)}` : '';
  return `https://wa.me/${phone}${q}`;
}

// ⚠️ Plus de preventDefault, plus de window.open : on ne fait que setter href/target
function wireWhatsAppLinks() {
  document.querySelectorAll('.wa-open').forEach(a => {
    const txt = a.getAttribute('data-text') || '';
    a.setAttribute('href', waUrl(txt));
    a.setAttribute('target', '_blank');
    a.setAttribute('rel', 'noopener');
  });
}

// --- si tu avais un bindWhatsApp(), supprime-le / ne l’appelle plus ---
document.addEventListener('DOMContentLoaded', () => {
  wireWhatsAppLinks();
  // bindMenu(); bindSmoothScroll(); bindMocks(); bindForm(); selfTests();
});

function bindMenu() {
    const toggle = document.querySelector('.nav-toggle');
    const mobile = document.querySelector('.nav-mobile');
    toggle?.addEventListener('click', () => mobile.classList.toggle('hidden'));
}

function bindSmoothScroll() {
    document.querySelectorAll('[data-scroll]').forEach(a => {
        a.addEventListener('click', e => {
            const href = a.getAttribute('href') || '';
            if (href.startsWith('#')) { e.preventDefault(); document.querySelector(href)?.scrollIntoView({ behavior: 'smooth' }); document.querySelector('.nav-mobile')?.classList.add('hidden'); }
        });
    });
}


function bindMocks() {
    const modal = document.getElementById('mock-modal');
    const content = modal?.querySelector('.modal-content');
    const closeBtn = modal?.querySelector('.modal-close');
    const waBtn = document.getElementById('mock-wa');
    const mailBtn = document.getElementById('mock-mail');
    const MOCKS = {
        resto: { title: 'Restaurant local', subtitle: 'Menu + Réservation', bullets: ['Menu du jour', 'Réservation WhatsApp', 'Avis Google intégrés'] },
        coach: { title: 'Coach sportif', subtitle: 'Prise de rendez‑vous', bullets: ['Calendrier simple', 'Offres & packs', 'Témoignages'] },
        artisan: { title: 'Artisan / Tatoueur', subtitle: 'Portfolio visuel', bullets: ['Galerie avant/après', 'Formulaire rapide', 'Carte & horaires'] },
    };
    function open(id) {
        const m = MOCKS[id]; if (!m) return; if (!content) return;
        content.innerHTML = `
      <div class="rounded-xl border border-white/10 bg-gradient-to-br from-emerald-800/30 to-sky-500/30 p-4">
        <div class="mb-4 grid grid-cols-6 gap-2">
          <div class="col-span-2 h-3 rounded bg-white/25"></div>
          <div class="col-span-1 h-3 rounded bg-white/15"></div>
          <div class="col-span-1 h-3 rounded bg-white/15"></div>
          <div class="col-span-1 h-3 rounded bg-white/15"></div>
          <div class="col-span-1 h-3 rounded bg-white/15"></div>
        </div>
        <div class="mb-4 rounded-xl bg-black/40 p-6">
          <div class="mb-2 text-sm uppercase tracking-widest text-white/60">${m.subtitle}</div>
          <div class="text-3xl font-extrabold">${m.title}</div>
          <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-3">
            ${m.bullets.map(b => `<div class='rounded-lg border border-white/10 bg-white/5 p-3 text-sm text-white/80'>${b}</div>`).join('')}
          </div>
        </div>
        <div class="grid grid-cols-3 gap-3">
          <div class="h-24 rounded-lg border border-white/10 bg-white/5"></div>
          <div class="h-24 rounded-lg border border-white/10 bg-white/5"></div>
          <div class="h-24 rounded-lg border border-white/10 bg-white/5"></div>
        </div>
      </div>`;
        waBtn?.setAttribute('data-text', `Ia ora na ! À propos de la maquette: ${m.title}`);
        waBtn?.setAttribute('href', waUrl(`Ia ora na ! À propos de la maquette: ${m.title}`));
        waBtn?.setAttribute('target', '_blank');
        waBtn?.setAttribute('rel', 'noopener');
        if (mailBtn) mailBtn.onclick = (e) => { e.preventDefault(); const subject = encodeURIComponent(`Brief maquette: ${m.title}`); const body = encodeURIComponent(`Bonjour,\n\nJe souhaite un devis pour la maquette \"${m.title}\".`); window.location.href = `mailto:${BRAND.email}?subject=${subject}&body=${body}`; }
        modal?.classList.remove('hidden');
    }
    document.querySelectorAll('.open-mock').forEach(btn => { btn.addEventListener('click', e => { e.preventDefault(); open(btn.getAttribute('data-id')); }); });
    closeBtn?.addEventListener('click', () => modal?.classList.add('hidden'));
    modal?.addEventListener('click', e => { if (e.target === modal) modal?.classList.add('hidden'); });
}

function bindForm() {
    const form = document.getElementById('contact-form');
    const status = document.getElementById('submit-status');
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    form?.addEventListener('submit', async (e) => {
        e.preventDefault();
        const fd = new FormData(form);
        const data = Object.fromEntries(fd.entries());
        status.textContent = 'Envoi…';
        try {
            const res = await fetch('/lead', { method: 'POST', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token }, body: JSON.stringify(data) });
            const json = await res.json();
            if (json.ok) { status.textContent = 'Message envoyé ✔'; form.reset(); }
            else { throw new Error(json.error || 'Erreur serveur'); }
        } catch (err) { status.textContent = 'Erreur: ' + (err.message || err); }
    });
}

function selfTests() {
    try {
        const wa = `https://wa.me/${BRAND.wa}`; console.assert(/^https:\/\/wa\.me\/[0-9]+$/.test(wa), 'Lien WhatsApp valide');
        const ids = ['services', 'packs', 'process', 'portfolio', 'avis', 'faq', 'contact']; ids.forEach(id => console.assert(document.getElementById(id), `#${id} existe`));
    } catch (err) { console.warn('[Self-tests] Avertissement:', err); }
}

//FAQ
function toggleItem(id) {
      const content = document.getElementById(`content-${id}`);
      const iconPlus = document.getElementById(`icon-plus-${id}`);
      const iconMinus = document.getElementById(`icon-minus-${id}`);
      
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
        arrow.classList.remove('rotate-180');
      } else {
        content.style.maxHeight = content.scrollHeight + 'px';
        arrow.classList.add('rotate-180');
      }

      setTimeout(() => {
        content.classList.toggle('hidden');
      }, 300);
      iconPlus.classList.toggle('hidden');
      iconMinus.classList.toggle('hidden');
  }

document.addEventListener('DOMContentLoaded', () => { bindMenu(); bindSmoothScroll(); bindWhatsApp(); bindMocks(); bindForm(); selfTests(); });