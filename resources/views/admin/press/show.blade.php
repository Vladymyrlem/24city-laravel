@extends('layouts.app')

@section('title', 'People')

@section('content')
    <h3>{{ $peoples->title }}</h3>
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
            <th scope="row">{{ $peoples->id }}</th>
            <td>{{ $peoples->title}}</td>
            <td>
                {!! parseGalleryShortcode(parseVideoShortcode($peoples->content)) !!}
            </td>
            <td>{!! $peoples->excerpt !!}</td>

            <td><img width="250px" height="auto" src="{{ asset($peoples->image) }}" alt=""></td>
            <td>
                <ul>
                    @forelse ($peoples->tags as $tag)
                        <li><a href="{{ route('admin.peoples-tag-show', $tag->id) }}">{{$tag->name}}</a></li>
                    @empty
                        <li>
                            {{ 'Тегів не знайдено' }}
                        </li>
                    @endforelse
                </ul>
            </td>
            <td>
                {{--                @dd($peoples->categories)--}}
                {{--                @forelse ($peoples->categories as $cat)--}}
                {{--                    <li><a href="{{ route('admin,real_estate-category-show', $cat->id) }}">{{$cat->name}}</a></li>--}}
                {{--                @empty--}}
                {{--                    <li>--}}
                {{--                        {{ 'Катгорій не знайдено' }}--}}
                {{--                    </li>--}}
                {{--                @endforelse--}}
            </td>
            <td>
                {{$peoples->created_at}}
            </td>
        </tr>
        </tbody>
    </table>
    <script>

    </script>
@endsection

