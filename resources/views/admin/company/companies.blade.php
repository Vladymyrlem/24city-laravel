@extends('layouts.app')

@section('title', 'Companies page')

@section('content')
    <h1>Companies Page</h1>

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
            <th scope="col">Content</th>
            <th scope="col">Thumb</th>
            <th scope="col">Address</th>
            <th scope="col">About Company</th>
            <th scope="col">Services List</th>
            <th scope="col">Additional Information</th>
            <th scope="col">Contacts</th>
            <th scope="col">Categories</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($companies as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><a class="company-title post-title" href="{{ route('company.show', $post->id) }}">{{ $post->title_company }}</a>
                    <div class="actions-list" style="display:none;">
                        <a href="/">Удалить</a>&nbsp;<a href="/">Редактировать</a>
                    </div>
                </td>
                <td>{!! parseGalleryShortcode($post->content) !!}
                </td>
                <td><img width="250px" height="auto" src="{{ asset($post->thumbnail) }}" alt=""></td>
                <td><a target="_blank" href="{{ $post->adr_url }}">{{ $post->adr_title }}</a></td>
                <td>{!! $post->about_company !!}</td>
                <td>{!! $post->services_list !!}</td>
                <td>{!! $post->additional_information !!}</td>
                <td>
                    @if(!empty($post->contacts))
                        <ul>
                            @foreach ($post->contacts as $phoneNumber)
                                <li><a href="tel:{{ $phoneNumber->contacts_phone	 }}">{{ $phoneNumber->contacts_phone	 }}</a>
                                    {{ $phoneNumber->contacts_comment_to_phone }}
                                    @if($phoneNumber->contacts_fax == 1)
                                        {{ 'Fax' }}
                                    @else
                                        {{ '' }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    @foreach ($post->categories as $category)
                        @if ($category->parent_id === null)
                            <!-- Parent Category -->
                            <strong><a href="{{ route('company.company-category-show', ['id' => $category->id]) }}">{{ $category->name }}</a>
                            </strong>
                            <ul>
                                @foreach ($post->categories as $subcategory)
                                    @if ($subcategory->parent_id === $category->id)
                                        <!-- Subcategory -->
                                        <li>
                                            <a href="{{ route('company.company-category-show', ['id' => $subcategory->id]) }}">
                                            {{ $subcategory->name }}</li>
                                        </a>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{ $companies->links('vendor.pagination.custom') }}
    </div>
    <?php
    ?>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        jQuery(document).ready(function () {
            jQuery('table>tbody>tr').hover(function () {
                jQuery(this).find('.actions-list').toggle(50);
                jQuery(this).toggleClass('show');
            });
        });
        {{--var companyCategories = <?php echo json_encode($companyCategories); ?>;--}}
        {{--var companyCategory = <?php echo json_encode($companyCategory); ?>;--}}
    </script>
@endsection
