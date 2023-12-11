<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Models\CompanyCategory;
use App\Models\News\MainNews;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Tag;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function getPosts(Request $request)
    {
        $companies = Companies::all();
        return response()->json($companies->toArray());
    }

    public function categoriesList()
    {
        $categories = CompanyCategory::all(); // Replace with your logic to fetch categories
        return response()->json($categories->toArray());
    }

    public function getPayments(Request $request)
    {
        $payments = Payments::all();
        return response()->json($payments->toArray());

    }

    public function getTags()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    public function storeTags(Request $request)
    {
        $name = $request->input('name');
        $slug = Str::slug($name, '_');

        $newTag = Tag::create([
            'name' => $name,
            'slug' => $slug,
        ]);

        return response()->json($newTag, 201);
    }


    public function getNews(Request $request)
    {
        $news = MainNews::where('status', 'publish')->paginate(20000);
        return response()->json($news->toArray());

    }

    public function getFirstThousand()
    {
        $companies = Companies::paginate(1000);
        return response()->json($companies->toArray());
    }

    public function getSecondThousand()
    {
        $companies = Companies::whereBetween('id', [1001, 2000])->paginate(1000);

        return response()->json($companies->toArray());
    }

    public function getThirdThousand()
    {
        $companies = Companies::whereBetween('id', [2001, 3000])->paginate(1000);
        return response()->json($companies->toArray());
    }

    public function getFourthThousand()
    {
        $companies = Companies::whereBetween('id', [3001, 4000])->paginate(1000);
        return response()->json($companies->toArray());
    }

    public function getFifthThousand()
    {
        $companies = Companies::whereBetween('id', [4001, 5000])->paginate(1000);
        return response()->json($companies->toArray());
    }

    function uploadImage(Request $request)
    {
        $uploadedFile = $request->file('file');
        $originalFilename = $uploadedFile->getClientOriginalName();
        $year = date('Y');
        $month = date('m');

// Generate the custom path
        $customPath = "uploads/{$year}/{$month}";

// Use storeAs with the custom path
        $path = $uploadedFile->storeAs($customPath, $originalFilename, 'custom');
        $imageUrl = Storage::url($path); // Отримайте URL зображення

// Return the URL
        return response()->json(['location' => $path]);
    }
}
