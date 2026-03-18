<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">Courses</h2>
    </x-slot>

    <div class="py-6 px-8">
        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300 px-4 py-2 rounded mb-4 border border-green-200 dark:border-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Course List</h3>
            <a href="{{ route('courses.create') }}"
               class="bg-blue-500 dark:bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-600 dark:hover:bg-blue-700 transition-colors">
                + Add Course
            </a>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="border-b border-gray-200 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-semibold">Name</th>
                        <th class="border-b border-gray-200 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-semibold">Code</th>
                        <th class="border-b border-gray-200 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-semibold">Description</th>
                        <th class="border-b border-gray-200 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-semibold">Total Students</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900">
                    @forelse($courses as $course)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/60 transition-colors">
                        <td class="px-4 py-3 text-gray-800 dark:text-gray-100 font-medium">{{ $course->name }}</td>
                        <td class="px-4 py-3 text-gray-700 dark:text-gray-300">
                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-2 py-0.5 rounded text-xs font-mono">
                                {{ $course->code }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $course->description ?? '-' }}</td>
                        <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $course->students_count }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-gray-400 dark:text-gray-500">
                            No courses yet
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 dark:text-gray-300">
            {{ $courses->links() }}
        </div>
    </div>
</x-app-layout>
