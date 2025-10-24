<x-app-layout>

<div class="container mt-4">
    <h2>Add New About Section</h2>

    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add</button>
        <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</x-app-layout>
