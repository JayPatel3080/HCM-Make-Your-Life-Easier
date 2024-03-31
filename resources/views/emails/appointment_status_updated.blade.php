
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Appointment Assigned</title>
</head>
<body>
    <h1>New Appointment Assigned</h1>
    <p>A new appointment has been assigned to you:</p>
    <ul>
        <li>Patient Name: {{ $appointment->patient_first_name }} {{ $appointment->patient_last_name }}</li>
        <li>Appointment Date: {{ $appointment->appointment_date }}</li>
        <li>Appointment Time Slot: {{ $appointment->appointment_time_slot }}</li>
        <!-- Add more appointment details as needed -->
    </ul>
</body>
</html>
