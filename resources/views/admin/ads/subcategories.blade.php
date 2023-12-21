<ul>
    @foreach ($subcategories as $subcategory)
        <li>
            <h4>
                <a href="{{ route('admin.ads-category-show', $subcategory->id) }}">
                    {{ $subcategory->name }}
                </a>{{$subcategory->company->count(0)}}
            </h4>
        </li>
    @endforeach
</ul>
