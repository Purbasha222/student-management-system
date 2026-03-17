<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Student</h2>
    </x-slot>

    <div class="py-6 px-8 max-w-lg">
        <form method="POST" action="{{ route('students.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-white">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name"
                       class="w-full border rounded px-3 py-2">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-white">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Valid Email"
                       class="w-full border rounded px-3 py-2">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-white">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Valid Phone"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-white">Course</label>
                <select name="course_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Select Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-white">Enrolled Date</label>
                <input type="date" name="enrolled_at" value="{{ old('enrolled_at') }}"
                       class="w-full border rounded px-3 py-2">
                @error('enrolled_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Save Student
                </button>
                <a href="{{ route('students.index') }}"
                   class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
