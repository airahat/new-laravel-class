@extends("admin.layout.nav")
@section("title", "Products")

@section("content")

<h1>Product List</h1>
<table class="table table-striped">
<thead>
    <tr>
        <th>SL</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Price</th>
        <th>Photo</th>
    </tr>
</thead>

<tbody>
    @foreach ($products as $i => $product)
    <tr>
        <td>{{ $products->firstItem() +$i }}</td>
        <td>{{ $product["title"] }}</td>
        <td>{{ $product["description"] }}</td>
        <td>{{ $product["category_id"] }}</td>
        <td>{{ $product["price"] }}</td>
        <td>{{ $product["photo"] }}</td>
    </tr>
    @php
    $sl++
    @endphp
    @endforeach
    
</tbody>

<tfoot>
    <tr>
                <th  colspan="6">
            {{ $products->links() }}
        </th>
    </tr>
</tfoot>

</table>
@endsection