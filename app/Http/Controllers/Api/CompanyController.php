<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Companies;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class CompanyController extends Controller
    {
        public function getPosts(Request $request)
        {
            $companies = Companies::paginate(1000);
            return response()->json($companies->toArray());

//            try {
//                // Ваш код для отримання даних про компанії
//                return response()->json($companies);
//            } catch (\Exception $e) {
//                // Обробка помилок
//                return response()->json(['error' => $e->getMessage()], 500);
//            }
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
