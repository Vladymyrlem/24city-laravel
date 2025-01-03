@extends('layout')

@section('title', 'Categories')

@section('breadcrumbs')
    @include('partials.breadcrumbs', [
        'links'=> [
            [
                'link' => '/admin/company/categories',
                'name' => 'Category List'
            ], [
                'link' => '/tags',
                'name' => 'Tag List'
            ]
        ]
    ])
@endsection

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-success" role="alert">
            {{ $_SESSION['success'] }}
        </div>
    @endisset
    @php
        unset($_SESSION['success']);
    @endphp
    <h1>Category List</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Posts</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <th>{{ $category->created_at }}</th>
                <th>{{ $category->updated_at }}</th>
                <td><a class="btn btn-info"
                       href="{{ route('adminCategoryRestore',['id' => $category->id]) }}">RESTORE</a></td>
                <td><a class="btn btn-danger"
                       href="{{ route('adminCategoryForceDelete',['id' => $category->id]) }}">X</a></td>

            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
    <a class="btn btn-secondary mt-3" href="{{ route('adminCategory') }}"> Back </a>
@endsection
