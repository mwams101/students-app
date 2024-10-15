<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<header>
    <nav>
        <a href="{{ route('courses.index') }}">courses</a>
        <a href="{{ route('students.index') }}">students</a>
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit">logout</button>
        </form>
    </nav>
</header>
@yield('content')


</body>
</html>
