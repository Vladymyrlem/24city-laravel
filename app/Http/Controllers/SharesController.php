<?php

namespace App\Http\Controllers;

use App\Models\Shares\Shares;
use Illuminate\Http\Request;

class SharesController extends Controller
{
    public function list(Request $request)
    {
        $shares = Shares::paginate(20);
        return view('pages.shares.list', compact('shares'));
    }

    public function show($id)
    {
        $shares = Shares::find($id);
        return view('pages.shares.show', compact('shares'));
    }
}
