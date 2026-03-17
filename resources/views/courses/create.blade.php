<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Course</h2>
    </x-slot>

    <div class="py-6 px-8 max-w-lg">
        <form method="POST" action="{{ route('courses.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-white">Course Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border rounded px-3 py-2">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-white">Course Code</label>
                <input type="text" name="code" value="{{ old('code') }}"
                       class="w-full border rounded px-3 py-2">
                @error('code') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-white">Description</label>
                <textarea name="description" rows="3"
                          class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
            </div>

            <div class="flex gap-2">
                <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Save Course
                </button>
                <a href="{{ route('courses.index') }}"
                   class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
