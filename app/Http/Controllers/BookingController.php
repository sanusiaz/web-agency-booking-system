<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Mail\BookingConfirmation;
use App\Mail\AdminBookingNotification;
use App\Mail\HostBookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'company_name' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'services' => 'required|array',
            'services.*' => 'string',
            'inspiration_websites' => 'nullable|string',
            'notes' => 'required|string', // "Tell us about your website or project"
            'budget' => 'required|string',
            'currency' => 'required|string|in:USD,NGN',
            'consultation_method' => 'required|string',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required|string',
        ]);

        $booking = Booking::create($validated);

        // Send Emails
        $adminEmail = env('ADMIN_EMAIL');
        $hostEmail = env('HOST_EMAIL');

        // 1. To User
        Mail::to($booking->email)->send(new BookingConfirmation($booking));

        // 2. To Admin
        if ($adminEmail) {
            Mail::to($adminEmail)->send(new AdminBookingNotification($booking));
        }

        // 3. To Host
        if ($hostEmail) {
            Mail::to($hostEmail)->send(new HostBookingNotification($booking));
        }

        return redirect()->route('booking.index')->with('success', 'Your booking request has been received! We will reach out shortly.');
    }
}
