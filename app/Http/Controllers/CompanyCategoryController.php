<?php

    namespace App\Http\Controllers;

    use App\Models\CompanyCategory;
    use Illuminate\Http\Request;

    class CompanyCategoryController extends Controller
    {
        public function index()
        {
            $categories = CompanyCategory::all(); // Replace with your logic to fetch categories
            return view('pages.company.company-category', compact('categories'));
        }

        public function show($id)
        {
            $companiesPerPage = 10; // Adjust the number of companies per page as needed
            $category = CompanyCategory::orderBy('created_at', 'asc')->findOrFail($id); // Replace with your logic to retrieve a category by ID
            $companies = $category->company()->paginate($companiesPerPage);
            $subcategoryCounts = $this->calculateCompanyCounts($category->subcategories);
            return view('pages.company.company-category-show', compact('category', 'companies', 'subcategoryCounts'));
        }

        private function calculateCompanyCounts($subcategories)
        {
            $counts = [];

            foreach ($subcategories as $subcategory) {
                $counts[$subcategory->id] = $subcategory->company->count();

                if ($subcategory->subcategories->count() > 0) {
                    $counts = array_merge($counts, $this->calculateCompanyCounts($subcategory->subcategories));
                }
            }

            return $counts;
        }

        public function showCompanies($category)
        {
            // Retrieve the category based on the provided parameter (ID or slug)
            $category = CompanyCategory::where('id', $category)
                ->orWhere('slug', $category)
                ->firstOrFail(); // Assuming you want to handle 404 if the category is not found

            // Load the view and pass the category to it
            return view('pages.company.showCompanies', compact('category'));
        }

        public function showParentCategory(CompanyCategory $category)
        {
            return view('pages.company.company-category', compact('category'));
        }

        public function showSubcategory(CompanyCategory $subcategory)
        {
            return view('pages.company.company-category-show', compact('subcategory'));
        }

        public function showSubchildCategory(CompanyCategory $subchildCategory)
        {
            return view('pages.company.company-category-show', compact('subchildCategory'));
        }
    }
