<?php
/*Объявления*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Companies;
use App\Http\Controllers\Controller;
use App\Models\Ads\Ads;
use App\Models\Ads\AdsCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $categories = AdsCategory::all('id', 'ads_category');
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
    public function show($slug)
    {
        $ads = Ads::find($slug);
        return view('admin.ads.show', compact('ads'));
    }

    public function create()
    {
        $ads = Ads::all();
        $categories = AdsCategory::all(); // Replace with your logic to fetch categories
        $tags = Tag::all(); // Replace with your logic to fetch categories

        return view('admin.ads.create', compact('ads', 'categories', 'tags'));
    }


    public function store(Request $request)
    {
//        if (!$request->user()->can('store', Ads::class)) {
//            abort(403);
//        }
        $maxId = DB::table('ads')->max('id');

        // Встановлення id на одиницю більше за максимальне значення
        $newId = $maxId + 1;

        // Створення запису в транзакції
        DB::transaction(function () use ($request, $newId) {
            $ads = new Ads();
            $ads->id = $newId;
            $ads->title = $request->input('title');
            $ads->content = $request->input('content');
            $ads->excerpt = $request->input('excerpt_ads');

            // Збереження змін у базі даних
            $ads->save();

            // Отримання категорії
            $category = AdsCategory::find($request->input('categories'));

            // Генерація slug
            $slug = Str::slug($request->input('title'));
            $ads->slug = $slug;

            // Збереження змін у базі даних
            $ads->save();

            // Прикріплення категорії, якщо існує
            if ($category) {
                $ads->categories()->attach($request->input('categories'));
            }

            // Синхронізація тегів
            $ads->tags()->sync($request->input('tags_id'));
        });

        return redirect()->back()->with('success', 'Ads saved successfully.');
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
        $postCategories = $ads->categories->pluck('id')->toArray();

        return view('admin.ads.edit', compact('categories', 'tags', 'ads', 'postCategories'));
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
            'categories' => ['required'],
            'title' => ['required', 'min:2', 'max:255'],
            'content' => ['required', 'min:2', 'max:255']
        ]);

        $ads = Ads::find($request->input('id'));
        $ads->update($request->all());
        $ads->tags()->sync($request->tags_id);
        $ads->categories()->sync($request->categories);
        return redirect()->route('admin.ads.list')->with('success', 'Изменения сохранены');
    }

    public function tagsList()
    {
        $adsTags = Ads::with('tags')->get();
        return view('admin.ads.ads-tag', compact('adsTags'));
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
