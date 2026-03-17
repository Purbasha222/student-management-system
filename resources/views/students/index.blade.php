<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students</h2>
    </x-slot>

    <div class="py-6 px-8">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-white">Student List</h3>
            <a href="{{ route('students.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                + Add Student
            </a>
        </div>

        <table class="w-full border text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">Name</th>
                    <th class="border px-4 py-2 text-left">Email</th>
                    <th class="border px-4 py-2 text-left">Phone</th>
                    <th class="border px-4 py-2 text-left">Course</th>
                    <th class="border px-4 py-2 text-left">Enrolled</th>
                    <th class="border px-4 py-2 text-left">Date</th>
                    <th class="border px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td class="border px-4 py-2 text-white">{{ $student->name }}</td>
                    <td class="border px-4 py-2 text-white">{{ $student->email }}</td>
                    <td class="border px-4 py-2 text-white">{{ $student->email }}</td>
                    <td class="border px-4 py-2 text-white">{{ $student->phone ?? '-' }}</td>
                    <td class="border px-4 py-2 text-white">{{ $student->course->name }}</td>
                    <td class="border px-4 py-2 text-white">{{ $student->enrolled_at }}</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('students.edit', $student) }}"
                           class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                            Edit
                        </a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Are you sure?')"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="border px-4 py-2 text-center text-gray-400">No students found</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $students->links() }}</div>
    </div>
</x-app-layout>
