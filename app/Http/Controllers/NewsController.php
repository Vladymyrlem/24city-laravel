<?php

namespace App\Http\Controllers;

use App\Models\News\News;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 20);

        // Define the number of posts per page
        $perPage = 20; // You can adjust this as needed
        $news = News::all();
        $tags = Tag::all();
        return view('pages.news.list', compact('news', 'tags'));
    }

    public function list(Request $request)
    {
        $page = $request->input('page', 20);

        // Define the number of posts per page
        $perPage = 20; // You can adjust this as needed
        $news = News::all();
        $tags = Tag::all();
        return view('admin.news.list', compact('news', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $news = News::find($slug);
        return view('pages.news.show', compact('news'));
    }
}
