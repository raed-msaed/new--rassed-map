<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorygradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorygrades')->delete();
        $categorygrades = array(
            array('id' => 1, 'name' => "ضابط"),
            array('id' => 2, 'name' => "ضابط صف"),
            array('id' => 3, 'name' => "رجل جيش"),
        );
        DB::table('categorygrades')->insert($categorygrades);
    }
}
