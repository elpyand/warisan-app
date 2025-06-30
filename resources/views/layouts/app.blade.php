{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - FaraidApp</title>

    {{-- Menggunakan Tailwind CSS v3 via CDN untuk fitur terbaru --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Mengimpor AlpineJS (hanya satu kali) untuk interaktivitas --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Ini untuk Font dan style tambahan dari halaman lain --}}
    @stack('styles')
</head>
<body class="bg-slate-50"> {{-- Latar belakang utama diatur di sini --}}
    <div id="app">
        
        {{-- Memanggil Navbar yang akan kita buat/gunakan --}}
        @include('layouts.partials.navbar')

        <main>
            {{-- Konten dari halaman (form.blade.php atau edukasi.blade.php) akan muncul di sini --}}
            @yield('content')
        </main>

    </div>

    @stack('scripts')
</body>
</html>