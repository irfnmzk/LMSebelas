<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreAnggotaKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared( 'CREATE PROCEDURE storeAnggotaKelas(IN id_kelas VARCHAR(50), id_user VARCHAR(10))
            BEGIN
                INSERT INTO anggota_kelas(kelas_id, user_id, created_at, updated_at) 
                values(id_kelas, id_user,now(),now());
            END;' );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared( 'DROP PROCEDURE IF EXIST storeAnggotaKelas' );
    }
}
