<!-- resources/views/categories/create.blade.php -->

{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Category</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
 --}}

 <!-- resources/views/admin/categories.blade.php -->

<x-app-layout>
    <!-- Page header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <!-- Page content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Category creation form -->
                    <form action="{{ route('addCategorie') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Category Name:</label>
                            <input type="text"  name="name" value="{{ old('name') }}" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Enter category name">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Category</button>
                    </form>

                    <!-- Category list -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">Category List</h3>
                        <ul>
                            @foreach ($categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

