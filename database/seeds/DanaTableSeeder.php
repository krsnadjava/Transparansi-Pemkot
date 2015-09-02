<?php

use Illuminate\Database\Seeder;

class DanaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dana')->insert([
        	'kode' => "1.02 . 1.02.01 . 00 . 00 . 4 . 1 . 2 . 01 . 01",
        	'uraian' => "Retribusi Pelayanan Kesehatan - Puskesmas",
        	'nilai' => 18200000000,
        	'tahun' => 2015,
        	'level' => 5,
        	'lembaga_id' => 2,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
        	'kode' => "1.01 . 1.01.01 . 00 . 00 . 5 . 1 . 1 . 01 . 01",
        	'uraian' => "Gaji Pokok PNS/Uang Representasi",
        	'nilai' => 757803002972,
        	'tahun' => 2015,
        	'level' => 5,
        	'lembaga_id' => 1,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
