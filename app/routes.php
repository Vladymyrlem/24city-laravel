<?php

use Illuminate\Support\Facades\Route;


Route::get('/', ['as' => 'home.page', function() {
    return view('home');
}]);

Route::get('/news', ['as' => 'page.news', function() {
    return view('news');
}]);
(new Lavary\Menu\Menu)->make('MyNavBar', function($menu){

    $menu->add('Home',     ['route'  => 'home.page']);
    $menu->add('News',    ['route'  => 'page.news']);

});
