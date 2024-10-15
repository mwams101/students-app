@extends('base')
@section('content')
    <!-- Form to create student -->
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="user_id">User:</label>
        <select name="user_id" id="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <br><br>

        <label for="course_id">Course:</label>
        <select name="course_id" id="course_id" required>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
        <br><br>

        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo" required>
        <br><br>

        <button type="submit">Create Student</button>
    </form>
@endsection
