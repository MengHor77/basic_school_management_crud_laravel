@props(['courses'])

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-md shadow">
        <thead>
            <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                <th class="py-3 px-6 border-b">ID</th>
                <th class="py-3 px-6 border-b">Title</th>
                <th class="py-3 px-6 border-b">Duration</th>
                <th class="py-3 px-6 border-b">Capacity</th>
                <th class="py-3 px-6 border-b">Status</th>
                <th class="py-3 px-6 border-b">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($courses as $course)
            <tr class="hover:bg-gray-50">
                <td class="py-3 px-6 border-b">{{ $course->id }}</td>
                <td class="py-3 px-6 border-b">{{ $course->title }}</td>
                <td class="py-3 px-6 border-b">{{ $course->start_date }} → {{ $course->end_date }}</td>
                <td class="py-3 px-6 border-b">{{ $course->capacity }}</td>
                <td class="py-3 px-6 border-b">
                    @if($course->is_active)
                        <span class="px-2 py-1 text-xs bg-green-200 text-green-800 rounded">Active</span>
                    @else
                        <span class="px-2 py-1 text-xs bg-red-200 text-red-800 rounded">Inactive</span>
                    @endif
                </td>
                <td class="py-3 px-6 border-b space-x-2">
                    <x-courseActions :course="$course" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
