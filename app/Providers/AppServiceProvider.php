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
                $adsCategories = Ads::all('id', 'ads_category');
                $view->with('adsCategories', $adsCategories);
            });


            KTBootstrap::init();
        }
    }
