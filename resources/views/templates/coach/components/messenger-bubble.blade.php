<div
    x-data="{ show: false }"
    x-init="
        if (!localStorage.getItem('messengerSeen')) {
            show = true;
            setTimeout(() => {
                show = false;
                localStorage.setItem('messengerSeen', '1');
            }, 2500);
        }
    "
    class="fixed bottom-6 right-6 z-50"
>
    <a href="https://www.facebook.com/profile.php?id=purepage"
       target="_blank"
       aria-label="Discuter sur Messenger"
       :class="show ? 'scale-110 opacity-100' : 'scale-100 opacity-100'"
       class="group flex h-14 w-14 items-center justify-center rounded-full
              bg-blue-600 shadow-xl transition-all duration-300
              hover:scale-110 hover:shadow-2xl"
    >
        {{-- Icône Messenger --}}
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-7 w-7 text-white transition-transform duration-300 group-hover:rotate-6"
             viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C6.48 2 2 6.04 2 11.1c0 2.88 1.41 5.43 3.7 7.2V22l3.27-1.8c.96.27 1.99.41 3.03.41 5.52 0 10-4.04 10-9.1S17.52 2 12 2z"/>
        </svg>
    </a>
</div>
