@foreach($tag as $tag)
<tr>
    <td>{{ $tag->name }}</td>
    <td>
        <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
        @can('delete articles')
        <a onclick="return confirm('Are you sure?')" href="{{ route('tag.show', $tag->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>Delete</a>
        @else
        <a href="#" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>Delete</a>
        @endcan
    </td>
</tr>
@endforeach