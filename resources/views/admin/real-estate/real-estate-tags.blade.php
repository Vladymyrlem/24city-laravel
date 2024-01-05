@extends('layouts.app')

@section('title', 'Company tags')

@section('content')
    <h1>Company tags</h1>
    <div class="row">
        <ul class="first-level list-group">
            @foreach ($tags as $tag)
                <li class="list-group-item">
                    <h2>
                        <a href="{{ route('admin.real-estate-tag-show', $tag->id) }}">{{ $tag->name }}</a>
                        {{ optional($tag->name)->count() ?? 0 }}
                    </h2>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

