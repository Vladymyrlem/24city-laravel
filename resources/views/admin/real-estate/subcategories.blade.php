<ul>
    @foreach ($subcategories as $subcategory)
        <li>
            <h4>
                <a href="{{ route('real-estate.category.show', $subcategory->id) }}">
                    {{ $subcategory->name }}
                </a>{{$subcategory->real_estate->count()}}
            </h4>
        </li>
    @endforeach
</ul>
