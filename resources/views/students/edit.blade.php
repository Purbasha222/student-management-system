<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Student</h2>
    </x-slot>

    <div class="py-6 px-8 max-w-lg">
        <form method="POST" action="{{ route('students.update', $student) }}">
            @csrf @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $student->name) }}"
                       class="w-full border rounded px-3 py-2">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $student->email) }}"
                       class="w-full border rounded px-3 py-2">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $student->phone) }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Course</label>
                <select name="course_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Select Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"
                            {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Enrolled Date</label>
                <input type="date" name="enrolled_at"
                       value="{{ old('enrolled_at', $student->enrolled_at) }}"
                       class="w-full border rounded px-3 py-2">
                @error('enrolled_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Update Student
                </button>
                <a href="{{ route('students.index') }}"
                   class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
