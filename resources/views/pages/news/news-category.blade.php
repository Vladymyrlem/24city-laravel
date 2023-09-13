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
                        <h2 class="category"><a href="{{ route('news.category.show', $category->id) }}">{{ $category->name }}</a></h2>

                        {{--                        @if ($category->subcategories->count() > 0)--}}
                        {{--                            <ul>--}}
                        {{--                                @foreach ($category->subcategories as $subcategory)--}}
                        {{--                                    <li>--}}
                        {{--                                        <h3 class="subcatgory">--}}
                        {{--                                            <a href="{{ route('company.company-category-show', $subcategory->id) }}">--}}
                        {{--                                                {{ $subcategory->name }}--}}
                        {{--                                            </a>--}}
                        {{--                                        </h3>--}}
                        {{--                                        @if ($subcategory->subcategories->count() > 0)--}}
                        {{--                                            @include('pages.company.subcategories', ['subcategories' => $subcategory->subcategories])--}}
                        {{--                                        @endif--}}
                        {{--                                    </li>--}}
                        {{--                                @endforeach--}}
                        {{--                            </ul>--}}
                        {{--                        @endif--}}
                    </div>
                @endif
                <ol class="companies-list {{$category->slug}}-mainnews">
                    @foreach($category->news as $news)
                        @if($news->status === 'publish')

                            <li class="company-item">
                                <a href="{{ route('news.show', $news->id) }}">
                                    {{$news->title}}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ol>
                {{--                {{ $mainnews->links('vendor.pagination.custom') }}--}}
            @endforeach
        </div>

    </div>
@endsection

