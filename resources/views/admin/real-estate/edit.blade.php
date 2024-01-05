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
                    <form role="form" action="{{ route('admin.real-estate.update', $real_estate->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="ads-title" class="form-label">Назва об'яви</label>
                            <input type="text" name="title" id="ads-title" class="form-control"
                                   value="{{ old('title')?? $real_estate->title }}"/>
                        </div>

                        <div class="company-categories mb-3" id="select2">
                            <label for="company-category" class="form-label">Катeгорії об'яв</label>
                            <select name="categories[]" id="ads-category" class="form-select" multiple>
                                @foreach ($categories as $category)
                                    @if ($category->parent_id === null)
                                        <option
                                            value="{{ $category->id }}" {{ in_array($category->id, $categories->pluck('id')->toArray()) ? 'selected' : '' }}>
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
                            <label class="form-label" for="">Миниатюра недвижимости</label>
                            <input type="file" name="thumb">
                            <img src="{{ asset($real_estate->image) }}" alt="" width="100%" height="auto">
                        </div>
                        <div id="about-company-content">
                            <label for="real-estate-content">Контент</label>
                            <textarea name="content" id="real-estate-content" cols="30"
                                      rows="10">{!!  parseGalleryShortcode(parseVideoShortcode($real_estate->content)) ?? '' !!}</textarea>
                        </div>

                        <div id="services-list-content">
                            <label for="excerpt-real-estate">Короткий опис об'яви</label>
                            <textarea name="excerpt_real_estate" id="excerpt-real-estate" cols="30"
                                      rows="10">
    {!! $real_estate->excerpt ?? '' !!}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Update Real Estate</button>
                    </form>
                </section>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
