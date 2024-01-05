@extends('layouts.app')

@section('title', 'Company categories')

@section('content')
    <h1>Company categories</h1>
    <div class="row">
        @foreach ($categories->where('parent_id', null) as $category)
            <ul class="first-level list-group">
                @if (!$category->parent_id)
                    <li class="list-group-item">
                        <h2>
                            <a href="{{ route('admin.real-estate-category-show', $category->id) }}">{{ $category->name }}</a>
                            {{ optional($category->real_estate)->count() ?? 0 }}
                        </h2>

                        @if ($category->subcategories && $category->subcategories->count() > 0)
                            <ul class="second-level list-group">
                                @foreach ($category->subcategories as $subcategory)
                                    <li class="list-group-item">
                                        <h3 class="subcategory">
                                            <a href="{{ route('admin.real-estate-category-show', $subcategory->id) }}">
                                                {{ $subcategory->name }}
                                            </a>
                                            {{ optional($subcategory->real_estate)->count() ?? 0 }}
                                        </h3>
                                        @if ($subcategory->subcategories->count() > 0)
                                            @include('admin.real-estate.subcategories', ['subcategories' => $subcategory->subcategories])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            </ul>
            {{--                <ol class="real-estate-list {{$category->slug}}-real_estate">--}}
            {{--                    @foreach($category->real_estate as $real_estate)--}}

            {{--                        <li class="real-estate-item">--}}
            {{--                            <a href="{{ route('real-estate.show', $real_estate->id) }}">--}}
            {{--                                {{$real_estate->title}}--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                    @endforeach--}}
            {{--                </ol>--}}
            {{--                {{ $mainreal_estate->links('vendor.pagination.custom') }}--}}
        @endforeach
    </div>
@endsection

