@foreach ($subcategories as $subcategory)
    <tr class="subcategory-second">
        <td>
            <h4>
                <a href="{{ route('admin.company-category-show', $subcategory->id) }}">
                    {{ $subcategory->name }}
                </a>{{$subcategory->company->count(0)}}
            </h4>
        </td>
        <td>{{ $subcategory->slug }}</td>
        <td><a href="{{ route('adminCompanyCategoryEdit', $subcategory->id) }}" class="btn btn-outline">Редактировать</a></td>
        <td><a href="{{ route('adminCompanyCategoryDelete', $category->id) }}" class="btn btn-danger">Удалить</a></td>
    </tr>
@endforeach
