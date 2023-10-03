@extends('layouts.app')

@section('title', 'Страница объявлений')

@section('content')
    <h1>Люди</h1>
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
            <th scope="col">Content</th>
            <th scope="col">Excerpt</th>
            <th scope="col">Images</th>
            <th scope="col">Slug</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($peoples as $post)
            <tr>
                <th scope="row">{{ $index++ }}</th>
                <td>{{ $post->title }}</td>
                <td>{!! $post->content !!}</td>
                <td>{!! $post->excerpt !!}</td>
                <td><img width="250px" height="auto" src="{{ asset($post->image) }}" alt=""></td>
                <td>{{$post->slug}}</td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{ $peoples->links() }}
    </div>
@endsection


