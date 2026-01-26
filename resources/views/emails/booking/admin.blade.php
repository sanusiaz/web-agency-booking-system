<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #2563eb; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { padding: 20px; border: 1px solid #ddd; border-top: none; border-radius: 0 0 8px 8px; }
        .label { font-weight: bold; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Booking Request</h1>
        </div>
        <div class="content">
            <p>A new booking request has been submitted.</p>

            <p><span class="label">Name:</span> {{ $booking->name }}</p>
            <p><span class="label">Email:</span> <a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a></p>
            <p><span class="label">Phone:</span> {{ $booking->phone }}</p>
            <p><span class="label">Budget:</span> {{ $booking->currency }} {{ $booking->budget }}</p>
            <p><span class="label">Method:</span> {{ $booking->consultation_method }}</p>
            
            <hr>
            
            <p><span class="label">Date:</span> {{ $booking->preferred_date->format('Y-m-d') }}</p>
            <p><span class="label">Time:</span> {{ $booking->preferred_time }}</p>

            <hr>

            <p><span class="label">Inspiration:</span><br> {{ $booking->inspiration_websites ?? 'N/A' }}</p>
            <p><span class="label">Project Notes:</span><br> {{ $booking->notes }}</p>
        </div>
    </div>
</body>
</html>
