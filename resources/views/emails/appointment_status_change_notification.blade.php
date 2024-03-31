<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Status Change Notification</title>
</head>
<body>
    <h2>Dear {{ $user->name }},</h2>
    <p>Your appointment status has been updated:</p>
    <p>Appointment ID: {{ $appointment->id }}</p>
    <p>Status: {{ $appointment->status }}</p>
    <p>Doctor: {{ $appointment->doctor->name ?? '' }}</p>
    <p>Time Slote: {{ $appointment->appointment_time_slot ?? '' }}</p>
    <!-- Add more details here -->
    <p>Thank you!</p>
</body>
</html>
