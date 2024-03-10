@extends('layouts.app')

@section('title', 'Страница объявлений')

@section('content')
    <h1>Страница объявлений</h1>
    @isset($_SESSION['success'])
        <div class="alert alert-info" role="alert">
            {{   $_SESSION['success']  }}
        </div>
        @php
            unset($_SESSION['success']);
        @endphp
    @endisset
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            {{--            <th scope="col">Content</th>--}}
            {{--            <th scope="col">Excerpt</th>--}}
            <th scope="col">Thumb</th>
            <th scope="col">Categories</th>
            <th scope="col">Tags</th>
            <th scope="col">Actions</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($ads as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><a href="{{ route('admin.ads.show', $post->id) }}">{{ $post->title }}</a></td>
                {{--                <td>{!! $post->content !!}</td>--}}
                {{--                <td>{!! $post->excerpt !!}</td>--}}
                <td><img width="250px" height="auto" src="{{ asset($post->image) }}" alt=""></td>
                <td>
                    @foreach ($post->categories as $category)
                        @if ($category->parent_id === null)
                            <!-- Parent Category -->
                            <strong>
                                <a href="{{ route('admin.ads-category-show',$category->id) }}">{{ $category->name }}</a>
                            </strong>
                            <ul>
                                @foreach ($post->categories as $subcategory)
                                    @if ($subcategory->parent_id === $category->id)
                                        <!-- Subcategory -->
                                        <li>
                                            <a href="{{ route('admin.ads-category-show', $subcategory->id) }}">
                                                {{ $subcategory->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </td>
                <td>
                    <ul>
                        @forelse ($post->tags as $tag)
                            <li>
                                <a href="{{ route('admin.tag.show', $tag->id) }}">
                                    {{ $tag->name }}
                                </a>
                            </li>
                        @empty
                            <li>
                                {{ 'Тегів не знайдено' }}
                            </li>
                        @endforelse
                    </ul>
                </td>
                <td class="d-flex">
                    <a href="{{ route('admin.ads.edit', $post->id) }}" class="btn btn-warning ml-2">Edit</a>&nbsp;
                    <a href="{{ route('admin.ads.delete', $post->id) }}" class="btn btn-danger">Delete</a>
                </td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--    <div class="card-footer clearfix">--}}
    {{ $ads->links('vendor.pagination.custom') }}
    {{--    </div>--}}

@endsection


