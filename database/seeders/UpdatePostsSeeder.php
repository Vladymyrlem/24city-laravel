<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class UpdatePostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvPath = public_path('MainNewsUpdate.csv');

        // Читання CSV-файлу
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        // Оновлення даних в базі даних
        foreach ($csv as $record) {
            $post = DB::table('mainnews')->where('title', $record['title'])->first();

            if ($post) {
                $publicationDate = !empty($record['date']) ? $record['date'] : null;

                DB::table('mainnews')
                    ->where('id', $post->id)
                    ->update(['created_at' => $publicationDate]);
            }
        }
    }
}
