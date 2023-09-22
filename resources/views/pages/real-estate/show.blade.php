@extends('layout.app')

@section('title', 'Company')

@section('content')
    <h3>{{ $real_estate->title }}</h3>
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
            <th scope="row">{{ $real_estate->id }}</th>
            <td>{{ $real_estate->title}}</td>
            <td>
                {{ $real_estate->content }}
                {{--                <?php--}}

                {{--                    use Murdercode\LaravelShortcodePlus\Facades\LaravelShortcodePlus;--}}

                {{--                    $html = $real_estate->content;--}}
                {{--                    return LaravelShortcodePlus::source($html)->parseAll();--}}
                {{--                ?>--}}
            </td>
            <td>{!! $real_estate->excerpt !!}</td>

            <td><img width="250px" height="auto" src="{{ asset($real_estate->image_url) }}" alt=""></td>
            <td>
                {{--                @dd($real_estate->tags)--}}
                <ul>
                    @foreach ($real_estate->tags as $tag)
                        <li><a href="{{ route('real_estate.show.tag', $tag->id) }}">{{$tag->name}}</a></li>
                        {{--                    @if ($category->parent_id === null)--}}
                        {{--                        <!-- Parent Category -->--}}
                        {{--                        <strong><a href="{{ route('company.company-category-show', ['id' => $category->id]) }}">{{ $category->name }}</a>--}}
                        {{--                        </strong>--}}
                        {{--                        <ul>--}}
                        {{--                            @foreach ($real_estate->categories as $subcategory)--}}
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
                @foreach ($real_estate->categories as $cat)
                    <li><a href="{{ route('real_estate.category.show', $cat->id) }}">{{$cat->name}}</a></li>

                @endforeach
            </td>

            <td>{{$real_estate->created_at}}</td>
        </tr>
        </tbody>
    </table>
    <script>

    </script>
@endsection

