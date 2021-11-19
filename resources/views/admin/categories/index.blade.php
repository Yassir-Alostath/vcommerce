

@extends('admin.master')


@section('content')
    <h1>All Categories</h1>
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
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        @forelse ($categories as $category)
            <tr>
                {{-- <td>{{ $category->id }}</td> --}}
                <td>{{ $loop->iteration }}</td> <!--For showing ordered Numbers in ID collumn -->
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are You sure?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    </td>
            </tr>
        @empty
            <td colspan="4" style="text-align:center">No Categories Found</td>
        @endforelse

        </table>
        <form action="{{ route('admin.delete_all') }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger bt-lg">Delete All</button>
        </form>
@endsection

