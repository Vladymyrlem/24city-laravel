@extends('layouts.app')

@section('title', 'News categories')

@section('content')
    <h1>News categories</h1>
    <div class="container">
        <div class="row">
            <table class="col-12 table" id="news-categories">
                <thead>
                <tr>
                    <th>Название категории</th>
                    <th>Slug</th>
                    <th>Редактировать категорию</th>
                    <th>Удалить категорию</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    @if (!$category->parent_id)
                        <!-- Check if it's a top-level category -->

                        <tr>
                            <td>
                                <h2 class="category"><a
                                        href="{{ route('admin.news-category-show', $category->id) }}">{{ $category->name }}</a>
                                </h2>
                            </td>
                            <td>{{ $category->slug }}</td>
                            <td><a href="{{ route('adminNewsCategoryEdit', $category->id) }}" class="btn btn-outline">Редактировать</a>
                            </td>
                            <td><a href="{{ route('adminNewsCategoryDelete', $category->id) }}" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>

                        @if (optional($category->subcategories)->count() > 0)
                            {{--                            <ul class="subcategory">--}}
                            @foreach ($category->subcategories as $subcategory)
                                <tr class="subcategory-item">
                                    <td>
                                        <h3 class="subcatgory">
                                            <a href="{{ route('admin.news-category-show', $subcategory->id) }}">
                                                {{ $subcategory->name }}
                                            </a>
                                            {{$subcategory->news->count(0)}}
                                        </h3>
                                    </td>
                                    <td>{{ $subcategory->slug }}</td>
                                    <td><a href="{{ route('adminNewsCategoryEdit', $subcategory->id) }}"
                                           class="btn btn-outline">Редактировать</a></td>
                                    <td><a href="{{ route('adminNewsCategoryDelete', $category->id) }}"
                                           class="btn btn-danger">Удалить</a></td>
                                    @if ($subcategory->subcategories->count() > 0)
                                        @include('admin.news.subcategories', ['subcategories' => $subcategory->subcategories])
                                    @endif
                                </tr>
                            @endforeach
                            {{--                            </ul>--}}
                        @endif

                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

