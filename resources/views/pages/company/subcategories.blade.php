@foreach ($subcategories as $subcategory)
    <li class="child-second">
        <a href="{{ route('company.company-category-show', $subcategory->id) }}" id="{{ $subcategory->slug }}">
            {{ $subcategory->name }}
        </a>
        {{--        {{$subcategory->company->count(0)}}--}}
    </li>
@endforeach
