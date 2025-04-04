<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Type_missionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_missions')->delete();
        $organeaccords = array(
            array('name' => "عادي"),
            array('name' => "عاجل"),
            array('name' => "فوري"),
        );
        DB::table('type_missions')->insert($organeaccords);
    }
}
