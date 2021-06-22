@component('mail::message')
# Hello {{$name}},

Its your {{$year}} {{$year>1 ? 'years':'year'}} step with us. Thanks for stay with us.
<p>Be connected with us!</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
