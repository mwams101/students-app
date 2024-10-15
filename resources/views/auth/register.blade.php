<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="post" action={{ route('register') }}>
        @csrf
        <label for="name">name</label><br>
        <input name="name" type="text" required><br>
        <label for="email">email</label><br>
        <input name="email" type="email" required><br>
        <label for="password">password</label><br>
        <input name="password" type="password" required><br>
        <label for="password confirmation">password confirmation</label><br>
        <input name="password_confirmation" type="password" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
