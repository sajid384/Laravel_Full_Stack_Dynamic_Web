<style>
    .sortable-list,
    .nested-list {
        list-style: none;
        padding-left: 20px;
    }

    .menu-item {
        background: #f4f4f4;
        margin: 5px 0;
        padding: 10px;
        border: 1px solid #ddd;
        cursor: move;
        color: black;
    }

    .nested-list {
        padding-left: 30px;
    }

    .handle {
        cursor: grab;
        padding-right: 10px;
        color: black;
        font-size: 18px;
    }

    .sortable-placeholder {
        background: #e0e0e0;
        height: 30px;
        border: 1px dashed #666;
        margin: 5px 0;
    }

    .bg-blue-500 {
        background-color: #007bff !important;
    }
</style>




<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Nav Link Management Section -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">


                <h3 class="text-xl">Manage Navbar Links</h3>

                <!-- Display existing nav links -->
                <div class="mt-4">
                    <table class="table-auto w-full text-left">
                        <thead>
                            <tr>
                                <th class="py-2 px-4">Title</th>
                                <th class="py-2 px-4">URL</th>
                                <th class="py-2 px-4">View File</th>
                                <th class="py-2 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($navLinks as $link)
                                <tr>
                                    <td class="py-2 px-4">{{ $link->title }}</td>
                                    <td class="py-2 px-4">{{ $link->url }}</td>
                                    <td class="py-2 px-4">{{ $link->view_file ?? 'N/A' }}</td>
                                    <!-- Display view file -->
                                    <td class="py-2 px-4">
                                        <a class="text-white" href="{{ route('admin.navlinks.edit', $link->id) }}">Edit</a> |
                                        <form action="{{ route('admin.navlinks.destroy', $link->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <h3 class="text-xl mb-4">Drag & Drop Menu Management</h3>

                <!-- Navigation Menu -->
                <ul id="sortable-menu" class="sortable-list">
                    @foreach ($navLinks as $link)
                        <li class="menu-item" data-id="{{ $link->id }}" data-parent-id="{{ $link->parent_id }}">
                            <div class="menu-content">
                                <span class="handle">↕</span>
                                <b><span>{{ $link->title }}</span></b>
                                
                            </div>

                            @if ($link->children->isNotEmpty())
                                <ul class="nested-list">
                                    @foreach ($link->children as $child)
                                        <li class="menu-item" data-id="{{ $child->id }}"
                                            data-parent-id="{{ $child->parent_id }}">
                                            <div class="menu-content">
                                                <span class="handle">↕</span>
                                                <span>{{ $child->title }}</span>
                                                <a href="{{ route('admin.navlinks.edit', $child->id) }}"
                                                    class="text-blue-500 ml-2">Edit</a>
                                                <form action="{{ route('admin.navlinks.destroy', $child->id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500">Delete</button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>


                <button id="saveOrder" class="bg-blue-500 text-white px-4 py-2 rounded mt-3">Save Order</button>

                <!-- Add New Link Form -->
                <div class="mt-6">
                    <h4 class="text-lg">Add New Nav Link</h4>
                    <form action="{{ route('admin.navlinks.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="title" class="block">Title</label>
                                <input type="text" name="title" id="title"
                                    class="mt-1 block w-full bg-white border px-2 py-1" style="color: black;" required>
                            </div>
                            <div>
                                <label for="url" class="block">URL</label>
                                <input type="text" name="url" id="url"
                                    class="mt-1 block w-full bg-white border px-2 py-1" style="color: black;" required>
                            </div>
                            <div>
                                <label for="view_file" class="block">View File</label>
                                <input type="text" name="view_file" id="view_file" class="mt-1 block w-full"
                                    placeholder="e.g., page.about" required>
                            </div>
                            <div>
                                <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Add
                                    Link</button>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI (sortable functionality ke liye zaroori hai) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- jQuery Nested Sortable Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/NestedSortable/2.0.0/jquery.mjs.nestedSortable.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#sortable-menu").sortable({
                handle: ".handle",
                placeholder: "sortable-placeholder",
                // update event hata diya taake auto-save na ho
            });

            $("#saveOrder").click(function() {
                saveOrder(); // Sirf button dabane pe order save hoga
            });

            function saveOrder() {
                var order = [];
                $("#sortable-menu .menu-item").each(function(index) {
                    order.push({
                        id: $(this).data("id"),
                        parent_id: $(this).closest("ul").parent(".menu-item").data("id") || 0,
                        position: index + 1
                    });
                });

                $.ajax({
                    url: "{{ route('admin.navlinks.reorder') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        order: order
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert("Menu order saved successfully!");
                        } else {
                            alert("Something went wrong: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", xhr.responseText);
                        alert("Something went wrong! Please check console.");
                    }
                });
            }
        });
    </script>

</x-app-layout>
