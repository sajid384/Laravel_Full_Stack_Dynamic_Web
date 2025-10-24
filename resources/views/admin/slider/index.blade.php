{{-- <!-- resources/views/admin/slider/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Slider Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl">Manage Sliders</h3>

                    <div class="mt-4">
                        <a href="{{ route('admin.slider.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded">Add New Slider</a>
                    </div>

                    <div class="mt-4">
                        <table class="table-auto w-full text-left">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4">Title</th>
                                    <th class="py-2 px-4">Description</th>
                                    <th class="py-2 px-4">Button Text</th>
                                    <th class="py-2 px-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $slide)
                                    <tr>
                                        <td class="py-2 px-4">{{ $slide->title }}</td>
                                        <td class="py-2 px-4">{{ Str::limit($slide->description, 50) }}</td>
                                        <td class="py-2 px-4">{{ $slide->button_text }}</td>
                                        <td class="py-2 px-4">
                                            <a href="{{ route('admin.slider.edit', $slide->id) }}" class="text-blue-500">Edit</a> |
                                            <form action="{{ route('admin.slider.destroy', $slide->id) }}" method="POST" class="inline">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}



<!-- resources/views/admin/slider/index.blade.php -->
<x-app-layout>
    <div class="container">
        <h1>All Sliders</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Add New Slider</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                    <th>Background</th>  <!-- New column for showing the background image -->
                </tr>
            </thead>
            <tbody>
                @foreach ($slides as $slide)
                    <tr>
                        <td>{{ $slide->title }}</td>
                        <td>{{ $slide->description }}</td>
                        <td>
                            <a href="{{ route('admin.slider.edit', $slide->id) }}" class="btn btn-warning">Edit</a>
                            
                            <form action="{{ route('admin.slider.destroy', $slide->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <!-- New column for displaying the background image -->
                        <td>
                            @if($slide->bg_image)
                                <div class="slider-item" style="background-image: url('{{ asset('storage/' . $slide->bg_image) }}'); height: 100px; width: 100px; background-size: cover; background-position: center;"></div>
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

