@extends('base')
@section('content')
    <!-- Form to create student -->

    <h2>Create New Student</h2>

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="name">Name</label><br>
            <input type="text" name="name" required><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" required><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" required><br>
            <label for="course_id">Course</label><br>
            <select name="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select><br>
            <label for="photo">Photo</label><br>
            <input type="file" name="photo" required><br>

        <button type="submit">Create Student</button>
    </form>
@endsection
