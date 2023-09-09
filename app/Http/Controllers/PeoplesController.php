<?php

    namespace App\Http\Controllers;

    use App\Models\Peoples\Peoples;
    use Illuminate\Http\Request;

    class PeoplesController extends Controller
    {
        public function index(Request $request)
        {
            $peoples = Peoples::paginate(20);
            return view('pages.peoples.peoples', compact('peoples'));
        }
    }
