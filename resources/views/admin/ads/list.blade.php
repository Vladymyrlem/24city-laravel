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
            <th scope="col">Content</th>
            <th scope="col">Excerpt</th>
            <th scope="col">Thumb</th>
            <th scope="col">Categories</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($ads as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><a href="{{ route('ads.show', $post->id) }}">{{ $post->title }}</a></td>
                <td>{!! $post->content !!}</td>
                <td>{!! $post->excerpt !!}</td>

                <td><img width="250px" height="auto" src="{{ asset($post->image) }}" alt=""></td>
                <td>
                    @foreach ($post->categories as $category)
                        @if ($category->parent_id === null)
                            <!-- Parent Category -->
                            <strong><a href="{{ route('ads.ads-category-show', ['id' => $category->id]) }}">{{ $category->name }}</a>
                            </strong>
                            <ul>
                                @foreach ($post->categories as $subcategory)
                                    @if ($subcategory->parent_id === $category->id)
                                        <!-- Subcategory -->
                                        <li>
                                            <a href="{{ route('ads.ads-category-show', ['id' => $subcategory->id]) }}">
                                            {{ $subcategory->name }}</li>
                                        </a>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{ $ads->links('vendor.pagination.custom') }}
    </div>
    <?php
    ?>

@endsection


