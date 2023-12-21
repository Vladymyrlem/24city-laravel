@extends('layouts.app')

@section('title', 'Tag' )

@section('content')
    <h1>{{ $newsTag->name }}</h1>
    {{--    @dd($newsTag->mainnews)--}}
    @if($newsTag->mainnews->count() > 0)
        <h2>Головні Новини</h2>
        <ul>
            @foreach($newsTag->mainnews as $news)
                <li>
                    <a href="{{ route('admin.mainNewsShow', ['newsid' => $news->id]) }}">
                        {{ $news->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
    {{--    @if($newsTag->news->count() > 0)--}}
    {{--        <h2>Новини</h2>--}}
    {{--        <ul>--}}
    {{--            @foreach($newsTag->news as $news)--}}
    {{--                {{ $news->title }}--}}
    {{--            @endforeach--}}
    {{--        </ul>--}}
    {{--    @endif--}}
@endsection

