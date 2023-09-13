<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;

    class WordPressProxyController extends Controller
    {
        public function proxy(Request $request)
        {
            try {
                $response = Http::timeout(60)->get('http://24city.cn.ua/wp-json/wp/v2/company'); // Adjust the URL and timeout as needed
                return $response->json();
            } catch (\Exception $e) {
                // Handle any exceptions, such as timeouts or network errors
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function index()
        {
            try {
                $response = Http::timeout(-1)->get('http://24city.cn.ua/wp-json/wp/v2/company'); // Adjust the URL and timeout as needed
                $data = $response->json();
                return view('home', ['wordpressData' => $data]);

            } catch (\Exception $e) {
                // Handle any exceptions, such as timeouts or network errors
                return response()->json(['error' => $e->getMessage()], 500);
            }

        }
    }
