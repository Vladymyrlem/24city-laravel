@extends('layout.app')

@section('title', 'News')

@section('content')
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
            <li class="breadcrumb-item main-news-categories">
                <a href="{{ route('news.category') }}">
                    Main news Categories
                </a>
            </li>
            @foreach ($breadcrumbCategories as $breadcrumbCategory)
                <li class="breadcrumb-item {{ $breadcrumbCategory->id == $category->id ? 'active' : '' }}">
                    @if ($breadcrumbCategory->id == $category->id)
                        {{ $breadcrumbCategory->name }}
                    @else
                        <a href="{{ route('news.category.show', $breadcrumbCategory->id) }}">
                            {{ $breadcrumbCategory->name }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>

    <h2>{{ $category->name }} First level</h2>
    {{--    <p>Total Companies: @if(!is_null($category->mainnews))--}}
    {{--            {{ $category->mainnews->count() }}--}}
    {{--        @else--}}
    {{--            {{ 0 }}--}}
    {{--        @endif</p>--}}
    {{--    @dd($category->mainnews)--}}
    {{--    @if (count($category->subcategories) !== 0 || $category->parent_id !== null)--}}
    {{--        <ul>--}}
    {{--            @foreach ($category->subcategories as $subcategory)--}}

    {{--                <li>--}}
    {{--                    <h3>--}}
    {{--                        <a href="{{ route('company.company-category-show', $subcategory->id) }}">--}}
    {{--                            {{ $subcategory->name }}--}}
    {{--                        </a>--}}
    {{--                        ({{ $subcategory->company->count() ?? 0 }})--}}
    {{--                    </h3>--}}
    {{--                    @if ($subcategory->subcategories->count() > 0)--}}
    {{--                        @include('pages.company.subcategories', ['subcategories' => $subcategory->subcategories])--}}
    {{--                    @endif--}}
    {{--                </li>--}}

    {{--            @endforeach--}}
    {{--        </ul>--}}
    {{--    @endif--}}
    {{--    @dd($news)--}}
    <ol class="companies-list {{$category->slug}}-mainnews">
        @foreach($category->news as $news)
            @if($news->status === 'publish')
                <li class="company-item">
                    <a href="{{ route('main-news.show', $news->id) }}">
                        {{$news->title}}
                    </a>
                </li>
            @endif
        @endforeach
    </ol>
    {{--    {{ $category->mainnews->links('vendor.pagination.custom') }}--}}
@endsection
