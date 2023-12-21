<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
