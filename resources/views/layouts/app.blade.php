<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Web Agency') }}</title>
    <meta name="description" content="Book a session with our Web Agency. We create professional websites.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-gray-950 text-white min-h-screen flex flex-col antialiased selection:bg-blue-500 selection:text-white">

    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Floating Actions -->
    <div class="fixed bottom-6 right-6 flex flex-col space-y-4 z-50">
        <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition-transform transform hover:scale-110 flex items-center justify-center">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.6 1.967-3.02 3.832-1.728 5.626l-7.382zM12 4.885c-3.93 0-7.116 3.185-7.118 7.118.001 3.934 3.18 7.117 7.112 7.117 3.931 0 7.115-3.185 7.117-7.117-.001-3.933-3.18-7.118-7.111-7.118z"/></svg>
        </a>
        <a href="mailto:{{ env('ADMIN_EMAIL') }}?subject=Inquiry from Website" class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-full shadow-lg transition-transform transform hover:scale-110 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
        </a>
    </div>

    <!-- Cookie Consent -->
    <div id="cookie-banner" class="fixed bottom-0 left-0 w-full bg-gray-900 border-t border-gray-800 p-4 hidden z-40">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between">
            <p class="text-sm text-gray-400 mb-4 md:mb-0">We use cookies to improve your experience. Read our <a href="{{ route('legal.cookies') }}" class="text-blue-400 hover:underline">Cookie Policy</a>.</p>
            <div class="flex space-x-4">
                <button onclick="acceptCookies()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition">Accept</button>
            </div>
        </div>
    </div>

    <script>
        if (!localStorage.getItem('cookiesAccepted')) {
            document.getElementById('cookie-banner').classList.remove('hidden');
        }
        function acceptCookies() {
            localStorage.setItem('cookiesAccepted', 'true');
            document.getElementById('cookie-banner').classList.add('hidden');
        }
    </script>
</body>
</html>
