<x-app-layout>

<div class="container mt-4">
    <h2>Edit Booking Section</h2>

    <form action="{{ route('admin.feedbacks.update', $feedback->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div id="fields-container">
            @foreach($fields as $index => $field)
                <div>
                    <input type="text" name="fields[{{ $index }}][name]" value="{{ $field['name'] }}" required />
                    <input type="text" name="fields[{{ $index }}][placeholder]" value="{{ $field['placeholder'] }}" required />
                </div>
            @endforeach
        </div>
        <button type="button" onclick="addField()">Add More Fields</button>
        <button type="submit">Update Fields</button>
    </form>

    <script>
        let fieldCount = {{ count($fields) }};
        function addField() {
            let container = document.getElementById('fields-container');
            let newField = `<div>
                <input type="text" name="fields[${fieldCount}][name]" placeholder="Field Name" required />
                <input type="text" name="fields[${fieldCount}][placeholder]" placeholder="Placeholder" required />
            </div>`;
            container.insertAdjacentHTML('beforeend', newField);
            fieldCount++;
        }
    </script>

</div>

</x-app-layout>
