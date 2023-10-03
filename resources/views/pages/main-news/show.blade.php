@extends('layouts.master')

@section('title', 'Company')

@section('content')
    <h3>{{ $news->title }}</h3>
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Excerpt</th>
            <th scope="col">Thumb</th>
            <th scope="col">tags</th>
            <th scope="col">Category</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th scope="row">{{ $news->id }}</th>
            <td>{{ $news->title}}</td>
            <td>
                {{ $news->content }}
                {{--                <?php--}}

                {{--                    use Murdercode\LaravelShortcodePlus\Facades\LaravelShortcodePlus;--}}

                {{--                    $html = $news->content;--}}
                {{--                    return LaravelShortcodePlus::source($html)->parseAll();--}}
                {{--                ?>--}}
            </td>
            <td>{!! $news->excerpt !!}</td>

            <td><img width="250px" height="auto" src="{{ asset($news->image) }}" alt=""></td>
            <td>
                {{--                @dd($news->tags)--}}
                <ul>
                    @foreach ($news->tags as $tag)
                        <li><a href="{{ route('main-news.show.tag', $tag->id) }}">{{$tag->name}}</a></li>
                        {{--                    @if ($category->parent_id === null)--}}
                        {{--                        <!-- Parent Category -->--}}
                        {{--                        <strong><a href="{{ route('company.company-category-show', ['id' => $category->id]) }}">{{ $category->name }}</a>--}}
                        {{--                        </strong>--}}
                        {{--                        <ul>--}}
                        {{--                            @foreach ($news->categories as $subcategory)--}}
                        {{--                                @if ($subcategory->parent_id === $category->id)--}}
                        {{--                                    <!-- Subcategory -->--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="{{ route('company.company-category-show', ['id' => $subcategory->id]) }}">--}}
                        {{--                                        {{ $subcategory->name }}</li>--}}
                        {{--                                    </a>--}}
                        {{--                                @endif--}}
                        {{--                            @endforeach--}}
                        {{--                        </ul>--}}
                        {{--                    @endif--}}
                    @endforeach
                </ul>
            </td>
            <td>
                @foreach ($news->categories as $cat)
                    <li><a href="{{ route('main-news.category.show', $cat->id) }}">{{$cat->name}}</a></li>

                @endforeach
            </td>

            <td>{{$news->created_at}}</td>
        </tr>
        </tbody>
    </table>
    <script>

    </script>
@endsection

