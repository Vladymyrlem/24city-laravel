@foreach ($categories as $cat)
    <option value="{{ $cat->id }}" @if ($cat->id == $currentCategory->parent_id) selected @endif>
        {{ str_repeat('-', $cat->depth) . $cat->name }}
    </option>
    @if (!empty($cat->children))
        @include('admin.news.category.subcategories', ['categories' => $cat->children, 'selectedCategoryId' => $currentCategory->id])
    @endif
@endforeach
