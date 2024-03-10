@extends('layouts.app')

@section('title', 'News')

@section('content')
    <h3>{{ $newsPost->title }}</h3>
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
            <th scope="row">{{ $newsPost->id }}</th>
            <td>{{ $newsPost->title ?? ''}}</td>
            <td>
                {{ $newsPost->content }}
                {{--                <?php--}}

                {{--                    use Murdercode\LaravelShortcodePlus\Facades\LaravelShortcodePlus;--}}

                {{--                    $html = $newsPost->content;--}}
                {{--                    return LaravelShortcodePlus::source($html)->parseAll();--}}
                {{--                ?>--}}
            </td>
            <td>{!! $newsPost->excerpt !!}</td>

            <td><img width="250px" height="auto" src="{{ asset($newsPost->image_url) }}" alt=""></td>
            <td>
                {{--                @dd($newsPost->tags)--}}
                <ul>
                    @foreach ($newsPost->tags as $tag)
                        <li><a href="{{ route('news.show.tag', $tag->id) }}">{{$tag->name}}</a></li>
                        {{--                    @if ($category->parent_id === null)--}}
                        {{--                        <!-- Parent Category -->--}}
                        {{--                        <strong><a href="{{ route('company.company-category-show', ['id' => $category->id]) }}">{{ $category->name }}</a>--}}
                        {{--                        </strong>--}}
                        {{--                        <ul>--}}
                        {{--                            @foreach ($newsPost->categories as $subcategory)--}}
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
                @foreach ($newsPost->categories as $cat)
                    <li><a href="{{ route('news.category.show', $cat->id) }}">{{$cat->name}}</a></li>

                @endforeach
            </td>

            <td>{{$newsPost->created_at}}</td>
        </tr>
        </tbody>
    </table>
    <script>

    </script>
@endsection

