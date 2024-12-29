<?php

namespace App\Http\Controllers;

use App\Models\Ads\Ads;
use App\Models\Companies;
use App\Models\News\MainNews;
use App\Models\News\News;
use App\Models\Shares\Shares;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = Companies::paginate(10);
        $news = News::where('news.status', 'publish')->paginate(10);
        $mainnews = MainNews::where('mainnews.status', 'publish')->paginate(10);
        $shares = Shares::paginate(10);
        $ads = Ads::paginate(10);
//            $shares = Shares::all();
        return view('home', compact('companies', 'news', 'mainnews', 'ads', 'shares'));
    }
}
