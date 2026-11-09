{{-- Blade Presentation --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Barangay Bulletin - Purok Buenviaje')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col font-sans antialiased">
    <nav class="bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('posts.index') }}" class="flex items-center gap-2 text-emerald-800 hover:text-emerald-900 font-bold text-lg sm:text-xl tracking-tight transition-colors">
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-emerald-600 text-white font-bold text-sm">BB</span>
                    <span>Barangay Bulletin - Purok Buenviaje</span>
                </a>
                <div class="flex items-center gap-4 text-sm font-medium">
                    <a href="{{ route('posts.index') }}" class="text-emerald-700 hover:text-emerald-800 transition-colors">Bulletin Board</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-1 max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>
</body>
</html>
