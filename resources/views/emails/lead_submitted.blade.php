<x-mail::message>
# Nouveau message — {{ config('purepage.brand_name') }}

**Nom :** {{ $name }}  
**Email :** {{ $email }}  
**Pack :** {{ $pack }}

{!! nl2br(e($message)) !!}
</x-mail::message>