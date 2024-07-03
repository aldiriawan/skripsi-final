<?php

namespace App\Imports;

use App\Models\SuratTugas;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SuratTugasImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            SuratTugas::create([
                'nomor' => $row['nomor'],
                'dosen_id' => $row['nama_dosen'],
                'tanggal' => $row['tanggal'],
                'keterangan' => $row['keterangan'],
                'waktu_awal' => $row['waktu_awal'],
                'waktu_akhir' => $row['waktu_akhir'],
                'bukti_id' => $row['bukti'],
                'jenis_id' => $row['jenis'],
                'tingkat_id' => $row['tingkat'],
                'peran_id' => $row['peran_id'],
                'publikasi_id' => $row['publikasi_id'],
            ]);
        }
    }
}
