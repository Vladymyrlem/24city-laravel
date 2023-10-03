@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 flex-column align-items-center">
                <div class="col-sm-6">
                    <h1 class="text-center">Редактирование категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.company-categories')}}">Categories</a></li>
                        <li class="breadcrumb-item active">{{ $category->name }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Категория "{{ $category->name }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post"
                              action="{{ route('adminCompanyCategoryUpdate', $category->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Cetgory Title</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="title"
                                           value="{{ $category->name }}">
                                </div>
                            </div>
                            @if($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug"
                                           class="form-control @error('slug') is-invalid @enderror" id="slug"
                                           value="{{ $category->slug }}">
                                </div>
                            </div>
                            @if($errors->has('slug'))
                                @foreach($errors->get('slug') as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="slug">Parent Category</label>
                                    <select name="parent" id="parent-category">
                                        <option value="">Оберіть категорію</option>
                                        @foreach ($categoryTree as $cat)
                                            <option value="{{ $cat->id }}" @if ($cat->id == $currentCategory->parent_id) selected @endif>
                                                {{ str_repeat('-', $cat->depth) . $cat->name }}
                                            </option>
                                            @if (!empty($cat->children))
                                                @include('admin.company.category.subcategories', ['categories' => $cat->children, 'selectedCategoryId' => $currentCategory->id])
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

