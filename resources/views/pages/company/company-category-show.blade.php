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
            <li>
                {{ $company->title_company }}
            </li>
        </ol>
    </nav>

    <h2>{{ $category->name }} First level</h2>
    <p>Total Companies: {{ $category->company->count() }}</p>

    @if ($category->subcategories->count() > 0)
        <ul>
            @foreach ($category->subcategories as $subcategory)

                <li>
                    <h3>
                        <a href="{{ route('company.company-category-show', $subcategory->id) }}">
                            {{ $subcategory->name }}
                        </a>
                        ({{ $subcategory->company->count() ?? 0 }})
                    </h3>
                    @if ($subcategory->subcategories->count() > 0)
                        @include('pages.company.subcategories', ['subcategories' => $subcategory->subcategories])
                    @endif
                </li>

            @endforeach
        </ul>
    @endif

    <ol class="companies-list {{$category->slug}}-companies">
        @foreach($companies as $company)
            <li class="company-item">
                <a href="{{ route('company.show', $company->id) }}">
                    {{$company->title_company}}
                </a>
            </li>
        @endforeach
    </ol>
    {{ $companies->links('vendor.pagination.custom') }}

@endsection
