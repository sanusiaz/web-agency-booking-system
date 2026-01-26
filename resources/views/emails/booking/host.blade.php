<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #059669; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { padding: 20px; border: 1px solid #ddd; border-top: none; border-radius: 0 0 8px 8px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Session Assignment</h1>
        </div>
        <div class="content">
            <p>Hello Host,</p>
            <p>You have been assigned a new consultation session.</p>

            <h3>Client Details:</h3>
            <ul>
                <li><strong>Name:</strong> {{ $booking->name }}</li>
                <li><strong>Date:</strong> {{ $booking->preferred_date->format('l, F j, Y') }}</li>
                <li><strong>Time:</strong> {{ $booking->preferred_time }}</li>
                <li><strong>Meeting Via:</strong> {{ $booking->consultation_method }}</li>
            </ul>

            <p>Please review the full details in the admin dashboard or contact the client at <a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a>.</p>
        </div>
    </div>
</body>
</html>
