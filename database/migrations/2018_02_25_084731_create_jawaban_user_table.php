<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('creator_id');
            $table->string('soal_id');
            $table->string('hasil_id');
            $table->string('jawaban_id');
            $table->integer('benar')->default(0);
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
        Schema::dropIfExists('jawaban_user');
    }
}
