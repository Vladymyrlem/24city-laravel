<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Press\Press;
use Illuminate\Http\Request;

class PressController extends Controller
{
    public function index(Request $request)
    {
        $press = Press::paginate(10);
        return view('admin.press.list', compact('press'));
    }

    public function list(Request $request)
    {
        $press = Press::paginate(10);
        return view('admin.press.list', compact('press'));
    }
}
