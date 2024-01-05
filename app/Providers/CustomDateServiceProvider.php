<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CustomDateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('postDate', $this->getPostDate());
        });
    }

    protected function getPostDate()
    {
        // Тут ви можете взяти дату публікації для поточного поста
        // Це приклад, і вам слід адаптувати його під ваші потреби.
        return optional(request()->route('script'))->created_at;
    }
}
