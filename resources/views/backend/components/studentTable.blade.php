@props(['students'])

<table class="w-full border">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Courses</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td class="border px-4 py-2">{{ $student->name }}</td>
            <td class="border px-4 py-2">{{ $student->email }}</td>
            <td class="border px-4 py-2">
                @foreach($student->myCourses as $enroll)
                    {{ $enroll->course->title }}<br>
                @endforeach
            </td>
            <td class="border px-4 py-2">
                <x-studentActions :student="$student" />
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
