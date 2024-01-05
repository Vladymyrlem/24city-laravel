<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $real_estate_seeder = [
            1 => [10, 15],
            2 => [3, 10, 16, 18],
            3 => [3, 10, 15],
            4 => [10, 16],
            5 => [10, 15],
            6 => [3, 8, 10, 16, 18],
            7 => [10, 16, 18]
        ];
        foreach ($real_estate_seeder as $postId => $categoryIds) {
            // Cast post ID to an integer
            $postId = (int)$postId;

            foreach ($categoryIds as $categoryId) {
                // Cast category ID to an integer
                $categoryId = (int)$categoryId;

                // Check if the real_estate_id exists in the real_estate table
                $realEstateExists = DB::table('real_estate')->where('id', $postId)->exists();

                if ($realEstateExists) {
                    DB::table('cats4realestate')->insert([
                        'real_estate_id' => $postId,
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
