<x-app-layout>

<div class="container">
    <h2>Manage Booking Fields</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to Add New Fields -->
    <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary mb-3">Add New Fields</a>

    <!-- Booking Fields Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Field Name</th>
                <th>Placeholder</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            @foreach(json_decode($booking->fields, true) as $index => $field)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $field['name'] }}</td>
        <td>{{ $field['placeholder'] }}</td>
        <td>
            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

            @endforeach
        </tbody>
    </table>
</div>


</x-app-layout>