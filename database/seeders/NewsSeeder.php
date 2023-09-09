<?php

    namespace Database\Seeders;

    use App\Models\Taggable;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class NewsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $newsSeeder = [
                1 => [
                    1
                ],
                2 => [
                    1
                ],
                3 => [
                    1
                ],
                4 => [
                    1
                ],
                5 => [
                    1
                ],
                6 => [
                    2
                ],
                7 => [
                    2
                ],
                8 => [
                    2
                ],
                9 => [
                    2
                ],
                11 => [
                    2
                ]
            ];
            foreach ($newsSeeder as $postId => $categoryIds) {
                // Cast post ID to an integer
                $postId = (int)$postId;

                foreach ($categoryIds as $categoryId) {
                    // Cast category ID to an integer
                    $categoryId = (int)$categoryId;

                    DB::table('cats4news')->insert([
                        'news_id' => $postId,
                        'category_id' => $categoryId,
                        'created_at' => now('Europe/Kiev'),
                        'updated_at' => now('Europe/Kiev')
                    ]);
                }
            }

        }
    }
