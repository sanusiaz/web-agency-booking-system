<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #1a202c; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { padding: 20px; border: 1px solid #ddd; border-top: none; border-radius: 0 0 8px 8px; }
        .footer { text-align: center; margin-top: 20px; font-size: 0.8em; color: #777; }
        .details { background: #f9f9f9; padding: 15px; border-radius: 5px; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Booking Confirmation</h1>
        </div>
        <div class="content">
            <p>Dear <strong>{{ $booking->name }}</strong>,</p>
            <p>Thank you for booking a consultation with our Agency. We have received your request and will review your project details shortly.</p>

            <p>One of our team members will reach out to you via {{ $booking->consultation_method }} or email to confirm the appointment.</p>

            <div class="details">
                <h3>Your Booking Details:</h3>
                <ul>
                    <li><strong>Name:</strong> {{ $booking->name }}</li>
                    @if($booking->company_name)
                        <li><strong>Company:</strong> {{ $booking->company_name }}</li>
                    @endif
                    <li><strong>Date:</strong> {{ $booking->preferred_date->format('F j, Y') }}</li>
                    <li><strong>Time:</strong> {{ $booking->preferred_time }}</li>
                    <li><strong>Method:</strong> {{ $booking->consultation_method }}</li>
                    <li><strong>Project Overview:</strong> {{ Str::limit($booking->notes, 100) }}</li>
                </ul>
            </div>

            <p>If you have any urgent questions, please reply to this email.</p>

            <p>Best regards,<br>{{ config('app.name') }} Team</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
