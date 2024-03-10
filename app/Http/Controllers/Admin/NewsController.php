<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\NewsCategory;
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
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showNews($id)
    {
        $newsPost = News::find($id);
        if ($newsPost) {
            return view('admin.news.show-news', compact('newsPost'));
        } else {
            abort(404); // Видає 404 помилку, якщо пост не знайдений
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $news = News::find($id);
        $categories = NewsCategory::all();
        $postCategories = $news->categories->pluck('id')->toArray();

        $tags = Tag::all();
        return view('admin.news.edit', compact('categories', 'tags', 'news', 'postCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => ['required'],
            'title' => ['required', 'min:2', 'max:255'],
            'content' => ['required', 'min:2', 'max:255']
        ]);

        $ads = News::find($request->input('id'));
        $ads->update($request->all());
        $ads->tags()->sync($request->tags_id);
        return redirect()->route('admin.news.list')->with('success', 'Изменения сохранены');
    }
}
