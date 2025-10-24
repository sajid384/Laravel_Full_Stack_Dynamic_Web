<x-app-layout>

<div class="container mt-4">
    <h2>Add New booking Section</h2>

 
<form action="{{ route('admin.bookings.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="fields-container">
        <div>
            <input type="text" name="fields[0][name]" placeholder="Field Name" required />
            <input type="text" name="fields[0][placeholder]" placeholder="Placeholder" required />
        </div>
    </div>
    <button type="button" onclick="addField()">Add More Fields</button>
    <button type="submit">Save Fields</button>
</form>

<script>
    let fieldCount = 1;
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