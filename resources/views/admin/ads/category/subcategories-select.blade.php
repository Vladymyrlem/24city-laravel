@foreach ($categories as $cat)
    <option value="{{ $cat->id }}">
        {{ $cat->name }}
    </option>
    @if (!empty($cat->children))
        @include('admin.ads.category.subcategories', ['categories' => $cat->children, 'selectedCategoryId' => $currentCategory->id])
    @endif
@endforeach
