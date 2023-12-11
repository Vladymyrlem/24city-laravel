<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\CompanyCategory;
use App\Models\CompanySocial;
use App\Models\Contacts;
use App\Models\Email;
use App\Models\Payments;
use App\Models\TestCompany;
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

        // Отримайте всі категорії з бази даних
        $categories = CompanyCategory::all();

        // Побудуйте асоціативний масив категорій
        $categoryTree = [];

        foreach ($categories as $category) {
            if ($category->parent_id === null) {
                $categoryTree[$category->id] = [
                    'category' => $category,
                    'subcategories' => [],
                ];
            }
        }

        foreach ($categories as $category) {
            if ($category->parent_id !== null) {
                $categoryTree[$category->parent_id]['subcategories'][] = $category;
            }
        }
        return view('admin.company.companies', compact('companies', 'categoryTree'));
    }


    public function list(Request $request)
    {
        $companies = Companies::paginate(20);
        $categories = CompanyCategory::where('parent_id', null)->get();

        $categoryTree = [];

        foreach ($categories as $category) {
            if ($category->parent_id === null) {
                $categoryTree[$category->id] = [
                    'category' => $category,
                    'subcategories' => [],
                ];
            }
        }

        foreach ($categories as $category) {
            if ($category->parent_id !== null) {
                $categoryTree[$category->parent_id]['subcategories'][] = $category;
            }
        }
        if (empty($categoryTree)) {
            return response()->json('success', 'is Empty');
        }
        return view('pages.company.companies', compact('companies', 'categories'));

    }

    public function create()
    {
        $companies = Companies::all();
        $categories = CompanyCategory::all(); // Replace with your logic to fetch categories

        return view('admin.company.create', compact('companies', 'categories'));
    }

    public function store(Request $request)
    {


        // Validate and process the selected posts
        $selectedPostIds = $request->input('related_companies');
        $thumbnail = $request->file('image');
        $selectedCategoriesString = $request->input('selectedCategories');
        $selectedCategories = explode(',', $selectedCategoriesString);

// Отримайте URL завантаженого зображення
//            $imageUrl = $thumbnail->storeAs('custom');

        $phones = $request->input('phones');
        $phoneComments = $request->input('phone_comment');
        $faxValues = $request->input('fax');
        $social_link = $request->input('social_link');
        $social_type = $request->input('social_type');
        $company = new Companies();
        $company->title_company = $request->input('title');
        $company->about_company = $request->input('about_company');
        $company->additional_information = $request->input('additional_information');
        $company->boss = $request->input('boss');
        $company->boss_position = $request->input('boss_position');
        $company->save();

        for ($i = 0; $i < count($phones); $i++) {
            $phone = $phones[$i];
            $comment = $phoneComments[$i];
            $isFax = isset($faxValues[$i]) ? 1 : 0; // 1 якщо вибрано, 0 в іншому випадку

            // Збереження даних в таблиці Contacts
            Contacts::create([
                'company_id' => $company->id,
                'phone_number' => $phone,
                'comment_to_phone' => $comment,
                'contacts_fax' => $isFax,
            ]);
        }
        for ($i = 0; $i < count($social_link); $i++) {
            $social = $social_link[$i];
            $type = $social_type[$i];

            // Збереження даних в таблиці Contacts
            CompanySocial::create([
                'company_id' => $company->id,
                'social_link' => $social,
                'social_type' => $type
            ]);
        }
        foreach ($selectedCategories as $categoryId) {
            // Перевірити, чи існує категорія з таким ідентифікатором перед додаванням
            $category = CompanyCategory::find($categoryId);
            if ($category) {
                $company->categories()->attach($category->id);
            }
        }
        $emails = $request->input('email_text') ?? []; // Встановіть значення за замовчуванням як пустий масив, якщо воно null

        $emailLinks = $request->input('email_link') ?? []; // Те ж саме для $emailLinks
        for ($i = 0; $i < count($emails); $i++) {
            $email = $emails[$i];
            $emailLink = $emailLinks[$i];

            // Перевірте, чи $email і $emailLink не є null перед використанням
            if (isset($email) && isset($emailLink)) {
                // Створення запису про пошту
                $emailModel = Email::create([
                    'link' => $emailLink,
                    'value' => $email,
                ]);

                // Додавання пошти до компанії за допомогою метода attach
                $company->emails()->attach($emailModel->id);
            }
        }

        $selectedPaymentMethods = $request->input('company_payments') ?? []; // Масив ідентифікаторів вибраних методів оплати
        $newPaymentMethods = []; // Тут буде зберігатися інформація про нові методи оплати

// Перевірка наявності та створення нових методів оплати
        foreach ($selectedPaymentMethods as $paymentId) {
            $payment = Payments::find($paymentId); // Врахуйте, що модель названа "Payment"

            if (!$payment) {
                $paymentNames = $request->input('company_payments_name') ?? [];

                if (is_array($paymentNames)) {
                    // Якщо $paymentNames - масив, зберігати через цикл
                    foreach ($paymentNames as $paymentName) {
                        // Перевірте, чи вже існує такий метод оплати з цим ім'ям
                        $existingPayment = Payments::where('payment_name', $paymentName)->first();

                        if ($existingPayment) {
                            // Якщо вже існує, використовуйте його замість створення нового
                            $newPayment = $existingPayment;
                        } else {
                            // В іншому випадку створіть новий метод оплати
                            $newPayment = new Payments();
                            $newPayment->payment_name = $paymentName;
                            $newPayment->save();
                        }

                        $newPaymentMethods[] = $newPayment->id;
                    }
                } else {
                    // Якщо $paymentNames - не масив, а просте значення, зберігати одиночний метод оплати
                    $newPayment = new Payments();
                    $newPayment->payment_name = $paymentNames;
                    $newPayment->save();
                    $newPaymentMethods[] = $newPayment->id;
                }
            }
        }

// Отримуємо ідентифікатори всіх вибраних методів оплати, включаючи нові
        $allPaymentMethods = array_merge($selectedPaymentMethods, $newPaymentMethods);
        $allPaymentMethods = array_map('intval', $allPaymentMethods);

// Додаємо методи оплати до відносинь компанії
        $company->payments()->sync($allPaymentMethods);


        $parentCompanyId = $company->id; // Change this to your actual parent post ID
        if (is_array($selectedPostIds) && count($selectedPostIds) > 0) {
            // Перевірка наявності кожного обраного поста
            foreach ($selectedPostIds as $selectedId) {
                $postExists = Companies::find($selectedId);

                if (!$postExists) {
                    // Ви можете викинути виняток або виконати інші дії, які вам потрібно
                    abort(404, "Пост із ID $selectedId не знайдено");
                }
            }

            // Якщо всі пости існують, створіть відносини
            $this->createRelationshipsRecursively($parentCompanyId, $selectedPostIds);
        }

        //            dd($selectedCategories, $selectedPostIds);
        return redirect()->back()->with('success', 'Selected posts saved successfully.');

    }

    public function getAllCategories($categories, $parent = null)
    {
        $result = [];

        foreach ($categories as $category) {
            if ($category->parent_id === $parent) {
                $result[] = [
                    'category' => $category,
                    'subcategories' => $this->getAllCategories($categories, $category->id),
                ];
            }
        }

        return $result;
    }

    public function companyCategory(Request $request)
    {
        $categories = CompanyCategory::where('parent_id', null)->with('subcategories')->get();

        return view('pages.company.company-category', compact('categories'));
    }

    function uploadImage(Request $request)
    {
        $uploadedFile = $request->file('file');
        $originalFilename = $uploadedFile->getClientOriginalName();
        $year = date('Y');
        $month = date('m');

// Generate the custom path
        $customPath = "uploads/{$year}/{$month}";

// Use storeAs with the custom path
        $path = $uploadedFile->storeAs($customPath, $originalFilename, 'custom');
// Return the URL
        return response()->json(['location' => "/{$path}"]);
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
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Add the current ID to the processed list
            $processedIds[] = $selectedId;

            // Create relationships for other selected IDs (excluding the current one)
            $otherIds = array_diff($selectedPostIds, [$selectedId]);
            foreach ($otherIds as $otherId) {
                DB::table('company_relationships')->insert([
                    'parent_company_id' => $selectedId,
                    'child_company_id' => $otherId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $post = Companies::find($id);
        $post->delete();
        return redirect()->route('companies');
    }

    public function trash()
    {
        $companies = Companies::onlyTrashed()->paginate(20);
        return view('admin.company.companies-trash', compact('companies'));
    }

    public function restore($id)
    {
        Companies::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('adminCompaniesTrash');
    }

    public function forceDelete($id)
    {
        $post = Companies::onlyTrashed()->where('id', $id)->first();
        // Знайдено компанію, видаліть всі номери телефонів, пов'язані з нею
        $post->contacts()->delete();
        $post->emails()->detach();
        $post->categories()->detach();

        $post->forceDelete();
        return redirect()->route('adminCompaniesTrash');

    }
}
