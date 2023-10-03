@extends('layouts.master')

@section('title', 'Company')
<style type="text/css">
    div.head-block {
        flex-flow: row;
        flex-wrap: wrap;
        display: flex;
    }

    div.second {
        flex: 0 0 50%;
    }

    .pagination {

        padding: 20px;
    }

    .pagination a {
        display: inline-block;
        padding: 0 10px;
        cursor: pointer;

    }

    .pagination .disabled {
        opacity: .3;
        pointer-events: none;
        cursor: not-allowed;
    }

    .pagination .current {
        background: #f3f3f3;
    }

    .tax-company-list {
        display: flex;
        flex-flow: column;
    }

    .pagination, .alt_pagination {
        padding-bottom: 10px;

    }

    .pagination a.page-link, .alt_pagination a.page-link {
        padding: 8px 15px;
        margin: 2px;
        text-decoration: none;
        /*     float: left; */
        font-family: Roboto, sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 28px;
        text-align: center;
        color: #172648;
        background: #E2E8F6;
        border-radius: 10px;
    }

    .pagination a.first_link, .pagination a.previous_link {
        /*float: left;*/
    }

    .pagination .first, .pagination .prev,
    .pagination .next, .pagination .last {
        /*padding: 8px 11px;*/
        margin: 2px;
        text-decoration: none;

        font-family: Roboto, sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 28px;
        text-align: center;
        color: #172648;

        background: #F1F1F1;
    }

    .pagination .page-item.active {
        background-color: white !important;
        color: black !important;
    }

    .related-slider {
        display: flex;
        max-width: 1000px;
    }

    .related-slider .slick-slide {
        max-height: 325px
    }

    .terms {
        column-count: 2;
        margin-bottom: 34px;
    }
</style>

@section('content')
    <section id="primary" class="all-company d-flex flex-column mx-auto row bizov-container container">
        <div class="row flex-wrap">
            <div id="left-head">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        @php
                            $breadcrumbCategories = [];
                            $currentCategory = $category;
                            while ($currentCategory) {
                                array_unshift($breadcrumbCategories, $currentCategory);
                                $currentCategory = $currentCategory->parentCategory;
                            }
                        @endphp
                        @foreach ($breadcrumbCategories as $breadcrumbCategory)
                            <li class="breadcrumb-item {{ $breadcrumbCategory->id == $category->id ? 'active' : '' }}">
                                @if ($breadcrumbCategory->id == $category->id)
                                    {{ $breadcrumbCategory->name }}
                                @else
                                    <a href="{{ route('company.company-category-show', $breadcrumbCategory->id) }}">
                                        {{ $breadcrumbCategory->name }}
                                    </a>
                                @endif
                            </li>
                        @endforeach

                    </ol>
                </nav>
            </div>
            <div class="content-area row" style="">
                {{ get_sidebar('left-main') }}
                <main id="main-company" class="companies-list site-main col-xl-9 col-lg-9 col-md-12 col-xs-12 col-sm-12" role="main">

                    <div class="header d-flex"><h6 id="head-title" class="d-flex">{{ $category->name }}</h6>
                        <span>{{ $category->company->count() }}</span></div>
                    <div class="companies" id="companies-list">

                        <div class="terms">

                            @if ($category->subcategories->count() > 0)
                                @foreach ($category->subcategories as $subcategory)
                                    <div class="comp-menu">
                                        <div class="first">
                                            <i class="fas fa-folder"></i>
                                            <a href="{{ route('company.company-category-show', $subcategory->id) }}" id="company-{{ $subcategory->id }}">
                                                {{ $subcategory->name }}
                                            </a>
                                            <span style=" color: darkgray">({{ $subcategory->company->count() ?? 0 }})</span>
                                        </div>

                                        <ul class="second">
                                            @if ($subcategory->subcategories->count() > 0)
                                                @include('pages.company.subcategories', ['subcategories' => $subcategory->subcategories])
                                            @endif
                                        </ul>

                                    </div>
                                    {{--                                    <h3>--}}
                                    {{--                                        <a href="{{ route('company.company-category-show', $subcategory->id) }}">--}}
                                    {{--                                            {{ $subcategory->name }}--}}
                                    {{--                                        </a>--}}
                                    {{--                                        ({{ $subcategory->company->count() ?? 0 }})--}}
                                    {{--                                    </h3>--}}
                                    {{--                                    @if ($subcategory->subcategories->count() > 0)--}}
                                    {{--                                        @include('pages.company.subcategories', ['subcategories' => $subcategory->subcategories])--}}
                                    {{--                                    @endif--}}

                                @endforeach
                            @endif

                        </div>

                        <ul id="pagin-list" class="tax-company-list content">
                            @foreach($category->company as $company)
                                @include('pages.company.content-companies', $company)

                            @endforeach
                        </ul>
                        {{--                        {{ $companies->links('vendor.pagination.custom') }}--}}

                    </div>
                </main>
                <div class="advertising-block">
                    <a href="https://24city.cn.ua/kontakty/" class="advertising-place" redirect>
                        Місце для вашої реклами
                    </a>
                </div>
                {{--                <div class="related-news related-post-slider">--}}
                @php
                    use App\Models\News\MainNews;
                    $main_news = MainNews::paginate(10);
                @endphp
                <div class="related-news related-slider">
                    @foreach($main_news as $news)

                        <div id="post-{{ $news->id }}" class="mainnews type-mainnews">
                            @if(!empty($news->image))
                                <div class="main-news-thumb" style="">
                                    <img src="{{ asset($news->image) }}" alt="">
                                </div>
                            @else
                                <div class="main-news-thumb" style="">
                                    <img class="none-img" width="auto" height="auto" src="{{ asset('/images/none-image.png') }}" alt="none image">
                                </div>
                            @endif
                            <div class="main-news-title d-flex flex-column justify-content-between" style="">
                                <a class="main-news-link" href="{{ route('main-news.show', $news->id) }}" redirect>{{ $news->title }}</a>
                                <div class="post-bottom d-flex flex-row justify-content-between">
                                    <span class="main-news-date">{{ $news->created_at }}</span>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{--                <?php echo do_shortcode('[related_news orderby="date" order="desc" type="mainnews" posts="36"]') ?>--}}
                {{--                </div>--}}
            </div>


        </div>
    </section>

@endsection
