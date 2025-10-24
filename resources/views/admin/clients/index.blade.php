<x-app-layout>

<div class="container">
    <h2>Client Reviews</h2>
    <a href="{{ route('admin.clients.create') }}" class="btn btn-success mb-3">Add New Review</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Review</th>
                <th>Designation</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->review }}</td>
                <td>{{ $client->designation }}</td>
                <td><img src="{{ asset('storage/'.$client->image) }}" width="50" alt="Client Image"></td>
                <td>
                    <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
