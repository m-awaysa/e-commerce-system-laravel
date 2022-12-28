<x-mail::message>
# from {{$info['email']}}
{{$info['mail_subject']}}

{{$info['mail_body']}}.

@component('mail::button',['url'=>route('home')])
hello wordwrap
@endcomponent

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
