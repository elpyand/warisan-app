@extends('layouts.app')

@section('title', 'Peta Lengkap Ahli Waris')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
    /* Latar belakang dot-grid untuk container diagram */
    .dot-grid {
        background-image: radial-gradient(#d1d5db 1px, transparent 1px);
        background-size: 20px 20px;
    }
    /* Style dasar untuk setiap kotak ahli waris (node) */
    .node {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 0.75rem; /* p-3 */
        border-radius: 0.75rem; /* rounded-xl */
        border-width: 1px;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        text-align: center;
        width: 170px; /* Lebar seragam */
        min-height: 110px; /* Tinggi minimum agar muat konten */
        position: absolute;
        z-index: 10;
        background-color: white;
    }
    .node-title {
        font-weight: 800; /* font-extrabold */
        font-size: 1.125rem; /* text-lg */
    }
    .node-share {
        font-weight: 700; /* font-bold */
        font-size: 1rem; /* text-base */
        color: #1d4ed8; /* blue-700 */
        margin: 0.25rem 0;
    }
    .node-condition {
        font-size: 0.75rem; /* text-xs */
        color: #475569; /* slate-600 */
        line-height: 1.4;
    }
    /* Style untuk garis konektor */
    .line {
        background-color: #9ca3af; /* gray-400 */
        position: absolute;
        z-index: 1;
    }
    .line-v { width: 3px; border-radius: 2px; }
    .line-h { height: 3px; border-radius: 2px; }
    /* Garis putus-putus untuk jalur yang bisa terhalang */
    .line-dashed {
        background-image: linear-gradient(to right, #9ca3af 60%, transparent 40%);
        background-size: 15px 3px;
        background-color: transparent;
    }
    /* Teks anotasi untuk info hijab */
    .hijab-note {
        position: absolute;
        font-size: 0.75rem;
        color: #ef4444; /* red-500 */
        font-weight: 600;
        text-align: center;
        background-color: rgba(255, 255, 255, 0.7);
        padding: 2px 4px;
        border-radius: 4px;
        z-index: 20;
    }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20 text-center">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-6 shadow-lg shadow-slate-300/60 bg-white">
            <svg class="w-12 h-12 text-slate-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.5-2.964A3 3 0 013 10.5V18.75m0 0a3 3 0 003 3h9a3 3 0 003-3m-12 0V9A3 3 0 019 6h6a3 3 0 013 3v3.75m-12 0h12" />
            </svg>
        </div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-800">
            Peta Ahli Waris (Diagram Lengkap)
        </h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg text-slate-600">
            Visualisasi terperinci mengenai jalur nasab dan pernikahan yang menentukan hak dan penghalang (*hijab*) dalam hukum waris Islam.
        </p>
    </div>
</section>

<!-- Diagram Section -->
<section class="bg-white py-16 md:py-24">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="md:hidden p-4 bg-blue-50 text-blue-800 rounded-lg text-center mb-8">
            <p><strong>Tips:</strong> Geser diagram ke kiri dan kanan untuk melihat seluruh bagan.</p>
        </div>
        
        <!-- Diagram Container -->
        <div class="overflow-x-auto rounded-xl border border-slate-200 bg-slate-50 dot-grid p-4">
            <div class="relative mx-auto" style="min-width: 1400px; height: 800px;">
                <!-- === GARIS KONEKTOR === -->
                <div class="line line-v" style="top: 110px; left: 50%; height: 210px;"></div>
                <div class="line line-v" style="top: 480px; left: 50%; height: 60px;"></div>
                <div class="line line-v" style="top: 0; left: 25%; height: 25px;"></div>
                <div class="line line-v" style="top: 0; left: 75%; height: 25px;"></div>
                <div class="line line-h" style="top: 110px; left: 25%; width: 50%;"></div>
                <div class="line line-h" style="top: 380px; left: 5%; width: 45%;"></div>
                <div class="line line-h line-dashed" style="top: 175px; left: 75%; width: 15%;"></div>
                <div class="line line-v line-dashed" style="top: 175px; left: 90%; height: 85px;"></div>
                <div class="line line-v line-dashed" style="top: 650px; left: 50%; height: 50px;"></div>

                <!-- === ANOTASI HIJAB === -->
                <p class="hijab-note" style="top: 5px; left: 35%;">Dihijab oleh Ayah</p>
                <p class="hijab-note" style="top: 5px; left: 60%;">Dihijab oleh Ibu</p>
                <p class="hijab-note" style="top: 210px; left: 18%;">Dihijab oleh Anak Laki-laki</p>
                <p class="hijab-note" style="top: 565px; left: 27%;">Dihijab oleh Anak</p>
                <p class="hijab-note" style="top: 190px; left: 80%;">Dihijab oleh Ayah & Anak Laki-laki</p>
                
                <!-- === BOX AHLI WARIS (NODE) === -->
                <!-- Level 1: Kakek/Nenek -->
                <div class="node border-dashed border-green-400 bg-green-50" style="top: 0; left: 25%; transform: translateX(-50%);">
                    <div class="node-title">Kakek</div> <div class="node-share">1/6</div> <div class="node-condition">Jika Ayah tidak ada & ada keturunan</div>
                </div>
                <div class="node border-dashed border-green-400 bg-green-50" style="top: 0; left: 75%; transform: translateX(-50%);">
                    <div class="node-title">Nenek</div> <div class="node-share">1/6</div> <div class="node-condition">Jika Ibu tidak ada</div>
                </div>

                <!-- Level 2: Ayah/Ibu -->
                <div class="node bg-green-100 border-green-500" style="top: 110px; left: 25%; transform: translateX(-50%);">
                    <div class="node-title">AYAH</div> <div class="node-share">1/6 (+ Ashabah)</div> <div class="node-condition">Dapat sisa jika tak ada anak laki-laki</div>
                </div>
                <div class="node bg-green-100 border-green-500" style="top: 110px; left: 75%; transform: translateX(-50%);">
                    <div class="node-title">IBU</div> <div class="node-share">1/6 atau 1/3</div> <div class="node-condition">1/6 jika ada anak/ >1 saudara. 1/3 jika tidak.</div>
                </div>

                <!-- Level 3: PEWARIS -->
                <div class="node bg-slate-800 text-white border-4 border-slate-900" style="top: 320px; left: 50%; transform: translateX(-50%); width: 200px; height: 160px; justify-content: start; padding-top: 1rem;">
                    <svg class="w-12 h-12 text-amber-300 mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.015.442.028.658a.78.78 0 01-.357.442zM20 9a3 3 0 100-6 3 3 0 000 6zM14 8a2 2 0 11-4 0 2 2 0 014 0zM18.51 15.326a.78.78 0 01-.358-.442 3 3 0 00-4.308-3.516 6.484 6.484 0 011.905 3.959c.023.222.015.442-.028.658a.78.78 0 01.357.442zM9.25 12.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zM14.25 12.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zM5.75 12.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.5a.75.75 0 01-.75-.75v-.008z"/></svg>
                    PEWARIS
                </div>
                
                <!-- Level 3: Pasangan -->
                <div class="node bg-pink-100 border-pink-400" style="top: 325px; left: 5%; transform: translateX(-50%);">
                    <div class="node-title">Suami</div> <div class="node-share">1/2 atau 1/4</div> <div class="node-condition">1/4 jika ada anak. 1/2 jika tidak.</div>
                </div>
                <div class="node bg-pink-100 border-pink-400" style="top: 450px; left: 5%; transform: translateX(-50%);">
                    <div class="node-title">Istri</div> <div class="node-share">1/4 atau 1/8</div> <div class="node-condition">1/8 jika ada anak. 1/4 jika tidak.</div>
                </div>
                
                <!-- Level 3: Saudara -->
                <div class="node border-dashed border-orange-400 bg-orange-50" style="top: 260px; left: 90%; transform: translateX(-50%);">
                    <div class="node-title">Saudara Laki-Laki</div> <div class="node-share">Ashabah</div> <div class="node-condition">Dapat sisa jika pewaris tidak punya Ayah / Anak Laki-laki</div>
                </div>
                <div class="node border-dashed border-orange-400 bg-orange-50" style="top: 380px; left: 90%; transform: translateX(-50%);">
                    <div class="node-title">Saudari Perempuan</div> <div class="node-share">1/2, 2/3, Ashabah</div> <div class="node-condition">Berbagi sisa dengan Saudara Laki-laki jika ada.</div>
                </div>

                <!-- Level 4: Anak -->
                <div class="node bg-blue-100 border-blue-500" style="top: 540px; left: calc(50% - 120px); transform: translateX(-50%);">
                     <div class="node-title">Anak Laki-Laki</div> <div class="node-share">Ashabah</div> <div class="node-condition">Mendapat semua sisa harta. Penghalang terkuat.</div>
                </div>
                <div class="node bg-blue-100 border-blue-500" style="top: 540px; left: calc(50% + 120px); transform: translateX(-50%);">
                    <div class="node-title">Anak Perempuan</div> <div class="node-share">1/2, 2/3, Ashabah</div> <div class="node-condition">Jika bersama Anak Laki-laki, menjadi Ashabah (2:1)</div>
                </div>
                <div class="line line-h" style="top: 580px; left: 50%; width: 240px; transform: translateX(-50%);"></div>

                <!-- Level 5: Cucu -->
                <div class="node border-dashed border-sky-400 bg-sky-50" style="top: 700px; left: 50%; transform: translateX(-50%);">
                    <div class="node-title">Cucu</div> <div class="node-share">Beragam</div> <div class="node-condition">Mewarisi jika Anak yang menjadi jalurnya sudah wafat.</div>
                </div>
            </div>
        </div>

        <!-- Penjelasan dan Legenda -->
        <div class="mt-16 pt-8 border-t border-slate-200">
            <h3 class="text-2xl font-bold text-center text-slate-700 mb-8">Cara Membaca Diagram</h3>
            <div class="max-w-4xl mx-auto grid md:grid-cols-2 gap-x-12 gap-y-8 text-slate-600">
                <div>
                    <h4 class="font-bold text-lg text-slate-800 mb-2">Jalur & Prioritas Warisan</h4>
                    <p>Diagram ini menunjukkan alur nasab dari atas (leluhur/usul) ke bawah (keturunan/furu'). Prioritas pembagian dimulai dari Ahli Waris Utama (Pasangan, Anak, Orang Tua), kemudian sisa harta (jika ada) akan dibagikan ke ahli waris yang lebih jauh.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg text-slate-800 mb-2">Konsep Penghalang (Hijab)</h4>
                    <p>Ahli waris yang lebih dekat bisa menghalangi yang lebih jauh. Kotak dengan <span class="border-b-2 border-dashed border-slate-400">garis putus-putus</span> dan teks <span class="text-red-500 font-semibold">merah</span> menandakan ahli waris atau jalur yang bisa gugur haknya karena terhalang.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
