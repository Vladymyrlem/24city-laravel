@extends('layouts.app')

@section('title', 'Меню')

@section('content')
    <h1>Новости</h1>
    @isset($_SESSION['success'])
        <div class="alert alert-info" role="alert">
            {{   $_SESSION['success']  }}
        </div>
        @php
            unset($_SESSION['success']);
        @endphp
    @endisset
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($menus as $menu)

            <tr>
                <th scope="row">{{ $menu->id }}</th>
                <td><a href="{{ route('admin-menus-show', $menu->id) }}">{{ $menu->name }}</a></td>
                <td>{{$menu->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{--        {{ $news->links('vendor.pagination.custom') }}--}}
    </div>
    <?php
    ?>

@endsection
<div class="output"></div>

