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
                    <form role="form" action="{{ route('admin.news.update', $news->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @if(isset($menuItem))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="menu_id">Меню</label>
                            <select name="menu_id" id="menu_id" class="form-control" required>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" {{ isset($menuItem) && $menuItem->menu_id == $menu->id ? 'selected' : '' }}>
                                        {{ $menu->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Назва</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $menuItem->title ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="url" name="url" id="url" class="form-control" value="{{ $menuItem->url ?? '' }}">
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
                        <button type="submit" class="btn btn-default">Save Posts</button>
                    </form>
                </section>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
