<?php

use Illuminate\Database\Seeder;

class TagDanaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dana_tag')->insert([
        	'dana_id' => 1,
        	'tag_id' => 1
        ]);
        DB::table('dana_tag')->insert([
        	'dana_id' => 1,
        	'tag_id' => 2
        ]);
        DB::table('dana_tag')->insert([
        	'dana_id' => 1,
        	'tag_id' => 3
        ]);
        DB::table('dana_tag')->insert([
        	'dana_id' => 1,
        	'tag_id' => 4
        ]);
        DB::table('dana_tag')->insert([
        	'dana_id' => 2,
        	'tag_id' => 1
        ]);
    }
}
