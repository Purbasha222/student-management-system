<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Courses</h2>
    </x-slot>

    <div class="py-6 px-8">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-white">Course List</h3>
            <a href="{{ route('courses.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                + Add Course
            </a>
        </div>

        <table class="w-full border text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">Name</th>
                    <th class="border px-4 py-2 text-left">Code</th>
                    <th class="border px-4 py-2 text-left">Description</th>
                    <th class="border px-4 py-2 text-left">Total Students</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td class="border px-4 py-2 text-white">{{ $course->name }}</td>
                    <td class="border px-4 py-2 text-white">{{ $course->code }}</td>
                    <td class="border px-4 py-2 text-white">{{ $course->description ?? '-' }}</td>
                    <td class="border px-4 py-2 text-white">{{ $course->students_count }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="border px-4 py-2 text-center text-gray-400">No courses yet</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $courses->links() }}</div>
    </div>
</x-app-layout>
