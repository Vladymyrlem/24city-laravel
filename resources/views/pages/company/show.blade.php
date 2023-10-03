@extends('layouts.master')

@section('title', 'Company')

@section('content')
    <h3>{{ $company->title_company }}</h3>
    {{--    <div class="breadcrumbs">--}}
    {{--        @if ($company->category)--}}
    {{--    {{ Breadcrumbs::render('company.show', $category) }}--}}
    {{--        @endif--}}
    {{--    </div>--}}
    {{--    <nav aria-label="breadcrumb">--}}
    {{--        <ol class="breadcrumb">--}}
    {{--            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>--}}
    {{--            @php--}}
    {{--                $breadcrumbCategories = [];--}}
    {{--                $currentCategory = $category;--}}
    {{--                while ($currentCategory) {--}}
    {{--                    $breadcrumbCategories[] = $currentCategory;--}}
    {{--                    $currentCategory = $currentCategory->parentCategory;--}}
    {{--                }--}}
    {{--            @endphp--}}
    {{--            @foreach (array_reverse($breadcrumbCategories) as $breadcrumbCategory)--}}
    {{--                <li class="breadcrumb-item {{ $breadcrumbCategory->id == $category->id ? 'active' : '' }}">--}}
    {{--                    @if ($breadcrumbCategory->id == $category->id)--}}
    {{--                        {{ $breadcrumbCategory->name }}--}}
    {{--                    @else--}}
    {{--                        <a href="{{ route('company.company-category-show', $breadcrumbCategory->id) }}">--}}
    {{--                            {{ $breadcrumbCategory->name }}--}}
    {{--                        </a>--}}
    {{--                    @endif--}}
    {{--                </li>--}}
    {{--            @endforeach--}}
    {{--            <li class="breadcrumb-item">--}}
    {{--                {{ $company->title_company }}--}}
    {{--            </li>--}}
    {{--        </ol>--}}
    {{--    </nav>--}}

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
    <section>
        <ul>
            @foreach($company->relatedCompanies as $related)
                <li>
                    <a href="{{ route('company.show', $related->id) }}">
                        {{ $related->title_company }}
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
    <script>

    </script>
@endsection

