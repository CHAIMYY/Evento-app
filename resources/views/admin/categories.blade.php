<x-app-layout>

    <div class="min-h-screen flex flex-col sm:flex-row bg-gray-100">

        @include('layouts.navigation')

    <h1>Categories</h1>

    <!-- Form for adding a category -->
    <form action="{{ route('addCategorie') }}" method="POST">
        @csrf
        <input type="text" name="nom" placeholder="Category Name" required>
        <button type="submit">Add Category</button>
    </form>

    <!-- Table to display categories -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->nom }}</td>
                <td>
                    <!-- Form for updating a category -->
                    <form action="{{ route('updateCategorie') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="categorieID" value="{{ $category->id }}">
                        <input type="text" name="nom" placeholder="New Category Name" required>
                        <button type="submit">Update</button>
                    </form>

                    <!-- Form for deleting a category -->
                    <form action="{{ route('deleteCategorie', $category) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
