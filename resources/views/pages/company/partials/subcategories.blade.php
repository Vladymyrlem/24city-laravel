<ul>
    @foreach ($subcategories  as $category)
        <li>
            <!-- Відображення категорії -->
            <a href="{{ route('company.company-category-show', ['id' => $category->id]) }}">
                {{ $category->name }}
            </a>

            <!-- Рекурсивний виклик для підкатегорій -->
            @if ($category->subcategories->count() > 0)
                @include('pages.company.partials.categories', ['categories' => $category->subcategories])
            @endif
        </li>
    @endforeach
</ul>
