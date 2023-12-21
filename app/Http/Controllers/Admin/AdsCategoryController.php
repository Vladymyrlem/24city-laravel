<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads\AdsCategory;
use Illuminate\Http\Request;

class AdsCategoryController extends Controller
{
    public function index()
    {
        $ads = AdsCategory::all(); // Replace with your logic to fetch categories
        return view('admin.ads.ads-category', compact('ads'));
    }

    public function show($id)
    {
        $adsPerPage = 10; // Adjust the number of companies per page as needed
        $category = AdsCategory::orderBy('created_at', 'asc')->findOrFail($id); // Replace with your logic to retrieve a category by ID
        $ads = $category->ads()->paginate($adsPerPage);
        $subcategoryCounts = $this->calculateAdsCounts($category->subcategories);
        return view('admin.ads.ads-category-show', compact('category', 'subcategoryCounts', 'ads'));
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

    /*
        *
        * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
        */
    public function create()
    {
        return view('admin.ads.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'slug' => ['required'],
        ]);
        AdsCategory::create($request->all());
        return redirect()->route('admin.ads-categories')->with('success', 'The category is added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = AdsCategory::find($id);
        $currentCategory = AdsCategory::find($id);
        $selectedCategoryId = $id;
        $categoryTree = $this->buildCategoryTree(AdsCategory::all());
        return view('admin.ads.category.edit', compact('category', 'categoryTree', 'selectedCategoryId', 'currentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, AdsCategory $category)
    {
        $request->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['required', 'min:2', 'max:255'],
            'parent' => ['required']
        ]);
        $category = AdsCategory::find($request->input('id'));
        $category->parent_id = $request->input('parent');
        $category->update($request->all());
        return redirect()->route('admin.ads-categories')->with('success', 'Changes saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = AdsCategory::find($id);
        $category->delete();
        return redirect()->route('admin.ads-categories')->with('success', 'Category deleted');
    }

    public function trash()
    {
        $categories = AdsCategory::onlyTrashed()->get();
        return view('admin.ads.categories.trash', compact('categories'));
    }

    public function categoriesList()
    {
        $categories = AdsCategory::all(); // Replace with your logic to fetch categories
        $categoryTree = $this->buildCategoryTree($categories);

        return view('admin.ads.ads-category', compact('categories'));
    }

    function buildCategoryTree($categories, $parentId = null)
    {
        $tree = [];

        foreach ($categories as $category) {
            if ($category->parent_id === $parentId) {
                $children = $this->buildCategoryTree($categories, $category->id);
                if ($children->isNotEmpty()) {
                    $category->setAttribute('children', $children);
                }
                $tree[] = $category;
            }
        }

        return collect($tree);
    }

}
