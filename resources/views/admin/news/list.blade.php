@extends('layouts.app')

@section('title', 'Новости')

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
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            {{--            <th scope="col">Content</th>--}}
            <th scope="col">Excerpt</th>
            <th scope="col">Thumb</th>
            <th scope="col">Tags</th>
            <th scope="col">Categories</th>
            <th scope="col">Created_at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($news as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>
                    <a href="{{ route('adminNewsShow', $post->id) }}">{{ $post->title }}</a>
                </td>
                {{--                <td>--}}
                {{--                    {!! parseGalleryShortcode(parseVideoShortcode($post->content)) !!}--}}
                {{--                </td>--}}
                <td>
                    {!! $post->excerpt !!}
                </td>
                <td>
                    @if(!empty($post->image))
                        <img width="250px" height="auto" src="{{ asset($post->image) }}" alt="">
                    @endif
                </td>
                <td>
                    <ul>
                        @forelse ($post->tags as $tag)
                            <li>
                                <a href="{{ route('admin.news.show.tag', $tag->id) }}">
                                    {{ $tag->name }}
                                </a>
                            </li>
                        @empty
                            <li>
                                {{ 'Тегів не знайдено' }}
                            </li>
                        @endforelse
                    </ul>
                </td>
                <td>
                    @foreach ($post->categories as $category)
                        <!-- Parent Category -->
                        <strong>
                            <a href="{{ route('admin.news-category-show', $category->id) }}">
                                {{ $category->name }}
                            </a>
                        </strong>
                    @endforeach
                </td>
                <td>{{$post->created_at}}</td>
                <td class="actions d-flex">
                    <a href="{{ route('admin.news.delete', $post->id) }}" class="btn btn-danger">Delete</a>&nbsp;
                    <a href="{{ route('admin.news.edit', $post->id) }}"
                       class="btn btn-warning d-flex align-items-center">
                        <i class="nav-icon fas fa-edit"></i>
                        &nbsp;Edit
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{--        {{ $news->links('vendor.pagination.custom') }}--}}
    </div>
@endsection
<?php
//    $jsonData = $categories;
//
//    // Decode the JSON data into an array of objects
//    $data = json_decode($jsonData);
//
//    // Initialize an empty result array
//    $result = [];
//
//    // Iterate through the objects in the data array
//    foreach ($data as $item) {
//        // Get the id and company_category values from the object
//        $postId = $item->id;
//        $numbersString = $item->tags;
//
//        // Split the numbers string into an array
//        $numbersArray = explode(",", $numbersString);
//
//        // Convert each number to an integer
//        $numbersArray = array_map('intval', $numbersArray);
//
//        // Create an associative array with post ID as the key and numbers as values
//        $postArray = array_fill_keys([$postId], $numbersArray);
//
//        // Merge the postArray into the result array
//        $result = array_merge($result, $postArray);
//    }

// Print the resulting associative array
//    print_r($result);

//
//    $postId = 1;
//
//    echo '[';
//
//    $postId = 1;
//    $seenPostIds = []; // Keep track of seen post IDs
//
//    foreach ($result as $categoryIds) {
//        // Check if any category ID is 0 for this $postId
//        if (!in_array(0, $categoryIds)) {
//            // If this $postId is not seen before, display it
//            if (!in_array($postId, $seenPostIds)) {
//                echo '<pre>' . $postId . ' => [';
//                $categoryIdCount = count($categoryIds);
//                foreach ($categoryIds as $index => $categoryId) {
//                    if ($categoryId !== 0) {
//                        echo $categoryId;
//
//                        // Add a comma if it's not the last value
//                        if ($index < $categoryIdCount - 1) {
//                            echo ',';
//                        }
//                    }
//                }
//                echo '],</pre>';
//                $seenPostIds[] = $postId; // Add the $postId to the seen list
//            }
//        }
//        $postId++; // Increment $postId for each loop iteration
//    }
//
//    $newArray = [];
//
//    foreach ($result as $key => $values) {
//        // Increment the key by 1 to start the key from 1
//        $newKey = $key + 1;
//
//        // Assign the values to the new array with the incremented key
//        $newArray[$newKey] = $values;
//    }

// Print the resulting associative array
//    print_r($newArray);
?>
<div class="output"></div>

<script>
    {{--var newsCategories = <?php echo json_encode($newsCategories); ?>;--}}
    {{--//console.log(newsCategories);--}}
    {{--// console.log(companyCategory);--}}
    {{--const result = {};--}}

    {{--// Loop through the input array--}}
    {{--for (const key in newsCategories) {--}}
    {{--    if (newsCategories.hasOwnProperty(key)) {--}}
    {{--        const item = newsCategories[key];--}}
    {{--        const categories = item.categories.split('|').map(Number); // Split and convert to numbers--}}

    {{--        // Create or update the result object--}}
    {{--        if (result[item.id]) {--}}
    {{--            result[item.id].push(...categories);--}}
    {{--        } else {--}}
    {{--            result[item.id] = categories;--}}
    {{--        }--}}
    {{--    }--}}
    {{--}--}}

    // Print the resulting associative object
    // console.log(result);
    // const resultJSON = JSON.stringify(result, null, 2);
    // console.log(resultJSON);
    // document.querySelector(".output").innerHTML = `<pre>${resultJSON}</pre>`;

</script>
<?php
//    $cats = json_decode($main_news);
//    $tags_list = json_decode($tags);

//    print_r($cats);
//    print_r($firstArray);
// Create a mapping of words to their corresponding IDs from the first array
//    $wordToIdMapping = [];
//    foreach ($tags_list as $item) {
//        $wordToIdMapping[$item->name] = $item->id;
//    }

// Create the third array
//    $thirdArray = [];
//    foreach ($array as $key => $words) {
//        $wordIds = [];
//        foreach ($words as $word) {
//            if (isset($wordToIdMapping[$word])) {
//                $wordIds[] = $wordToIdMapping[$word];
//            }
//        }
//        $thirdArray[$key] = $wordIds;
//    }
//    $formattedData = [];
//
//    foreach ($thirdArray as $key => $value) {
//        $formattedData[$key] = $value;
//    }
//
//    echo json_encode($formattedData, JSON_PRETTY_PRINT);// Output the result


?>

