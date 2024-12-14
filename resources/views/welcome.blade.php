<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JobBoard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased">
    <!-- Navigation Bar -->
    <header class="bg-indigo-600 text-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="/" class="text-2xl font-semibold">JobBoard</a>
            <nav class="space-x-6">
                <a href="/" class="hover:text-gray-300">Home</a>
                <a href="/jobs" class="hover:text-gray-300">Jobs</a>
                <a href="/about" class="hover:text-gray-300">Über Uns</a>
                <a href="/contact" class="hover:text-gray-300">Kontakt</a>
            </nav>
        </div>
    </header>

    <!-- Welcome Section -->
    <section class="min-h-screen flex items-center bg-gradient-to-b from-indigo-600 to-indigo-800 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold mb-4">Willkommen bei deinem JobBoard!</h1>
            <p class="text-xl mb-6">Finden Sie den perfekten Job oder stellen Sie talentierte Fachkräfte ein. Entdecken Sie spannende Karrieremöglichkeiten.</p>
            <div class="flex justify-center space-x-6">
                <a href="{{ route('jobs.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white py-2 px-6 rounded-lg text-lg transition duration-300">Jetzt Jobs Durchsuchen</a>
                <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-lg text-lg transition duration-300">Als Arbeitgeber Registrieren</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p class="text-sm">&copy; 2024 Mein JobBoard- Alle Rechte vorbehalten</p>
        </div>
    </footer>
</body>
</html>
