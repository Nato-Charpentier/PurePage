<footer class="border-t border-white/10 bg-black/80">
    <div class="py-10 text-center text-xs text-white/50 space-y-3">

        <div>
            © {{ date('Y') }} Votre Resto — Tous droits réservés
        </div>

        <div class="flex flex-wrap justify-center gap-4 text-white/60">
            <a href="{{ route('legal.mentions') }}" class="hover:text-white underline-offset-4 hover:underline">
                Mentions légales
            </a>
            <a href="{{ route('legal.cgv') }}" class="hover:text-white underline-offset-4 hover:underline">
                CGV
            </a>
            <a href="{{ route('legal.privacy') }}" class="hover:text-white underline-offset-4 hover:underline">
                Politique de confidentialité
            </a>
        </div>

    </div>
</footer>
