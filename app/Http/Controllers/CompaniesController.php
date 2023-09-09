<?php

    namespace App\Http\Controllers;

    use App\Models\Companies;
    use App\Models\CompanyCategory;
    use Illuminate\Http\Request;

    class CompaniesController extends Controller
    {
        public function index(Request $request)
        {
            $companies = Companies::with('categories')->paginate(20);
            foreach ($companies as &$post) {
                $post->phoneNumbersArray = explode('|', $post->contacts_phone);
            }

            return view('pages.company.companies', compact('companies'));
        }

        public function companyCategory(Request $request)
        {
            $categories = CompanyCategory::where('parent_id', null)->with('subcategories')->get();
            return view('pages.company.company-category', compact('categories'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function show($id)
        {
            $company = Companies::find($id);
            $phone = $company->contacts_phone;
            return view('pages.company.show', compact('company', 'phone'));
        }
    }
