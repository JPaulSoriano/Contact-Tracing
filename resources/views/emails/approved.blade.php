@component('mail::message')
# ISUDD - CONTACT TRACER

Dear Mr. <b>{{ $fetcher->student->father}}</b>, and Mrs. <b>{{ $fetcher->student->mother}}</b>

YOUR STUDENT HAS BEEN APPROVE TO ENTER/LEAVE THE CAMPUS
@component('mail::panel')
Student Name: <b>{{ $fetcher->student->full_name}}</b><br>
@endcomponent

Best regards,<br>

ISUDD
@endcomponent
