<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>Dear {{$name}}</h3>
        Welcome to Uriel Academy we Hope you enjoy all our classes <br>
        click on the link below for your account verification
        <b>{{$body}}</b>

        <a href="http://localhost:8080/#/verify/{{$token}}">Verify Account</a>
    </div>
</body>
</html>