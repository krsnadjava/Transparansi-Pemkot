<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag')->insert([
        	'nama' => "Belanja",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('tag')->insert([
        	'nama' => "Pendapatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('tag')->insert([
        	'nama' => "Pendapatan Asli Daerah",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('tag')->insert([
        	'nama' => "Belanja Tidak Langsung",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('tag')->insert([
        	'nama' => "Belanja Langsung",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
