@extends('layouts.app')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Creating Real Estate</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.real-estate.list') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Real Estate</li>
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
                    <form role="form" action="{{ route('admin.real-estate.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="input-group mb-3">
                            <label for="admin.real-estate.list" class="form-label">Назва нерухомості</label>
                            <input type="text" name="title" id="title_real_estate" class="form-control"/>
                        </div>

                        <div class="real-estate-categories mb-3" id="real-estate-categories">
                            <label for="real-estate-category" class="form-label">Катeгорії нерухомості</label>
                            <select name="categories[]" id="rela-estate-category" class="form-select" multiple>
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
                                                    @include('admin.ads.category.subcategories-select', ['subcategories' => $subcategory->subcategories])
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div id="ads-thumbnail">
                            <label for="">Картинка нерухомості</label>
                            <input type="file" name="thumb">
                        </div>
                        <div id="real-estate-content">
                            <label for="real-estate-content">Контент нерухомості</label>
                            <textarea name="content" id="real-estate-content" cols="30" rows="10"></textarea>
                        </div>

                        <div id="real-estate-excerpt">
                            <label for="excerpt-real-estate">Короткий опис нерухомості</label>
                            <textarea name="excerpt_real_estate" id="excerpt-real-estate" cols="30"
                                      rows="10"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Save Real Estate</button>
                    </form>
                </section>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
