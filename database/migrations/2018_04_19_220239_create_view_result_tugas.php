<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewResultTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( "CREATE VIEW result_tugas AS
                            SELECT users.name,users.role,tugas.id,COALESCE(jawaban_tugas.link, 'Belum mengumpulkan') AS link,COALESCE(nilai_tugas.nilai, 'Kosong') AS nilai FROM anggota_kelas LEFT JOIN users ON users.id = anggota_kelas.user_id LEFT JOIN jawaban_tugas ON jawaban_tugas.creator_id=anggota_kelas.id LEFT JOIN nilai_tugas ON nilai_tugas.jawaban_tugas_id = jawaban_tugas.id 
                            LEFT JOIN tugas ON tugas.id = jawaban_tugas.tugas_id
                        " );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement( 'DROP VIEW result_tugas' );
    }
}
