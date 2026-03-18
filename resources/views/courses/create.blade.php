<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">Add Course</h2>
    </x-slot>

    <div class="py-6 px-8 max-w-lg">
        <form method="POST" action="{{ route('courses.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Course Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2
                              bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100
                              placeholder-gray-400 dark:placeholder-gray-500
                              focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                @error('name') <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Course Code</label>
                <input type="text" name="code" value="{{ old('code') }}"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2
                              bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100
                              placeholder-gray-400 dark:placeholder-gray-500
                              focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                @error('code') <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Description</label>
                <textarea name="description" rows="3"
                          class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2
                                 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100
                                 placeholder-gray-400 dark:placeholder-gray-500
                                 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">{{ old('description') }}</textarea>
            </div>

            <div class="flex gap-2">
                <button type="submit"
                        class="bg-green-500 dark:bg-green-600 text-white px-4 py-2 rounded
                               hover:bg-green-600 dark:hover:bg-green-700 transition-colors">
                    Save Course
                </button>
                <a href="{{ route('courses.index') }}"
                   class="bg-gray-400 dark:bg-gray-600 text-white px-4 py-2 rounded
                          hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
