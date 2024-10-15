@extends('base')
@section('content')
    <h1>Students</h1>
    <a href="{{ route('students.create') }}">Create New Student</a>    @if($students->count() === 0)
        <div> NO students available</div>
    @else
        <!-- List of students -->
        <table border="1" cellpadding="10">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Course</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->course->name }}</td>
                    <td><img src="{{ asset('storage/' . $student->photo) }}" width="50" alt="Photo"></td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}">View</a> |
                        <a href="{{ route('students.edit', $student->id) }}">Edit</a> |
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
@endsection
