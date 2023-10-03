@extends('layouts.master')

@section('title', 'Company categories')

@section('content')
    <section id="primary" class="company bizov-container d-flex flex-column mx-auto row">
        {{ get_sidebar('head-left') }}
        <div class="content-area col-12 row" style="">
            {{ get_sidebar('left-main') }}
            <main id="main-company" class="site-main col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="header d-flex">
                    <h6 id="head-title" class="d-flex">Companies</h6>
                </div>
                <div class="content">
                    <div class="row company-categories-group" style="height: 100%!important; margin: 0; width: 100%">
                        @php
                            $order = [42,51,53,54,56,57,58,62,84,98,99,100,111,112,116,121,140,141,149,159,166,186,188,193,194,196,215];
                        @endphp
                        @foreach ($order as $categoryId)

                            @foreach ($categories as $category)
                                @if ($category->id == $categoryId)

                                    @if (!$category->parent_id)
                                        <!-- Check if it's a top-level category -->
                                        <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12 company-col left-group">
                                            <div class=" company-category d-flex flex-row flex-wrap justify-content-between" id="company-{{ $category->id }}">
                                                <div class="catInfo d-flex flex-row d-flex flex-row">
                                                    <div class="thumbnail"><img src="{{ asset($category->image) }}" alt=""></div>
                                                    <div class="catTitle">
                                                        <a href="{{ route('company.company-category-show', $category->id) }}">
                                                            {{ $category->name }}
                                                        </a>
                                                        <p class="first-cat-list d-flex flex-row flex-wrap">
                                                            @foreach ($category->subcategories as $subcategory)
                                                                <span>
                                                        {{ $subcategory->name }},
                                                </span>
                                                                @if ($subcategory->subcategories->count() > 0)
                                                                    @include('pages.company.subcategories-list', ['subcategories' => $subcategory->subcategories])
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <div class="comp-banners-group" style="flex: 2 2 100%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category-menu" style="">
                                                    <div class="company-group-head-menu">
                                                        <a class="btn btn-default drop-btn" id="{{ $category->id }}">
                                                            <!-- <i class="fa fa-line-columns"></i> -->
                                                            <img width="17px" class="" src="{{ asset('/img/navigation.png') }}" alt="" style="">
                                                        </a>
                                                        @if ($category->subcategories->count() > 0)
                                                            <ul class="item-menu" id="company-menu-{{$category->id}}">
                                                                @foreach ($category->subcategories as $subcategory)
                                                                    <li class="first">
                                                                        <a class="sublink" href="{{ route('company.company-category-show', $subcategory->id) }}">
                                                                            {{ $subcategory->name }}
                                                                        </a>
                                                                        @if ($subcategory->subcategories->count() > 0)
                                                                            <button class="sub-btn">
                                                                                <img width="15px" class="" src="{{ asset('/img/navigation.png') }}" alt="" style="">
                                                                            </button>
                                                                        @endif

                                                                        {{--                                                                        {{$subcategory->company->count(0)}}--}}
                                                                        <ul class="sub-menu">
                                                                            @if ($subcategory->subcategories->count() > 0)
                                                                                @include('pages.company.subcategories', ['subcategories' => $subcategory->subcategories])
                                                                            @endif
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                @endif
                @endif
                @endforeach
                @endforeach
                {{ get_sidebar('top-banners')}}
            </main><!-- #main -->

            <div class="advertising-block">
                <a href="https://24city.cn.ua/kontakty/" class="advertising-place" redirect>
                    Місце для вашої реклами
                </a>
            </div>
            <div class="related-news related-post-slider">
                {{--                <?php echo do_shortcode('[related_news orderby="date" order="desc" type="mainnews" posts="36"]') ?>--}}
            </div>
            <p style="font-size: 10px; color: #f1f1f1; height: 10px;">
                Справочник товаров и услуг Чернигова. Здесь вы сможете найти все: Автомобили и запчасти к ним, СТО и шиномонтаж. Медицина - аптеки, поликлиники, больницы и стоматология. Магазины:
                одежда, продуктовы, магазины бытовой техники и строительных материалов, бытовой химии и хозяйственных товаров, магазины детских товаров. Бытовые услуги, гостиницы, ритуальные услуги.
                Бани и сауны. Агентства недвижимости. Кафе, рестораны, кофейни, закусочные, столовые. Театр, кино, концерт. Рынки и оптовые базы. СМИ, рекламные агентства и полиграфические услуги.
                Органы государственной власти и местного самоуправления. Производство продуктов питания, строительных материалов, мебели и машин и деталей к ним. Детские сады, школы, училища, колледжи
                и институты.
                Только проверенная точная информация.
            </p>
        </div>

    </section><!-- #primary -->

@endsection

