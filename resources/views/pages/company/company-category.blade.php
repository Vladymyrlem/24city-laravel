@extends('layout.app')

@section('title', 'Company categories')

@section('content')
    <h1>Company categories</h1>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                @if (!$category->parent_id)
                    <!-- Check if it's a top-level category -->
                    <div class="col-4">
                        <h2 class="category"><img src="{{ asset($category->image) }}" alt=""><a href="{{ route('company.company-category-show', $category->id) }}">{{ $category->name }}</a></h2>

                        @if ($category->subcategories->count() > 0)
                            <ul>
                                @foreach ($category->subcategories as $subcategory)
                                    <li>
                                        <h3 class="subcatgory">
                                            <a href="{{ route('company.company-category-show', $subcategory->id) }}">
                                                {{ $subcategory->name }}
                                            </a>
                                            {{$subcategory->company->count(0)}}
                                        </h3>
                                        @if ($subcategory->subcategories->count() > 0)
                                            @include('pages.company.subcategories', ['subcategories' => $subcategory->subcategories])
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

