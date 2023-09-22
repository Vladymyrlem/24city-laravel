<?php

    namespace App\Http\Controllers;

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
    }
