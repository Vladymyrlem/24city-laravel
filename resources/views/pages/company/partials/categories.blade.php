<ul>
    @if (empty($categories))
        {{ 'Categories not found' }}
    @else
        @foreach ($categories as $category)
            <li>
                <!-- Відображення категорії -->
                <a href="{{ route('company.company-category-show', ['id' => $category['category']->id]) }}">
                    {{ $category['category']->name }}
                </a>

                <!-- Рекурсивний виклик для підкатегорій -->
                @if ($category['subcategories']->count() > 0)
                    @include('pages.company.partials.categories', ['categories' => $category['subcategories']])
                @endif
            </li>
        @endforeach
    @endif


</ul>
