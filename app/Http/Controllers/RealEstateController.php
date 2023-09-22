<?php
    /*Недвижимость*/

    namespace App\Http\Controllers;

    use App\Models\RealEstate\RealEstate;
    use Illuminate\Http\Request;

    class RealEstateController extends Controller
    {
        public function index(Request $request)
        {
            $real_estate = RealEstate::paginate(20);
            return view('pages.real-estate.list', compact('real_estate'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function show($id)
        {
            $affiche = RealEstate::find($id);
            return view('pages.real-estate.show', compact('affiche'));
        }
    }
