

@extends('admin.master')


@section('content')
    <h1>All Products</h1>
        @if (session('msg'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <table class="table table-bordered">
    {{-- @foreach ( as )

    @endforeach --}}
        <tr class="bg-dark text-white">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Album</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Serial Number</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        @forelse ($products as $product)
            <tr>
                {{-- <td>{{ $category->id }}</td> --}}
                <td>{{ $loop->iteration }}</td> <!--For showing ordered Numbers in ID collumn -->
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->image }}</td>
                <td>{{ $product->album }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->serial_number }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are You sure?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    </td>
            </tr>
        @empty
            <td colspan="10" style="text-align:center">No Products Found</td>
        @endforelse
        {{-- {{ $categories->links() }} --}}
        </table>
        <form action="{{ route('admin.delete_all') }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger bt-lg">Delete All</button>
        </form>

@endsection

