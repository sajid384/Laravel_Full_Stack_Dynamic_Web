<x-app-layout>
<div class="container">
    <h1>Edit Menu Item</h1>

    <form action="{{ route('admin.menu.update', $menuItem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" name="name" class="form-control" value="{{ $menuItem->name }}" required>
        </div>

        <div class="form-group">
    <label for="category">Category</label>
    <select name="category" class="form-control" value="{{ $menuItem->category }}" required>
        <option value="Fast Food">Fast Food</option>
        <option value="BBQ">BBQ</option>
        <option value="Chinese Food">Chinese Food</option>
        <option value="Desserts">Desserts</option>
        <option value="Drinks">Drinks</option>
    </select>
</div>


        <div class="form-group">
            <label for="price">Price ($)</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $menuItem->price }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" value="{{ $menuItem->description }}" rows="4" placeholder="Enter item description..." required></textarea>
        </div>

        <div class="mb-3">
                <label>Current Image</label><br>
                <img src="{{ asset('storage/' . $menuItem->image) }}" width="100">
            </div>

        <div class="form-group">
            <label for="image">Upload New Image (Optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Item</button>
        <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</x-app-layout>
