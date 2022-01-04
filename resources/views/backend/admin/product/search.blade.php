@foreach($products as $product)
<tr>
    <td>{{ $product->name }}</td>
    <td>{{ $product->categories->name }}</td>
    <td>{{ $product->price }}</td>
    <td><img style="max-width: 100px;" src="{{ asset('storage/avatars/'.$product->image) }}" alt=""></td>
    <td>
        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
        <a onclick="return confirm('Are you sure?')" href="{{ route('product.show', $product->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>Delete</a>
    </td>
</tr>
@endforeach