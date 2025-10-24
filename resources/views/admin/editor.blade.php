<x-app-layout>
    <div class="container mt-5">

    <h2 class="mb-4">Page Content</h2>

    <div class="container mt-5">
    <h2 class="mb-4">Nav Links with Page Content</h2>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($navLinks as $link)
                <tr>
                    <td>{{ $link->title }}</td>
                    <td>{!! $link->content ?? 'No Content' !!}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.navlinks.edit', $link->id) }}">Edit</a>

                        <form action="{{ route('admin.navlinks.destroy', $link->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<br>
        <h2>Edit Page Content</h2>

        <form method="POST" action="{{ route('store.page.content') }}">
            @csrf

            <!-- NavLink Selector -->
            <div class="form-group">
                <label for="nav_link_id">Select Page</label>
                <select class="form-control" name="nav_link_id" id="nav_link_id" required>
                    <option value="">-- Select a page --</option>
                    @foreach ($navLinks as $nav)
                        <option value="{{ $nav->id }}">{{ $nav->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Summernote Editor -->
            <div class="form-group">
                <label for="content">Page Content</label>
                <textarea id="summernote" name="content" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
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
