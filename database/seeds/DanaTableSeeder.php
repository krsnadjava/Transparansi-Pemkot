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
        /*========= DINAS =========*/

        /* DISDIK */
        // Belanja
        DB::table('dana')->insert([
            'kode' => "1.01 . 1.01.01 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 1875954198733,
            'tahun' => 2014,
            'level' => 1,
            'lembaga_id' => 1,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.01 . 1.01.01 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 1572323694464,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 1,
            'dana_id' => 1,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.01 . 1.01.01 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 1572323694464,
            'tahun' => 2014,
            'level' => 3,
            'lembaga_id' => 1,
            'dana_id' => 2,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.01 . 1.01.01 . 01.01 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 303630504269,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 1,
            'dana_id' => 1,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.01 . 1.01.01 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 1913422711986,
            'tahun' => 2015,
            'level' => 1,
            'lembaga_id' => 1,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.01 . 1.01.01 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 1698923319688,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 1,
            'dana_id' => 5,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.01 . 1.01.01 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 1698923319688,
            'tahun' => 2015,
            'level' => 3,
            'lembaga_id' => 1,
            'dana_id' => 6,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.01 . 1.01.01 . 01.01 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 214499392297,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 1,
            'dana_id' => 5,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);

        /* DISKES */
        // Belanja
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 280751952803,
            'tahun' => 2014,
            'level' => 1,
            'lembaga_id' => 2,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 90030560100,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 2,
            'dana_id' => 9,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 90030560100,
            'tahun' => 2014,
            'level' => 3,
            'lembaga_id' => 2,
            'dana_id' => 10,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 190721392703,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 2,
            'dana_id' => 9,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 333472104941,
            'tahun' => 2015,
            'level' => 1,
            'lembaga_id' => 2,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 95963468447,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 2,
            'dana_id' => 13,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 95963468447,
            'tahun' => 2015,
            'level' => 3,
            'lembaga_id' => 2,
            'dana_id' => 14,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 237508636494,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 2,
            'dana_id' => 13,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        // Pendapatan
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 00.00 . 4",
            'uraian' => "Pendapatan",
            'nilai' => 50341575500,
            'tahun' => 2014,
            'level' => 1,
            'lembaga_id' => 2,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 00.00 . 4.1",
            'uraian' => "Pendapatan Asli Daerah",
            'nilai' => 50341575500,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 2,
            'dana_id' => 17,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 00.00 . 4",
            'uraian' => "Pendapatan",
            'nilai' => 63200000000,
            'tahun' => 2015,
            'level' => 1,
            'lembaga_id' => 2,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.02 . 1.02.01 . 00.00 . 4.1",
            'uraian' => "Pendapatan Asli Daerah",
            'nilai' => 63200000000,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 2,
            'dana_id' => 19,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);

        /* Kecamatan RancaAsri */
        // Belanja
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 10702645000,
            'tahun' => 2014,
            'level' => 1,
            'lembaga_id' => 55,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 55,
            'dana_id' => 21,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 3,
            'lembaga_id' => 55,
            'dana_id' => 22,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 5949200000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 55,
            'dana_id' => 21,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 17306288343,
            'tahun' => 2015,
            'level' => 1,
            'lembaga_id' => 55,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 55,
            'dana_id' => 25,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 3,
            'lembaga_id' => 55,
            'dana_id' => 26,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 12352951571,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 55,
            'dana_id' => 25,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);

        /* Kecamatan BuahBatu */
        // Belanja
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 10702645000,
            'tahun' => 2014,
            'level' => 1,
            'lembaga_id' => 56,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 56,
            'dana_id' => 29,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 3,
            'lembaga_id' => 56,
            'dana_id' => 30,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 5949200000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 56,
            'dana_id' => 29,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 17306288343,
            'tahun' => 2015,
            'level' => 1,
            'lembaga_id' => 56,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 56,
            'dana_id' => 33,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 3,
            'lembaga_id' => 56,
            'dana_id' => 34,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 12352951571,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 56,
            'dana_id' => 33,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);

        /* RSUD */
        // Belanja
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 10702645000,
            'tahun' => 2014,
            'level' => 1,
            'lembaga_id' => 5,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 5,
            'dana_id' => 37,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 3,
            'lembaga_id' => 5,
            'dana_id' => 38,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 5949200000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 5,
            'dana_id' => 37,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 17306288343,
            'tahun' => 2015,
            'level' => 1,
            'lembaga_id' => 5,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 5,
            'dana_id' => 41,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 3,
            'lembaga_id' => 5,
            'dana_id' => 42,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 12352951571,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 5,
            'dana_id' => 41,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);

        /* RSUD */
        // Belanja
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 10702645000,
            'tahun' => 2014,
            'level' => 1,
            'lembaga_id' => 6,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 6,
            'dana_id' => 45,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 3,
            'lembaga_id' => 6,
            'dana_id' => 46,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 5949200000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 6,
            'dana_id' => 45,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 17306288343,
            'tahun' => 2015,
            'level' => 1,
            'lembaga_id' => 6,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 6,
            'dana_id' => 49,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 3,
            'lembaga_id' => 6,
            'dana_id' => 50,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 12352951571,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 6,
            'dana_id' => 49,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);

        /* RSUD */
        // Belanja
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 10702645000,
            'tahun' => 2014,
            'level' => 1,
            'lembaga_id' => 24,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 24,
            'dana_id' => 53,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 3,
            'lembaga_id' => 24,
            'dana_id' => 54,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 5949200000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 24,
            'dana_id' => 53,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 17306288343,
            'tahun' => 2015,
            'level' => 1,
            'lembaga_id' => 24,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 24,
            'dana_id' => 57,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 3,
            'lembaga_id' => 24,
            'dana_id' => 58,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 12352951571,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 24,
            'dana_id' => 57,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);

        /* RSUD */
        // Belanja
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 10702645000,
            'tahun' => 2014,
            'level' => 1,
            'lembaga_id' => 25,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 25,
            'dana_id' => 61,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4753445000,
            'tahun' => 2014,
            'level' => 3,
            'lembaga_id' => 25,
            'dana_id' => 62,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 5949200000,
            'tahun' => 2014,
            'level' => 2,
            'lembaga_id' => 25,
            'dana_id' => 61,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5",
            'uraian' => "Belanja",
            'nilai' => 17306288343,
            'tahun' => 2015,
            'level' => 1,
            'lembaga_id' => 25,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1",
            'uraian' => "Belanja Tidak Langsung",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 25,
            'dana_id' => 65,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 00.00 . 5.1.1",
            'uraian' => "Belanja Pegawai",
            'nilai' => 4953336772,
            'tahun' => 2015,
            'level' => 3,
            'lembaga_id' => 25,
            'dana_id' => 66,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('dana')->insert([
            'kode' => "1.20 . 1.20.34 . 01.02 . 5.2",
            'uraian' => "Belanja Langsung",
            'nilai' => 12352951571,
            'tahun' => 2015,
            'level' => 2,
            'lembaga_id' => 25,
            'dana_id' => 65,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
