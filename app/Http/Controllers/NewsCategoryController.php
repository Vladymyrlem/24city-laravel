<?php

    namespace App\Http\Controllers;

    use App\Models\News\NewsCategory;
    use Illuminate\Http\Request;

    class NewsCategoryController extends Controller
    {
        public function index()
        {
            $categories = NewsCategory::all(); // Replace with your logic to retrieve a category by ID
            return view('pages.news.news-category', compact('categories'));
        }

        public function show($id)
        {
            $adsPerPage = 10; // Adjust the number of companies per page as needed
            $category = NewsCategory::findOrFail($id);

            // Retrieve the posts associated with this category
            $news = $category->news;

            return view('pages.news.news-category-show', compact('category', 'news'));
        }

    }
