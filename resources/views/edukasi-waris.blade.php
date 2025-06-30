@extends('layouts.app')

@section('title', 'Edukasi Lengkap Ilmu Waris (Faraid)')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
    
    /* Kelas untuk animasi fade-in-up */
    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    /* Kelas yang ditambahkan oleh JavaScript saat elemen terlihat */
    .is-visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>
@endpush

@section('content')

<!-- PERUBAHAN DI SINI: Hero Section dengan Background Foto -->
<section class="relative bg-slate-800 text-white overflow-hidden" 
         style="background-image: url('https://images.pexels.com/photos/7648332/pexels-photo-7648332.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); background-size: cover; background-position: center;">
    
    {{-- Overlay gelap untuk memastikan teks terbaca --}}
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 to-blue-900/80"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 text-center">
        <div class="fade-in-up">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight">
                Panduan Lengkap Ilmu Waris
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-lg sm:text-xl text-blue-100">
                Memahami pilar, aturan, dan hikmah di balik pembagian harta warisan dalam syariat Islam (Faraid).
            </p>
        </div>
    </div>
</section>

<!-- Section: Pengantar -->
<section id="pengantar" class="bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="text-center fade-in-up">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">Apa Itu Ilmu Faraid?</h2>
            <p class="mt-4 text-lg text-slate-600">
                <strong>Ilmu Faraid</strong> adalah ilmu yang ditetapkan langsung oleh Allah SWT di dalam Al-Qur'an untuk mengatur pembagian harta peninggalan. Tujuannya bukan sekadar membagi angka, melainkan untuk **menegakkan keadilan**, **mencegah konflik**, dan **melindungi hak** setiap anggota keluarga, terutama bagi mereka yang paling rentan.
            </p>
        </div>
        <blockquote class="mt-8 text-center text-xl italic text-slate-700 border-none fade-in-up" style="transition-delay: 100ms;">
            "Ini adalah ketetapan dari Allah. Sesungguhnya Allah Maha Mengetahui lagi Maha Bijaksana."
            <cite class="block not-italic text-base text-slate-500 mt-2">- QS. An-Nisa': 11 -</cite>
        </blockquote>
    </div>
</section>

