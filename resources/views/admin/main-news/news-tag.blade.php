@extends('layouts.app')

@section('title', 'Tag posts')

@section('content')
    <h1>Tag posts</h1>
    <div class="container">
        <div class="row">
            <h1>
                {{ $tag->name }}
            </h1>
            {{--            @dd($news)--}}
            <ul>
                @foreach ($tag->mainnews as $post)
                    <li><a href="{{ route('main-news.show', $post) }}">{{ $post->title }}</a>
                        {{ $post->content }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

