<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\affiche\AfficheCategory;
use Illuminate\Http\Request;

class AfficheCategoryController extends Controller
{
    public function index()
    {
        $affiche = AfficheCategory::all(); // Replace with your logic to fetch categories
        return view('pages.affiche.affiche-category', compact('affiche'));
    }

    public function show($id)
    {
        $affichePerPage = 10; // Adjust the number of companies per page as needed
        $category = AfficheCategory::orderBy('created_at', 'asc')->findOrFail($id); // Replace with your logic to retrieve a category by ID
        $affiche = $category->affiche()->paginate($affichePerPage);
        $subcategoryCounts = $this->calculateAfficheCounts($category->subcategories);
        return view('pages.affiche.affiche-category-show', compact('category', 'subcategoryCounts', 'affiche'));
    }

    private function calculateAfficheCounts($subcategories)
    {
        $counts = [];
        if (!is_null($subcategories)) {

            foreach ($subcategories as $subcategory) {
                $counts[$subcategory->id] = $subcategory->company->count();

                if ($subcategory->subcategories->count() > 0) {
                    $counts = array_merge($counts, $this->calculateAfficheCounts($subcategory->subcategories));
                }
            }
        }
        return $counts;
    }
}
