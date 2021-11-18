

@extends('admin.master')


@section('content')
    <h1>All Categories</h1>
        <table class="table table-bordered">
    {{-- @foreach ( as )

    @endforeach --}}
        <tr class="bg-dark text-white">
        <th>ID</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Actions</th>
        </tr>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Created At</td>
            <td>
                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                <form class="d-inline" action="{{ route('admin.categories.destroy') }}" method="POST">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are You Sure')" class="btn btn-danger btn-sm">Delete</button>
                </form>
                </td>
        </tr>
        </table>
@endsection

