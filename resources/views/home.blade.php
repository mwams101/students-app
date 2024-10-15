<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Welcome back {{ auth()->user()->name }}</h1>
<form method="post" action="{{ route('logout') }}">
    @csrf
    <button type="submit">logout</button>
</form>

<a href="#">courses</a>
<a href="#">create student</a>
</body>
</html>
