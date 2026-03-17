


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6 px-8">
        <!-- Stats Cards -->
        <div class="flex gap-4 mb-6">
            <div class="bg-blue-500 text-white rounded-lg p-6 text-center w-48">
                <h3 class="text-3xl font-bold">{{ $totalStudents }}</h3>
                <p class="mt-1">Total Students</p>
            </div>
            <div class="bg-green-500 text-white rounded-lg p-6 text-center w-48">
                <h3 class="text-3xl font-bold">{{ $totalCourses }}</h3>
                <p class="mt-1">Total Courses</p>
            </div>
        </div>

        <!-- Latest Students -->
        <h4 class="text-lg font-semibold mb-2">Latest Students</h4>
        <table class="w-full border text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">Name</th>
                    <th class="border px-4 py-2 text-left">Email</th>
                    <th class="border px-4 py-2 text-left">Course</th>
                    <th class="border px-4 py-2 text-left">Enrolled</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestStudents as $student)
                <tr>
                    <td class="border px-4 py-2">{{ $student->name }}</td>
                    <td class="border px-4 py-2">{{ $student->email }}</td>
                    <td class="border px-4 py-2">{{ $student->course->name }}</td>
                    <td class="border px-4 py-2">{{ $student->enrolled_at }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="border px-4 py-2 text-center text-gray-400">No students yet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
