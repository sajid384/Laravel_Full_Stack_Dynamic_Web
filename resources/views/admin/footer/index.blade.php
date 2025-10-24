<x-app-layout>
<div class="container mt-4">
    <h2>Manage Footer</h2>
    <a href="{{ route('admin.footer.create') }}" class="btn btn-primary mb-3">Add Footer</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Description</th>
                <th>Opening Hours</th>
                <th>Social Links</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($footer)
                <tr>
                    <td>{{ $footer->id ?? 'N/A' }}</td>
                    <td>{{ $footer->location ?? 'N/A' }}</td>
                    <td>{{ $footer->phone ?? 'N/A' }}</td>
                    <td>{{ $footer->email ?? 'N/A' }}</td>
                    <td>{{ $footer->description ?? 'N/A' }}</td>
                    <td>{{ $footer->opening_hours ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ $footer->facebook ?? '#' }}" target="_blank">Facebook</a> | 
                        <a href="{{ $footer->twitter ?? '#' }}" target="_blank">Twitter</a> | 
                        <a href="{{ $footer->linkedin ?? '#' }}" target="_blank">LinkedIn</a> | 
                        <a href="{{ $footer->instagram ?? '#' }}" target="_blank">Instagram</a> | 
                        <a href="{{ $footer->pinterest ?? '#' }}" target="_blank">Pinterest</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.footer.edit', $footer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.footer.destroy', $footer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @else
                <tr>
                    <td colspan="8" class="text-center">No Footer Found</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
</x-app-layout>
