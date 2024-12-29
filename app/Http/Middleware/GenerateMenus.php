<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lavary\Menu\Menu;
use Symfony\Component\HttpFoundation\Response;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        (new Menu)->make('MyNavBar', function ($menu) {
            $menu->add('Home');
            $menu->add('News', 'news');
        });

        return $next($request);
    }
}
