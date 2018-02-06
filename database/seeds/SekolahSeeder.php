<?php

use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	 [
              'nama'  => 'SMKN 11 Bandung',
              
            ],
            [
              'nama'  => 'SMAN 12 Bandung',
            ],
            [
              'nama'  => 'SMKN 1 Cimahi',
            ],
            [
              'nama'  => 'SMAN 1 Bandung',
            ],
            [
              'nama'  => 'SMKN 7 Bandung',
            ],
            [
              'nama'  => 'SMAN 2 Cimahi',
            ],
            [
              'nama'  => 'SMPN 47 Bandung',
            ],
            [
              'nama'  => 'SMKN 13 Bandung',
            ],
            [
              'nama'  => 'SMPN 1 Bandung',
            ],
            [
              'nama'  => 'SMK Budi Cendikia',
            ],
            [
              'nama'  => 'SMAN 3 Bandung',
            ],
            [
              'nama'  => 'SMAN 4 Bandung',
            ],
            [
              'nama'  => 'SMAN 5 Bandung',
            ],
            [
              'nama'  => 'SMKN 12 Bandung',
            ],
        ]);
    }
}
