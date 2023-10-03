@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12 connectedSortable">

                    <form role="form" action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="input-group">
                            <label for="title_company">Название компании</label>
                            <input type="text" name="title" id="title_company" class=""/>
                        </div>
                        <div class="company-categories input-group">
                            <label for="">Катeгорії компаній</label>
                            <select name="categories[]" id="company-category" multiple>
                                @foreach ($categories as $category)
                                    @if ($category->parent_id === null)
                                        <!-- Parent Category -->
                                        <option class=" row" value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>

                                        @foreach ($categories as $subcategory)
                                            @if ($subcategory->parent_id === $category->id)
                                                <!-- Subcategory -->
                                                &nbsp;&nbsp;
                                                <option class="row" value="{{ $subcategory->id }}">
                                                    {{ $subcategory->name }}
                                                </option>
                                                @if ($subcategory->subcategories->count() > 0)
                                                    @include('admin.company.category.subcategories-select', ['subcategories' => $subcategory->subcategories])
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div id="address">
                            <label for="">Адрес</label>
                            <address></address>
                        </div>
                        <div id="phones">
                            <label for="">Контакты</label>
                            <phone-numbers></phone-numbers>
                        </div>
                        {{--        <div id="social-list">--}}
                        {{--            <label for="">Social List</label>--}}
                        {{--            <social-list></social-list>--}}
                        {{--        </div>--}}
                        {{--        <div id="emails">--}}
                        {{--            <label for="">Emails List</label>--}}
                        {{--            <emails></emails>--}}
                        {{--        </div>--}}
                        {{--        <div id="about-company-content">--}}
                        {{--            <label for="about-company">О Компании</label>--}}
                        <textarea name="about_company" id="about-company" cols="30" rows="10"></textarea>
                        {{--        </div>--}}
                        {{--        <div id="connectivity-list">--}}
                        {{--            <label for="">Connectivity List</label>--}}
                        {{--            <connectivity-list></connectivity-list>--}}
                        {{--        </div>--}}
                        {{--        <div id="companies-list">--}}
                        {{--            <ul id="all-posts">--}}
                        {{--                <!-- Populate this ul with all created posts as li items -->--}}
                        {{--                @foreach($companies as $post)--}}
                        {{--                    <li>--}}
                        {{--                        <input type="checkbox" name="related_posts[]" value="{{ $post->id }}">--}}
                        {{--                        {{ $post->title_company }}--}}
                        {{--                    </li>--}}
                        {{--                @endforeach--}}
                        {{--            </ul>--}}
                        {{--            <div class="page_navigation"></div>--}}
                        {{--        </div>--}}

                        <div>
                            <h3>Selected Posts</h3>
                            <ul id="selected-posts">
                                <!-- Selected posts will appear here as li items -->
                            </ul>
                        </div>

                        <button type="button">Save Selected Posts</button>
                        <button type="submit">Save Posts</button>
                    </form>
                </section>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

