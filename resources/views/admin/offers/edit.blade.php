<x-app-layout>
    <div class="container">
        <h2>Edit Offer</h2>
        <form action="{{ route('offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $offer->title }}" required>
            </div>

            <div class="mb-3">
                <label>Discount</label>
                <input type="text" name="discount" class="form-control" value="{{ $offer->discount }}" required>
            </div>

            <div class="mb-3">
                <label>Current Image</label><br>
                <img src="{{ asset('storage/' . $offer->image) }}" width="100">
            </div>

            <div class="mb-3">
                <label>New Image (optional)</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Offer</button>
        </form>
    </div>
</x-app-layout>
