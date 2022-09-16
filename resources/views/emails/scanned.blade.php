@component('mail::message')
# ISUDD - CONTACT TRACER

Dear Mr. <b>{{ $time->fetcher->student->father}}</b>, and Mrs. <b>{{ $time->fetcher->student->mother}}</b>

YOUR STUDENT'S QR HAS BEEN SCANNED BY OUR SECURITY GUARD.
@component('mail::panel')
Student Name: <b>{{ $time->fetcher->student->full_name}}</b><br>
@endcomponent

Best regards,<br>

ISUDD
@endcomponent
