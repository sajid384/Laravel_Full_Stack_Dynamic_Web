<x-app-layout>

<div class="container">
    <h2>Manage Feedbacks</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to Add New Feedback -->
    <a href="{{ route('admin.feedbacks.create') }}" class="btn btn-primary mb-3">Add New Feedback</a>

    <!-- Feedbacks Table -->
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
            @foreach($feedbacks as $feedback)
            @foreach(json_decode($feedback->fields, true) as $index => $field)
    <tr>
    <td>{{ $index + 1 }}</td>
        <td>{{ $field['name'] }}</td>
        <td>{{ $field['placeholder'] }}</td>
        <td>
            <a href="{{ route('admin.feedbacks.edit', $feedback->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.feedbacks.destroy', $feedback->id) }}" method="POST" style="display:inline;">
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
