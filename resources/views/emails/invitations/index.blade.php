@component('mail::message')
# Introduction

The body of your message.

## list header
- messages 1
- messages 2
- messages 3

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
