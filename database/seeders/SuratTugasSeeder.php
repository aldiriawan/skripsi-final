<?php

namespace Database\Seeders;

use App\Models\SuratTugas;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuratTugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Surat Tugas
        SuratTugas::create([
            'nomor' => '2017.FTI.J05.0080',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2017-11-08'),
            'keterangan' => 'Pengabdian Mempresentasikan paper yg berjudul "Histogram Peak Ratio-Based Binarization for Historical Document Image"',
            'waktu' => Carbon::parse('2017-11-10'),
            'bukti' => 'Undangan',
            'jenis' => 'Pengabdian',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2018.FTI.J05.003.3',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2018-01-11'),
            'keterangan' => 'Penulis artikel pada Jurnal Terapan Teknologi Informasi (JuTei) Vol.2 No.1 April 2018. Judul "Silabifikasi Kata Bahasa Korea Dalam Aksara Latin Berbasis Aturan dan Model Deterministie Finite Automata"',
            'waktu' => Carbon::parse('2018-01-26'),
            'bukti' => 'Copy Artikel',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2018.FTI.J05.0049',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2018-06-26'),
            'keterangan' => 'Peserta Menghadiri undangan penandatanganan perjanjian kerjasama dgn pihak VVIKIMEDIA Foundation Indonesia ',
            'waktu' => Carbon::parse('2018-06-27'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.006',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-01-24'),
            'keterangan' => 'Pengabdian Narsum dlm Pelatihan Anotasi Aksara Jawa',
            'waktu' => Carbon::parse('2019-04-04'),
            'bukti' => '',
            'jenis' => 'Pengabdian',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.007.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-01-25'),
            'keterangan' => 'Penulis Artikel pada Jurnal Linguistik Komputasional Volume 2',
            'waktu' => Carbon::parse('2019-03-25'),
            'bukti' => 'Copy Artikel',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.020.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-03-05'),
            'keterangan' => 'Peserta Menghadiri acara International Symposium in Javanese Studies & manuscripts of Keraton Yogyakarta',
            'waktu' => Carbon::parse('2019-03-21'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.036.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-04-11'),
            'keterangan' => 'Penulis Artikel pada Creativearts NCC and k-NN International Conference',
            'waktu' => Carbon::parse('2019-07-11'),
            'bukti' => 'Copy Artikel',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.039.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-04-24'),
            'keterangan' => 'Pengabdian Mengisi Acara dlm Sesi OCR Aksara Jawa di Yogyakarta',
            'waktu' => Carbon::parse('2019-04-28'),
            'bukti' => '',
            'jenis' => 'Pengabdian',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.043.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-04-29'),
            'keterangan' => 'Penulis pada Prosiding Conference Program & Abstract Book',
            'waktu' => Carbon::parse('2019-06-29'),
            'bukti' => 'Copy Artikel',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.052.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-06-18'),
            'keterangan' => 'Penulis Artikel pada Prosiding SENDIMAS 2019 Vol 4 No 1 Sep 2019',
            'waktu' => Carbon::parse('2019-08-18'),
            'bukti' => '',
            'jenis' => 'Pengabdian',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.061.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-07-02'),
            'keterangan' => 'Pengabdian Mempresentasikan Hasil Karya di Phoenix Yogyakarta',
            'waktu' => Carbon::parse('2019-07-5'),
            'bukti' => '',
            'jenis' => 'Pengabdian',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.108.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-09-30'),
            'keterangan' => 'Penulis III pada Prosiding IEEE / IIAI ',
            'waktu' => Carbon::parse('2019-11-30'),
            'bukti' => 'Copy Artikel',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.110.2',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-10-01'),
            'keterangan' => 'Penulis Naskah JURNAL PRISMA Vol. 40, Desember 2019',
            'waktu' => Carbon::parse('2019-12-01'),
            'bukti' => 'Copy Artikel',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.J05.110.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-10-01'),
            'keterangan' => 'Penulis pada Prosiding iiWAS2019',
            'waktu' => Carbon::parse('2019-12-01'),
            'bukti' => 'Copy Artikel',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2019.FTI.D01.130',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2019-11-26'),
            'keterangan' => 'Pengabdian Pelatihan Aksara Jawa di BOPKRI 1',
            'waktu' => Carbon::parse('2019-11-27'),
            'bukti' => 'Ada Laporan',
            'jenis' => 'Pengabdian',
            'biaya' => '5058500',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.D02.003',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-02-17'),
            'keterangan' => 'Pengabdian Pelatihan Persiapan OLIMPIADE Sains Komputer SMA BOPKRI I Yogyakarta',
            'waktu' => Carbon::parse('2020-02-29'),
            'bukti' => 'Ada Laporan',
            'jenis' => 'Pengabdian',
            'biaya' => '2500000',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.028.2',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-05-18'),
            'keterangan' => 'Peserta Seminar The APTIKOM Webinar Series',
            'waktu' => Carbon::parse('2020-05-19'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.032.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-06-02'),
            'keterangan' => 'Peserta Seminar The APTIKOM Webinar Series',
            'waktu' => Carbon::parse('2020-06-06'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.034',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-06-08'),
            'keterangan' => 'Peserta Seminar of Intelligent System 2020',
            'waktu' => Carbon::parse('2020-06-12'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.052.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-08-14'),
            'keterangan' => 'Peserta Tim Webinar Computer Vison in The World Development',
            'waktu' => Carbon::parse('2020-08-14'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.059.4',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-08-19'),
            'keterangan' => 'Peserta Tim Elseviers Empower Your Research Journey Webinar',
            'waktu' => Carbon::parse('2020-08-24'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.059.3',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-08-19'),
            'keterangan' => 'Peserta Tim Webinar Memulai Sebuah Penelitian yang Baik',
            'waktu' => Carbon::parse('2020-08-24'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.059.6',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-08-24'),
            'keterangan' => 'Peserta Tim Webinar The Future Gaming Industry',
            'waktu' => Carbon::parse('2020-08-25'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.064',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-09-04'),
            'keterangan' => 'Peserta Tim Webinar Menjadi Pendidik Masa Depan',
            'waktu' => Carbon::parse('2020-09-05'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.073.2',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-10-22'),
            'keterangan' => 'Penulis Artikel di 2020 Asia Conference on Computers and Communications (ACCC)',
            'waktu' => Carbon::parse('2020-12-22'),
            'bukti' => '',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.080.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-11-23'),
            'keterangan' => 'Penulis Artikel Jurnal Internasional  IJCTT Vol.69 Issue.2 Februari 2021',
            'waktu' => Carbon::parse('2021-01-31'),
            'bukti' => 'Copy Artikel',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2020.FTI.J05.086',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2020-12-07'),
            'keterangan' => 'Panitia IEEE/IIAI/AIT 2020',
            'waktu' => Carbon::parse('2020-12-20'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.015.7',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-02-23'),
            'keterangan' => 'Peserta Webinar Bangkit Setelah Pandemi Covid-19 Dengan Big Data by ITTP Purwokerto',
            'waktu' => Carbon::parse('2021-02-26'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.016.2',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-03-01'),
            'keterangan' => 'Peserta Mengikuti Bioprocess Engineering by FTI ITB Bandung',
            'waktu' => Carbon::parse('2021-03-08'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.026',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-03-29'),
            'keterangan' => 'Peserta Webinar by SEVIMA',
            'waktu' => Carbon::parse('2021-03-30'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.026',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-03-29'),
            'keterangan' => 'Tim Webinar Membangun Kurikulum Kampus Merdeka by SEVIMA',
            'waktu' => Carbon::parse('2021-03-30'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.D.02.013.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-04-06'),
            'keterangan' => 'Pengabdian IbM Pendampingan Penyusunan Buku Panduan Materi Ajar TIK di SMA Budya Wacana',
            'waktu' => Carbon::parse('2021-06-06'),
            'bukti' => 'Ada Laporan',
            'jenis' => 'Pengabdian',
            'biaya' => 4560000,
            'sinta' => 'Hardcopy',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.037',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-04-16'),
            'keterangan' => 'Peserta Workshop by LPAIP',
            'waktu' => Carbon::parse('2021-04-19'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.041',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-04-26'),
            'keterangan' => 'Tim Peserta Webinar by SEVIMA',
            'waktu' => Carbon::parse('2021-04-27'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.041',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-04-26'),
            'keterangan' => 'Tim Peserta Webinar Nasional Strategi PT Menghadapi Kuliah Tatap Muka by SEVIMA',
            'waktu' => Carbon::parse('2021-04-27'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.046',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-05-05'),
            'keterangan' => 'Peserta Webinar Opelantikan Pengurus Pusat IndoCEISS Periode 2021-2025',
            'waktu' => Carbon::parse('2021-05-08'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.051',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-05-21'),
            'keterangan' => 'Peserta Open House & Kuliah Umum Magister Ilmu Komputer UGM',
            'waktu' => Carbon::parse('2021-05-24'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.059.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-07-08'),
            'keterangan' => 'Penulis Jurnal BUANA Informatika Vol.12 No.2 Oktober 2021',
            'waktu' => Carbon::parse('2021-09-08'),
            'bukti' => 'Copy Artikel',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => 'Sinta 3',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.071.4',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-08-04'),
            'keterangan' => 'Peserta Webinar Seri #2 E-Book Open Access by LIPI',
            'waktu' => Carbon::parse('2021-08-05'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.073.4',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-08-09'),
            'keterangan' => 'Peserta Webinar Penelitian dan HAKI by Direktorat Kementrian Agama',
            'waktu' => Carbon::parse('2021-08-16'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.074.4',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-08-18'),
            'keterangan' => 'Peserta Workshop HaKI by Institute Sepuluh November',
            'waktu' => Carbon::parse('2021-08-18'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.076.3',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-08-20'),
            'keterangan' => 'Peserta Webinar Nasional Leaders Talk SEVIMA',
            'waktu' => Carbon::parse('2021-08-24'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.079.2',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-08-23'),
            'keterangan' => 'Peserta Webinar Accelerating Innovation & Enterpreneurship by UII',
            'waktu' => Carbon::parse('2021-08-24'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.D02.044',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-09-22'),
            'keterangan' => 'Peserta Pemakalah Semnas Pengabdian Masyarakat ke-6 by LPPM UKDW',
            'waktu' => Carbon::parse('2021-09-23'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Pengabdian',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.098.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-09-24'),
            'keterangan' => 'Peserta Workshop by SAINS ',
            'waktu' => Carbon::parse('2021-09-25'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2021.FTI.J05.123',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2021-11-15'),
            'keterangan' => 'Peserta Live Webinar Drafting Paten by Dirjen KIKH & Ham RI',
            'waktu' => Carbon::parse('2021-11-18'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.022.2',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-03-02'),
            'keterangan' => 'Peserta Webinar Smart Contract by UAJY',
            'waktu' => Carbon::parse('2022-03-02'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.041',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-04-06'),
            'keterangan' => 'Peserta Webinar Series INFOKOM by APTIKOM',
            'waktu' => Carbon::parse('2022-04-07'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.D02.024',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-04-21'),
            'keterangan' => 'Pengabdian Pembicara Webinar Karir sebagai Game Developer',
            'waktu' => Carbon::parse('2022-04-23'),
            'bukti' => 'Permohonan',
            'jenis' => 'Pengabdian',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.058.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-04-25'),
            'keterangan' => 'Peserta Seminar Automatic Realtime BasketballActivity',
            'waktu' => Carbon::parse('2022-04-29'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.D02.025',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-05-17'),
            'keterangan' => 'Pengabdian sebagai Pembicara Pelatihan Stube-HEMAT Yogyakarta',
            'waktu' => Carbon::parse('2022-05-21'),
            'bukti' => 'Permohonan',
            'jenis' => 'Pengabdian',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.071',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-05-23'),
            'keterangan' => 'Penulis Artikel Prosiding SINTaKS 2022',
            'waktu' => Carbon::parse('2022-07-23'),
            'bukti' => '',
            'jenis' => 'Publikasi',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.077.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-06-06'),
            'keterangan' => 'Peserta Webinar Strategi Peningkatan PMB & Prestasi Kampus',
            'waktu' => Carbon::parse('2022-06-09'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.105',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-07-11'),
            'keterangan' => 'Penulis Artikel Jurnal Buana Informatika Vo.13 No.2 OKtober 2022',
            'waktu' => Carbon::parse('2022-09-11'),
            'bukti' => 'Copy Artikel',
            'jenis' => 'Publikasi',
            'biaya' => 'Sinta 3',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.D02.049',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-09-12'),
            'keterangan' => 'Pengabian IbM Pendampingan Penyusunan Buku Ajar Computational di SMA Budya Wacana Yogyakarta
            ',
            'waktu' => Carbon::parse('2022-12-31'),
            'bukti' => '',
            'jenis' => 'Pengabdian',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.139',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-09-22'),
            'keterangan' => 'Peserta Webinar Nasional LAM-PTKes by SEVIMA',
            'waktu' => Carbon::parse('2022-09-22'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.152',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-10-06'),
            'keterangan' => 'HAK CIPTA Program Komputer berjudul "KLASGEN Versi 1.0',
            'waktu' => Carbon::parse('2022-12-06'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.161',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-10-25'),
            'keterangan' => 'Peserta Seminar diselenggarakan oleh Lembaga Pengembangan Akademik dan Inovasi Pembelajaran (LPAIP)',
            'waktu' => Carbon::parse('2022-10-25'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.160',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-10-27'),
            'keterangan' => 'Peserta Seminar besama Prof. Tokuro Matsuo dari Jepang',
            'waktu' => Carbon::parse('2022-10-27'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.162',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-10-28'),
            'keterangan' => 'Peserta Webinar diselenggarakan oleh Istitut Tehnologi Tangerang Selatan (ITTS) secara online zoom',
            'waktu' => Carbon::parse('2022-10-29'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.170',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-11-23'),
            'keterangan' => 'Anggota IAENG 2022',
            'waktu' => Carbon::parse('2022-11-23'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.174.2',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-11-30'),
            'keterangan' => 'Narasumber Webinar Online Legalitas Program Komputer Bagi Kegiatan Belajar Mengajar, Penelitian & Pengabdian Masyarakat',
            'waktu' => Carbon::parse('2023-01-14'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2022.FTI.J05.183',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2022-12-09'),
            'keterangan' => 'Peserta Pelatihan Train of The Trainer Monsoonsim ',
            'waktu' => Carbon::parse('2022-12-15'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2023.FTI.J05.036',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2023-03-06'),
            'keterangan' => 'Peserta Diskusi Kelompok Terpumpun II Dinas Kebudayaan DIY',
            'waktu' => Carbon::parse('2023-03-17'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2023.FTI.J05.039.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2023-03-16'),
            'keterangan' => 'Peserta Webinar Nasional  via Neofeeder 2.0 by SEVIMA ',
            'waktu' => Carbon::parse('2023-03-16'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2023.FTI.J05.047.1',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2023-04-04'),
            'keterangan' => 'Peserta Webinar Nasional Strategi Sukses Mengamankan Data Sistem Akademik dan Website Kampus',
            'waktu' => Carbon::parse('2023-04-04'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2023.FTI.J05.054',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2023-05-04'),
            'keterangan' => 'Peserta Webinar Nasional bertema Strategi Beban Kerja Dosen (BKD) Tahun 2023 by SEVIMA
            ',
            'waktu' => Carbon::parse('2023-05-04'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2023.FTI.J05.059',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2023-05-22'),
            'keterangan' => 'Peserta Pra Kongres Bahasa Jawa (KBJ) VII di Solo',
            'waktu' => Carbon::parse('2023-05-23'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2023.FTI.J05.060',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2023-05-23'),
            'keterangan' => 'Anggota IAENG 2023',
            'waktu' => Carbon::parse('2023-12-31'),
            'bukti' => '',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2023.FTI.J05.067',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2023-06-08'),
            'keterangan' => 'Anggota IAENG 2023',
            'waktu' => Carbon::parse('2023-06-08'),
            'bukti' => 'Sertifikat',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2023.FTI.J05.071.2',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2023-06-22'),
            'keterangan' => 'Narasumber Rapat Paripurna di DPRD DIY',
            'waktu' => Carbon::parse('2023-06-26'),
            'bukti' => 'Undangan',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);

        SuratTugas::create([
            'nomor' => '2023.FTI.J05.077',
            'dosen_id' => 24,
            'tanggal' => Carbon::parse('2023-07-11'),
            'keterangan' => 'Narasumber Pengenalan Lingkungan Sekolah (MPLS) SMA Masehi Kudus 
            ',
            'waktu' => Carbon::parse('2023-07-18'),
            'bukti' => 'Undangan',
            'jenis' => 'Penunjang',
            'biaya' => '',
            'sinta' => '',
        ]);
    }
}
