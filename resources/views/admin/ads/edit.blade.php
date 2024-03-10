@extends('layouts.app')

@section('scripts')
    {{--    <script src="{{ asset('js/app.js') }}"></script>--}}

@endsection
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
                    <form role="form" action="{{ route('admin.ads.update', $ads->id) }}" method="post"
                          enctype="multipart/form-data" class="d-flex flex-column">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $ads->id }}">

                        <div class="mb-3 text-left">
                            <label for="ads-title" class="form-label">Назва об'яви</label>
                            <input type="text" name="title" id="ads-title" class="form-control"
                                   value="{{ old('title')?? $ads->title }}"/>
                        </div>

                        <div class="company-categories text-left mb-3" id="select2">
                            <label for="company-category" class="form-label">Катeгорії об'яв</label>
                            <select name="categories[]" id="ads-category" class="form-select" multiple>
                                @foreach ($categories as $category)
                                    @if ($category->parent_id === null)
                                        <option class="row"
                                                value="{{ $category->id }}" {{ in_array($category->id, $postCategories) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @foreach ($categories as $subcategory)
                                            @if ($subcategory->parent_id === $category->id)

                                                <option class="row"
                                                        value="{{ $subcategory->id }}" {{ in_array($subcategory->id, $postCategories) ? 'selected' : '' }}>
                                                    &nbsp;&nbsp;{{ $subcategory->name }}
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
                        <div id="ads-thumbnail" class="text-left mb-3">
                            <label for="">Картинка компании</label>
                            <input type="file" name="thumb">
                        </div>
                        <div id="about-company-content" class="text-left mb-3">
                            <label for="ads-content">Контент</label>
                            <textarea name="content" id="ads-content" cols="30" rows="10">
                                {!! old('content')?? $ads->content !!}
                            </textarea>
                        </div>

                        <div id="services-list-content" class="text-left mb-3">
                            <label for="excerpt-ads">Короткий опис об'яви</label>
                            <textarea name="excerpt_ads" id="excerpt-ads" cols="30" rows="10">
                                {!! old('content')?? $ads->excerpt !!}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-warning w-auto">Save Posts</button>
                    </form>
                </section>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
