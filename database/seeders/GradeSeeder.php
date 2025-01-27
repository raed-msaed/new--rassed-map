<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->delete();
        $grades = array(
            array('name' => "فريق أول", 'categorygrade_id' => 1),
            array('name' => "فريق", 'categorygrade_id' => 1),
            array('name' => "أمير لواء", 'categorygrade_id' => 1),
            array('name' => "عميد", 'categorygrade_id' => 1),
            array('name' => "عقيد", 'categorygrade_id' => 1),
            array('name' => "مقدم", 'categorygrade_id' => 1),
            array('name' => "رائد", 'categorygrade_id' => 1),
            array('name' => "نقيب", 'categorygrade_id' => 1),
            array('name' => "ملازم أول", 'categorygrade_id' => 1),
            array('name' => "ملازم", 'categorygrade_id' => 1),
            array('name' => "وكيل أعلى", 'categorygrade_id' => 2),
            array('name' => "وكيل أول", 'categorygrade_id' => 2),
            array('name' => "وكيل", 'categorygrade_id' => 2),
            array('name' => "عريف أول", 'categorygrade_id' => 2),
            array('name' => "عريف", 'categorygrade_id' => 2),
            array('name' => "رقيب أول", 'categorygrade_id' => 3),
            array('name' => "رقيب", 'categorygrade_id' => 3),
            array('name' => "جندي أول", 'categorygrade_id' => 3),
            array('name' => "جندي متطوع", 'categorygrade_id' => 3),
        );
        DB::table('grades')->insert($grades);
    }
}
