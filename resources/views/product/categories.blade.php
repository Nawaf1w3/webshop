@extends('layout.nav-footer')

@section('content')

    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>product form</h1>
                    </div>
                    <div>
                        <a href="/products">back to the shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" autocomplete="off" class="mt-1 p-2 block w-full border-gray-300 rounded-md">
            @error('name')
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
    
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3" class="mt-1 p-2 block w-full border-gray-300 rounded-md"></textarea>

            @error('description')
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="ProductImage">image path</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @error('image')
                <div class="text-red-500 mt-1 text-sm">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Category</button>
        </div>

    </form>
    
    @endsection
	<!--add produ