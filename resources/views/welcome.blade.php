<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Welcome | Laravel App</title>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-100">

    {{-- Navigation --}}
    @if (Route::has('login'))
    <livewire:welcome.navigation />
    @endif

    {{-- Main Content --}}
    <main class="container mx-auto py-8 px-4">
        @auth
        @if(Auth::user()->role === 'mahasiswa')
        <livewire:krs.krs />
        @else
        <div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md text-center">
            <p class="text-lg">Halaman ini hanya untuk mahasiswa.</p>
            <a href="{{ route('dashboard') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Ke Dashboard
            </a>
        </div>
        
        @endif
        @else
        <!-- Tambahkan di bagian hero section -->
        <section class="flex flex-col items-center justify-center h-screen text-center px-4">
            @auth
            @if(auth()->user()->role === 'mahasiswa')
            <div class="w-full max-w-4xl">
                <livewire:krs.krs-component />
            </div>
            @else
            <h1 class="text-4xl font-bold mb-4">Selamat Datang, {{ auth()->user()->name }}</h1>
            <p class="text-xl mb-8">Anda login sebagai admin</p>
            @endif
            @else
            <h1 class="text-4xl font-bold mb-4">Selamat Datang di Sistem KRS</h1>
            <p class="text-xl mb-8">Silakan login untuk mengakses KRS</p>
            <div class="flex gap-4 justify-center">
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Login
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Register
                </a>
                @endif
            </div>
            @endauth
        </section>
        @endauth
    </main>

</body>

</html>