<?php

    namespace App\Http\Controllers;

    use App\Models\Companies;
    use App\Models\CompanyCategory;
    use Diglactic\Breadcrumbs\Breadcrumbs;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

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

        public function create()
        {
            $companies = Companies::all();

            return view('pages.company.create', compact('companies'));
        }

        public function store(Request $request)
        {
            $parentCompanyId = 4; // Change this to your actual parent post ID

            // Validate and process the selected posts
            $selectedPostIds = $request->input('selected_posts');
            $phones = $request->input('phones', []);
            $fax = $request->input('fax', []);

            $formattedPhones = [];
            foreach ($phones as $key => $phone) {
                if (isset($fax[$key]) && $fax[$key] == '1') {
                    $formattedPhones[] = $phone . '|fax';
                } else {
                    $formattedPhones[] = $phone;
                }
            }

            $phoneNumbers = implode(', ', $formattedPhones);
            dd($phoneNumbers, $selectedPostIds);
            return redirect()->back()->with('success', 'Selected posts saved successfully.');

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
//            $breadcrumbs = Breadcrumbs::generate('company.show', $company);
            $category = CompanyCategory::all(); // Replace with your logic to retrieve a category by ID

            $phone = $company->contacts_phone;
            return view('pages.company.show', compact('company', 'phone', 'category'));
        }

        public function saveSelectedPosts(Request $request)
        {
            $parentCompanyId = 4; // Change this to your actual parent post ID

            // Validate and process the selected posts
            $selectedPostIds = $request->input('selected_posts');

            $this->createRelationshipsRecursively($parentCompanyId, $selectedPostIds);

            // Redirect back to the form or another page
            return redirect()->back()->with('success', 'Selected posts saved successfully.');
        }

        public function createRelationshipsRecursively($companyId, $selectedPostIds)
        {
            // Define an array to keep track of processed IDs
            $processedIds = [];

            foreach ($selectedPostIds as $selectedId) {
                // Skip processing if the ID is already processed
                if (in_array($selectedId, $processedIds)) {
                    continue;
                }

                // Create a relationship for the current ID
                DB::table('company_relationships')->insert([
                    'parent_company_id' => $companyId,
                    'child_company_id' => $selectedId,
                ]);

                // Add the current ID to the processed list
                $processedIds[] = $selectedId;

                // Create relationships for other selected IDs (excluding the current one)
                $otherIds = array_diff($selectedPostIds, [$selectedId]);
                foreach ($otherIds as $otherId) {
                    DB::table('company_relationships')->insert([
                        'parent_company_id' => $selectedId,
                        'child_company_id' => $otherId,
                    ]);
                }
            }

            // You can add any additional logic or return a response as needed
        }

    }
