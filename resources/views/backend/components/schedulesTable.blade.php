@props(['schedules'])

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-md shadow">
        <thead>
            <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                <th class="py-3 px-6 border-b">ID</th>
                <th class="py-3 px-6 border-b">Course</th>
                <th class="py-3 px-6 border-b">Teacher</th>
                <th class="py-3 px-6 border-b">Day</th>
                <th class="py-3 px-6 border-b">Time</th>
                <th class="py-3 px-6 border-b">Room</th>
                <th class="py-3 px-6 border-b">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($schedules as $schedule)
            <tr class="hover:bg-gray-50">
                <td class="py-3 px-6 border-b">{{ $schedule->id }}</td>
                <td class="py-3 px-6 border-b">{{ $schedule->course->title }}</td>
                <td class="py-3 px-6 border-b">{{ $schedule->teacher->name }}</td>
                <td class="py-3 px-6 border-b">{{ $schedule->day }}</td>
                <td class="py-3 px-6 border-b">{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                <td class="py-3 px-6 border-b">{{ $schedule->room ?? '-' }}</td>
                <td class="py-3 px-6 border-b space-x-2">
                    <x-schedulesActions :schedule="$schedule" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
