<?php
/*Недвижимость*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RealEstate\RealEstate;
use App\Models\RealEstate\RealEstateCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    public function list(Request $request)
    {
        $real_estate = RealEstate::with('categories')->get();
        return view('admin.real-estate.list', compact('real_estate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $real_estate = RealEstate::find($slug);
        if (!$real_estate) {
            // Можливо, ви хочете відобразити помилку або перенаправити на іншу сторінку
            abort(404, 'Real Estate not found');
        }
        return view('admin.real-estate.show', compact('real_estate'));
    }

    public function create()
    {
        $categories = RealEstateCategory::all(); // Replace with your logic to fetch categories
        $tags = Tag::all();
        return view('admin.real-estate.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        if (!$request->user()->can('store', RealEstate::class)) {
            abort(403);
        }

        $request->validate([
            'tags_id' => ['required'],
            'category_id' => ['required'],
            'title' => ['required', 'min:2', 'max:255'],
            'content' => ['required', 'min:2', 'max:255'],
            'excerpt' => ['required', 'min:2', 'max:255']
        ]);

        $real_estate = RealEstate::create($request->all());
        $real_estate->tags()->sync($request->tags_id);

        return redirect()->back()->with('success', 'Selected posts saved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $real_estate = RealEstate::find($id);
        $categories = RealEstateCategory::all();
        $tags = Tag::all();
        return view('admin.real-estate.edit', compact('categories', 'tags', 'real_estate'));
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

        $real_estate = RealEstate::find($request->input('id'));
        $real_estate->update($request->all());
        $real_estate->categories()->sync($request->cat_id);
        return redirect()->route('admin.real-estate.list')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $real_estate = RealEstate::find($id);
        $real_estate->delete();
        return redirect()->route('admin.real-estate.list');
    }

    public function trash()
    {
        $real_estate = RealEstate::onlyTrashed()->paginate(20);
        return view('adminRealEstateTrash', compact('real_estate'));
    }

    public function restore($id)
    {
        RealEstate::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('adminRealEstateTrash');
    }

    public function forceDelete($id)
    {
        $post = RealEstate::onlyTrashed()->where('id', $id)->first();
        $post->categories()->detach();
        $post->forceDelete();
        return redirect()->route('adminRealEstateTrash');
    }
}
