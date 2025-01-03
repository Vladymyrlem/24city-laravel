<?php

    namespace App\Http\Controllers;

    use App\Models\News\MainNewsCategory;
    use Illuminate\Http\Request;

    class MainNewsCategoryController extends Controller
    {
        public function index()
        {
            $categories = MainNewsCategory::all(); // Replace with your logic to retrieve a category by ID
            return view('pages.main-news.main-news-category', compact('categories'));
        }

        public function show($id)
        {
            $adsPerPage = 10; // Adjust the number of companies per page as needed
            $category = MainNewsCategory::findOrFail($id);

            // Retrieve the posts associated with this category
            $news = $category->mainnews;

            return view('pages.main-news.main-news-category-show', compact('category', 'news'));
        }

        private function calculateAdsCounts($subcategories)
        {
            $counts = [];
            if (!is_null($subcategories)) {

                foreach ($subcategories as $subcategory) {
                    $counts[$subcategory->id] = $subcategory->mainnews->count();

                    if ($subcategory->subcategories->count() > 0) {
                        $counts = array_merge($counts, $this->calculateAdsCounts($subcategory->subcategories));
                    }
                }
            }
            return $counts;
        }
    }
