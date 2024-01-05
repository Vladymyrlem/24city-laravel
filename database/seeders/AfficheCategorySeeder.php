<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AfficheCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $affiche_seeder = [
            1 => [2],
            2 => [4],
            3 => [4],
            4 => [4],
            5 => [4],
            6 => [4],
            7 => [4],
            8 => [2],
            10 => [2],
            11 => [2],
            12 => [2],
            13 => [2],
            14 => [2],
            15 => [2],
            16 => [5, 7],
            17 => [5, 7],
            18 => [6, 3],
            19 => [2],
            20 => [2],
            21 => [2],
            22 => [2],
            23 => [7, 2, 4],
            24 => [2],
            25 => [2],
            26 => [2, 4],
            27 => [2],
            28 => [2],
            29 => [2, 4],
            30 => [2, 4],
            31 => [5],
            32 => [2],
            33 => [2, 4],
            34 => [7, 3],
            35 => [7, 2],
            36 => [7, 2],
            37 => [7, 6],
            38 => [3],
            39 => [7, 6],
            40 => [7, 6],
            41 => [7, 3],
            42 => [7, 2],
            43 => [7, 2],
            44 => [7, 2],
            46 => [7],
            47 => [7, 6],
            48 => [7, 2],
            49 => [2]


        ];
        foreach ($affiche_seeder as $postId => $categoryIds) {
            // Cast post ID to an integer
            $postId = (int)$postId;

            foreach ($categoryIds as $categoryId) {
                // Cast category ID to an integer
                $categoryId = (int)$categoryId;

                // Check if the real_estate_id exists in the real_estate table
                $realEstateExists = DB::table('affiche')->where('id', $postId)->exists();

                if ($realEstateExists) {
                    DB::table('cats4affiche')->insert([
                        'affiche_id' => $postId,
                        'category_id' => $categoryId,
                        'created_at' => now('Europe/Kiev'),
                        'updated_at' => now('Europe/Kiev')
                    ]);
                } else {
                    // Handle the case where the real_estate_id does not exist in the real_estate table
                    // You can log an error or take appropriate action here
                }
            }
        }
    }
}
