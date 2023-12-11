@extends('layouts.master')

@section('title', 'Company categories')

@section('content')
    <h1>Company categories</h1>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                @if (!$category->parent_id)
                    <!-- Check if it's a top-level category -->
                    <div class="col-4">
                        <h2 class="category"><a
                                href="{{ route('admin.ads-category-show', $category->id) }}">{{ $category->name }}</a>
                        </h2>

                        @if ($category->subcategories->count() > 0)
                            <ul>
                                @foreach ($category->subcategories as $subcategory)
                                    <li>
                                        <h3 class="subcatgory">
                                            <a href="{{ route('admin.ads-category-show', $subcategory->id) }}">
                                                {{ $subcategory->name }}
                                            </a>
                                        </h3>
                                        @if ($subcategory->subcategories->count() > 0)
                                            @include('admin.ads.category.subcategories', ['subcategories' => $subcategory->subcategories])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

