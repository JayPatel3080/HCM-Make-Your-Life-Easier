<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        .section-heading {
            margin-bottom: 10px;
            color: #007bff;
        }

        .patient-info {
            margin-bottom: 20px;
            border: 2px solid #007bff;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
        }

        .patient-info label {
            font-weight: bold;
        }

        .prescription {
            margin-bottom: 30px;
            border: 2px solid #28a745;
            padding: 20px;
            border-radius: 10px;
            background-color: #d4edda;
        }

        .prescription h2 {
            margin-bottom: 20px;
            color: #28a745;
        }

        .prescription p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Clinical Summary</h1>

        <div class="patient-info">
            <h2 class="section-heading">Patient Demographics</h2>
            <div>
                <label>Name:</label> {{ $user->patient_first_name }} {{ $user->patient_last_name }}
            </div>
            <div>
                <label>Gender:</label> {{ $user->patient_gender }}
            </div>
            <div>
                <label>Appointment Date:</label> {{ $user->appointment_date }}
            </div>
            <div>
                <label>Patient ID:</label> {{ 'CAN-'.$user->id }}
            </div>
            <div>
                <label>Email:</label> {{ $user->patient_email }}
            </div>
            <div>
                <label>Age:</label> {{ $user->patient_age }}
            </div>
            <div>
                <label>Status:</label> {{ $user->status }}
            </div>
            <div>
                <label>Contact:</label> {{ $user->patient_phone_number }}
            </div>
        </div>

        @foreach ($list as $item)
        <div class="prescription">
            <h2 class="section-heading">Clinical Summary - {{$item->PrescriptionDate}}</h2>
            {!! $item->medication_name !!}
        </div>
        @endforeach

    </div>
</body>
</html>
