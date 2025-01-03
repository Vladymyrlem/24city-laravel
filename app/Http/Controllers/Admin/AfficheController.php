<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Affiche\Affiche;
use Illuminate\Http\Request;

class AfficheController extends Controller
{
    public function index(Request $request)
    {
        $affiche = Affiche::paginate(20);
        $categories = Affiche::all('id', 'category');
        return view('pages.affiche.list', compact('affiche', 'categories'));
    }

    public function list(Request $request)
    {
        $affiche = Affiche::paginate(10);
        return view('admin.affiche.list', compact('affiche'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $affiche = Affiche::find($id);
        return view('фвьшт.affiche.show', compact('affiche'));
    }
}
