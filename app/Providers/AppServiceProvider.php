<?php

    namespace App\Providers;

    use App\BBCode\CustomParser;
    use App\Core\KTBootstrap;
    use App\Models\Ads\Ads;
    use App\Models\Companies;
    use App\Models\CompanyCategory;
    use App\Models\Images;
    use App\Models\News\MainNews;
    use App\Models\News\News;
    use App\Models\Image;
    use Genert\BBCode\Facades\BBCode;
    use Illuminate\Database\Schema\Builder;
    use Illuminate\Support\Facades\Blade;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\ServiceProvider;

    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            //
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {
            // Update defaultStringLength
            Builder::defaultStringLength(191);
            View::composer('pages.ads.list', function ($view) {
                $adsCategories = Ads::all('id');
                $view->with('adsCategories', $adsCategories);
            });
//            View::composer('pages.company.companies', function ($view) {
//                $paymentMethods = Companies::whereNotNull('payment_methods')->get(['id', 'payment_methods']);
//                $view->with('paymentMethods', $paymentMethods);
//            });

//            Blade::directive('fullPostsListing', function ($expression) {
//                $parameters = json_decode($expression, true);
//
//                // Get the table name from the parameters
//                $tableName = $parameters['table'] ?? 'companies'; // Default to 'posts' table if not provided
//
//                // Define default values for other parameters
//                $order = $parameters['order'] ?? 'ASC';
//                $orderBy = $parameters['orderby'] ?? 'created_at';
//                $posts = $parameters['posts'] ?? 10;
//                $routeName = $parameters['route'] ?? 'company.show'; // Default route name
//
//                // Query the database using the table name
//                $posts = DB::table($tableName)
//                    ->orderBy($orderBy, $order)
//                    ->take($posts)
//                    ->get();
//
//                // Render the posts using a Blade view and pass the route name and posts
//                return view('partials.list-posts', compact('posts', 'routeName'));
//            });
        }
    }
