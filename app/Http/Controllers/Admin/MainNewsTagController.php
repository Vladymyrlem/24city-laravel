<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\MainNews;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainNewsTagController extends Controller
{
    public function tagsList()
    {
        $newsTags = MainNews::has('tags')->orderBy('id')->get();
        return view('admin.main-news.news-tag', compact('newsTags'));
//        $news = MainNews::find(386);
//        $tagsQuery = $news->tags();
//        dd($tagsQuery->toSql());
    }

    public function showTag($id)
    {
//        $newsTag = Tag::find($id);
//        $mainNews = $newsTag->mainnews()->orderBy('id', 'desc');
//        return view('admin.tags.show', compact('newsTag', 'mainNews'));
    }
}
