<x-app-layout>
<div class="container mt-4">
    <h2>Edit Footer Details</h2>

    <form action="{{ route('admin.footer.update', $footer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $footer->location }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $footer->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $footer->email }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $footer->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="opening_hours" class="form-label">Opening Hours</label>
            <input type="text" class="form-control" id="opening_hours" name="opening_hours" value="{{ $footer->opening_hours }}" required>
        </div>

        <h4>Social Media Links</h4>
        <div class="mb-3">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="url" class="form-control" id="facebook" name="facebook" value="{{ $footer->facebook }}">
        </div>

        <div class="mb-3">
            <label for="twitter" class="form-label">Twitter</label>
            <input type="url" class="form-control" id="twitter" name="twitter" value="{{ $footer->twitter }}">
        </div>

        <div class="mb-3">
            <label for="linkedin" class="form-label">LinkedIn</label>
            <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ $footer->linkedin }}">
        </div>

        <div class="mb-3">
            <label for="instagram" class="form-label">Instagram</label>
            <input type="url" class="form-control" id="instagram" name="instagram" value="{{ $footer->instagram }}">
        </div>

        <div class="mb-3">
            <label for="pinterest" class="form-label">Pinterest</label>
            <input type="url" class="form-control" id="pinterest" name="pinterest" value="{{ $footer->pinterest }}">
        </div>

        <button type="submit" class="btn btn-success">Update Footer</button>
    </form>
</div>
</x-app-layout>
