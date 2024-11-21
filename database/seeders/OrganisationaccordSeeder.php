<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganisationaccordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organisationaccords')->delete();
        $organeaccords = array(
            array('name' => "أركان جيش البحر"),
            array('name' => "أركان جيش البر"),
            array('name' => "أركان جيش الطيران"),
            array('name' => "وكالة الإستخبارات والأمن للدفاع"),
        );
        DB::table('organisationaccords')->insert($organeaccords);
    }
}
