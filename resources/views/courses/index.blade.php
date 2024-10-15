@extends('base')
@section('content')
    <h1>Courses</h1>
    <button><a href="{{ route('courses.create') }}">add course</a></button>
    @if($courses->count() === 0)
        <div> NO courses available</div>
    @else
        <table>
            <thead>
                <th>id</th>
                <th>name</th>
                <th>edit</th>
                <th>delete</th>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td><button><a href="{{ route('courses.edit', $course->id) }}">edit</a></button></td>
                    <td>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                            @csrf
                            <button type="submit">delete</button>
                        </form>
                    </td>

                @endforeach
            </tbody>
        </table>
    @endif
@endsection
