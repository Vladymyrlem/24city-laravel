<?php
/*Объявления*/

namespace App\Http\Controllers;

use App\Models\Ads\Ads;
use App\Models\Ads\AdsCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index(Request $request)
    {
        $ads = Ads::paginate(10);
        $categories = AdsCategory::all();
        return view('admin.ads.list', compact('ads', 'categories'));
    }

    public function list(Request $request)
    {
        $ads = Ads::paginate(10);
        $categories = AdsCategory::all('id');
        return view('pages.ads.list', compact('ads', 'categories'));
    }

    public function adsCategory(Request $request)
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

    public function create()
    {
        $ads = Ads::all();
        $categories = AdsCategory::all(); // Replace with your logic to fetch categories

        return view('admin.ads.create', compact('ads', 'categories'));
    }

    public function store(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $ads = Ads::find($id);
        $categories = AdsCategory::all();
        $tags = Tag::all();
        return view('admin.ads.edit', compact('categories', 'tags', 'ads'));
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

        $ads = Ads::find($request->input('id'));
        $ads->update($request->all());
        $ads->tags()->sync($request->tags_id);
        return redirect()->route('admin.ads.list')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $ads = Ads::find($id);
        $ads->delete();
        return redirect()->route('ads');
    }

    public function trash()
    {
        $ads = Ads::onlyTrashed()->paginate(20);
        return view('adminAdsTrash', compact('ads'));
    }

    public function restore($id)
    {
        Companies::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('adminCompaniesTrash');
    }

    public function forceDelete($id)
    {
        $post = Companies::onlyTrashed()->where('id', $id)->first();
        // Знайдено компанію, видаліть всі номери телефонів, пов'язані з нею
        $post->contacts()->delete();
        $post->emails()->detach();
        $post->categories()->detach();

        $post->forceDelete();
        return redirect()->route('adminCompaniesTrash');

    }
}
