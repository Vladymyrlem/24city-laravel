@extends('layouts.master')

@section('title', 'Company')

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
            @foreach ($breadcrumbCategories as $breadcrumbCategory)
                <li class="breadcrumb-item {{ $breadcrumbCategory->id == $category->id ? 'active' : '' }}">
                    @if ($breadcrumbCategory->id == $category->id)
                        {{ $breadcrumbCategory->name }}
                    @else
                        <a href="{{ route('ads.ads-category-show', $breadcrumbCategory->id) }}">
                            {{ $breadcrumbCategory->name }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>

    <h2>{{ $category->name }} First level</h2>
    <p>Total Companies: @if(!is_null($category->ads))
            {{ $category->affiche->count() }}
        @else
            {{ 0 }}
        @endif</p>

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

    <ol class="companies-list {{$category->slug}}-companies">
        @foreach($category->affiche as $affiche)
            <li class="company-item">
                <a href="{{ route('affiche.show', $affiche->id) }}">
                    {{$affiche->title}}
                </a>
            </li>
        @endforeach
    </ol>
    {{--    {{ $affiche->links('vendor.pagination.custom') }}--}}

@endsection
