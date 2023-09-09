<?php
    /*Объявления*/

    namespace App\Http\Controllers;

    use App\Models\Ads\Ads;
    use App\Models\Ads\AdsCategory;
    use Illuminate\Http\Request;

    class AdsController extends Controller
    {
        public function index(Request $request)
        {
            $ads = Ads::paginate(20);
            $categories = Ads::all('id', 'ads_category');
            return view('pages.ads.list', compact('ads', 'categories'));
        }

        public function companyCategory(Request $request)
        {
            $categories = AdsCategory::where('parent_id', null)->with('subcategories')->get();
            return view('pages.ads.ads-category', compact('categories'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function show($id)
        {
            $ads = Ads::find($id);
            return view('pages.ads.show', compact('ads'));
        }
    }
