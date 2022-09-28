@component('mail::message')
# ISUDD - CONTACT TRACER

Dear Mr./Mrs. <b>{{ $fetcher->guardian->full_name}}

YOUR LEARNER HAS BEEN <span style="color:red; font-weight: bold;">DECLINED</span> TO ENTER/LEAVE THE CAMPUS
@component('mail::panel')
Learner Name: <b>{{ $fetcher->guardian->student->full_name}}</b><br>
Guardian Name: <b>{{ $fetcher->guardian->full_name}}</b><br>
Fetcher Name: <b>{{ $fetcher->full_name}}</b><br>
@endcomponent

Best regards,<br>

ISUDD
@endcomponent
