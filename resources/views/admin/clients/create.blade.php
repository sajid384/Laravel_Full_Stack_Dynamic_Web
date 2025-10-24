<x-app-layout>

<div class="container">
    <h2>Add Client Review</h2>
    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Review</label>
            <textarea name="review" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
</x-app-layout>
