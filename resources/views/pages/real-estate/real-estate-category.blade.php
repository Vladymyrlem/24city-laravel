@extends('layout.app')

@section('title', 'Company categories')

@section('content')
    <h1>Company categories</h1>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <ul>
                    @if (!$category->parent_id)
                        <li>
                            <h2><a href="{{ route('real-estate.category.show', $category->id) }}">{{ $category->name }}</a>
                                {{$category->real_estate->count()}}

                            </h2>

                            @if ($category->subcategories->count(0) > 0)
                                <ul>
                                    @foreach ($category->subcategories as $subcategory)
                                        <li>
                                            <h3 class="subcatgory">
                                                <a href="{{ route('real-estate.category.show', $subcategory->id) }}">
                                                    {{ $subcategory->name }}
                                                </a>
                                                {{$subcategory->real_estate->count(0)}}
                                            </h3>
                                            @if ($subcategory->subcategories->count() > 0)
                                                @include('pages.real-estate.subcategories', ['subcategories' => $subcategory->subcategories])
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

    </div>
@endsection

