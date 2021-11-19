

@extends('admin.master')


@section('content')
<h1>Edit {{ $categories->name }} Category</h1>
@include('admin.errors') <!-- including errors page-->

<form action="{{ route('admin.categories.update', $categories->id) }}" method="POST">
        @csrf
        @method('put')
    <div class="mb-3">
        <input type="text" class="form-control
            @error('name') is-invalid  @enderror"
            name="name" placeholder="Name" Value="{{ old('name', $categories->name) }}">
            <!-- This revios error is for: if I want to add a danger circul inside the input tag-->
                <!-- ************************* -->
            <!-- This following errror is for: if I want to add custom errors for by hand-->
            {{-- @error('name')
            <span class="text-danger"> {{ $message }} </span>
            @enderror --}}
    </div>
    <button class="btn btn-primary btn-lg ml-3">Save</button>
</form>



@endsection


