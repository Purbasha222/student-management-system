<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6 px-8 bg-white dark:bg-gray-900 min-h-screen">

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
        <h4 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-100">
            Latest Students
        </h4>

        <div class="overflow-x-auto">
            <table class="w-full border text-sm border-gray-200 dark:border-gray-700">

                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-left text-gray-800 dark:text-gray-200">
                            Name
                        </th>
                        <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-left text-gray-800 dark:text-gray-200">
                            Email
                        </th>
                        <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-left text-gray-800 dark:text-gray-200">
                            Course
                        </th>
                        <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-left text-gray-800 dark:text-gray-200">
                            Enrolled
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-900">
                    @forelse($latestStudents as $student)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $student->name }}
                            </td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $student->email }}
                            </td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $student->course->name }}
                            </td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $student->enrolled_at }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-center text-gray-400 dark:text-gray-500">
                                No students yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</x-app-layout>
