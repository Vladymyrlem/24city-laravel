@extends('layouts.app')

@section('title', 'News tags')

@section('content')
    <h1>News categories</h1>
    <div class="container">
        <div class="row">
            <table class="col-12 table" id="news-categories">
                <thead>
                <tr>
                    <th>Название тега</th>
                    <th>Slug</th>
                    <th>Редактировать тег</th>
                    <th>Удалить тег</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($newsTags as $news)
                    <!-- Check if it's a top-level category -->
                    @dd($news->tags)
                    <tr>
                        <td>
                            <h2 class="tag"><a
                                    href="{{ route('admin.news-tag-show', $news->tags->id) }}">{{ $news->tags->name }}</a>
                            </h2>
                        </td>
                        <td>{{ $news->tags->slug }}</td>
                        <td><a href="{{ route('adminNewsTagEdit', $news->tags->id) }}"
                               class="btn btn-outline">Редактировать</a>
                        </td>
                        <td><a href="{{ route('adminNewsTagDelete', $news->tags->id) }}"
                               class="btn btn-danger">Удалить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

