@extends('layouts.master')

@section('title', 'Main page')

@section('content')
    <h1>Home Page</h1>
    <form action="" method="post">
        @csrf
        @method('post')
        <textarea name="" id="myeditorinstance" cols="30" rows="10"></textarea>
    </form>
    <form action="{{ route('company.create') }}" method="post">
        @csrf
        @method('post')
        <div id="phone-fields">
            <div class="phone-field">
                <input type="text" name="phones[]" placeholder="Phone Number">
                <input type="checkbox" name="fax[]" value="1"> Fax
            </div>
        </div>

        <button type="button" id="add-phone">Add Phone</button>
        <button type="submit">Save phones</button>
    </form>
    <form method="POST" action="{{ route('save-selected-posts') }}">
        @csrf

        <div id="companies-list">
            <ul id="all-posts">
                <!-- Populate this ul with all created posts as li items -->
                @foreach($companies as $post)
                    <li>
                        <input type="checkbox" name="related_posts[]" value="{{ $post->id }}">
                        {{ $post->title_company }}
                    </li>
                @endforeach
            </ul>
            <div class="page_navigation"></div>
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

