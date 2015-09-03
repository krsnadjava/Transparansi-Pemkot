<?php

use Illuminate\Database\Seeder;

class LembagaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lembaga')->insert([
        	'nama' => "Dinas Pendidikan",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Kesehatan",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "RSUD BLUD",
            'golongan' => "bumd",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "RSUDD",
            'golongan' => "bumd",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "RSKIA",
            'golongan' => "bumd",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "RSKIA BLUD",
            'golongan' => "bumd",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "RSKGM",
            'golongan' => "bumd",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "RSKGM BLUD",
            'golongan' => "bumd",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Bina Marga",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Kebakaran",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "BAPPEDA",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Perhubungan",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "BPLH",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Kependudukan",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "BPPKB",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Sosial",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Tenaga Kerja",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Koperasi",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "BPPT",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Pemuda dan Olah Raga",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "BKBPM",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Satpol PP",
            'golongan' => "lain-lain",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "DPRD",
            'golongan' => "lain-lain",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kepala Daerah",
            'golongan' => "lain-lain",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Sekretariat Daerah",
            'golongan' => "lain-lain",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Sekretariat Dewan",
            'golongan' => "lain-lain",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "DPKAD SKPD",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "DPKAD PPKD",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Inspektorat Kota",
            'golongan' => "lain-lain",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Pelayanan Pajak",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Badan Kepegawaian Daerah",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Sukasari",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Cidadap",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Sukajadi",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Cicendo",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Andir",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Coblong",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Bandung Wetan",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Sumur Bandung",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Cibeunying Kidul",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Cibeunying Kaler",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Astanaanyar",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Bojongloa Kaler",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Bojongloa Kidul",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Babakan Ciparay",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Bandung Kulon",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Regol",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Lengkong",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Batununggal",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Ujungberung",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Kiaracondong",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Arcamanik",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Cibiru",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Antapani",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Rancasari",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Buahbatu",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Bandung Kidul",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Gedebage",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Panyileukan",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Cinambo",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kecamatan Mandalajati",
            'golongan' => "kecamatan",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Kantor Perpustakaan",
            'golongan' => "bumd",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Komunikasi",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Pertanian",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
        DB::table('lembaga')->insert([
            'nama' => "Dinas Pariwisata",
            'golongan' => "dinas",
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
