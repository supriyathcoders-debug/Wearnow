@extends('layouts/contentNavbarLayout')

@section('title', 'Subcategories')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Subcategories</h5>
        <a href="{{ route('subcategories.create') }}" class="btn btn-primary">Add Subcategory</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($subCategories as $subCategory)
                    <tr>
                        <td>{{ $subCategory->name }}</td>
                        <td>{{ $subCategory->category->category_name }}</td>
                        <td>{{ $subCategory->description }}</td>
                        <td>
                            @if($subCategory->image)
                                <img src="{{ asset('storage/' . $subCategory->image) }}" width="50" height="50" class="rounded">
                            @endif
                        </td>
                        <td>
                            @if($subCategory->status === 'active')
                                <span class="badge bg-label-primary">Active</span>
                            @else
                                <span class="badge bg-label-danger">Deactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('subcategories.edit', $subCategory->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('subcategories.destroy', $subCategory->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $subCategories->links() }}
        </div>
    </div>
</div>
@endsection
