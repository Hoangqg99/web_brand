<!DOCTYPE html>
<html>

<head>
    <title>Password Reset</title>
</head>

<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>You have requested a password reset. Click the link below to reset your password:</p>
    <a href="{{ route('user.mail', ['token' => $user->remember_token]) }}">Reset Your Password</a>
    <p>If you did not request this, please ignore this email.</p>
    <br>
    <p>Regards,</p>
    <p>{{ config('app.name') }}</p>
</body>

</html>
