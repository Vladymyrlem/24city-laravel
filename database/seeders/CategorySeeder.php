<?php

    use Illuminate\Database\Seeder;
    use App\Models\CompanyCategory;
    use Illuminate\Support\Facades\DB;

    // Import your Category model

    class CategorySeeder extends Seeder
    {
        public function run()
        {
            // Fetch all categories from the "categories" table and create a mapping
            $categoryMapping = CompanyCategory::pluck('category_id', 'name')->all();

            // Assuming your existing table is named "your_table_name"
            $data = DB::table('companies')->select('id', 'company_category')->get();

            foreach ($data as $row) {
                $categories = explode('|', $row->company_category);
                $categoryIds = [];

                foreach ($categories as $categoryName) {
                    // Check if the category name exists in the mapping
                    if (isset($categoryMapping[$categoryName])) {
                        $categoryIds[] = $categoryMapping[$categoryName];
                    }
                }

                // Convert the category IDs array to a pipe-separated string
                $updatedCategoriesList = implode(' | ', $categoryIds);

                // Update the row with the updated category list
                DB::table('companies')
                    ->where('id', $row->id)
                    ->update(['company_category' => $updatedCategoriesList]);
            }
        }
    }
