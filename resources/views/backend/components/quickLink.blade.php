<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('admin.teachers.index') }}" class="block bg-indigo-600 text-white p-4 rounded hover:bg-indigo-700 transition">
            Manage Teachers
        </a>
        <a href="{{ route('admin.students.index') }}" class="block bg-green-600 text-white p-4 rounded hover:bg-green-700 transition">
            Manage Students
        </a>
        <a href="{{ route('admin.courses.index') }}" class="block bg-yellow-500 text-white p-4 rounded hover:bg-yellow-600 transition">
            Manage Courses
        </a>
    </div>
</div>
