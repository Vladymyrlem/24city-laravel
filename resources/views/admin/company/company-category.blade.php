@extends('layouts.app')

@section('title', 'Company categories')

@section('content')
    <h1>Company categories</h1>
    <div class="row">
        <table class="col-12 table" id="company-categories">
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
                            <h2 class="category"><a href="{{ route('admin.company-category-show', $category->id) }}">{{ $category->name }}</a></h2>
                        </td>
                        <td>{{ $category->slug }}</td>
                        <td><a href="{{ route('adminCompanyCategoryEdit', $category->id) }}" class="btn btn-outline">Редактировать</a></td>
                        <td><a href="{{ route('adminCompanyCategoryDelete', $category->id) }}" class="btn btn-danger">Удалить</a></td>
                    </tr>

                    @if ($category->subcategories->count() > 0)
                        {{--                            <ul class="subcategory">--}}
                        @foreach ($category->subcategories as $subcategory)
                            <tr class="subcategory-item">
                                <td>
                                    <h3 class="subcatgory">
                                        <a href="{{ route('admin.company-category-show', $subcategory->id) }}">
                                            {{ $subcategory->name }}
                                        </a>
                                        {{$subcategory->company->count(0)}}
                                    </h3>
                                </td>
                                <td>{{ $subcategory->slug }}</td>
                                <td><a href="{{ route('adminCompanyCategoryEdit', $subcategory->id) }}" class="btn btn-outline">Редактировать</a></td>
                                <td><a href="{{ route('adminCompanyCategoryDelete', $category->id) }}" class="btn btn-danger">Удалить</a></td>
                                @if ($subcategory->subcategories->count() > 0)
                                    @include('admin.company.subcategories', ['subcategories' => $subcategory->subcategories])
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
@endsection

