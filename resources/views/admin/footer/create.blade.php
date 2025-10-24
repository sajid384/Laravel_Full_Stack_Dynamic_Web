<x-app-layout>
<div class="container mt-4">
    <h2>Add Footer Details</h2>

    <form action="{{ route('admin.footer.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="mb-3">
            <label for="opening_hours" class="form-label">Opening Hours</label>
            <input type="text" class="form-control" id="opening_hours" name="opening_hours" required>
        </div>

        <h4>Social Media Links</h4>
        <div class="mb-3">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="url" class="form-control" id="facebook" name="facebook">
        </div>

        <div class="mb-3">
            <label for="twitter" class="form-label">Twitter</label>
            <input type="url" class="form-control" id="twitter" name="twitter">
        </div>

        <div class="mb-3">
            <label for="linkedin" class="form-label">LinkedIn</label>
            <input type="url" class="form-control" id="linkedin" name="linkedin">
        </div>

        <div class="mb-3">
            <label for="instagram" class="form-label">Instagram</label>
            <input type="url" class="form-control" id="instagram" name="instagram">
        </div>

        <div class="mb-3">
            <label for="pinterest" class="form-label">Pinterest</label>
            <input type="url" class="form-control" id="pinterest" name="pinterest">
        </div>

        <button type="submit" class="btn btn-success">Save Footer</button>
    </form>
</div>
</x-app-layout>
