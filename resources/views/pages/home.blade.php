@extends('layout.app')

@section('title', 'Main page')

@section('content')
    <h1>Home Page</h1>
    <form action="" method="post">
        @csrf
        @method('post')
        <textarea name="" id="myeditorinstance" cols="30" rows="10"></textarea>
    </form>
    <form method="POST" action="{{ route('save-selected-posts') }}">
        @csrf

        <div>
            <h3>All Posts</h3>
            <ul id="all-posts">
                <!-- Populate this ul with all created posts as li items -->
                @foreach($companies as $post)
                    <li>
                        <input type="checkbox" name="selected_posts[]" value="{{ $post->id }}">
                        {{ $post->title_company }}
                    </li>
                @endforeach
            </ul>
            {{ $companies->links('vendor.pagination.custom') }}
        </div>

        <div>
            <h3>Selected Posts</h3>
            <ul id="selected-posts">
                <!-- Selected posts will appear here as li items -->
            </ul>
        </div>

        <button type="submit">Save Selected Posts</button>
    </form>

@endsection

