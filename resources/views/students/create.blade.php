<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">Add Student</h2>
    </x-slot>

    <div class="py-6 px-8 max-w-lg">
        <form method="POST" action="{{ route('students.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2
                              bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100
                              placeholder-gray-400 dark:placeholder-gray-500
                              focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                @error('name') <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Valid Email"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2
                              bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100
                              placeholder-gray-400 dark:placeholder-gray-500
                              focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                @error('email') <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Valid Phone"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2
                              bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100
                              placeholder-gray-400 dark:placeholder-gray-500
                              focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Course</label>
                <select name="course_id"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2
                               bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100
                               focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                    <option value="" class="text-gray-400 dark:text-gray-500">-- Select Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}
                                class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id') <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Enrolled Date</label>
                <input type="date" name="enrolled_at" value="{{ old('enrolled_at') }}"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2
                              bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100
                              focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                              [color-scheme:light] dark:[color-scheme:dark]">
                @error('enrolled_at') <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit"
                        class="bg-green-500 dark:bg-green-600 text-white px-4 py-2 rounded
                               hover:bg-green-600 dark:hover:bg-green-700 transition-colors">
                    Save Student
                </button>
                <a href="{{ route('students.index') }}"
                   class="bg-gray-400 dark:bg-gray-600 text-white px-4 py-2 rounded
                          hover:bg-gray-500 dark:hover:bg-gray-700 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
