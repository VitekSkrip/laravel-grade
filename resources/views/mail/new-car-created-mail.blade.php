@component('mail::message')
# Была создана новая машина

{{ $car->name }}

@component('mail::button', ['url' => $url])
Перейти
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
