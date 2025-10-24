<x-app-layout>
<div class="container">
    <h1>Admin Panel</h1>

    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Add new Menu</a>

    <table class="table mt-4">
        <tr>
            <th>Name</th><th>Category</th><th>Price</th><th>Description</th><th>Image</th><th>Actions</th>
        </tr>
        @foreach ($menuItems as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category }}</td>
                <td>${{ $item->price }}</td>
                <td>${{ $item->description }}</td>
                <td><img src="{{ asset('storage/' . $item->image) }}" width="100"></td>
                <td>
                    <a href="{{ route('admin.menu.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.menu.destroy', $item->id) }}" method="POST">
                        @csrf <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</x-app-layout>