@component('mail::message')
# New Appointment Created

Hello,

A new appointment has been created. Details are as follows:

**Patient Name:** {{ $appointment->patient_first_name }} {{ $appointment->patient_last_name }}
**Appointment Date:** {{ $appointment->appointment_date }}
**Appointment Time Slot:** {{ $appointment->appointment_time_slot }}

Regards,<br>
{{ config('app.name') }}
@endcomponent
