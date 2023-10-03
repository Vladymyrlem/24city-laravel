@foreach ($categories as $cat)
    <option value="{{ $cat->id }}">
        {{ $cat->name }}
    </option>
    @if (!empty($cat->children))
        @include('admin.company.category.subcategories', ['categories' => $cat->children, 'selectedCategoryId' => $currentCategory->id])
    @endif
@endforeach
