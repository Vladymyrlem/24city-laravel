<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RealEstate\RealEstate;
use App\Models\Tag;
use Illuminate\Http\Request;

class RealEstateTagController extends Controller
{
    public function tagsList()
    {
        // Отримати усі теги, пов'язані з класом RealEstate
        $tags = Tag::whereHas('realestate', function ($query) {
            $query->where('taggables_type', RealEstate::class);
        })->get();

        return view('admin.real-estate.real-estate-tags', compact('tags'));
    }
}
