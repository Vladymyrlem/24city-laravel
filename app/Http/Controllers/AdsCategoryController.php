<?php

    namespace App\Http\Controllers;

    use App\Models\Ads\AdsCategory;
    use Illuminate\Http\Request;

    class AdsCategoryController extends Controller
    {
        public function index()
        {
            $ads = AdsCategory::all(); // Replace with your logic to fetch categories
            return view('pages.ads.ads-category', compact('ads'));
        }

        public function show($id)
        {
            $adsPerPage = 10; // Adjust the number of companies per page as needed
            $category = AdsCategory::orderBy('created_at', 'asc')->findOrFail($id); // Replace with your logic to retrieve a category by ID
            $ads = $category->ads()->paginate($adsPerPage);
            $subcategoryCounts = $this->calculateAdsCounts($category->subcategories);
            return view('pages.ads.ads-category-show', compact('category', 'subcategoryCounts', 'ads'));
        }

        private function calculateAdsCounts($subcategories)
        {
            $counts = [];
            if (!is_null($subcategories)) {

                foreach ($subcategories as $subcategory) {
                    $counts[$subcategory->id] = $subcategory->company->count();

                    if ($subcategory->subcategories->count() > 0) {
                        $counts = array_merge($counts, $this->calculateAdsCounts($subcategory->subcategories));
                    }
                }
            }
            return $counts;
        }
    }
