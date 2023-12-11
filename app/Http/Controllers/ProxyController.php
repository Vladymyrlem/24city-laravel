<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;

    class ProxyController extends Controller
    {
        public function proxy(Request $request)
        {
            // Отримайте дані з різних джерел
            $data1 = Http::get('http://24city-laravel/api/companies_1')->json();
//            $data2 = Http::get('http://24city-laravel/api/companies_2')->json();
//            $data3 = Http::get('http://24city-laravel/api/companies_3')->json();
//            $data4 = Http::get('http://24city-laravel/api/companies_4')->json();
//            $data5 = Http::get('http://24city-laravel/api/companies_5')->json();
            // Додайте інші джерела даних тут

            // Об'єднайте дані в один масив
            $combinedData = array_merge($data1);

            // Поверніть об'єднані дані відповіддю клієнту
            return response()->json($combinedData);
        }
    }

