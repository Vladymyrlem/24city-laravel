<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyCategory;
use Illuminate\Http\Request;

class CompanyCategoryController extends Controller
{
    public function index()
    {
        $categories = CompanyCategory::all(); // Replace with your logic to fetch categories
        return view('pages.company.company-category', compact('categories'));
    }

    public function categoriesList()
    {
        $categories = CompanyCategory::all(); // Replace with your logic to fetch categories
        $categoryTree = $this->buildCategoryTree($categories);

        return view('admin.company.company-category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.company.category.create');
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
        CompanyCategory::create($request->all());
        return redirect()->route('admin.company-categories')->with('success', 'The category is added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = CompanyCategory::find($id);
        $currentCategory = CompanyCategory::find($id);
        $selectedCategoryId = $id;
        $categoryTree = $this->buildCategoryTree(CompanyCategory::all());
        return view('admin.company.category.edit', compact('category', 'categoryTree', 'selectedCategoryId', 'currentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CompanyCategory $category)
    {
        $request->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['required', 'min:2', 'max:255'],
            'parent' => ['required']
        ]);
        $category = CompanyCategory::find($request->input('id'));
        $category->parent_id = $request->input('parent');
        $category->update($request->all());
        return redirect()->route('admin.company-categories')->with('success', 'Changes saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = CompanyCategory::find($id);
        $category->delete();
        return redirect()->route('admin.company-categories')->with('success', 'Category deleted');
    }

    public function trash()
    {
        $categories = CompanyCategory::onlyTrashed()->get();
        return view('admin.company.categories.trash', compact('categories'));
    }

    public function show($id)
    {
        $companiesPerPage = 10; // Adjust the number of companies per page as needed
        $category = CompanyCategory::orderBy('created_at', 'asc')->findOrFail($id); // Replace with your logic to retrieve a category by ID
        $companies = $category->company();
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
