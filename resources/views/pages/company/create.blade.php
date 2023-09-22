<x-default-layout>

    <form role="form" action="{{ route('company.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div id="phone-fields">
            <div class="phone-field">
                <input type="text" name="phones[]" placeholder="Phone Number">
                <input type="checkbox" name="fax[]" value="1"> Fax
            </div>
        </div>

        <button type="button" id="add-phone">Add Phone</button>
        <div id="companies-list">
            <ul id="all-posts">
                <!-- Populate this ul with all created posts as li items -->
                @foreach($companies as $post)
                    <li>
                        <input type="checkbox" name="related_posts[]" value="{{ $post->id }}">
                        {{ $post->title_company }}
                    </li>
                @endforeach
            </ul>
            <div class="page_navigation"></div>
        </div>

        <div>
            <h3>Selected Posts</h3>
            <ul id="selected-posts">
                <!-- Selected posts will appear here as li items -->
            </ul>
        </div>

        <button type="submit">Save Selected Posts</button>
        <button type="submit">Save phones</button>
    </form>
</x-default-layout>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{ asset('js/paginathing.min.js') }}"></script>

<script type="text/javascript">
    {{--var companyCategories = <?php echo json_encode($companyCategories); ?>;--}}
    {{--var companyCategory = <?php echo json_encode($companyCategory); ?>;--}}
    jQuery(document).ready(function ($) {
        jQuery('ul#all-posts').paginathing({
            perPage: 20,
            limitPagination: 20,
        });
    });
</script>
