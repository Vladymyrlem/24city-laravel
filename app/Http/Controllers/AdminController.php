<?php

    namespace App\Http\Controllers;

    use App\Models\Image;
    use Illuminate\Http\Request;

    class AdminController extends Controller
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
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
         * @throws Exception
         */
        public function index()
        {
            return view('admin');
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
// Return the URL
            return response()->json(['location' => "/{$path}"]);
        }

        public function upload(Request $request)
        {
            $uploadedFile = $request->file('file');

            // Переконайтеся, що файл був успішно завантажений
            if ($uploadedFile) {
                $originalFilename = $uploadedFile->getClientOriginalName();

                // Зберігаємо файл на сервері, наприклад, в папці public/uploads
                $path = $uploadedFile->storeAs('public/uploads', $originalFilename, 'custom');

                // Отримуємо публічний URL для збереженого файлу
                $url = asset(str_replace('public/', 'storage/', $path));

                // Повертаємо URL для Tinymce
                return response()->json(['location' => '/' . $path]);
            }

            // Якщо файл не був завантажений, повертаємо помилку
            return response()->json(['error' => 'Failed to upload file']);
        }

    }
