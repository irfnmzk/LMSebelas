<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewResultAllQuiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW result_all_quiz AS
                            select
                              anggota_kelas.*,
                              hasil_quiz.nilai,
                              hasil_quiz.jumlah_benar,
                              hasil_quiz.waktu_mulai,
                              hasil_quiz.waktu_selesai,
                              hasil_quiz.total_waktu,
                              hasil_quiz.quiz_id,
                              users.name
                            from
                              hasil_quiz
                              left join anggota_kelas on anggota_kelas.id = hasil_quiz.creator_id
                              left join users on users.id = anggota_kelas.user_id
                        ' );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement( 'DROP VIEW result_all_quiz' );
    }
}
