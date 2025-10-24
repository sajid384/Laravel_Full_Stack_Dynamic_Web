<x-app-layout>

<div class="container mt-4">
    <h2>About Sections</h2>
    <a href="{{ route('admin.about.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        @foreach($abouts as $about)
        <tr>
            <td>{{ $about->id }}</td>
            <td>{{ $about->title }}</td>
            <td>{{ Str::limit($about->description, 50) }}</td>
            <td><img src="{{ asset('storage/' . $about->image) }}" width="80"></td>
            <td>
                <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

</x-app-layout>
