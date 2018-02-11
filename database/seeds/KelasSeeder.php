<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = \App\Kelas::create([
            'name' => 'RPL 1',
            'code' => 'QWERTY',
            'creator_id' => 1,
        ]);

        $materi = \App\Materi::create([
            'judul' => 'BAB 1',
            'deskripsi' => 'Menyelami database',
            'kelas_id' => $kelas->id,
            'creator_id' => 1,
        ]);

        $modul = \App\Modul::create([
            'judul' => 'Kegiatan Belajar 1',
            'materi_id' => $materi->id,
            'link' => public_path().'/pdf/pdf.pdf',
        ]);
    }
}
