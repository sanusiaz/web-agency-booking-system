@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-950 via-gray-900 to-black">
    <div class="max-w-4xl w-full space-y-8 glass p-10 rounded-2xl shadow-2xl relative overflow-hidden">
        
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-32 h-32 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

        <div class="relative z-10">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl">
                    Let's Build Something <span class="text-blue-500">Amazing</span>
                </h2>
                <p class="mt-2 text-lg text-gray-400">
                    Fill out the form below to book your consultation session.
                </p>
            </div>

            @if(session('success'))
                <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-lg mb-6 text-center animate-pulse">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-lg mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('booking.store') }}" method="POST" class="mt-8 space-y-8">
                @csrf
                
                <!-- Personal Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">Full Name</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500 transition duration-200" placeholder="John Doe">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                        <input type="email" name="email" id="email" required class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500 transition duration-200" placeholder="john@example.com">
                    </div>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-300">Phone Number</label>
                    <input type="tel" name="phone" id="phone" required class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500 transition duration-200" placeholder="+1 (555) 000-0000">
                </div>

                <!-- Project Info -->
                <div>
                    <label for="inspiration_websites" class="block text-sm font-medium text-gray-300">Inspiration / Reference Websites</label>
                    <textarea name="inspiration_websites" id="inspiration_websites" rows="2" class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500 transition duration-200" placeholder="https://example.com, https://awwwards.com..."></textarea>
                </div>

                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-300">Tell us about your website or project</label>
                    <textarea name="notes" id="notes" rows="4" required class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500 transition duration-200" placeholder="Describe your vision, goals, and any specific requirements..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="currency" class="block text-sm font-medium text-gray-300">Currency</label>
                        <select name="currency" id="currency" class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white transition duration-200">
                            <option value="USD">USD ($)</option>
                            <option value="NGN">NGN (₦)</option>
                        </select>
                    </div>
                    <div>
                        <label for="budget" class="block text-sm font-medium text-gray-300">Budget</label>
                        <input type="text" name="budget" id="budget" required class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500 transition duration-200" placeholder="e.g. 1000">
                    </div>
                </div>

                <!-- Consultation Info -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Preferred Consultation Method</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <label class="relative flex items-center p-4 rounded-xl border border-gray-700 bg-gray-800 cursor-pointer hover:bg-gray-700 transition">
                            <input type="radio" name="consultation_method" value="Google Meet" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-600" checked>
                            <span class="ml-3 block text-sm font-medium text-white">Video Call</span>
                        </label>
                        <label class="relative flex items-center p-4 rounded-xl border border-gray-700 bg-gray-800 cursor-pointer hover:bg-gray-700 transition">
                            <input type="radio" name="consultation_method" value="Phone Call" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-600">
                            <span class="ml-3 block text-sm font-medium text-white">Phone Call</span>
                        </label>
                        <label class="relative flex items-center p-4 rounded-xl border border-gray-700 bg-gray-800 cursor-pointer hover:bg-gray-700 transition">
                            <input type="radio" name="consultation_method" value="WhatsApp" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-600">
                            <span class="ml-3 block text-sm font-medium text-white">WhatsApp</span>
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="preferred_date" class="block text-sm font-medium text-gray-300">Preferred Date</label>
                        <input type="date" name="preferred_date" id="preferred_date" required class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500 transition duration-200">
                    </div>
                    <div>
                        <label for="preferred_time" class="block text-sm font-medium text-gray-300">Preferred Time</label>
                        <select name="preferred_time" id="preferred_time" class="mt-1 block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white transition duration-200">
                            <option>Morning (9 AM - 12 PM)</option>
                            <option>Afternoon (12 PM - 4 PM)</option>
                            <option>Evening (4 PM - 8 PM)</option>
                        </select>
                    </div>
                </div>

                <!-- Terms -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" required class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-600 rounded bg-gray-700">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="font-medium text-gray-400">I agree to the <a href="{{ route('legal.terms') }}" target="_blank" class="text-blue-500 hover:text-blue-400">Terms and Conditions</a> and <a href="{{ route('legal.privacy') }}" target="_blank" class="text-blue-500 hover:text-blue-400">Privacy Policy</a>.</label>
                    </div>
                </div>

                <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition transform hover:scale-[1.02] shadow-blue-500/50">
                    Submit Booking Request
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Currency Timezone Detection
    document.addEventListener('DOMContentLoaded', function() {
        const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        const currencySelect = document.getElementById('currency');
        
        if (timeZone === 'Africa/Lagos') {
            currencySelect.value = 'NGN';
        } else {
            currencySelect.value = 'USD';
        }
    });
</script>
@endsection
