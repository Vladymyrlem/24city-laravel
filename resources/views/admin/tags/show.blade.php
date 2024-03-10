@extends('layouts.app')

@section('title', 'Tag' )

@section('content')
    <h1>Тег {{ $tag->name }}</h1>
    {{--    @dd($newsTag->mainnews)--}}
    @if($tag->mainnews->count() > 0)
        <h2>Новини {{ $tag->id }}</h2>
        <ul>
            @foreach($tag->mainnews as $news)
                <li>
                    <a href="{{ route('admin.mainNewsShow', ['slug' => $news->slug]) }}">
                        {{ $news->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
    @if($tag->ads->count() > 0)
        <h2>Об'яви</h2>
        <ul>
            @foreach($tag->ads as $ads)
                <li>
                    <a href="{{ route('admin.ads.show', ['adsId' => $ads->id]) }}">{{ $ads->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

