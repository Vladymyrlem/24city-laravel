<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peoples\Peoples;
use Illuminate\Http\Request;

class PeoplesController extends Controller
{
    public function list(Request $request)
    {
        $peoples = Peoples::paginate(20);
        return view('admin.peoples.peoples', compact('peoples'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $peoples = Peoples::find($id);
        return view('admin.peoples.show', compact('peoples'));
    }
}
