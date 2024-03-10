@extends('layouts.app')

@section('title', 'Ads')

@section('content')
    <h3>{{ $ads->title }}</h3>
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Excerpt</th>
            <th scope="col">Thumb</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th scope="row">{{ $ads->id }}</th>
            <td>{{ $ads->title}}</td>
            <td>{!! $ads->content !!}</td>
            <td>{!! $ads->excerpt !!}</td>
            <td><img width="250" src="{{ asset($ads->image) }}" alt=""></td>
            <td>
                @foreach ($ads->categories as $category)
                    @if ($category->parent_id === null)
                        <!-- Parent Category -->
                        <strong><a
                                href="{{ route('admin.ads-category-show', $category->id) }}">{{ $category->name }}</a>
                        </strong>
                        <ul>
                            @foreach ($ads->categories as $subcategory)
                                @if ($subcategory->parent_id === $category->id)
                                    <!-- Subcategory -->
                                    <li>
                                        <a href="{{ route('ads.ads-category-show', $subcategory->id) }}">
                                        {{ $subcategory->name }}</li>
                                    </a>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </td>
            <td>
                <ul>
                    @forelse ($ads->tags as $tag)
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
            <td>{{$ads->created_at}}</td>
        </tr>
        </tbody>
    </table>
    <script>

    </script>
@endsection

