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
                    <form role="form" action="{{ route('admin.news.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="input-group mb-3">
                            <label for="title_company" class="form-label">Заголовок новини</label>
                            <input type="text" name="title" id="title_company" class="form-control"/>
                        </div>

                        <div class="company-categories mb-3" id="select2">
                            <label for="company-category" class="form-label">Катeгорії новин</label>
                            <select name="categories[]" id="news-category" class="form-select" multiple>
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
                                                @if (is_array($subcategory->subcategories) && $subcategory->subcategories->count() > 0)
                                                    @include('admin.news.category.subcategories-select', ['subcategories' => $subcategory->subcategories])
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div id="ads-thumbnail">
                            <label for="">Картинка новин</label>
                            <input type="file" name="image_url">
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
