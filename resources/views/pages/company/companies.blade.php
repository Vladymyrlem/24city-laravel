@extends('layouts.master')

@section('title', 'Companies page')

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('content')
    <h1>Companies Page</h1>
    {{--    {{ Breadcrumbs::render('company.index') }}--}}

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
            <th scope="col">Email</th>
            <th scope="col">Payments</th>
            <th scope="col">Categories</th>
            <th scope="col">Created_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($companies as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><a href="{{ route('company.show', $post->id) }}">{{ $post->title_company }}</a></td>
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
                    @if(!empty($post->emails))
                        <ul>
                            @foreach ($post->emails as $email)
                                <li><a href="mailto:{{ $email->link	 }}">{{ $email->value }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    @if(!empty($post->payments))
                        <ul>

                            @foreach($post->payments as $payment)
                                <li>
                                    {{ $payment->payment_name }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    <ul>
                        @foreach ($post->categories->where('parent_id', null) as $parentCategory)
                            <li>
                                <a href="{{ route('company.company-category-show', $parentCategory->id) }}">
                                    <h3> {{ $parentCategory->name }}</h3>
                                </a>
                                <ul>
                                    @foreach ($post->categories->where('parent_id', $parentCategory->id) as $childCategory)
                                        <li>
                                            <h4>
                                                <a href="{{ route('company.company-category-show', $childCategory->id) }}">
                                                    {{ $childCategory->name }}
                                                </a>
                                            </h4>
                                            <ul>
                                                @foreach ($post->categories->where('parent_id', $childCategory->id) as $subchildCategory)
                                                    <li>
                                                        <h5>
                                                            <a href="{{ route('company.company-category-show', $subchildCategory->id) }}">
                                                                {{ $subchildCategory->name }}
                                                            </a>
                                                        </h5>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        @foreach ($post->categories as $category)
                            @if (!$post->categories->contains('id', $category->parent_id) && $category->parent_id !== null)
                                <li>
                                    <h5>
                                        <a href="{{ route('company.company-category-show', $category->id) }}">
                                            {{ $category->name }}
                                        </a>
                                    </h5>
                                </li>
                            @endif
                        @endforeach
                    </ul>


                    {{--                    @if($post->categories->count() > 0)--}}

                    {{--                    @include('pages.company.partials.categories', ['categories' => $post->categoryTree])--}}

                    {{--                    @else--}}
                    {{--                        {{ 'Categories not found' }}--}}
                    {{--                    @endif--}}
                </td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{ $companies->links('vendor.pagination.custom') }}
    </div>
    <textarea name="about_company" id="about-company" cols="30" rows="10"></textarea>


    <script>
        {{--var companyCategories = <?php echo json_encode($companyCategories); ?>;--}}
        {{--var companyCategory = <?php echo json_encode($companyCategory); ?>;--}}

    </script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

<script>
    jQuery(document).ready(function ($) {

        tinymce.init({
            selector: '#about-company',
            plugins: 'advlist code table lists link image media emoticons codesample save visualblocks',
            menubar: 'insert',
        });
    });
</script>

