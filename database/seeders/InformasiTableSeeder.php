<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformasiTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('informasi')->insert([
            'judul' => 'Program Kreativitas Mahasiswa (PKM)',
            'deskripsi1' => 'Program Kreativitas Mahasiswa adalah kegiatan untuk meningkatkan mutu peserta didik (mahasiswa) di perguruan tinggi agar kelak dapat menjadi anggota masyarakat yang memiliki kemampuan akademis dan/atau profesional yang dapat menerapkan, mengembangkan dan menyebarluaskan ilmu pengetahuan, teknologi dan/atau kesenian serta memperkaya budaya nasional.

            PKM diperuntukkan bagi mahasiswa Diploma 3 (D3); Diploma 4 (D4) atau Strata 1 (S1) di
            seluruh PT di bawah Kemendikbud-Ristek yang terdaftar di Pangkalan Data Pendidikan Tinggi
            (PDDikti) melalui penyediaan dana yang bersifat kompetitif, akuntabel dan transparan',
            'gambar1' => 'storage/images/image12.png',
            'deskripsi2' => 'Karakteristik Umum

            Topik PKM bebas dan tidak dibatasi. PKM dipersiapkan untuk mendorong mahasiswa dan
            dosen pendamping mendukung program MBKM dan untuk mencapai IKU. PKM dapat
            membantu mahasiswa ketika lulus akan mendapat pekerjaan yang layak, memperoleh
            pengalaman di luar kampus, memberi kesempatan kepada dosen pendamping untuk berkegiatan
            di luar kampus, dan hasil kerja dosen dapat digunakan oleh masyarakat. PKM mewadahi
            mahasiswa untuk dapat menumbuhkembangkan HOTS (Higher Order Thinking Skills),
            Creative Thinking dan Critical Thinking melalui implementasi filosofi Tri Dharma Perguruan
            Tinggi.
            
            Secara garis besar PKM dikelompokkan menjadi 2 (dua):
            
            1. PKM Pendanaan, terdiri dari 8 bidang PKM, yaitu PKM-RE; PKM-RSH; PKM-K; PKM-
            PM; PKM-PI; PKM-KC; PKM-KI; dan PKM-VGK;
            
            2. PKM Insentif, terdiri dari 2 bidang PKM, yaitu PKM-GFT dan PKM-AI.',
            'gambar2' => 'storage/images/image12.png'
        ]);
    }
}