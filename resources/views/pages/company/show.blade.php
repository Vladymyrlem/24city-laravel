@extends('layout.app')

@section('title', 'Company')

@section('content')
    <h3>{{ $company->title_company }}</h3>
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
            <th scope="row">{{ $company->id }}</th>
            <td>{{ $company->title_company }}</td>
            <td>{!! $company->content !!}</td>
            <td><img width="250px" height="auto" src="{{ asset($company->thumbnail) }}" alt=""></td>
            <td><a target="_blank" href="{{ $company->adr_url }}">{{ $company->adr_title }}</a></td>
            <td>{!! $company->about_company !!}</td>
            <td>
                @foreach ($company->categories as $category)
                    @if ($category->parent_id === null)
                        <!-- Parent Category -->
                        <strong><a href="{{ route('company.company-category-show', ['id' => $category->id]) }}">{{ $category->name }}</a>
                        </strong>
                        <ul>
                            @foreach ($company->categories as $subcategory)
                                @if ($subcategory->parent_id === $category->id)
                                    <!-- Subcategory -->
                                    <li>
                                        <a href="{{ route('company.company-category-show', ['id' => $subcategory->id]) }}">
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
                        $phoneNumbers = explode('|', $company->contacts_phone);
                    @endphp
                    @foreach ($phoneNumbers as $phoneNumber)
                        <li><a href="tel:{{ $phoneNumber }}">{{ $phoneNumber }}</a></li>
                    @endforeach
                </ul>
            </td>
            <td>{{$company->created_at}}</td>
        </tr>
        </tbody>
    </table>
    <script>

    </script>
@endsection

