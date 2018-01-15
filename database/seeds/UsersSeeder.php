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
        	'name' => 'Irfan Marzuki',
        	'email' => 'ragnaboyx@gmail.com',
        	'password' => bcrypt('persib'),
        ]);
    }
}
