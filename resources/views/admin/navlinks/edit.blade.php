<!-- resources/views/admin/navlinks/edit.blade.php -->
<x-app-layout>


<div class="container">
    <h2>Edit Nav Link</h2>

    <!-- Form to edit the link -->
    <form action="{{ route('admin.navlinks.update', $link->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $link->title) }}" required>
        </div>

        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ old('url', $link->url) }}" required>
        </div>

        <div class="form-group">
            <label for="url">Content</label>
            <textarea id="summernote" name="content" class="form-control" required>{{ old('content', $link->content) }}</textarea>

        </div>

        <button type="submit" class="btn btn-primary">Update Link</button>
    </form>
</div>

 <!-- JS Scripts -->
 @push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <script>
       $(document).ready(function () {
        $('#summernote').summernote({
            height: 300,
            placeholder: 'Write page content here...',
            tabsize: 2,
            callbacks: {
                onImageUpload: function(files) {
                    uploadImage(files[0]);
                }
            }
        });

        function uploadImage(file) {
            var data = new FormData();
            data.append("image", file);
            data.append("_token", '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route('upload.image') }}", // Route for your controller
                method: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $('#summernote').summernote('insertImage', response.url);
                },
                error: function(xhr) {
                    alert('Image upload failed.');
                }
            });
        }
    });
    </script>
@endpush


    @push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
@endpush

</x-app-layout>