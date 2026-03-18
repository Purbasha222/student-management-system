<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Students
        </h2>
    </x-slot>

    <div class="py-6 px-8">

        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300 px-4 py-2 rounded mb-4 border border-green-200 dark:border-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                Student List
            </h3>
            <a href="{{ route('students.create') }}"
               class="bg-blue-500 dark:bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-600 dark:hover:bg-blue-700 transition-colors">
                + Add Student
            </a>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="border-b border-gray-200 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-semibold">Name</th>
                        <th class="border-b border-gray-200 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-semibold">Email</th>
                        <th class="border-b border-gray-200 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-semibold">Phone</th>
                        <th class="border-b border-gray-200 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-semibold">Course</th>
                        <th class="border-b border-gray-200 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-semibold">Enrolled</th>
                        <th class="border-b border-gray-200 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900">
                    @forelse($students as $student)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/60 transition-colors">
                        <td class="px-4 py-3 text-gray-800 dark:text-gray-100">{{ $student->name }}</td>
                        <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $student->email }}</td>
                        <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $student->phone ?? '-' }}</td>
                        <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $student->course->name }}</td>
                        <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $student->enrolled_at }}</td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('students.edit', $student) }}"
                               class="bg-yellow-400 dark:bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-500 dark:hover:bg-yellow-600 transition-colors text-xs font-medium">
                                Edit
                            </a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Are you sure?')"
                                        class="bg-red-500 dark:bg-red-600 text-white px-3 py-1 rounded hover:bg-red-600 dark:hover:bg-red-700 transition-colors text-xs font-medium">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-400 dark:text-gray-500">
                            No students found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 dark:text-gray-300">
            {{ $students->links() }}
        </div>

    </div>
</x-app-layout>
