@foreach($user as $user)
<tr>
    <td>{{ $user->name }}</td>
    <td><img style="max-width: 100px;" src="{{ asset('storage/avatars/'. $user->avatar) }}" alt=""></td>
    <td>

    <td>    
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
        @can('delete articles')
        <a onclick="return confirm('Are you sure?')" href="{{ route('user.show', $user->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>Delete</a>
        @else
        <a href="#" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>Delete</a>
        @endcan
    </td>

    </td>
</tr>
@endforeach