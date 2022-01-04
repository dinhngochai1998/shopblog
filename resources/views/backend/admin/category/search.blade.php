@foreach($category as $category)
<tr>
    <td>{{ $category->name }}</td>
    <td>
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
        <a onclick="return confirm('Are you sure?')" href="{{ route('category.delete', $category->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>Delete</a>
    </td>
</tr>
@endforeach