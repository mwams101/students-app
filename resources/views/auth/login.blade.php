<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>
<h1>login</h1>

<form method="post" action="{{ route('login') }}">
    @csrf
    <label for="email">email</label><br>
    <input name="email" type="email" required><br>
    <label for="password">password</label><br>
    <input name="password" type="password" required><br>
    <button type="submit">Submit</button>
</form>
</body>
</html>
