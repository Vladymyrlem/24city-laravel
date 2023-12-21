@extends('layouts.app')

@section('title', 'News tags')

@section('content')
    <h1>News tags</h1>
    <div class="container">
        <div class="row">
            <table class="col-12 table" id="news-tags">
                <thead>
                <tr>
                    <th>Название тега</th>
                    <th>Slug</th>
                    <th>Редактировать тег</th>
                    <th>Удалить тег</th>
                </tr>
                </thead>
                <tbody>
                {{--                @dd($newsTags)--}}

                @foreach ($newsTags as $news)
                    <!-- Check if it's a top-level category -->
                    {{--                    @dd($news->tags)--}}
                    @php
                        // Збираємо всі теги для кожної новини
$allTags = $newsTags->pluck('tags.*.name')->flatten()->unique();
    $uniqueTags = \App\Models\Tag::whereIn('name', $allTags)->get();
//echo $uniqueTags;
                    @endphp
                    {{--                    @dd($collection)--}}
                    {{--                    {{ $news->title }}{{ $news->id }}<br>--}}
                    {{--                    @foreach($uniqueTags as $tag)--}}
                    {{--                        {{ $tag->name }}<br>--}}
                    {{--                    @endforeach--}}
                    @foreach ($uniqueTags as $tag)
                        <tr>
                            <td>
                                <h4 class="tag">
                                    <a href="{{ route('admin.main-news-tag-show', $tag->id) }}">{{ $tag->name }}</a>
                                </h4>
                            </td>
                            <td>{{ $tag->slug }}</td>
                            <td><a href="{{ route('adminNewsTagEdit', $tag->id) }}"
                                   class="btn btn-outline">Редактировать</a>
                            </td>
                            <td><a href="{{ route('adminNewsTagDelete', $tag->id) }}"
                                   class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
            {{--            <div class="card-footer clearfix">--}}
            {{--            {{ $uniqueTags->links('vendor.pagination.custom') }}--}}
            {{--            </div>--}}
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script>
    jQuery(document).ready(function ($) {

        // jQuery("#news-tags>tbody").paginathing({
        //     perPage: 25,
        //     limitPagination: 5,
        //     prevNext: true,
        //     firstLast: true,
        //     prevText: '<',
        //     nextText: '>',
        //     firstText: '<<',
        //     lastText: '>>',
        //     activeClass: 'active',
        // });
    });
</script>
