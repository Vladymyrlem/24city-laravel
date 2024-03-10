<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlines\Outlines;
use App\Models\Tag;
use Illuminate\Http\Request;

class OutlinesController extends Controller
{
    public function index(Request $request)
    {
        $outlines = Outlines::paginate(10);
        return view('admin.outlines.list', compact('outlines'));
    }

    public function list(Request $request)
    {
        $outlines = Outlines::paginate(10);
        return view('admin.outlines.list', compact('outlines'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $outlines = Outlines::find($slug);
        return view('admin.outlines.show', compact('outlines'));
    }

    public function create()
    {
        $outlines = Outlines::all();

        return view('admin.outlines.create', compact('outlines'));
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
        $outlines = Outlines::find($id);
        $tags = Tag::all();
        return view('admin.outlines.edit', compact('tags', 'outlines'));
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

        $outlines = Outlines::find($request->input('id'));
        $outlines->update($request->all());
        $outlines->tags()->sync($request->tags_id);
        return redirect()->route('admin.outlines.list')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $outlines = Outlines::find($id);
        $outlines->delete();
        return redirect()->route('outlines');
    }

    /*
     * Trash outlines
     * */
    public function trash()
    {
        $outlines = Outlines::onlyTrashed()->paginate(20);
        return view('adminOutlinesTrash', compact('outlines'));
    }

    /*Restore outlines*/
    public function restore($id)
    {
        Outlines::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('adminOutlinesTrash');
    }

    public function forceDelete($id)
    {
        $post = Outlines::onlyTrashed()->where('id', $id)->first();
        // Знайдено компанію, видаліть всі номери телефонів, пов'язані з нею
        $post->contacts()->delete();
        $post->emails()->detach();
        $post->categories()->detach();

        $post->forceDelete();
        return redirect()->route('adminOutlinesTrash');

    }
}
