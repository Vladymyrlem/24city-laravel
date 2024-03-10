<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlines\Outlines;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function outlinesTags()
    {
        // Отримати усі теги, пов'язані з класом Outlines
        $tags = Tag::whereHas('outlines', function ($query) {
            $query->where('taggables_type', Outlines::class);
        })->get();

        return view('admin.outlines.outlines-tags', compact('tags'));
    }

    public function afficheTags()
    {
        // Отримати усі теги, пов'язані з класом Outlines
        $tags = Tag::whereHas('affiche', function ($query) {
            $query->where('taggables_type', Outlines::class);
        })->get();

        return view('admin.affiche.affiche-tags', compact('tags'));
    }

    public function showTag($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.show', compact('tag'));
    }
}
