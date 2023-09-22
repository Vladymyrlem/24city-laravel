<?php

    use Diglactic\Breadcrumbs\Breadcrumbs;
    use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

    Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
        $trail->push('Home', route('home'));
    });
    Breadcrumbs::for('categories.index', function ($trail) {
        $trail->push('Home', route('home'));
        $trail->push('Categories', route('company.company-category'));
    });

    Breadcrumbs::for('categories.show', function ($trail, $category) {
        if ($category->parent) {
            $trail->parent('categories.index', $category->parent);
        } else {
            $trail->parent('home');
        }
    });
    Breadcrumbs::for('company.index', function ($trail) {
        $trail->push('Home', route('home'));
        $trail->push('Companies', route('companies'));
    });

    use App\Models\CompanyCategory;

    Breadcrumbs::for('company.show', function (BreadcrumbTrail $trail, CompanyCategory $category) {
        if ($category->parent) {
            $trail->parent('categories.index', $category->parent);
        } else {
            $trail->parent('home');
        }

        $trail->push($category->name, route('company.company-category-show', $category->slug));
    });
    //    Breadcrumbs::for('company.category.show', function ($trail, $category) {
    //        $trail->parent('home'); // Assuming you have a 'home' breadcrumb
    //        $trail->push($category->name, route('company.category.show', $category));
    //    });
    //
    //    Breadcrumbs::for('company.subcategory.show', function ($trail, $subcategory) {
    //        $trail->parent('company.category.show', $subcategory->category); // Assuming 'category' is the relationship between subcategory and category
    //        $trail->push($subcategory->name, route('company.subcategory.show', $subcategory));
    //    });
    //
    //    Breadcrumbs::for('company.subchildcategory.show', function ($trail, $subchildcategory) {
    //        $trail->parent('company.subcategory.show', $subchildcategory->subcategory); // Assuming 'subcategory' is the relationship between subchildcategory and subcategory
    //        $trail->push($subchildcategory->name, route('company.subchildcategory.show', $subchildcategory));
    //    });

    //    Breadcrumbs::for('company.show', function ($trail, $company) {
    //        // Check if $post->subchildCategory exists and is not null
    //        // Assuming you have a 'id' property on subchildCategory as the identifier
    //
    //        if ($company->category) {
    //            $trail->parent('categories.show', $company->category); // Assuming 'categories.show' is defined correctly
    //            $trail->push($company->category->name, route('company.company-category-show', $company->category));
    //        }
    //
    //        if ($company->subcategory) {
    //            $trail->parent('company.subcategory.show', $company->subcategory->id);
    //            $trail->push($company->subcategory->name, route('company.subcategory.show', $company->subcategory));
    //        }
    //
    //        if ($company->subchildCategory) {
    //            $trail->parent('company.subchildcategory.show', $company->subchildCategory->id);
    //            $trail->push($company->subchildCategory->name, route('company.subchildcategory.show', $company->subchildCategory));
    //        }
    //
    //        $trail->push($company->title_company, route('company.show', $company));
    //    });




