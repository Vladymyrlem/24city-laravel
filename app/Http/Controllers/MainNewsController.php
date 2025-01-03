<?php

namespace App\Http\Controllers;

use App\Models\News\MainNews;
use App\Models\News\MainNewsCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainNewsController extends Controller
{
    public function index(Request $request)
    {
        return 'Hello world';
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
}
