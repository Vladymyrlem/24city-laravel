<?php

    namespace App\Http\Controllers;

    use App\Models\Companies;
    use Illuminate\Http\Request;

    class HomeController extends Controller
    {
        public function index(Request $request)
        {
            $companies = Companies::paginate(20);
            foreach ($companies as &$post) {
                $post->phoneNumbersArray = explode('|', $post->contacts_phone);
            }
            return view('pages.home', compact('companies'));
        }

        function uploadImage(Request $request)
        {
            $uploadedFile = $request->file('file');

            // Get the original filename
            $originalFilename = $uploadedFile->getClientOriginalName();

            // Save the file to the "public/images" directory with the original filename
            $imagePath = $request->file('file')->storeAs('images', $originalFilename, 'custom');

            // Get the public URL for the file
            return response()->json(['location' => "/images/$originalFilename"]);
        }

        public function saveSelectedPosts(Request $request)
        {
            // Validate and process the selected posts
            $selectedPostIds = $request->input('selected_posts');

            // Save the selected post IDs to the database as needed

            // Redirect back to the form or another page
            return redirect()->back()->with('success', 'Selected posts saved successfully.');
        }

    }
