@extends('layouts.app')

@section('title', 'Company')

@section('content')
    <h3>{{ $real_estate->title }}</h3>
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Excerpt</th>
            <th scope="col">Thumb</th>
            <th scope="col">tags</th>
            <th scope="col">Category</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th scope="row">{{ $real_estate->id }}</th>
            <td>{{ $real_estate->title}}</td>
            <td>
                {!! parseGalleryShortcode(parseVideoShortcode($real_estate->content)) !!}
            </td>
            <td>{!! $real_estate->excerpt !!}</td>

            <td><img width="250px" height="auto" src="{{ asset($real_estate->image) }}" alt=""></td>
            <td>
                <ul>
                    @forelse ($real_estate->tags as $tag)
                        <li><a href="{{ route('admin.real-estate-tag-show', $tag->id) }}">{{$tag->name}}</a></li>
                    @empty
                        <li>
                            {{ 'Тегів не знайдено' }}
                        </li>
                    @endforelse
                </ul>
            </td>
            <td>
                {{--                @dd($real_estate->categories)--}}
                {{--                @forelse ($real_estate->categories as $cat)--}}
                {{--                    <li><a href="{{ route('admin,real_estate-category-show', $cat->id) }}">{{$cat->name}}</a></li>--}}
                {{--                @empty--}}
                {{--                    <li>--}}
                {{--                        {{ 'Катгорій не знайдено' }}--}}
                {{--                    </li>--}}
                {{--                @endforelse--}}
            </td>
            <td>
                {{$real_estate->created_at}}
            </td>
        </tr>
        </tbody>
    </table>
    <script>

    </script>
@endsection

