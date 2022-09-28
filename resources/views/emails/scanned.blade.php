@component('mail::message')
# ISUDD - CONTACT TRACER

Dear Mr./Mrs. <b>{{ $time->fetcher->guardian->full_name}}

YOUR LEARNER'S QR HAS BEEN SCANNED BY OUR SECURITY GUARD.
@component('mail::panel')
Learner Name: <b>{{ $time->fetcher->guardian->student->full_name}}</b><br>
Guardian Name: <b>{{ $time->fetcher->guardian->full_name}}</b><br>
Fetcher Name: <b>{{ $time->fetcher->full_name}}</b><br>
@endcomponent

Best regards,<br>

ISUDD
@endcomponent
