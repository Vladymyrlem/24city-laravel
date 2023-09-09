@extends('layout.app')

@section('title', 'Company')

@section('content')
    <h3>{{ $ads->title }}</h3>
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Thumb</th>
            <th scope="col">address</th>
            <th scope="col">About Company</th>
            <th scope="col">Category Company</th>
            <th scope="col">Contacts</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th scope="row">{{ $ads->id }}</th>
            <td>{{ $ads->title}}</td>
            <td>{!! $ads->content !!}</td>
            <td><img width="250px" height="auto" src="{{ asset($ads->image) }}" alt=""></td>
            <td>{!! $ads->about_company !!}</td>
            <td>
                @foreach ($ads->categories as $category)
                    @if ($category->parent_id === null)
                        <!-- Parent Category -->
                        <strong><a href="{{ route('ads.ads-category-show', $category->id) }}">{{ $category->name }}</a>
                        </strong>
                        <ul>
                            @foreach ($ads->categories as $subcategory)
                                @if ($subcategory->parent_id === $category->id)
                                    <!-- Subcategory -->
                                    <li>
                                        <a href="{{ route('ads.ads-category-show', $subcategory->id) }}">
                                        {{ $subcategory->name }}</li>
                                    </a>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </td>
            <td>
                <ul>
                    @php
                        $phoneNumbers = explode('|', $ads->contacts_phone);
                    @endphp
                    @foreach ($phoneNumbers as $phoneNumber)
                        <li><a href="tel:{{ $phoneNumber }}">{{ $phoneNumber }}</a></li>
                    @endforeach
                </ul>
            </td>
            <td>{{$ads->created_at}}</td>
        </tr>
        </tbody>
    </table>
    <script>

    </script>
@endsection

