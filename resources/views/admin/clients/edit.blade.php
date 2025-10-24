<x-app-layout>
<div class="container">
    <h2>Edit Client Review</h2>
    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $client->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Review</label>
            <textarea name="review" class="form-control" required>{{ "$client->review" }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" class="form-control" value="{{ $client->designation }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/'.$client->image) }}" width="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</x-app-layout>
