<?php

    namespace App\Providers;

    use App\Core\KTBootstrap;
    use App\Models\Ads\Ads;
    use App\Models\Companies;
    use App\Models\CompanyCategory;
    use App\Models\News\MainNews;
    use App\Models\News\News;
    use App\Models\Image;
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
            Blade::directive('gallery', function ($expression) {
                // Parse the expression to extract the IDs
                $ids = explode(',', trim($expression, '()'));

                // Create HTML for the gallery
                $html = '<figure>';
                foreach ($ids as $id) {
                    $image = Image::find($id);
                    if ($image) {
                        $html .= '<img src="' . asset($image->path) . '" alt="' . $image->alt_text . '">';
                    }
                }
                $html .= '</figure>';

                return "<?php echo '$html'; ?>";
            });
            KTBootstrap::init();
        }
    }
