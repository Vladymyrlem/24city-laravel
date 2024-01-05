<ul class="list-group">
    @foreach ($subcategories as $subcategory)
        <li class="list-group-item">
            <h4>
                <a href="{{ route('admin.real-estate-category-show', $subcategory->id) }}">
                    {{ $subcategory->name }}
                </a>
                {{ optional($subcategory->real_estate)->count() ?? 0 }}
            </h4>
        </li>
    @endforeach
</ul>
