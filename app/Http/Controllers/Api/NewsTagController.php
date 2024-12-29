<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsTagController extends Controller
{
    public function tagsList()
    {
        $newsTags = News::with('tags')->get();
        return view('admin.news.news-tag', compact('newsTags'));
    }
}
