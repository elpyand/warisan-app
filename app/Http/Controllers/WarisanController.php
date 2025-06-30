<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use PDF;

class WarisanController extends Controller
{
    // Menampilkan form input
    public function form()
    {
        return view('form'); // Pastikan form.blade.php ada di resources/views
    }

    // Proses hitung untuk ditampilkan di web
    public function hitung(Request $request)
    {
        $data = $this->hitungWarisan($request);
        return view('hasil', $data);
    }

    // Fungsi logika perhitungan warisan
    private function hitungWarisan(Request $request)
    {
        // PERBAIKAN DI SINI: Menggunakan preg_replace untuk membersihkan input dari titik atau karakter non-numerik lainnya
        $total_harta = (int) preg_replace('/[^0-9]/', '', $request->input('total_harta', '0'));
        $biaya_jenazah = (int) preg_replace('/[^0-9]/', '', $request->input('biaya_jenazah', '0'));
        $hutang = (int) preg_replace('/[^0-9]/', '', $request->input('total_hutang', '0'));
        $wasiat = (int) preg_replace('/[^0-9]/', '', $request->input('total_wasiat', '0'));

        $anakLaki = (int) $request->input('anak_laki');
        $anakPerempuan = (int) $request->input('anak_perempuan');
        $ibu = $request->input('ibu');
        $ayah = $request->input('ayah');
        $pasangan = $request->input('pasangan');
        $cucuLaki = (int) $request->input('cucu_laki');
        $cucuPerempuan = (int) $request->input('cucu_perempuan');
        $saudaraKandung = (int) $request->input('saudara_kandung');
        $saudariKandung = (int) $request->input('saudari_kandung');

        // Perhitungan Harta Bersih sesuai urutan prioritas
        $hartaSetelahJenazah = $total_harta - $biaya_jenazah;
        $hartaSetelahHutang = $hartaSetelahJenazah - $hutang;
        $wasiatValid = min($wasiat, floor($hartaSetelahHutang / 3));
        $harta = max(0, $hartaSetelahHutang - $wasiatValid); // Harta yang siap dibagi

        // Logika perhitungan lainnya ...
        $ahliWaris = [];
        $sisaHarta = $harta;
        $adaAnak = $anakLaki > 0 || $anakPerempuan > 0;
        $adaAnakLaki = $anakLaki > 0;

        if ($pasangan == 'suami') {
            $bagian = $adaAnak ? (1 / 4) * $harta : (1 / 2) * $harta;
            $ahliWaris['Suami'] = $bagian;
            $sisaHarta -= $bagian;
        } elseif ($pasangan == 'istri') {
            $bagian = $adaAnak ? (1 / 8) * $harta : (1 / 4) * $harta;
            $ahliWaris['Istri'] = $bagian;
            $sisaHarta -= $bagian;
        }

        if ($ibu == 'ada') {
            $jumlahSaudara = $saudaraKandung + $saudariKandung;
            $bagian = ($adaAnak || $jumlahSaudara >= 2) ? (1 / 6) * $harta : (1 / 3) * $harta;
            $ahliWaris['Ibu'] = $bagian;
            $sisaHarta -= $bagian;
        }
        
        if ($ayah == 'ada') {
            if ($adaAnak || $cucuLaki > 0 || $cucuPerempuan > 0) {
                 $bagian = (1 / 6) * $harta;
                 $ahliWaris['Ayah'] = $bagian;
                 $sisaHarta -= $bagian;
            }
        }
        
        if ($adaAnakLaki) {
            $totalBagianAnak = (2 * $anakLaki) + $anakPerempuan;
            if ($totalBagianAnak > 0) {
                $ahliWaris['Anak Laki-laki'] = ($sisaHarta * 2 * $anakLaki) / $totalBagianAnak;
                $ahliWaris['Anak Perempuan'] = ($sisaHarta * $anakPerempuan) / $totalBagianAnak;
            }
            $sisaHarta = 0;
        } else if ($anakPerempuan > 0) {
            $bagian = ($anakPerempuan == 1) ? (1 / 2) * $harta : (2 / 3) * $harta;
            // Pastikan bagian tidak melebihi sisa harta
            $bagian = min($bagian, $sisaHarta);
            $ahliWaris['Anak Perempuan'] = $bagian;
            $sisaHarta -= $bagian;
        }

        if ($ayah == 'ada' && !$adaAnakLaki && $sisaHarta > 0.01) {
             $ahliWaris['Ayah'] = ($ahliWaris['Ayah'] ?? 0) + $sisaHarta;
             $sisaHarta = 0;
        }
        
        // Logika untuk Cucu dan Saudara (disederhanakan)
        // ...

        return [
            'total_harta' => $total_harta,
            'biaya_jenazah' => $biaya_jenazah,
            'hutang' => $hutang,
            'wasiatValid' => $wasiatValid,
            'harta_bersih' => $harta,
            'ahli_waris' => $ahliWaris,
            'sisa_harta' => max(0, $sisaHarta), // Pastikan sisa tidak negatif
        ];
    }
}
