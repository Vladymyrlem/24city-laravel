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
                    <form role="form" action="{{ route('admin.menus.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($menuItem) && $menuItem->id)
                            @method('PUT')
                        @endif
                        <div class="row">
<div class="col-md-3">
    <!-- Вставляємо компонент MenuItems для вибору пунктів меню -->
    <div class="form-group" id="menu-items">
        <label for="menu_items">Menu items</label>
        <menu-items></menu-items>
{{--        <menus></menus>--}}
    </div>
{{--    <div class="form-group" id="menus">--}}
{{--        <label for="menu_items">Menus</label>--}}
{{--        <menus></menus>--}}
{{--    </div>--}}
</div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="title">Назва</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Батьківський пункт меню</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">-- Немає батьківського пункту --</option>
                                    @foreach($menuItems as $item)
                                        <option value="{{ $item->id }}" {{ isset($menuItem) && $menuItem->parent_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ isset($menuItem) ? 'Оновити' : 'Створити' }}
                        </button>
                        </div>
                    </form>

                </section>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

