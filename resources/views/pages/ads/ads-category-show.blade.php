@extends('layouts.master')

@section('title', 'Ads Category')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            @php
                use App\Models\Ads\AdsCategory;
            @endphp
                @if (isset($category->parentCategory) && !is_null($category->parentCategory))
                    <li class="breadcrumb-item">
                        <a href="{{ route('ads.ads-category-show', $category->parentCategory->id) }}">
                            {{ $category->parentCategory->name }}
                        </a>
                    </li>
                @endif

            <li class="breadcrumb-item">
                @if ($category->id)
                    <a href="{{ route('company.company-category-show', $category->id) }}">
                        {{ $category->name }}
                    </a>
                @else
                    {{ $category->name }}
                @endif
            </li>


        </ol>
    </nav>
    <h2>{{ $ads_category->name }} First level</h2>
    <p>Total Companies: @if(!is_null($ads_category->ads))
            {{ $ads_category->ads->count() }}
        @else
            {{ 0 }}
        @endif</p>

    {{--        @if (count($cat->subcategories) !== 0 || $cat->parent_id !== null)--}}
    {{--            <ul>--}}
    {{--                @foreach ($cat->subcategories as $subcategory)--}}

    {{--                    <li>--}}
    {{--                        <h3>--}}
    {{--                            <a href="{{ route('company.company-category-show', $subcategory->id) }}">--}}
    {{--                                {{ $subcategory->name }}--}}
    {{--                            </a>--}}
    {{--                            ({{ $subcategory->ads->count() ?? 0 }})--}}
    {{--                        </h3>--}}
    {{--                        @if ($subcategory->subcategories->count() > 0)--}}
    {{--                            @include('pages.company.subcategories', ['subcategories' => $subcategory->subcategories])--}}
    {{--                        @endif--}}
    {{--                    </li>--}}

    {{--                @endforeach--}}
    {{--            </ul>--}}
    {{--        @endif--}}

    <ol class="companies-list {{$ads_category->slug}}-companies">
        @foreach($ads as $company)
            <li class="company-item">
                <a href="{{ route('ads.show', $company->id) }}">
                    {{$company->title}}
                </a>
            </li>
        @endforeach
    </ol>
    {{ $ads->links('vendor.pagination.custom') }}

@endsection
