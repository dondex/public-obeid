<h1>Your Appointment is Confirmed!</h1>
    <p>Dear {{ $appointment->user->name }},</p>
    <p>Your appointment has been set for {{ $appointment->appointment_date_time }} at {{ $appointment->appointment_time }}.</p>
    <p>Subject: {{ $appointment->subject }}</p>
    <p>Thank you for choosing us!</p>