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
    }
