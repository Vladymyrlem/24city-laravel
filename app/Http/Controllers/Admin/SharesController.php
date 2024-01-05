<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shares\Shares;
use Illuminate\Http\Request;

class SharesController extends Controller
{
    public function list(Request $request)
    {
        $shares = Shares::paginate(20);
        return view('admin.shares.list', compact('shares'));
    }

    public function show($id)
    {
        $shares = Shares::find($id);
        return view('admin.shares.show', compact('shares'));
    }
}
