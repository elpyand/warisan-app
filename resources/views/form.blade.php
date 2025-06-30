@extends('layouts.app')

@section('title', 'Form Pembagian Warisan')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
    .max-h-screen {
        max-height: 1000px;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="max-w-5xl mx-auto px-4 py-8 md:py-12">
        
        <div class="text-center mb-10 md:mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-5 shadow-lg shadow-blue-200/80 bg-white">
                <svg class="w-12 h-12 text-slate-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21.38V12.38" stroke="#1e293b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M4.88208 9.23999L12.0001 12.38L19.1181 9.23999" stroke="#1e293b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 14.88H22" stroke="#1e293b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M4.88197 9.23999C3.39197 9.23999 2.19197 8.03999 2.19197 6.54999C2.19197 5.05999 3.39197 3.85999 4.88197 3.85999C6.37197 3.85999 7.57197 5.05999 7.57197 6.54999C7.57197 8.03999 6.37197 9.23999 4.88197 9.23999Z" stroke="#475569" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M19.118 9.23999C17.628 9.23999 16.428 8.03999 16.428 6.54999C16.428 5.05999 17.628 3.85999 19.118 3.85999C20.608 3.85999 21.808 5.05999 21.808 6.54999C21.808 8.03999 20.608 9.23999 19.118 9.23999Z" stroke="#475569" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-800 to-slate-600 mb-3">
                Kalkulator Waris Faraid
            </h1>
            <p class="text-base sm:text-lg text-slate-500 max-w-2xl mx-auto">Hitung pembagian warisan sesuai hukum Islam secara akurat dan mudah.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-200/80">
            <div class="bg-gradient-to-r from-slate-700 to-slate-900 px-4 md:px-8 py-5">
                <h2 class="text-xl font-semibold text-white flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Form Data Warisan</span>
                </h2>
            </div>

            <form action="/hitung" method="POST" class="p-4 md:p-8">
                @csrf
                
                {{-- PERUBAHAN DI SINI: Grid diubah menjadi 2x2 --}}
                <div class="grid md:grid-cols-2 gap-6 mb-10">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Total Harta Warisan</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 transform -translate-y-1/2 text-slate-400 font-medium">Rp</span>
                            <input type="text" name="total_harta" required class="w-full pl-11 pr-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 font-semibold bg-white transition" placeholder="0">
                        </div>
                    </div>
                    
                    {{-- INPUT BARU: Biaya Pengurusan Jenazah --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Biaya Pengurusan Jenazah</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 transform -translate-y-1/2 text-slate-400 font-medium">Rp</span>
                            <input type="text" name="biaya_jenazah" required class="w-full pl-11 pr-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 font-semibold bg-white transition" placeholder="0" value="0">
                        </div>
                        <p class="text-xs text-slate-500 mt-1.5">Prioritas pertama yang dikeluarkan.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Total Hutang</label>
                         <div class="relative">
                            <span class="absolute left-3.5 top-1/2 transform -translate-y-1/2 text-slate-400 font-medium">Rp</span>
                            <input type="text" name="total_hutang" required min="0" class="w-full pl-11 pr-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 font-semibold bg-white transition" placeholder="0" value="0">
                        </div>
                        <p class="text-xs text-slate-500 mt-1.5">Dilunasi setelah biaya jenazah.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Total Wasiat</label>
                         <div class="relative">
                            <span class="absolute left-3.5 top-1/2 transform -translate-y-1/2 text-slate-400 font-medium">Rp</span>
                            <input type="text" name="total_wasiat" required min="0" class="w-full pl-11 pr-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 font-semibold bg-white transition" placeholder="0" value="0">
                        </div>
                        <p class="text-xs text-slate-500 mt-1.5">Maks. 1/3 dari sisa harta.</p>
                    </div>
                </div>

                <div class="border-t border-slate-200 my-8"></div>

                <h3 class="text-xl font-bold text-slate-800 mb-6">Data Ahli Waris</h3>
                
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- ... Sisa form ahli waris tetap sama ... --}}
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                        <h4 class="font-bold text-blue-800 mb-4 flex items-center"><span class="mr-3 text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg></span>Anak Kandung</h4>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div><label class="block text-sm font-medium text-blue-700 mb-2">Anak Laki-laki</label><input type="number" name="anak_laki" value="0" min="0" class="w-full px-4 py-3 bg-white border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></div>
                            <div><label class="block text-sm font-medium text-blue-700 mb-2">Anak Perempuan</label><input type="number" name="anak_perempuan" value="0" min="0" class="w-full px-4 py-3 bg-white border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></div>
                        </div>
                    </div>
                    <div class="bg-purple-50 border border-purple-200 rounded-xl p-5">
                        <h4 class="font-bold text-purple-800 mb-4 flex items-center"><span class="mr-3 text-purple-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg></span>Orang Tua</h4>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div><label class="block text-sm font-medium text-purple-700 mb-2">Status Ayah</label><select name="ayah" class="w-full px-4 py-3 bg-white border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"><option value="ada">Masih Hidup</option><option value="tidak">Sudah Meninggal</option></select></div>
                            <div><label class="block text-sm font-medium text-purple-700 mb-2">Status Ibu</label><select name="ibu" class="w-full px-4 py-3 bg-white border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"><option value="ada">Masih Hidup</option><option value="tidak">Sudah Meninggal</option></select></div>
                        </div>
                    </div>
                    <div class="bg-pink-50 border border-pink-200 rounded-xl p-5">
                        <h4 class="font-bold text-pink-800 mb-4 flex items-center"><span class="mr-3 text-pink-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg></span>Pasangan</h4>
                        <div><label class="block text-sm font-medium text-pink-700 mb-2">Status Pasangan</label><select name="pasangan" class="w-full px-4 py-3 bg-white border border-pink-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition"><option value="tidak">Tidak Ada</option><option value="suami">Suami</option><option value="istri">Istri</option></select></div>
                    </div>
                    <div class="bg-orange-50 border border-orange-200 rounded-xl p-5">
                        <h4 class="font-bold text-orange-800 mb-4 flex items-center"><span class="mr-3 text-orange-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m3 5.197V9a3 3 0 00-3-3v4.354a4 4 0 00-3 3.646V21h6z" /></svg></span>Cucu (jika anak wafat)</h4>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div><label class="block text-sm font-medium text-orange-700 mb-2">Cucu Laki-laki</label><input type="number" name="cucu_laki" value="0" min="0" class="w-full px-4 py-3 bg-white border border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"></div>
                            <div><label class="block text-sm font-medium text-orange-700 mb-2">Cucu Perempuan</label><input type="number" name="cucu_perempuan" value="0" min="0" class="w-full px-4 py-3 bg-white border border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"></div>
                        </div>
                    </div>
                    <div class="md:col-span-2 bg-indigo-50 border border-indigo-200 rounded-xl p-5">
                        <h4 class="font-bold text-indigo-800 mb-4 flex items-center"><span class="mr-3 text-indigo-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg></span>Saudara (jika tdk ada anak/ayah)</h4>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div><label class="block text-sm font-medium text-indigo-700 mb-2">Saudara Laki-laki</label><input type="number" name="saudara_kandung" value="0" min="0" class="w-full px-4 py-3 bg-white border border-indigo-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"></div>
                            <div><label class="block text-sm font-medium text-indigo-700 mb-2">Saudari Perempuan</label><input type="number" name="saudari_kandung" value="0" min="0" class="w-full px-4 py-3 bg-white border border-indigo-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"></div>
                        </div>
                    </div>
                </div>

                <div class="text-center pt-10 mt-8 border-t border-slate-200">
                    <button type="submit" style="background: linear-gradient(to right, #0891b2, #2563eb); color: white;" class="inline-flex items-center px-8 sm:px-10 py-3 sm:py-4 font-bold text-base sm:text-lg rounded-xl focus:outline-none focus:ring-4 focus:ring-cyan-500/50 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl shadow-cyan-300/60">
                        <svg class="w-6 h-6 mr-2 sm:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        Hitung Warisan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Menambahkan field baru ke dalam array yang akan diformat
    const currencyFields = ['total_harta', 'biaya_jenazah', 'total_hutang', 'total_wasiat'];
    
    currencyFields.forEach(fieldName => {
        const input = document.querySelector(`input[name="${fieldName}"]`);
        if (!input) return;

        const formatRupiah = (angka) => {
            let cleanedAngka = String(angka).replace(/[^\d]/g, '');
            if (cleanedAngka === '') return '';
            return new Intl.NumberFormat('id-ID').format(cleanedAngka);
        };

        input.addEventListener('input', (e) => {
            e.target.value = formatRupiah(e.target.value);
        });

        input.form.addEventListener('submit', () => {
            input.value = input.value.replace(/\./g, '');
        });

        if(input.value) {
            input.value = formatRupiah(input.value);
        }
    });
});
</script>
@endpush

@endsection
