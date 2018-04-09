<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Guru',
        	'email' => 'guru@gmail.com',
        	'password' => bcrypt('persib'),
        ]);

        DB::table('users')->insert([
        	'name' => 'Siswa',
        	'email' => 'siswa@gmail.com',
        	'password' => bcrypt('persib'),
        ]);

        DB::table('users')->insert([
        	'name' => 'Admin',
        	'email' => 'admin@gmail.com',
            'password' => bcrypt('persib'),
            'role' => 'admin',
        ]);
    }
}
