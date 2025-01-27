<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('icons')->delete();
        $icons = array(
            array('id' => 1, 'name' => "icon1", 'path' => "icons/icon (1).ico"),
            array('id' => 2, 'name' => "icon2", 'path' => "icons/icon (2).ico"),
            array('id' => 3, 'name' => "icon3", 'path' => "icons/icon (3).ico"),
            array('id' => 4, 'name' => "icon4", 'path' => "icons/icon (4).ico"),
            array('id' => 5, 'name' => "icon5", 'path' => "icons/icon (5).ico"),
            array('id' => 6, 'name' => "icon6", 'path' => "icons/icon (6).ico"),
            array('id' => 7, 'name' => "icon7", 'path' => "icons/icon (7).ico"),
            array('id' => 8, 'name' => "icon8", 'path' => "icons/icon (8).ico"),
            array('id' => 9, 'name' => "icon9", 'path' => "icons/icon (9).ico"),
            array('id' => 10, 'name' => "icon10", 'path' => "icons/icon (10).ico"),
            array('id' => 11, 'name' => "icon11", 'path' => "icons/icon (11).ico"),
            array('id' => 12, 'name' => "icon12", 'path' => "icons/icon (12).ico"),
            array('id' => 13, 'name' => "icon13", 'path' => "icons/icon (13).ico"),
            array('id' => 14, 'name' => "icon14", 'path' => "icons/icon (14).ico"),
            array('id' => 15, 'name' => "icon15", 'path' => "icons/icon (15).ico"),
            array('id' => 16, 'name' => "icon16", 'path' => "icons/icon (16).ico"),
            array('id' => 17, 'name' => "icon17", 'path' => "icons/icon (17).ico"),
            array('id' => 18, 'name' => "icon18", 'path' => "icons/icon (18).ico"),
            array('id' => 19, 'name' => "icon19", 'path' => "icons/icon (19).ico"),
            array('id' => 20, 'name' => "icon20", 'path' => "icons/icon (20).ico"),
            array('id' => 21, 'name' => "icon21", 'path' => "icons/icon (21).ico"),
            array('id' => 22, 'name' => "icon22", 'path' => "icons/icon (22).ico"),
            array('id' => 23, 'name' => "icon23", 'path' => "icons/icon (23).ico"),
            array('id' => 24, 'name' => "icon24", 'path' => "icons/icon (24).ico"),
            array('id' => 25, 'name' => "icon25", 'path' => "icons/icon (25).ico"),
            array('id' => 26, 'name' => "icon26", 'path' => "icons/icon (26).ico"),
            array('id' => 27, 'name' => "icon27", 'path' => "icons/icon (27).ico"),
            array('id' => 28, 'name' => "icon28", 'path' => "icons/icon (28).ico"),
            array('id' => 29, 'name' => "icon29", 'path' => "icons/icon (29).ico"),
        );
        DB::table('icons')->insert($icons);
    }
}