<!-- Section: Rukun & Penghalang -->
<section id="rukun-syarat" class="bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="text-center max-w-3xl mx-auto fade-in-up">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">Dasar-Dasar Kewarisan</h2>
            <p class="mt-4 text-lg text-slate-600">Agar pembagian waris sah, ada pilar (rukun) yang harus ada dan penghalang (mawani') yang tidak boleh ada.</p>
        </div>
        <div class="mt-16 grid md:grid-cols-2 gap-12">
            <!-- Kolom Rukun -->
            <div class="fade-in-up" style="transition-delay: 100ms;">
                <h3 class="text-2xl font-bold text-slate-700 mb-6">3 Pilar Utama (Rukun)</h3>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-700 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg></div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800">Al-Muwarrits (Pewaris)</h4>
                            <p class="mt-1 text-slate-600">Orang yang wafat dan meninggalkan harta. Kematiannya harus dapat dipastikan.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-700 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg></div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800">Al-Waris (Ahli Waris)</h4>
                            <p class="mt-1 text-slate-600">Orang yang berhak menerima warisan. Harus masih hidup saat pewaris wafat.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-700 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M12 6a2 2 0 110-4 2 2 0 010 4zm0 12a2 2 0 110-4 2 2 0 010 4z" /></svg></div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800">Al-Mauruts (Harta)</h4>
                            <p class="mt-1 text-slate-600">Harta atau hak yang ditinggalkan oleh pewaris untuk dibagikan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kolom Penghalang -->
            <div class="fade-in-up" style="transition-delay: 200ms;">
                <h3 class="text-2xl font-bold text-slate-700 mb-6">3 Penghalang Utama (Mawani')</h3>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-red-100 text-red-700 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg></div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800">Pembunuhan</h4>
                            <p class="mt-1 text-slate-600">Ahli waris yang membunuh pewarisnya menjadi gugur hak warisnya.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-red-100 text-red-700 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10h.01M15 10h.01M10 14a2 2 0 104 0 2 2 0 00-4 0z" /></svg></div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800">Berlainan Agama</h4>
                            <p class="mt-1 text-slate-600">Seorang Muslim tidak mewarisi dari non-Muslim, dan sebaliknya.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-red-100 text-red-700 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H5v-2H3v-2H1.75a1.75 1.75 0 01-1.48-2.533L2.25 9.5a1.75 1.75 0 011.48-1.033H6" /></svg></div>
                        <div>
                            <h4 class="text-lg font-semibold text-slate-800">Perbudakan</h4>
                            <p class="mt-1 text-slate-600">Seorang budak tidak bisa mewarisi (tidak relevan saat ini).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Prioritas -->
<section id="kewajiban" class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="text-center max-w-3xl mx-auto fade-in-up">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">Kewajiban Sebelum Harta Dibagi</h2>
            <p class="mt-4 text-lg text-slate-600">Harta peninggalan tidak bisa langsung dibagikan. Ada 4 hak yang melekat padanya dan harus ditunaikan secara berurutan.</p>
        </div>
        <div class="mt-16 grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="p-6 bg-slate-50 rounded-xl shadow-md text-center fade-in-up">
                <div class="inline-block p-4 bg-slate-200 text-slate-700 rounded-full">
                    <span class="text-2xl font-bold">1</span>
                </div>
                <h3 class="mt-4 text-lg font-bold">Biaya Jenazah</h3>
                <p class="mt-2 text-sm text-slate-600">Biaya pengurusan jenazah hingga pemakaman yang wajar.</p>
            </div>
            <div class="p-6 bg-slate-50 rounded-xl shadow-md text-center fade-in-up" style="transition-delay: 100ms;">
                <div class="inline-block p-4 bg-red-200 text-red-700 rounded-full">
                    <span class="text-2xl font-bold">2</span>
                </div>
                <h3 class="mt-4 text-lg font-bold">Pelunasan Utang</h3>
                <p class="mt-2 text-sm text-slate-600">Semua utang pewaris kepada Allah maupun manusia wajib dilunasi.</p>
            </div>
            <div class="p-6 bg-slate-50 rounded-xl shadow-md text-center fade-in-up" style="transition-delay: 200ms;">
                <div class="inline-block p-4 bg-yellow-200 text-yellow-700 rounded-full">
                    <span class="text-2xl font-bold">3</span>
                </div>
                <h3 class="mt-4 text-lg font-bold">Pelaksanaan Wasiat</h3>
                <p class="mt-2 text-sm text-slate-600">Maksimal 1/3 dari sisa harta setelah membayar utang.</p>
            </div>
            <div class="p-6 bg-slate-50 rounded-xl shadow-md text-center fade-in-up" style="transition-delay: 300ms;">
                <div class="inline-block p-4 bg-green-200 text-green-700 rounded-full">
                    <span class="text-2xl font-bold">4</span>
                </div>
                <h3 class="mt-4 text-lg font-bold">Pembagian Waris</h3>
                <p class="mt-2 text-sm text-slate-600">Sisa harta terakhir inilah yang dibagikan kepada ahli waris.</p>
            </div>
        </div>
    </div>
</section>

<!-- Studi Kasus dan Penutup -->
<section id="penutup" class="bg-slate-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 text-center">
        <div class="fade-in-up">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Langkah Anda Selanjutnya</h2>
            <p class="mt-4 text-lg text-slate-300">
                Ilmu Faraid sangatlah luas. Panduan ini adalah gerbang awal pemahaman Anda. Untuk kasus nyata, keputusan harus didasarkan pada fatwa ahli dan putusan lembaga yang berwenang.
            </p>
            <div class="mt-8">
                <a href="{{ url('/kalkulator') }}" class="inline-block px-8 py-4 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-500 transition-colors shadow-lg transform hover:scale-105">
                    Coba Kalkulator Waris Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk animasi fade-in-up saat scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, {
        threshold: 0.1 // elemen dianggap terlihat jika 10% areanya masuk viewport
    });

    // Amati semua elemen dengan kelas .fade-in-up
    const elementsToAnimate = document.querySelectorAll('.fade-in-up');
    elementsToAnimate.forEach(el => {
        observer.observe(el);
    });
});
</script>
@endpush
