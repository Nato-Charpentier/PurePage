<x-mail::message>
# Nouveau message — {{ config('purpage.brand_name') }}

**Nom :** {{ $name }}  
**Email :** {{ $email }}  
**Pack :** {{ $pack }}

{!! nl2br(e($message)) !!}
</x-mail::message>