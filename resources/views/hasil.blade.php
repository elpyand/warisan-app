@extends('layouts.app')

@section('title', 'Hasil Perhitungan Warisan')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style> body { font-family: 'Inter', sans-serif; } </style>
@endpush

@section('content')
<div class="bg-gradient-to-b from-slate-100 to-slate-50 border-b border-slate-200/80">
    <div class="max-w-5xl mx-auto px-4 pt-12 pb-10 md:pt-16 md:pb-12 text-center">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-6 shadow-lg shadow-slate-300/60 bg-white">
             <svg class="w-12 h-12 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
        </div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-800 to-slate-600 mb-3">
            Hasil Perhitungan Warisan
        </h1>
        <p class="text-base sm:text-lg text-slate-500 max-w-2xl mx-auto">Berikut adalah rincian pembagian harta warisan berdasarkan data yang Anda masukkan.</p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 pb-8 md:pb-16 -mt-8">
    <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-200/80">
        
        <div class="p-6 md:p-8 border-b-2 border-dashed border-slate-200">
            <h2 class="text-2xl font-bold text-slate-800 mb-5">Ringkasan Harta</h2>
            <div class="space-y-3">
                <div class="flex justify-between items-center text-lg">
                    <span class="text-slate-600">Total Harta Ditinggalkan</span>
                    <span class="font-bold text-slate-800">Rp {{ number_format($total_harta, 0, ',', '.') }}</span>
                </div>
                {{-- BARIS BARU: Menampilkan biaya jenazah --}}
                <div class="flex justify-between items-center text-lg">
                    <span class="text-slate-600">(-) Biaya Pengurusan Jenazah</span>
                    <span class="font-bold text-red-600">Rp {{ number_format($biaya_jenazah, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center text-lg">
                    <span class="text-slate-600">(-) Total Hutang</span>
                    <span class="font-bold text-red-600">Rp {{ number_format($hutang, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center text-lg">
                    <span class="text-slate-600">(-) Wasiat (Maks. 1/3)</span>
                    <span class="font-bold text-yellow-600">Rp {{ number_format($wasiatValid, 0, ',', '.') }}</span>
                </div>
                <hr class="my-3">
                <div class="flex justify-between items-center text-xl">
                    <span class="font-semibold text-slate-700">Harta Bersih Dibagikan</span>
                    <span class="font-extrabold text-green-600">Rp {{ number_format($harta_bersih, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
        
        <div class="p-6 md:p-8">
            <h2 class="text-2xl font-bold text-slate-800 mb-6">Rincian Pembagian untuk Ahli Waris</h2>
            <div class="space-y-4">
                @forelse ($ahli_waris as $penerima => $bagian)
                    @if ($bagian > 0)
                        <div class="flex justify-between items-center p-4 bg-slate-50 rounded-lg">
                            <span class="text-lg font-semibold text-slate-700">{{ $penerima }}</span>
                            <span class="text-lg font-bold text-blue-800">Rp {{ number_format($bagian, 0, ',', '.') }}</span>
                        </div>
                    @endif
                @empty
                    <div class="p-4 bg-yellow-50 text-yellow-800 rounded-lg text-center">
                        Tidak ada ahli waris yang berhak menerima bagian berdasarkan data yang dimasukkan.
                    </div>
                @endforelse
                {{-- ... sisa tampilan hasil tetap sama ... --}}
            </div>
        </div>

        <div class="p-6 md:p-8 border-t border-slate-200 bg-slate-50/50 rounded-b-2xl text-center">
             <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="{{ url('/kalkulator') }}" class="w-full sm:w-auto inline-block px-8 py-3 bg-blue-700 text-white font-bold rounded-lg hover:bg-blue-800 transition-colors">
                    Hitung Ulang
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
