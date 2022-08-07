<!DOCTYPE html>
<html>

<head>
    <title>Email From admin</title>
</head>

<body>

    <h3>Hi, {{ $user->name }}</h3>
    <Span>This email from the manager.</Span>
    <p>{{ $body }}</p>

    <p>Thank you</p>
</body>

</html>