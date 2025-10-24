<x-app-layout>
    <div class="container">
        <h2>Add New Offer</h2>

        <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="number" name="discount" id="discount" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Offer</button>
        </form>
    </div>
</x-app-layout>
