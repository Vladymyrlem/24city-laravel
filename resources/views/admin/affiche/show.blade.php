@extends('layouts.app')

@section('title', 'Company')

@section('content')
    <h3>{{ $affiche->title }}</h3>
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Thumb</th>
            <th scope="col">excerpt</th>
            <th scope="col">Affiche Category</th>
            <th scope="col">Contacts</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th scope="row">{{ $affiche->id }}</th>
            <td>{{ $affiche->title}}</td>
            <td>{!! parseGalleryShortcode(parseVideoShortcode(parseSuListShortcode($affiche->content))) !!}
            <td><img width="250px" height="auto" src="{{ asset($affiche->image) }}" alt=""></td>
            <td>{!! $affiche->excerpt !!}</td>
            <td>
                @foreach ($affiche->categories as $category)
                    <!-- Parent Category -->
                    <strong><a href="{{ route('affiche.affiche-category-show', $category->id) }}">{{ $category->name }}</a>
                    </strong>

                @endforeach
            </td>
            <td>
                {{ $affiche->event_date }}
            </td>
            <td>{{$affiche->created_at}}</td>
        </tr>
        </tbody>
    </table>
    <script>

    </script>
@endsection

