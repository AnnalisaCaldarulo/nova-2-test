<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Newsletter</title>
</head>

<body>
    <h1>{{ $subject }}</h1>
    <h2>Ciao, {{ $user }}!</h2>
    <p>{!! $body !!}</p>
</body>

</html>
