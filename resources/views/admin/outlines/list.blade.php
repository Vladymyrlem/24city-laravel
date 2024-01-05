@extends('layouts.app')

@section('title', 'Обзоры')

@section('content')
    <h1>Недвижимость</h1>
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
            {{--            <th scope="col">Content</th>--}}
            <th scope="col">Excerpt</th>
            <th scope="col">Thumb</th>
            <th scope="col">Tags</th>
            {{--            <th scope="col">Categories</th>--}}
            <th scope="col">Created_at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($outlines as $post)
            {{--            @dd($post)--}}
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><a href="{{ route('admin.outlines.show', $post->slug) }}">{{ $post->title }}</a></td>
                {{--                <td>{!! parseGalleryShortcode(parseVideoShortcode($post->content)) !!}</td>--}}
                <td>{!! $post->excerpt !!}</td>
                <td>
                    @if(!empty($post->image))
                        <img width="250px" height="auto" src="{{ asset($post->image) }}" alt="">
                    @endif
                </td>
                <td>
                    @foreach ($post->tags as $tag)
                        <strong><a href="{{ route('admin.outlines-tag-show', $tag->id) }}">{{ $tag->name }}</a>
                        </strong>
                    @endforeach
                </td>
                <td>{{$post->created_at}}</td>
                <td class="actions d-flex">
                    <a href="{{ route('admin.outlines.delete', $post->id) }}" class="btn btn-danger">Delete</a>&nbsp;
                    <a href="{{ route('admin.outlines.edit', $post->id) }}"
                       class="btn btn-warning d-flex align-items-center">
                        <i class="nav-icon fas fa-edit"></i>
                        &nbsp;Edit
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{--        {{ $real_estate->links('vendor.pagination.custom') }}--}}
    </div>
    <?php
    ?>

@endsection
