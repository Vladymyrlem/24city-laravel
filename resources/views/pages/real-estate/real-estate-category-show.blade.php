@extends('layout.app')

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
            <li class="breadcrumb-item main-real_estate-categories">
                <a href="{{ route('real-estate.category') }}">
                    Main real_estate Categories
                </a>
            </li>
            @foreach ($breadcrumbCategories as $breadcrumbCategory)
                <li class="breadcrumb-item {{ $breadcrumbCategory->id == $category->id ? 'active' : '' }}">
                    @if ($breadcrumbCategory->id == $category->id)
                        {{ $breadcrumbCategory->name }}
                    @else
                        <a href="{{ route('real-estate.category.show', $breadcrumbCategory->id) }}">
                            {{ $breadcrumbCategory->name }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>

    <h2>{{ $category->name }} First level</h2>
    {{--    <p>Total Companies: @if(!is_null($category->mainreal_estate))--}}
    {{--            {{ $category->mainreal_estate->count() }}--}}
    {{--        @else--}}
    {{--            {{ 0 }}--}}
    {{--        @endif</p>--}}
    {{--    @dd($category->mainreal_estate)--}}
    @if (!empty($category->subcategories) && is_array($category->subcategories))
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <h3>
                        <a href="{{ route('real-estate.real-estate-category-show', $subcategory->id) }}">
                            {{ $subcategory->name }}
                        </a>
                        ({{ $subcategory->company->count() ?? 0 }})
                    </h3>
                    @if ($subcategory->subcategories->count() > 0)
                        @include('pages.real-estate.subcategories', ['subcategories' => $subcategory->subcategories])
                    @endif
                </li>

            @endforeach
        </ul>
    @endif
    {{--    @dd($real_estate)--}}
    <ol class="companies-list {{$category->slug}}-mainreal_estate">
        @foreach($category->real_estate as $real_estate)
            <li class="company-item">
                <a href="{{ route('real-estate.show', $real_estate->id) }}">
                    {{$real_estate->title}}
                </a>
            </li>
        @endforeach
    </ol>
    {{--    {{ $category->mainreal_estate->links('vendor.pagination.custom') }}--}}
@endsection
