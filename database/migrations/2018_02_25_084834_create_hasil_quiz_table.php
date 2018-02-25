<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_quiz', function (Blueprint $table) {
            $table->increments('id');
            $table->string('creator_id');
            $table->string('quiz_id');
            $table->integer('jumlah_benar')->nullable();
            $table->string('nilai')->nullable();
            $table->datetime('waktu_mulai');
            $table->datetime('waktu_selesai')->nullable();
            $table->integer('total_waktu')->nullable();
            $table->string('status')->default("Sedang dikerjakan");
            $table->string('ip_address');
            $table->string('user_agent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_quiz');
    }
}
