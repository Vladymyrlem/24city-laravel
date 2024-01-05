<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RealEstate\RealEstateCategory;
use Illuminate\Http\Request;

class RealEstateCategoryController extends Controller
{
    public function index()
    {
        $categories = RealEstateCategory::all(); // Replace with your logic to fetch categories
        return view('pages.real-estate.real-estate-category', compact('categories'));
    }

    public function show($id)
    {
        $affichePerPage = 10; // Adjust the number of companies per page as needed
        $category = RealEstateCategory::orderBy('created_at', 'asc')->findOrFail($id); // Replace with your logic to retrieve a category by ID
        $real_estate = $category->real_estate()->paginate($affichePerPage);
        $subcategoryCounts = $this->calculateAfficheCounts($category->subcategories);
        return view('pages.real-estate.real-estate-category-show', compact('category', 'subcategoryCounts', 'real_estate'));
    }

    public function categoriesList()
    {
        $categories = RealEstateCategory::all(); // Replace with your logic to fetch categories
        return view('admin.real-estate.real-estate-category', compact('categories'));
    }

    private function calculateAfficheCounts($subcategories)
    {
        $counts = [];
        if (!is_null($subcategories)) {

            foreach ($subcategories as $subcategory) {
                $counts[$subcategory->id] = $subcategory->real_estate->count();

                if ($subcategory->subcategories->count() > 0) {
                    $counts = array_merge($counts, $this->calculateAfficheCounts($subcategory->subcategories));
                }
            }
        }
        return $counts;
    }
}
