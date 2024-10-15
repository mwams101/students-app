@extends('base')
@section('content')
        <h1>Create Course</h1>
        <form method="post" action="{{ route('courses.update', $course->id) }}">
            @csrf
            <label for="name">name</label><br>
            <input type="text" name="name" value="{{ $course->name }}"><br>
            <button type="submit">submit</button>
        </form>
@endsection
