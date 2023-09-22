<?php

    use Diglactic\Breadcrumbs\Breadcrumbs;
    use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

    Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
        $trail->push('Home', route('home'));
    });
    Breadcrumbs::for('company.index', function ($trail) {
        $trail->push('Home', route('home'));
        $trail->push('Companies', route('companies'));
    });

    Breadcrumbs::for('company.show', function ($trail, $post) {
        $trail->parent('company.index');
        $trail->push($post->category->name, route('company.company-category', $post));
        $trail->push($post->title, route('company.show', $post));
    });
