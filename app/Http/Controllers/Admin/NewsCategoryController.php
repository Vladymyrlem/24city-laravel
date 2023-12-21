<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::all(); // Replace with your logic to retrieve a category by ID
        return view('pages.news.news-category', compact('categories'));
    }

    public function list()
    {
        $categories = NewsCategory::all(); // Replace with your logic to retrieve a category by ID
        return view('admin.news-category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news.category.create');
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
        NewsCategory::create($request->all());
        return redirect()->route('admin.news-category')->with('success', 'The category is added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = NewsCategory::find($id);
        $currentCategory = NewsCategory::find($id);
        $selectedCategoryId = $id;
        $categoryTree = $this->buildCategoryTree(NewsCategory::all());
        return view('admin.news.category.edit', compact('category', 'categoryTree', 'selectedCategoryId', 'currentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, NewsCategory $category)
    {
        $request->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['required', 'min:2', 'max:255'],
            'parent' => ['required']
        ]);
        $category = NewsCategory::find($request->input('id'));
        $category->parent_id = $request->input('parent');
        $category->update($request->all());
        return redirect()->route('admin.news-category')->with('success', 'Changes saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = NewsCategory::find($id);
        $category->delete();
        return redirect()->route('admin.news-category')->with('success', 'Category deleted');
    }

    public function trash()
    {
        $categories = NewsCategory::onlyTrashed()->get();
        return view('admin.news.category.trash', compact('categories'));
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

    public function show($id)
    {
        $adsPerPage = 10; // Adjust the number of companies per page as needed
        $category = NewsCategory::findOrFail($id);

        // Retrieve the posts associated with this category
        $news = $category->news;

        return view('pages.news.news-category-show', compact('category', 'news'));
    }

    public function categoriesList()
    {
        $categories = NewsCategory::all(); // Replace with your logic to fetch categories
        $categoryTree = $this->buildCategoryTree($categories);

        return view('admin.news.news-category', compact('categories'));
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
