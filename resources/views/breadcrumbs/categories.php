<?php

    use Diglactic\Breadcrumbs\Breadcrumbs;
    use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

    Breadcrumbs::for('categories.index', function ($trail) {
        $trail->push('Home', route('home'));
        $trail->push('Categories', route('categories.index'));
    });

    Breadcrumbs::for('categories.show', function ($trail, $category) {
        $trail->parent('categories.index');
        $trail->push($category->name, route('categories.show', $category));
    });
