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
                        <div id="company-thumbnail">
                            <label for="">Картинка компании</label>
                            <image-upload></image-upload>
                        </div>
                        <div class="company-categories input-group">
                            <label for="">Катeгорії компаній</label>
                            <select name="categories[]" id="company-category" class="form-select" multiple>
                                @foreach ($categories as $category)
                                    @if ($category->parent_id === null)
                                        <option class="row" value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                        @foreach ($categories as $subcategory)
                                            @if ($subcategory->parent_id === $category->id)
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
                        <div id="social-list">
                            <label for="">Social List</label>
                            <social-list></social-list>
                        </div>
                        <div id="emails">
                            <label for="">Emails List</label>
                            <emails></emails>
                        </div>
                        <div id="about-company-content">
                            <label for="about-company">О Компании</label>
                            <textarea name="about_company" id="about-company" cols="30" rows="10"></textarea>
                        </div>
                        <div id="connectivity-list">
                            <label for="">Другие варианты связи</label>
                            <connectivity-list></connectivity-list>
                        </div>
                        <div id="related-posts">
                            <h3>Related Posts</h3>
                            <related-posts></related-posts>
                        </div>
                        <div id="gallery">
                            {{--                            <vue-multi-image-upload></vue-multi-image-upload>--}}
                        </div>
                        <button type="submit" class="btn btn-default">Save Posts</button>
                    </form>
                </section>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
