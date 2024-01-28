<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <br>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <input type="text" name="emailOrUsername" placeholder="Email atau Username" value="" required>
        <br>
        <br>
        <input type="password" name="password" id="password" placeholder="Password" value="" required><button type="button" onclick="showPassword()">Show</button>
        <br>
        <br>
        <button type="submit">Login</button>
    </form>
    <script>
        function showPassword() {
            var password = document.getElementById('password')
            if (password.type == 'password') {
                password.type = 'text'
            } else {
                password.type = 'password'
            }
        } 
    </script>
</body>
</html>