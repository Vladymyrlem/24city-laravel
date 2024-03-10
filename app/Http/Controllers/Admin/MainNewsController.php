<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Main;
use App\Models\News\MainNews;
use App\Models\News\MainNewsCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainNewsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 20);

        // Define the number of posts per page
        $perPage = 20; // You can adjust this as needed
        $news = MainNews::where('status', 'publish')
            ->paginate($perPage, ['*'], 'page', $page);;
        $tags = Tag::all();
        return view('admin.main-news.list', compact('news', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $news = MainNews::find($id);
        return view('pages.main-news.show', compact('news'));
    }

    public function showNews($id)
    {
        $news = MainNews::find($id);
        return view('admin.main-news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTag($id)
    {
        $tag = Tag::find($id);
        $news = $tag->mainnews;

        return view('pages.main-news.news-tag', compact('tag', 'news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $mainnews = MainNews::find($id);
        $categories = MainNewsCategory::all();
        $postCategories = $mainnews->categories->pluck('id')->toArray();

        $tags = Tag::all();
        return view('admin.main-news.edit', compact('categories', 'tags', 'mainnews', 'postCategories'));
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

        $mainnews = MainNews::find($request->input('id'));
        $mainnews->update($request->all());
        $mainnews->tags()->sync($request->tags_id);
        $mainnews->categories()->sync($request->categories);
        return redirect()->route('admin.main-news.list')->with('success', 'Изменения сохранены');
    }

    public function delete($id)
    {
        $post = MainNews::find($id)->delete();
//        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('admin.main-news.list');
    }

    public function trash()
    {
        $mainnews = MainNews::onlyTrashed()->get();
        return view('admin.main-news.trash', compact('mainnews'));
    }

    public function restore($id)
    {
        MainNews::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('adminMainNewsTrash');
    }

    public function forceDelete($id)
    {
        $post = MainNews::onlyTrashed()->where('id', $id)->first();
        $post->tags()->detach();
        $post->forceDelete();
        return redirect()->route('adminMainNewsTrash');

    }
}
