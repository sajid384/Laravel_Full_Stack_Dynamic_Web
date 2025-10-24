{{-- <!-- resources/views/admin/slider/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Slider') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.slider.update', $slide->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="title" class="block">Title</label>
                                <input type="text" name="title" id="title" class="mt-1 block w-full" value="{{ $slide->title }}" required>
                            </div>
                            <div>
                                <label for="description" class="block">Description</label>
                                <textarea name="description" id="description" class="mt-1 block w-full" required>{{ $slide->description }}</textarea>
                            </div>
                            <div>
                                <label for="button_text" class="block">Button Text</label>
                                <input type="text" name="button_text" id="button_text" class="mt-1 block w-full" value="{{ $slide->button_text }}" required>
                            </div>
                            <div>
                                <label for="button_url" class="block">Button URL</label>
                                <input type="text" name="button_url" id="button_url" class="mt-1 block w-full" value="{{ $slide->button_url }}" required>
                            </div>
                            <div>
                                <button type="submit" class="mt-4 border-black bg-blue-500 text-black py-2 px-4 rounded">Update Slider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}



<!-- resources/views/admin/slider/edit.blade.php -->
<x-app-layout>
<div class="container">
    <h1>Edit Slider</h1>

    <form action="{{ route('admin.slider.update', $slide->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $slide->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $slide->description }}</textarea>
        </div>

        <div>
            <label for="bg_image" class="block">Background Image</label>
            <input type="file" name="bg_image" id="bg_image" class="mt-1 block w-full"  accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="button_text">Button Text</label>
            <input type="text" name="button_text" id="button_text" class="form-control" value="{{ $slide->button_text }}" required>
        </div>

        <div class="form-group">
            <label for="button_url">Button URL</label>
            <input type="url" name="button_url" id="button_url" class="form-control" value="{{ $slide->button_url }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Slider</button>
    </form>
</div>
</x-app-layout>
